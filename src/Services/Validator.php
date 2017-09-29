<?php

namespace GroundSix\Communicator\Services;

use DOMDocument;
use DOMElement;
use GroundSix\Communicator\Exceptions\BadResponseException;
use InvalidArgumentException;

class Validator
{
    /** @var string */
    private $xsd;

    /**
     * Validator constructor.
     *
     * @param string $xsdPath The path to the XSD to validate responses against
     *
     * @throws InvalidArgumentException
     */
    public function __construct(string $xsdPath)
    {
        if (!is_file($xsdPath) || !is_readable($xsdPath)) {
            throw new InvalidArgumentException('A path to a XSD file must be given.');
        }

        $this->xsd = $xsdPath;
    }

    /**
     * @param string $response An xml string to validate
     *
     * @throws BadResponseException if the response is not valid
     *
     * @return bool
     */
    public function validate(string $response): bool
    {
        $this->startInternalErrors();
        $valid = $this->isResponseValid($response);
        $errors = libxml_get_errors();
        $this->stopInternalErrors();

        if (!empty($errors)) {
            $error = reset($errors);
            throw new BadResponseException($error->message, $error->code);
        }

        return $valid;
    }

    private function startInternalErrors(): void
    {
        $this->useInternalErrors(true);
    }

    private function useInternalErrors(bool $useErrors): void
    {
        libxml_clear_errors();
        libxml_use_internal_errors($useErrors);
    }

    private function isResponseValid(string $response): bool
    {
        $dom = new DOMDocument();
        $dom->loadXML($this->extractResponse($response));
        $valid = $dom->schemaValidate($this->xsd);
        unset($dom);

        return $valid;
    }

    private function extractResponse(string $soap): string
    {
        $dom = new DOMDocument();
        $dom->loadXML($soap);
        /** @var DOMElement $body */
        $body = $dom->getElementsByTagName('Body')[0];
        $body->firstChild->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $response = $dom->saveXML($body->firstChild);
        unset($dom, $body);

        return $response;
    }

    private function stopInternalErrors(): void
    {
        $this->useInternalErrors(false);
    }
}

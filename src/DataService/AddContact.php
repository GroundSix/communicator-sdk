<?php

namespace GroundSix\Communicator\DataService;

use GroundSix\Communicator\Enum\ImportResult;
use GroundSix\Communicator\Exceptions\BadResponseFormat;
use GroundSix\Communicator\Exceptions\DataImporterException;
use GroundSix\Communicator\Resources\ColumnMapping;
use GroundSix\Communicator\Resources\DataImport;
use GroundSix\Communicator\Resources\DataRecord;
use GroundSix\Communicator\Resources\Subscription;
use stdClass;

class AddContact
{
    protected const SUCCESS_CODES = [
        ImportResult::SUCCESS_INSERTING,
        ImportResult::SUCCESS_UPDATING,
        ImportResult::NO_CHANGE_TO_EXISTING_CONTACT,
    ];

    /** @var int */
    protected $tableId;
    /** @var ColumnMapping[] */
    protected $data;
    /** @var DataImporter */
    protected $request;
    /** @var stdClass */
    protected $response;

    /**
     * AddContact constructor.
     *
     * @param int   $tableId
     * @param array $data
     * @param array $subscriptions
     */
    public function __construct(int $tableId, array $data, $subscriptions = [])
    {
        $this->tableId = $tableId;
        $this->data = ColumnMapping::map($data);


        $dataRecord = new DataRecord($this->data, Subscription::fromArray($subscriptions));
        $dataImport = new DataImport($this->tableId, [$dataRecord]);
        $this->request = new DataImporter($dataImport);
    }

    public function getRequest(): DataImporter
    {
        return $this->request;
    }

    public function formatResponse(stdClass $response)
    {
        try {
            $this::rules()->assert($response);
        } catch (ValidationException $e) {
            throw new BadResponseFormat('The response from Communicator was not formatted as expected.', 0, $e);
        }
        $this->response = $response;
        $this->checkForErrors();

        return true;
    }

    /**
     * @throws BadResponseFormat
     */
    protected function checkForErrors()
    {
        $importDetails = $this->response->DataImporterResult->ImportDetails;
        $importResult = $importDetails->DataImportResponseDetail[0]->Result;

        if (!in_array($importResult, static::SUCCESS_CODES)) {
            throw new DataImporterException(
                $importDetails->DataImportResponseDetail[0]->Response,
                DataImporterException::STATUS_CODE_MAP[$importResult] ?? DataImporterException::UNKNOWN
            );
        };
    }

}

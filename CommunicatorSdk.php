<?php
use Resources\Resource;
use Resources\CommunicatorCredentials;
use Resources\Services\MessageService;
use Resources\Services\DataService;
use Resources\Services\ResponseService;
/**
<code>
	$sdk = new CommunicatorSdk('username', 'password');
	$request = new Resources\CreateHtmlEmail([
		'Id' => '',
		'MailingListId' => '',
		'Name' => '',
		'Description' => '',
		'PlainText' => '',
		'HtmlText' => ''
	]);
	$sdk->service('message')->post($request);
</code>
*/

class CommunicatorSdk {

	public $communicatorCredentials;
	protected $services = [];

	public function __construct($username, $password)
	{
		$this->communicatorCredentials = new CommunicatorCredentials;
		$this->communicatorCredentials->username = $username;
		$this->communicatorCredentials->password = $password;
	}

	public function post(Resource $resource) {
//		var_dump($resource);
//		die;
		$resource_reflection = new ReflectionClass($resource);
		$service = $this->service($resource_reflection->getNamespaceName());

		$header_reflection = new ReflectionClass($service->header);
		$name = $resource_reflection->getShortName();

		$header_name = $header_reflection->getShortName();

		$client = new SoapClient($service->url . '?WSDL', array("trace" => 1, "exception" => 0, 'soap_version' => \SOAP_1_2));

		$header = new SoapHeader('http://ws.communicatorcorp.com/', $header_name, $service->header);
		$client->__setSoapHeaders($header);
		return $client->{$name}((array) $resource);
	}

	protected function service($type)
	{
		if (! isset($services[$type])) {
			$service = '\\Services\\' . $type;
			if (! class_exists($service)) {
				throw new Services\ServiceException("Unknown service: " . $service);
			}
			$this->services[$type] = new $service;

			$this->services[$type]->addHeader($this->communicatorCredentials);
		}
		return $this->services[$type];
	}

}

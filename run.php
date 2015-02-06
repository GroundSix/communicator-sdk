<?php

function autoloader($class)
{
	$class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
	$file = __DIR__. '/'.$class.'.php';

    if(file_exists($file)) {
        require_once $file;
    }
}

spl_autoload_register('autoloader');

$sdk = new CommunicatorSdk('bdaily_api', 'sA7rAPef');

$request = new \DataService\DataImporter([
    'ClientTableId' => 34111,
    'Records' => [
        'DataRecord' => [
            new \Resources\Subscriber('Peter@test.com', 'Peter', [54771]),
        ],
    ],
]);


//$request = new MessageService\CreateHtmlEmail([
// 	'Id' => '1',
// 	'MailingListId' => 54771,
// 	'Name' => 'Test',
// 	'Description' => 'Test',
// 	'PlainText' => "Test \n[[Unsubscribe]]",
// 	'HtmlText' => '<p>Test</p><a href="Unsubscribe" target="_blank" style="font-family: Arial, Helvetica, sansserif;
// font-size: 11px; color: #a8a8a8 ; text-decoration: none;"><font color="#
// a8a8a8">Click here to unsubscribe</font></a>'
//]);
//
//
//$response = $sdk->post($request);
//
//
//$request = new MessageService\CreateEmailDispatch([
//	"EmailId" => 422070,
// 	"MailingListId" => 54771,
// 	"FromName" => "Pelle Telle",
// 	"FromEmail" => "digital@bdaily.co.uk",
// 	"SubjectLine" => "Bdaily in publishing relevant news shocker!",
// 	"TrackHtmlLinks" => false,
// 	"TrackPlainLinks" => false,
// ]);

$response = $sdk->post($request);

// $request = new MessageService\DispatchControl([
// 	'Id' => $response->CreateEmailDispatchResult->Id,
// 	'Command' => 'Authorise',
// ]);

//$sdk->post($request);
//
//$Records = array_map($emails, function ($value)) {
//	return new DataRecord('345', 'ertgrt');
//}

var_dump($response);
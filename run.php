<?php

date_default_timezone_set('Europe/London');

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

$regions = [
    'north-east' => 55288,
    'north-west' => 55289,
    'yorkshire' => 55290
];

$clientTableId = 34235;

//$martin = new \Resources\Subscriber('martin.stanley@groundsix.com', 'Martin Stanley', []);
//$simon = new \Resources\Subscriber('simon.tapson@groundsix.com', 'Simon Tapson', []);
//$fiona = new \Resources\Subscriber('fiona.kay@bdaily.com', 'Fiona Kay', []);

////1. Create user in contact table + assign them to the NE mailing list
$pedro = new \Resources\Subscriber('pedro.debrito@groundsix.com', 'Pedro De Brito', [$regions['north-east']]);
//
//$request = new \DataService\DataImporter([
//    'ClientTableId' => 34235,
//    'Records' => [
//        'DataRecord' => [
//            $pedro,
//        ],
//    ],
//]);
//
//$response = $sdk->post($request);
//var_dump($response);

//2. Add them to the NW mailing list
//$subscription = new \Resources\SubscriptionInfo($regions['north-west']);
//
//$request = new \DataService\UpdateContactSubscription($pedro->getEmail(), $subscription);
//
//$response = $sdk->post($request);
//var_dump($response);

//3. Get user subscription information
//$request = new \DataService\GetContactSubscriptions($pedro->getEmail(), $clientTableId);
//
//$response = $sdk->post($request);
//var_dump($response);

//4. Remove them from all mailing lists

//$regionsToRemove = [
//    [$regions['north-west'], false],
//    [$regions['north-east'], false],
//];
//
//$request = new \DataService\UpdateContactSubscriptions($pedro->getEmail(), $regionsToRemove);
//
//$response = $sdk->post($request);
//var_dump($response);
//
//5. Add them to the Yorkshire mailing list
//$request = new \DataService\UpdateContactSubscription($pedro->getEmail(), new \Resources\SubscriptionInfo($regions['yorkshire']));
//
//$response = $sdk->post($request);
//var_dump($response);
//
//6. Get user subscription information
$request = new \DataService\GetContactSubscriptions($pedro->getEmail(), $clientTableId);

$response = $sdk->post($request);
var_dump($response);

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



// $request = new MessageService\DispatchControl([
// 	'Id' => $response->CreateEmailDispatchResult->Id,
// 	'Command' => 'Authorise',
// ]);

//$sdk->post($request);
//
//$Records = array_map($emails, function ($value)) {
//	return new DataRecord('345', 'ertgrt');
//}




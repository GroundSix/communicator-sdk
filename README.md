Communicator SDK
================

[![build status](https://gitlab.com/groundsix/communicator-sdk/badges/master/build.svg)](https://gitlab.com/groundsix/communicator-sdk/commits/master)

SDK for interacting with the Communicator SOAP API.

This attempts to abstract Communicator's API calls so there is no need to interact with SOAP.

Example
-------

```php
use GroundSix\Communicator\DataService\AddContact;
use GroundSix\Communicator\Exceptions\DataImporterException;
use GroundSix\Communicator\Resources\Credentials;
use GroundSix\Communicator\Services\DataService;

$credentials = new Credentials(<username>, <password>);

/*
 * A Service can provide a SoapClient with some default configuration
 * or a custom SoapClient can be used.
 */
$dataService = new DataService($credentials);

// Create a new AddContact from a table id and data to insert
$addContact = new AddContact(123, [1234 => 'adam@example.com', 6789 => 'Adam']);
try {
    $dataService->addContact($addContact);
    // >>> true
} catch (DataImporterException $e) {
    // the contact couldn't be added to the table
    // if ($e->getCode() == DataImporterException::PRIMARY_KEY_VIOLATION) {...}
}
```


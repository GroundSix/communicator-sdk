<?php

namespace GroundSix\Communicator\Services;

class DataService extends Service
{
    /**
     * Get a client tables
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=GetClientTable
     * @return \stdClass
     */
    public function GetClientTable($request)
    {
        return $this->sendRequest('GetClientTable', $request);
    }

    /**
     * Get an array of client tables
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=GetClientTables
     * @return \stdClass
     */
    public function GetClientTables()
    {
        return $this->sendRequest('GetClientTables');
    }

    /**
     * Get an array of client tables used in a mailing list
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=GetClientTablesForMailingList
     * @return \stdClass
     */
    public function GetClientTablesForMailingList($request)
    {
        return $this->sendRequest('GetClientTablesForMailingList', $request);
    }

    /**
     * Get a client table's columns
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=GetClientTableColumns
     * @return \stdClass
     */
    public function GetClientTableColumns($request)
    {
        return $this->sendRequest('GetClientTableColumns', $request);
    }

    /**
     * Import data into a table and return a reponse object
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=DataImporter
     * @return \stdClass
     */
    public function DataImporter($request)
    {
        return $this->sendRequest('DataImporter', $request);
    }

    /**
     * Import data into a table using a CSV file that has been uploaded to Communicator FTP storage
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=DataImporterViaFTP
     * @return \stdClass
     */
    public function DataImporterViaFTP($request)
    {
        return $this->sendRequest('DataImporterViaFTP', $request);
    }

    /**
     * Get a data import
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=GetDataImport
     * @return \stdClass
     */
    public function GetDataImport($request)
    {
        return $this->sendRequest('GetDataImport', $request);
    }

    /**
     * Provides a unified method to control a data import
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=DataImportControl
     * @return \stdClass
     */
    public function DataImportControl($request)
    {
        return $this->sendRequest('DataImportControl', $request);
    }

    /**
     * Create a new mailing list
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=CreateMailingList
     * @return \stdClass
     */
    public function CreateMailingList($request)
    {
        return $this->sendRequest('CreateMailingList', $request);
    }

    /**
     * Update a mailing list
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=UpdateMailingList
     * @return \stdClass
     */
    public function UpdateMailingList($request)
    {
        return $this->sendRequest('UpdateMailingList', $request);
    }

    /**
     * Gets a mailing list
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=GetMailingList
     * @return \stdClass
     */
    public function GetMailingList($request)
    {
        return $this->sendRequest('GetMailingList', $request);
    }

    /**
     * Gets an array of mailing lists
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=GetMailingLists
     * @return \stdClass
     */
    public function GetMailingLists()
    {
        return $this->sendRequest('GetMailingLists');
    }

    /**
     * Gets an array of mailing lists associated to a client table
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=GetMailingListsForClientTable
     * @return \stdClass
     */
    public function GetMailingListsForClientTable($request)
    {
        return $this->sendRequest('GetMailingListsForClientTable', $request);
    }

    /**
     * Gets an array of mailing list columns
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=GetMailingListColumns
     * @return \stdClass
     */
    public function GetMailingListColumns($request)
    {
        return $this->sendRequest('GetMailingListColumns', $request);
    }

    /**
     * Gets an array of available from addresses
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=GetMailingListFromAddresses
     * @return \stdClass
     */
    public function GetMailingListFromAddresses()
    {
        return $this->sendRequest('GetMailingListFromAddresses', $request);
    }

    /**
     * Gets a count of records on a mailing list
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=GetMailingListCount
     * @return \stdClass
     */
    public function GetMailingListCount($request)
    {
        return $this->sendRequest('GetMailingListCount', $request);
    }

    /**
     * Create a new mailing list filter
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=CreateMailingListFilter
     * @return \stdClass
     */
    public function CreateMailingListFilter($request)
    {
        return $this->sendRequest('CreateMailingListFilter', $request);
    }

    /**
     * Updates an existing mailing list filter
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=UpdateMailingListFilter
     * @return \stdClass
     */
    public function UpdateMailingListFilter($request)
    {
        return $this->sendRequest('UpdateMailingListFilter', $request);
    }

    /**
     * Deletes a mailing list filter
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=DeleteMailingListFilter
     * @return \stdClass
     */
    public function DeleteMailingListFilter($request)
    {
        return $this->sendRequest('DeleteMailingListFilter', $request);
    }

    /**
     * Gets a mailing list filter
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=GetMailingListFilter
     * @return \stdClass
     */
    public function GetMailingListFilter($request)
    {
        return $this->sendRequest('GetMailingListFilter', $request);
    }

    /**
     * Gets an array of mailing list filters
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=GetMailingListFilters
     * @return \stdClass
     */
    public function GetMailingListFilters($request)
    {
        return $this->sendRequest('GetMailingListFilters', $request);
    }

    /**
     * Gets an array of mailing list filter operators
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=GetMailingListFilterOperators
     * @return \stdClass
     */
    public function GetMailingListFilterOperators()
    {
        return $this->sendRequest('GetMailingListFilterOperators');
    }

    /**
     * Gets a count of records on a mailing list filter
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=GetMailingListFilterCount
     * @return \stdClass
     */
    public function GetMailingListFilterCount($request)
    {
        return $this->sendRequest('GetMailingListFilterCount', $request);
    }

    /**
     * Gets the Analytics providers configured on a mailing list
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=GetMailingListAnalyticsProviders
     * @return \stdClass
     */
    public function GetMailingListAnalyticsProviders($request)
    {
        return $this->sendRequest('GetMailingListAnalyticsProviders', $request);
    }

    /**
     * Creates a new table extract
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=CreateTableExtract
     * @return \stdClass
     */
    public function CreateTableExtract($request)
    {
        return $this->sendRequest('CreateTableExtract', $request);
    }

    /**
     * Gets an existing table extract
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=GetTableExtract
     * @return \stdClass
     */
    public function GetTableExtract($request)
    {
        return $this->sendRequest('GetTableExtract', $request);
    }

    /**
     * Creates a new mailing list extract
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=CreateMailingListExtract
     * @return \stdClass
     */
    public function CreateMailingListExtract($request)
    {
        return $this->sendRequest('CreateMailingListExtract', $request);
    }

    /**
     * Gets an existing mailing list extract
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=GetMailingListExtract
     * @return \stdClass
     */
    public function GetMailingListExtract($request)
    {
        return $this->sendRequest('GetMailingListExtract', $request);
    }

    /**
     * Get a mailing list subscription for a contact
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=GetContactSubscription
     * @return \stdClass
     */
    public function GetContactSubscription($request)
    {
        return $this->sendRequest('GetContactSubscription', $request);
    }

    /**
     * Gets all mailing list subscriptions for a contact in a table
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=GetContactSubscriptions
     * @return \stdClass
     */
    public function GetContactSubscriptions($request)
    {
        return $this->sendRequest('GetContactSubscriptions', $request);
    }

    /**
     * Update a contact mailing list subscription
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=UpdateContactSubscription
     * @return \stdClass
     */
    public function UpdateContactSubscription($request)
    {
        return $this->sendRequest('UpdateContactSubscription', $request);
    }

    /**
     * Update multiple contact mailing list subscriptions
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=UpdateContactSubscriptions
     * @return \stdClass
     */
    public function UpdateContactSubscriptions($request)
    {
        return $this->sendRequest('UpdateContactSubscriptions', $request);
    }

    /**
     * Get a contact's data from a table using an identifier
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=GetContactData
     * @return \stdClass
     */
    public function GetContactData($request)
    {
        return $this->sendRequest('GetContactData', $request);
    }

    /**
     * Gets an array of all client relationships
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=GetRelationships
     * @return \stdClass
     */
    public function GetRelationships($request)
    {
        return $this->sendRequest('GetRelationships', $request);
    }

    /**
     * Gets an array of relationships for a table
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=GetClientTableRelationships
     * @return \stdClass
     */
    public function GetClientTableRelationships($request)
    {
        return $this->sendRequest('GetClientTableRelationships', $request);
    }

    /**
     * Gets an array of relationships for a mailing list
     *
     * @see https://ws.communicatorcorp.com/DataService.asmx?op=GetMailingListRelationships
     * @return \stdClass
     */
    public function GetMailingListRelationships($request)
    {
        return $this->sendRequest('GetMailingListRelationships', $request);
    }
}


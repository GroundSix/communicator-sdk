<?php

namespace GroundSix\Communicator\Services;

class ResponseService extends Service
{
    /**
     * Returns an email dispatch
     *
     * @see https://ws.communicatorcorp.com/ResponseService.asmx?op=GetEmailDispatch
     * @return \stdClass
     */
    public function GetEmailDispatch($request)
    {
        return $this->sendRequest('GetEmailDispatch', $request);
    }

    /**
     * Gets an array of email dispatches between two dates excluding test dispatches
     *
     * @see https://ws.communicatorcorp.com/ResponseService.asmx?op=GetEmailDispatchesWithinDateRange
     * @return \stdClass
     */
    public function GetEmailDispatchesWithinDateRange($request)
    {
        return $this->sendRequest('GetEmailDispatchesWithinDateRange', $request);
    }

    /**
     * Gets an array of links in an email dispatch with click statistics
     *
     * @see https://ws.communicatorcorp.com/ResponseService.asmx?op=GetEmailDispatchLinks
     * @return \stdClass
     */
    public function GetEmailDispatchLinks($request)
    {
        return $this->sendRequest('GetEmailDispatchLinks', $request);
    }

    /**
     * Retrieves a single text dispatch
     *
     * @see https://ws.communicatorcorp.com/ResponseService.asmx?op=GetTextDispatch
     * @return \stdClass
     */
    public function GetTextDispatch($request)
    {
        return $this->sendRequest('GetTextDispatch', $request);
    }

    /**
     * Retreives a collection of dispatches within a date range. Returns a maximum of 10 dispatches.
     *
     * @see https://ws.communicatorcorp.com/ResponseService.asmx?op=GetDispatchesWithinDateRange
     * @return \stdClass
     */
    public function GetDispatchesWithinDateRange($request)
    {
        return $this->sendRequest('GetDispatchesWithinDateRange', $request);
    }

    /**
     * Gets open statistics for an email dispatch
     *
     * @see https://ws.communicatorcorp.com/ResponseService.asmx?op=GetEmailDispatchOpenStatistics
     * @return \stdClass
     */
    public function GetEmailDispatchOpenStatistics($request)
    {
        return $this->sendRequest('GetEmailDispatchOpenStatistics', $request);
    }

    /**
     * Gets click statistics for an email dispatch
     *
     * @see https://ws.communicatorcorp.com/ResponseService.asmx?op=GetEmailDispatchClickStatistics
     * @return \stdClass
     */
    public function GetEmailDispatchClickStatistics($request)
    {
        return $this->sendRequest('GetEmailDispatchClickStatistics', $request);
    }

    /**
     * Gets unsubscribe statistics for an email dispatch
     *
     * @see https://ws.communicatorcorp.com/ResponseService.asmx?op=GetEmailDispatchUnsubscribeStatistics
     * @return \stdClass
     */
    public function GetEmailDispatchUnsubscribeStatistics($request)
    {
        return $this->sendRequest('GetEmailDispatchUnsubscribeStatistics', $request);
    }

    /**
     * Gets bounce statistics for an email dispatch
     *
     * @see https://ws.communicatorcorp.com/ResponseService.asmx?op=GetEmailDispatchBounceStatistics
     * @return \stdClass
     */
    public function GetEmailDispatchBounceStatistics($request)
    {
        return $this->sendRequest('GetEmailDispatchBounceStatistics', $request);
    }

    /**
     * Creates a new data extract job
     *
     * @see https://ws.communicatorcorp.com/ResponseService.asmx?op=CreateDataExtractJobForDispatch
     * @return \stdClass
     */
    public function CreateDataExtractJobForDispatch($request)
    {
        return $this->sendRequest('CreateDataExtractJobForDispatch', $request);
    }

    /**
     * Creates a new dispatch data extract job
     *
     * @see https://ws.communicatorcorp.com/ResponseService.asmx?op=CreateDispatchDataExtractJob
     * @return \stdClass
     */
    public function CreateDispatchDataExtractJob($request)
    {
        return $this->sendRequest('CreateDispatchDataExtractJob', $request);
    }

    /**
     * Gets an extract job
     *
     * @see https://ws.communicatorcorp.com/ResponseService.asmx?op=GetExtractJob
     * @return \stdClass
     */
    public function GetExtractJob($request)
    {
        return $this->sendRequest('GetExtractJob', $request);
    }
}


<?php

namespace GroundSix\Communicator\Services;

class MessageService extends Service
{
    /**
     * Creates a plain text email
     *
     * @param array|\stdClass $request
     *
     * @see https://ws.communicatorcorp.com/MessageService.asmx?op=CreatePlainTextEmail
     * @return \stdClass
     */
    public function CreatePlainTextEmail($request)
    {
        return $this->sendRequest('CreatePlainTextEmail', $request);
    }

    /**
     * Creates a new HTML/Multipart email
     *
     * @param array|\stdClass $request
     *
     * @see https://ws.communicatorcorp.com/MessageService.asmx?op=CreateHtmlEmail
     * @return \stdClass
     */
    public function CreateHtmlEmail($request)
    {
        return $this->sendRequest('CreateHtmlEmail', $request);
    }

    /**
     * Get a list of all emails
     *
     * @see https://ws.communicatorcorp.com/MessageService.asmx?op=GetEmails
     * @return \stdClass
     */
    public function GetEmails()
    {
        return $this->sendRequest('GetEmails');
    }

    /**
     * Get a list of all emails
     *
     * @param array|\stdClass $request
     *
     * @see https://ws.communicatorcorp.com/MessageService.asmx?op=GetEmail
     * @return \stdClass
     */
    public function GetEmail($request)
    {
        return $this->sendRequest('GetEmail', $request);
    }

    /**
     * Get a paged list of emails
     *
     * @param array|\stdClass $request
     *
     * @see https://ws.communicatorcorp.com/MessageService.asmx?op=GetEmailList
     * @return \stdClass
     */
    public function GetEmailList($request)
    {
        return $this->sendRequest('GetEmailList', $request);
    }

    /**
     * Create a new text message
     *
     * @param array|\stdClass $request
     *
     * @see https://ws.communicatorcorp.com/MessageService.asmx?op=CreateTextMessage
     * @return \stdClass
     */
    public function CreateTextMessage($request)
    {
        return $this->sendRequest('CreateTextMessage', $request);
    }

    /**
     * Get a single text message
     *
     * @param array|\stdClass $request
     *
     * @see https://ws.communicatorcorp.com/MessageService.asmx?op=GetTextMessage
     * @return \stdClass
     */
    public function GetTextMessage($request)
    {
        return $this->sendRequest('GetTextMessage', $request);
    }

    /**
     * Get a collection of text messages
     *
     * @param array|\stdClass $request
     *
     * @see https://ws.communicatorcorp.com/MessageService.asmx?op=GetTextMessageCollection
     * @return \stdClass
     */
    public function GetTextMessageCollection($request)
    {
        return $this->sendRequest('GetTextMessageCollection', $request);
    }

    /**
     * Get an array of triggerable dispatches
     *
     * @param array|\stdClass $request
     *
     * @see https://ws.communicatorcorp.com/MessageService.asmx?op=GetTriggeredDispatches
     * @return \stdClass
     */
    public function GetTriggeredDispatches($request)
    {
        return $this->sendRequest('GetTriggeredDispatches', $request);
    }

    /**
     * Get an array of dispatches awaiting authorisation
     *
     * @param array|\stdClass $request
     *
     * @see https://ws.communicatorcorp.com/MessageService.asmx?op=GetUnauthorisedDispatches
     * @return \stdClass
     */
    public function GetUnauthorisedDispatches($request)
    {
        return $this->sendRequest('GetUnauthorisedDispatches', $request);
    }

    /**
     * Perform an action on a dispatch [Authorise, Pause, Restart, Cancel]
     *
     * @param array|\stdClass $request
     *
     * @see https://ws.communicatorcorp.com/MessageService.asmx?op=DispatchControl
     * @return \stdClass
     */
    public function DispatchControl($request)
    {
        return $this->sendRequest('DispatchControl', $request);
    }

    /**
     * Create a new email dispatch
     *
     * @param array|\stdClass $request
     *
     * @see https://ws.communicatorcorp.com/MessageService.asmx?op=CreateEmailDispatch
     * @return \stdClass
     */
    public function CreateEmailDispatch($request)
    {
        return $this->sendRequest('CreateEmailDispatch', $request);
    }

    /**
     * Get a list of unauthorised email dispatches
     *
     * @see https://ws.communicatorcorp.com/MessageService.asmx?op=GetUnauthorisedEmailDispatches
     * @return \stdClass
     */
    public function GetUnauthorisedEmailDispatches()
    {
        return $this->sendRequest('GetUnauthorisedEmailDispatches');
    }

    /**
     * Provides a unified method to control a dispatch
     *
     * @param array|\stdClass $request
     *
     * @see https://ws.communicatorcorp.com/MessageService.asmx?op=EmailDispatchControl
     * @return \stdClass
     */
    public function EmailDispatchControl($request)
    {
        return $this->sendRequest('EmailDispatchControl', $request);
    }

    /**
     * Gets an array of trigger dispatches for a mailing list
     *
     * @param array|\stdClass $request
     *
     * @see https://ws.communicatorcorp.com/MessageService.asmx?op=GetTriggerDispatches
     * @return \stdClass
     */
    public function GetTriggerDispatches($request)
    {
        return $this->sendRequest('GetTriggerDispatches', $request);
    }

    /**
     * Creates a new text disaptch
     *
     * @param array|\stdClass $request
     *
     * @see https://ws.communicatorcorp.com/MessageService.asmx?op=CreateTextDispatch
     * @return \stdClass
     */
    public function CreateTextDispatch($request)
    {
        return $this->sendRequest('CreateTextDispatch', $request);
    }

    /**
     * Gets a single text disaptch
     *
     * @param array|\stdClass $request
     *
     * @see https://ws.communicatorcorp.com/MessageService.asmx?op=GetTextDispatch
     * @return \stdClass
     */
    public function GetTextDispatch($request)
    {
        return $this->sendRequest('GetTextDispatch', $request);
    }

    /**
     * Gets an array of time zones
     *
     * @see https://ws.communicatorcorp.com/MessageService.asmx?op=GetTimeZones
     * @return \stdClass
     */
    public function GetTimeZones()
    {
        return $this->sendRequest('GetTimeZones');
    }
}


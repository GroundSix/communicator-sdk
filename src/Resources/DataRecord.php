<?php

namespace GroundSix\Communicator\Resources;

class DataRecord extends Resource
{
    /**
     * @var Subscription[]
     */
    public $Subscriptions;
    /**
     * @var ColumnMapping[]
     */
    public $ColumnMappings;
    /** @var bool */
    public $IsGloballyUnsubscribed;

    /**
     * @param ColumnMapping[] $columnMappings
     * @param Subscription[]  $subscriptions
     * @param bool            $globallyUnsubscribed
     */
    public function __construct(array $columnMappings, array $subscriptions, bool $globallyUnsubscribed = false)
    {
        foreach ($columnMappings as $columnMapping) {
            $this->addColumnMapping($columnMapping);
        }
        foreach ($subscriptions as $subscription) {
            $this->addSubscription($subscription);
        }
        $this->IsGloballyUnsubscribed = $globallyUnsubscribed;
    }

    protected function addColumnMapping(ColumnMapping $columnMapping)
    {
        $this->ColumnMappings[] = $columnMapping;
    }

    protected function addSubscription(Subscription $subscription)
    {
        $this->Subscriptions[] = $subscription;
    }
}

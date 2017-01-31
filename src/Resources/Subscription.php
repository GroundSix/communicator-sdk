<?php

namespace GroundSix\Communicator\Resources;

use InvalidArgumentException;

class Subscription extends Resource
{

    /** @var int */
    public $MailingListId;
    /** @var bool */
    public $Subscribed;
    /** @var bool */
    public $HonourExistingUnsubscribes;

    /**
     * @param int  $mailingListID
     * @param bool $subscribed
     * @param bool $honourExistingUnsubscribes
     */
    public function __construct(int $mailingListID, bool $subscribed = true, bool $honourExistingUnsubscribes = false)
    {
        $this->MailingListId = $mailingListID;
        $this->Subscribed = $subscribed;
        $this->HonourExistingUnsubscribes = $honourExistingUnsubscribes;
    }

    /**
     * Make an array of Subscription objects from an array
     *
     * When passed an array of mailing list id's or booleans with
     * mailing list id keys create an array of Subscription objects.
     * When boolean values are not given it defaults to true.
     *
     * Array format : [123, ..., 789], [123 => false, ...] or a mix.
     *
     * @param array $data
     *
     * @throws InvalidArgumentException if the data in the array is not formatted correctly
     * @return array
     */
    public static function fromArray(array $data): array
    {
        $subscriptions = [];
        foreach ($data as $key => $value) {
            if (is_int($value)) {
                $subscriptions[] = new Subscription($value);
                continue;
            }
            if (is_int($key) && is_bool($value)) {
                $subscriptions[] = new Subscription($key, $value);
                continue;
            }
            throw new InvalidArgumentException(
                sprintf(
                    'Array values must be integers or booleans with integer keys, %s => %s given.',
                    gettype($key),
                    gettype($value)
                )
            );
        }

        return $subscriptions;
    }
}

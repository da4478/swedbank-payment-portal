<?php

namespace SwedbankPaymentPortal\SharedEntity\Type;

use JMS\Serializer\Annotation;
use JMS\Serializer\Context;
use JMS\Serializer\XmlDeserializationVisitor;
use JMS\Serializer\XmlSerializationVisitor;

/**
 * A numeric status code. A successful Purchase setup is indicated by a status code of 1.
 *
 * Any other code indicates a rejected request or an error.
 */
class PurchaseStatus extends AbstractStatus
{
    /**
     * Successful purchase setup.
     *
     * @return PurchaseStatus
     */
    final public static function accepted()
    {
        return self::get(1);
    }

    /**
     * Authentication error.
     *
     * @return PurchaseStatus
     */
    final public static function authenticationFail()
    {
        return self::get(10);
    }

    /**
     * Duplicate Merchant Reference.
     *
     * @return PurchaseStatus
     */
    final public static function duplicateReference()
    {
        return self::get(20);
    }

    /**
     * Reference already in use
     *
     * @return PurchaseStatus
     */
    final public static function referenceAlreadyInUse()
    {
        return self::get(51);
    }


    /**
     * Invalid request.
     *
     * @return PurchaseStatus
     */
    final public static function invalid()
    {
        return self::get(60);
    }

    /**
     * Cannot locate transaction to query.
     *
     * @return PurchaseStatus
     */
    final public static function cannotLocateTransactionToQuery()
    {
        return self::get(274);
    }


    /**
     * PayPal: Not configured for service
     * @return $this
     */
    final public static function notConfiguredForPayPal()
    {
        return self::get(560);
    }


    /**
     * InappropriateData
     *
     * @return PurchaseStatus
     */
    final public static function inappropriateData()
    {
        return self::get(810);
    }

    /**
     * HPS: At least one auth attempted. Awaiting payment details.
     *
     * @return PurchaseStatus
     */
    final public static function waitingForPaymentDetails()
    {
        return self::get(821);
    }


    /**
     * HPS: The maximum number of retry transaction was breached.
     * @return $this
     */
    final public static function HpsMaximumNumberOfRetryTransactionWasBreached()
    {
        return self::get(822);
    }

    /**
     * System error
     *
     * @return PurchaseStatus
     */
    final public static function systemError()
    {
        return self::get(10110);
    }

    /**
     * APG: Transaction pending
     * @return $this
     */
    final public static function transactionPending()
    {
        return self::get(2051);
    }


    /**
     * APG: A processing error occurred
     * @return $this
     */
    final public static function processingError()
    {
        return self::get(2052);
    }

    /**
     * APG: Invalid data
     *
     * @return PurchaseStatus
     */
    final public static function invalidData()
    {
        return self::get(2067);
    }

    /**
     * PayPal: Error returned in response
     *
     * @return $this
     */
    final public static function paypalError()
    {
        return self::get(561);
    }

    /**
     * Custom deserialization logic.
     *
     * @Annotation\HandlerCallback("xml", direction = "deserialization")
     *
     * @param XmlDeserializationVisitor $visitor
     * @param null|array                $data
     * @param Context                   $context
     */
    public function deserialize(XmlDeserializationVisitor $visitor, $data, Context $context)
    {
        $this->assignId((int)$data);
    }

    /**
     * Custom serialization logic.
     *
     * @Annotation\HandlerCallback("xml", direction = "serialization")
     *
     * @param XmlSerializationVisitor $visitor
     */
    public function serialize(XmlSerializationVisitor $visitor)
    {
        $visitor->getCurrentNode()->nodeValue = $this->id();
    }
}

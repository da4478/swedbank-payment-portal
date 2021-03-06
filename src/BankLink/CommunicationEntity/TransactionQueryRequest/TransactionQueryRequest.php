<?php

namespace SwedbankPaymentPortal\BankLink\CommunicationEntity\TransactionQueryRequest;

use JMS\Serializer\Annotation;
use SwedbankPaymentPortal\SharedEntity\Authentication;

/**
 * This Query call is used to check the status of a payment transaction that has already been submitted to DataCash.
 *
 * It is achieved by sending the DPG-generated transaction identifier or the merchant-generated transaction identifier.
 *
 * @Annotation\XmlRoot("Request")
 * @Annotation\AccessType("public_method")
 */
class TransactionQueryRequest
{
    /**
     * The container for Gateway authentication.
     *
     * @var Authentication
     *
     * @Annotation\SerializedName("Authentication")
     * @Annotation\Type("SwedbankPaymentPortal\SharedEntity\Authentication")
     */
    private $authentication;

    /**
     * The container for Gateway authentication.
     *
     * @var Transaction
     *
     * @Annotation\SerializedName("Transaction")
     * @Annotation\Type("SwedbankPaymentPortal\BankLink\CommunicationEntity\TransactionQueryRequest\Transaction")
     */
    private $transaction;

    /**
     * HPSQueryRequest constructor.
     *
     * @param Authentication $authentication
     * @param Transaction    $transaction
     */
    public function __construct(Authentication $authentication, Transaction $transaction)
    {
        $this->authentication = $authentication;
        $this->transaction = $transaction;
    }

    /**
     * Authentication getter.
     *
     * @return Authentication
     */
    public function getAuthentication()
    {
        return $this->authentication;
    }

    /**
     * Authentication setter.
     *
     * @param Authentication $authentication
     */
    public function setAuthentication($authentication)
    {
        $this->authentication = $authentication;
    }

    /**
     * Transaction getter.
     *
     * @return Transaction
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * Transaction setter.
     *
     * @param Transaction $transaction
     */
    public function setTransaction($transaction)
    {
        $this->transaction = $transaction;
    }
}

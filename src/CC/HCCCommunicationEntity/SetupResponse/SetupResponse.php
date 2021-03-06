<?php

namespace SwedbankPaymentPortal\CC\HCCCommunicationEntity\SetupResponse;

use SwedbankPaymentPortal\BankLink\CommunicationEntity\PurchaseRequest\Transaction;
use JMS\Serializer\Annotation;
use SwedbankPaymentPortal\SharedEntity\AbstractResponse;
use SwedbankPaymentPortal\SharedEntity\Type\MerchantMode;
use SwedbankPaymentPortal\SharedEntity\Type\PurchaseStatus;

/**
 * The container for the XML response.
 *
 * @Annotation\XmlRoot("Response")
 * @Annotation\AccessType("public_method")
 */
class SetupResponse extends AbstractResponse
{
    /**
     * The container for the HPS (hosted page) details.
     *
     * @var HpsTxn
     *
     * @Annotation\SerializedName("HpsTxn")
     * @Annotation\Type("SwedbankPaymentPortal\CC\HCCCommunicationEntity\SetupResponse\HpsTxn")
     */
    private $hpsTxn;

    /**
     * A 16 digit unique identifier for the transaction.
     * This reference will be used when submitting QUERY transactions to the Payment Gateway.
     *
     * @var string
     *
     * @Annotation\SerializedName("datacash_reference")
     * @Annotation\Type("string")
     * @Annotation\XmlElement(cdata=false)
     */
    private $dataCashReference;

    /**
     * The unique reference for each transaction which is echoed from the Purchase Request.
     *
     * @var string
     *
     * @Annotation\SerializedName("merchantreference")
     * @Annotation\Type("string")
     * @Annotation\XmlElement(cdata=false)
     */
    private $merchantReference;

    /**
     * Indicates if simulators have been used or a payment provider has been contacted.
     *
     * @var MerchantMode
     *
     * @Annotation\Type("SwedbankPaymentPortal\SharedEntity\Type\MerchantMode")
     */
    private $mode;

    /**
     * A numeric status code.
     *
     * @var PurchaseStatus
     *
     * @Annotation\Type("SwedbankPaymentPortal\SharedEntity\Type\PurchaseStatus")
     */
    private $status;

    /**
     * PurchaseResponse constructor.
     *
     * @param HpsTxn         $hpsTxn
     * @param string         $merchantReference
     * @param string         $dataCashReference
     * @param MerchantMode   $mode
     * @param string         $reason
     * @param PurchaseStatus $status
     * @param int            $time
     */
    public function __construct(
        HpsTxn $hpsTxn,
        $merchantReference,
        $dataCashReference,
        MerchantMode $mode,
        $reason,
        PurchaseStatus $status,
        $time
    ) {
        parent::__construct($reason, $time);
        $this->hpsTxn = $hpsTxn;
        $this->merchantReference = $merchantReference;
        $this->dataCashReference = $dataCashReference;
        $this->mode = $mode;
        $this->status = $status;
    }

    /**
     * HpsTxn getter.
     *
     * @return HpsTxn
     */
    public function getHpsTxn()
    {
        return $this->hpsTxn;
    }

    /**
     * HpsTxn setter.
     *
     * @param HpsTxn $hpsTxn
     */
    public function setHpsTxn($hpsTxn)
    {
        $this->hpsTxn = $hpsTxn;
    }

    /**
     * DataCashReference getter.
     *
     * @return int
     */
    public function getDataCashReference()
    {
        return $this->dataCashReference;
    }

    /**
     * DataCashReference setter.
     *
     * @param int $dataCashReference
     */
    public function setDataCashReference($dataCashReference)
    {
        $this->dataCashReference = $dataCashReference;
    }

    /**
     * Mode getter.
     *
     * @return MerchantMode
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Mode setter.
     *
     * @param MerchantMode $mode
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
    }

    /**
     * Status getter.
     *
     * @return PurchaseStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Status setter.
     *
     * @param PurchaseStatus $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * MerchantReference getter.
     *
     * @return string
     */
    public function getMerchantReference()
    {
        return $this->merchantReference;
    }

    /**
     * MerchantReference setter.
     *
     * @param string $merchantReference
     */
    public function setMerchantReference($merchantReference)
    {
        $this->merchantReference = $merchantReference;
    }

    /**
     * @return string
     * @throws \RuntimeException
     */
    public function getCustomerRedirectUrl()
    {
        if (!$this->status == PurchaseStatus::accepted()) {
            throw new \RuntimeException("Cannot get Customer redirect URL for Purchase Response   status != 1");
        }

        // example: https://accreditation.datacash.com/hps-acq_a/?HPS_SessionID=378baadf-b2f2-4643-912
        return sprintf("%s?HPS_SessionID=%s", $this->getHpsTxn()->getHpsUrl(), $this->getHpsTxn()->getSessionId());
    }
}

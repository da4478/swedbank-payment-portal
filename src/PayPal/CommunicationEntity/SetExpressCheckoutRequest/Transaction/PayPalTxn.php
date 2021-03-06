<?php

namespace SwedbankPaymentPortal\PayPal\CommunicationEntity\SetExpressCheckoutRequest\Transaction;

use JMS\Serializer\Annotation;
use SwedbankPaymentPortal\PayPal\CommunicationEntity\ShippingAddress;
use SwedbankPaymentPortal\PayPal\Type\PayPalBool;

/**
 * The container for the pay pal details.
 *
 * @Annotation\AccessType("public_method")
 */
class PayPalTxn
{
    /**
     * Details of the shipping address.
     *
     * @var ShippingAddress
     *
     * @Annotation\XmlElement(cdata=false)
     * @Annotation\Type(
     *     "SwedbankPaymentPortal\PayPal\CommunicationEntity\ShippingAddress"
     * )
     * @Annotation\SerializedName("ShippingAddress")
     */
    private $shippingAddress;

    /**
     * A free-form field for your own use.
     *
     * Such as a tracking number or other value you want PayPal,
     * to return on get_express_checkout_details and do_express_checkout_payment.
     *
     * @var string
     *
     * @Annotation\XmlElement(cdata=false)
     * @Annotation\Type("string")
     */
    private $custom;

    /**
     * Description of the items the customer is purchasing.
     *
     * @var string
     *
     * @Annotation\XmlElement(cdata=false)
     * @Annotation\Type("string")
     */
    private $description;

    /**
     * Email address of the buyer. Used to pre-fill the PayPal membership sign-up portion of the PayPal login page.
     *
     * @var string
     *
     * @Annotation\XmlElement(cdata=false)
     * @Annotation\Type("string")
     */
    private $email;

    /**
     * Merchant unique invoice or tracking number. Returned in the do_express_ checkout_payment response.
     *
     * @var string
     *
     * @Annotation\XmlElement(cdata=false)
     * @Annotation\Type("string")
     * @Annotation\SerializedName("invnum")
     */
    private $invNum;

    /**
     * Locale of pages displayed by PalPal.
     *
     * @var string
     *
     * @Annotation\XmlElement(cdata=false)
     * @Annotation\Type("string")
     * @Annotation\SerializedName("localecode")
     */
    private $localeCode;

    /**
     * The expected maximum total amount of the complete order, including shipping and tax.
     *
     * @var string
     *
     * @Annotation\XmlElement(cdata=false)
     * @Annotation\Type("string")
     * @Annotation\SerializedName("max_amount")
     */
    private $maxAmount;

    /**
     * Method to be used.
     *
     * @var string
     *
     * @Annotation\XmlElement(cdata=false)
     * @Annotation\Type("string")
     */
    private $method = 'set_express_checkout';

    /**
     * Indicates whether the shipping address fields should be displayed on the PayPal pages.
     *
     * @var PayPalBool
     *
     * @Annotation\Type("SwedbankPaymentPortal\PayPal\Type\PayPalBool")
     * @Annotation\SerializedName("no_shipping")
     */
    private $noShipping;

    /**
     * Indicates whether the shipping address fields (as set by you) should be displayed on the PayPal pages,
     * rather than the shipping address details held on file at PayPal.
     *
     * @var PayPalBool
     *
     * @Annotation\Type("SwedbankPaymentPortal\PayPal\Type\PayPalBool")
     * @Annotation\SerializedName("override_address")
     */
    private $overrideAddress;

    /**
     * Indicates whether the customer’s shipping address on file with PayPal must be a confirmed address.
     *
     * @var PayPalBool
     *
     * @Annotation\Type("SwedbankPaymentPortal\PayPal\Type\PayPalBool")
     * @Annotation\SerializedName("req_confirmed_shipping")
     */
    private $reqConfirmedShipping;
    
    /**
     * URL to which the customer’s browser is returned.
     *
     * Recommend this be the final review page on which the customer confirms the order and payment/ billing agreement.
     *
     * @var string
     *
     * @Annotation\Type("string")
     * @Annotation\SerializedName("return_url")
     * @Annotation\XmlElement(cdata=false)
     */
    private $returnUrl;

    /**
     * URL to which the customer’s browser is returned.
     *
     * URL to which the customer is returned if the customer does not approve the use of PayPal .
     *
     * @var string
     *
     * @Annotation\Type("string")
     * @Annotation\SerializedName("cancel_url")
     * @Annotation\XmlElement(cdata=false)
     */
    private $cancelUrl;

    /**
     * PayPalTxn constructor.
     *
     * @param ShippingAddress $shippingAddress
     * @param string          $custom
     * @param string          $description
     * @param string          $email
     * @param string          $invNum
     * @param string          $localeCode
     * @param string          $maxAmount
     * @param PayPalBool      $noShipping
     * @param PayPalBool      $overrideAddress
     * @param PayPalBool      $reqConfirmedShipping
     * @param string          $returnUrl
     * @param string          $cancelUrl
     */
    public function __construct(
        ShippingAddress $shippingAddress,
        $custom,
        $description,
        $email,
        $invNum,
        $localeCode,
        $maxAmount,
        PayPalBool $noShipping,
        PayPalBool $overrideAddress,
        PayPalBool $reqConfirmedShipping,
        $returnUrl,
        $cancelUrl
    ) {
        $this->shippingAddress = $shippingAddress;
        $this->custom = $custom;
        $this->description = $description;
        $this->email = $email;
        $this->invNum = $invNum;
        $this->localeCode = $localeCode;
        $this->maxAmount = $maxAmount;
        $this->noShipping = $noShipping;
        $this->overrideAddress = $overrideAddress;
        $this->reqConfirmedShipping = $reqConfirmedShipping;
        $this->returnUrl = $returnUrl;
        $this->cancelUrl = $cancelUrl;
    }

    /**
     * ShippingAddress getter.
     *
     * @return ShippingAddress
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * ShippingAddress setter.
     *
     * @param ShippingAddress $shippingAddress
     */
    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
    }

    /**
     * Custom getter.
     *
     * @return string
     */
    public function getCustom()
    {
        return $this->custom;
    }

    /**
     * Custom setter.
     *
     * @param string $custom
     */
    public function setCustom($custom)
    {
        $this->custom = $custom;
    }

    /**
     * Description getter.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Description setter.
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Email getter.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Email setter.
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * InvNum getter.
     *
     * @return string
     */
    public function getInvNum()
    {
        return $this->invNum;
    }

    /**
     * InvNum setter.
     *
     * @param string $invNum
     */
    public function setInvNum($invNum)
    {
        $this->invNum = $invNum;
    }

    /**
     * LocaleCode getter.
     *
     * @return string
     */
    public function getLocaleCode()
    {
        return $this->localeCode;
    }

    /**
     * LocaleCode setter.
     *
     * @param string $localeCode
     */
    public function setLocaleCode($localeCode)
    {
        $this->localeCode = $localeCode;
    }

    /**
     * MaxAmount getter.
     *
     * @return string
     */
    public function getMaxAmount()
    {
        return $this->maxAmount;
    }

    /**
     * MaxAmount setter.
     *
     * @param string $maxAmount
     */
    public function setMaxAmount($maxAmount)
    {
        $this->maxAmount = $maxAmount;
    }

    /**
     * Method getter.
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Method setter.
     *
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * NoShipping getter.
     *
     * @return PayPalBool
     */
    public function getNoShipping()
    {
        return $this->noShipping;
    }

    /**
     * NoShipping setter.
     *
     * @param PayPalBool $noShipping
     */
    public function setNoShipping($noShipping)
    {
        $this->noShipping = $noShipping;
    }

    /**
     * OverrideAddress getter.
     *
     * @return PayPalBool
     */
    public function getOverrideAddress()
    {
        return $this->overrideAddress;
    }

    /**
     * OverrideAddress setter.
     *
     * @param PayPalBool $overrideAddress
     */
    public function setOverrideAddress($overrideAddress)
    {
        $this->overrideAddress = $overrideAddress;
    }

    /**
     * ReqConfirmedShipping getter.
     *
     * @return PayPalBool
     */
    public function getReqConfirmedShipping()
    {
        return $this->reqConfirmedShipping;
    }

    /**
     * ReqConfirmedShipping setter.
     *
     * @param PayPalBool $reqConfirmedShipping
     */
    public function setReqConfirmedShipping($reqConfirmedShipping)
    {
        $this->reqConfirmedShipping = $reqConfirmedShipping;
    }

    /**
     * ReturnUrl getter.
     *
     * @return string
     */
    public function getReturnUrl()
    {
        return $this->returnUrl;
    }

    /**
     * ReturnUrl setter.
     *
     * @param string $returnUrl
     */
    public function setReturnUrl($returnUrl)
    {
        $this->returnUrl = $returnUrl;
    }

    /**
     * CancelUrl getter.
     *
     * @return string
     */
    public function getCancelUrl()
    {
        return $this->cancelUrl;
    }

    /**
     * CancelUrl setter.
     *
     * @param string $cancelUrl
     */
    public function setCancelUrl($cancelUrl)
    {
        $this->cancelUrl = $cancelUrl;
    }
}

<?php

namespace SwedbankPaymentPortal\CC\HCCCommunicationEntity\HCCQueryResponse;

use JMS\Serializer\Annotation;
use SwedbankPaymentPortal\CC\HCCCommunicationEntity\HCCQueryResponse\Risk\ActionResponse;

/**
 * The container for the screening information.
 *
 * @Annotation\AccessType("public_method")
 */
class Risk
{
    /**
     * The container for the screenign response.
     *
     * @var ActionResponse
     *
     * @Annotation\SerializedName("action_response")
     * @Annotation\Type(
     *     "SwedbankPaymentPortal\CC\HCCCommunicationEntity\HCCQueryResponse\Risk\ActionResponse"
     * )
     */
    private $actionResponse;

    /**
     * Risk constructor.
     *
     * @param ActionResponse $actionResponse
     */
    public function __construct(ActionResponse $actionResponse)
    {
        $this->actionResponse = $actionResponse;
    }

    /**
     * ActionResponse getter.
     *
     * @return ActionResponse
     */
    public function getActionResponse()
    {
        return $this->actionResponse;
    }

    /**
     * ActionResponse setter.
     *
     * @param ActionResponse $actionResponse
     */
    public function setActionResponse($actionResponse)
    {
        $this->actionResponse = $actionResponse;
    }
}

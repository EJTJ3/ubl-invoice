<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

final class OrderLineReference
{
    /**
     * @Serializer\SerializedName(name="LineID")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public string $lineID;

    /**
     * @Serializer\SerializedName(name="OrderReference")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     */
    public OrderReference $orderReference;

    public function __construct(string $lineID, OrderReference $orderReference)
    {
        $this->lineID = $lineID;
        $this->orderReference = $orderReference;
    }
}

<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;

final class Delivery
{
    /**
     * Actual delivery date
     * The date on which the supply of goods or services was made or completed. Format = "YYYY-MM-DD".
     *
     * Example value: 2017-12-01
     *
     * @Serializer\SerializedName(name="ActualDeliveryDate")
     * @Serializer\Type("DateTimeInterface<'Y-m-d'>")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public ?DateTimeInterface $actualDeliveryDate;

    /**
     * @Serializer\SerializedName(name="DeliveryLocation")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     */
    public ?DeliveryLocation $deliveryLocation;

    public function __construct(
        ?DateTimeInterface $actualDeliveryDate = null,
        ?DeliveryLocation $deliveryLocation = null
    ) {
        $this->deliveryLocation = $deliveryLocation;
        $this->actualDeliveryDate = $actualDeliveryDate;
    }
}

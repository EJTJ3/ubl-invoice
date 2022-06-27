<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

final class DeliveryLocation
{
    /**
     * @Serializer\SerializedName(name="Address")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     */
    public ?AdressType $address;

    /**
     * @Serializer\SerializedName(name="ID")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     */
    public ?ID $id;

    public function __construct(
        ?AdressType $address = null,
        ?ID $id = null
    ) {
        $this->address = $address;
        $this->id = $id;
    }
}

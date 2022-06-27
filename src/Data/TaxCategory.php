<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

final class TaxCategory
{
    /**
     * @Serializer\SerializedName(name="ID")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public ID $id;

    /**
     * @Serializer\SerializedName(name="Percent")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public float $percent;

    /**
     * @Serializer\SerializedName(name="TaxScheme")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     */
    public TaxScheme $taxScheme;

    public function __construct(ID $id, float $percent, TaxScheme $taxScheme)
    {
        $this->id = $id;
        $this->percent = $percent;
        $this->taxScheme = $taxScheme;
    }
}

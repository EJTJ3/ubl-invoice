<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

final class TaxSubtotal
{
    /**
     * @Serializer\SerializedName(name="TaxableAmount")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public Amount $taxableAmount;

    /**
     * @Serializer\SerializedName(name="TaxAmount")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public Amount $taxAmount;

    /**
     * @Serializer\SerializedName(name="TaxCategory")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     */
    public TaxCategory $taxCategory;

    public function __construct(
        Amount $taxableAmount,
        Amount $taxAmount,
        TaxCategory $taxCategory
    ) {
        $this->taxableAmount = $taxableAmount;
        $this->taxAmount = $taxAmount;
        $this->taxCategory = $taxCategory;
    }
}

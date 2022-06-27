<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

final class TaxTotal
{
    /**
     * @Serializer\SerializedName(name="TaxAmount")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public Amount $taxAmount;

    /**
     * @Serializer\SerializedName(name="TaxSubtotal")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     */
    public TaxSubtotal $taxSubtotal;

    public function __construct(
        Amount $taxAmount,
        TaxSubtotal $taxSubtotal
    ) {
        $this->taxAmount = $taxAmount;
        $this->taxSubtotal = $taxSubtotal;
    }
}

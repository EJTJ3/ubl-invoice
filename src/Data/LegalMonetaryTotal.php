<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

/**
 * @see https://docs.peppol.eu/poacc/billing/3.0/syntax/ubl-invoice/cac-LegalMonetaryTotal
 */
final class LegalMonetaryTotal
{
    /**
     * Sum of Invoice line net amount
     * Sum of all Invoice line net amounts in the Invoice. Must be rounded to maximum 2 decimals.
     *
     * @Serializer\SerializedName(name="LineExtensionAmount")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public Amount $lineExtensionAmount;

    /**
     * Invoice total amount without VAT
     * The total amount of the Invoice without VAT. Must be rounded to maximum 2 decimals.
     *
     * @Serializer\SerializedName(name="TaxExclusiveAmount")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public Amount $taxExclusiveAmount;

    /**
     * Invoice total amount with VAT
     * The total amount of the Invoice with VAT. Must be rounded to maximum 2 decimals.
     *
     * @Serializer\SerializedName(name="TaxInclusiveAmount")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public Amount $taxInclusiveAmount;

    /**
     * Amount due for payment
     * The outstanding amount that is requested to be paid. Must be rounded to maximum 2 decimals.
     *
     * @Serializer\SerializedName(name="PayableAmount")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public Amount $payableAmount;

    public function __construct(
        Amount $lineExtensionAmount,
        Amount $taxExclusiveAmount,
        Amount $taxInclusiveAmount,
        Amount $payableAmount
    ) {
        $this->lineExtensionAmount = $lineExtensionAmount;
        $this->taxExclusiveAmount = $taxExclusiveAmount;
        $this->taxInclusiveAmount = $taxInclusiveAmount;
        $this->payableAmount = $payableAmount;
    }
}

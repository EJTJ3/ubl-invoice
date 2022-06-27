<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

final class PartyTaxScheme
{
    /**
     * Seller VAT identifier, Seller tax registration identifier
     * The Seller's VAT identifier (also known as Seller VAT identification number) or the local identification
     * (defined by the Seller’s address) of the Seller for tax purposes or a reference that enables the Seller to state
     * his registered tax status. In order for the buyer to automatically identify a supplier, the Seller identifier
     * (BT-29), the Seller legal registration identifier (BT-30) and/or the Seller VAT identifier
     * (BT-31) shall be present.
     *
     * @Serializer\SerializedName(name="CompanyID")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public IdentifierType $companyID;

    /**
     * @Serializer\SerializedName(name="TaxScheme")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     */
    public TaxScheme $taxScheme;

    public function __construct(
        IdentifierType $companyID,
        TaxScheme $taxScheme
    ) {
        $this->companyID = $companyID;
        $this->taxScheme = $taxScheme;
    }
}

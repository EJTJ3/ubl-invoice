<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

/**
 * @see https://docs.peppol.eu/poacc/billing/3.0/syntax/ubl-invoice/cac-AccountingSupplierParty/cac-Party/cac-PartyLegalEntity/
 */
final class PartyLegalEntity
{
    /**
     * Seller name
     * The full formal name by which the Seller is registered in the national registry of
     * legal entities or as a Taxable person or otherwise trades as a person or persons.
     *
     * @Serializer\SerializedName(name="RegistrationName")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public string $registrationName;

    /**
     * Seller legal registration identifier
     * An identifier issued by an official registrar that identifies the Seller as
     * a legal entity or person. In order for the buyer to automatically identify a supplier,
     * the Seller identifier (BT-29), the Seller legal registration identifier (BT-30) and/or the
     * Seller VAT identifier (BT-31) shall be present.
     *
     * @Serializer\SerializedName(name="CompanyID")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public ?IdentifierType $companyID;

    /**
     * Seller additional legal information
     * Additional legal information relevant for the Seller.
     *
     * @Serializer\SerializedName(name="CompanyLegalForm")
     */
    public ?string $companyLegalForm;

    public function __construct(
        string $registrationName,
        ?IdentifierType $companyID = null,
        ?string $companyLegalForm = null
    ) {
        $this->companyID = $companyID;
        $this->registrationName = $registrationName;
        $this->companyLegalForm = $companyLegalForm;
    }
}

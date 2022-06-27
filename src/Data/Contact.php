<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

/**
 * @see https://docs.peppol.eu/poacc/billing/3.0/syntax/ubl-invoice/cac-AccountingSupplierParty/cac-Party/cac-Contact/
 */
final class Contact
{
    /**
     * Seller contact point
     * A contact point for a legal entity or person.
     *
     * @Serializer\SerializedName(name="Name")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public ?string $name;

    /**
     * Seller contact telephone number
     * A phone number for the contact point.
     *
     * @Serializer\SerializedName(name="Telephone")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public ?string $telephone;

    /**
     * Seller contact email address
     * An e-mail address for the contact point.
     *
     * @Serializer\SerializedName(name="ElectronicMail")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public ?string $electronicMail;

    public function __construct(
        ?string $name,
        ?string $telephone,
        ?string $electronicMail
    ) {
        $this->name = $name;
        $this->telephone = $telephone;
        $this->electronicMail = $electronicMail;
    }
}

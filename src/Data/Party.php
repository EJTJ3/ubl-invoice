<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

/**
 * @see https://docs.peppol.eu/poacc/billing/3.0/syntax/ubl-invoice/cac-AccountingSupplierParty/cac-Party
 */
final class Party
{
    /**
     * @Serializer\SerializedName(name="PartyName")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     */
    public ?PartyName $partyName;

    /**
     * @Serializer\SerializedName(name="PostalAddress")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     */
    public AdressType $postalAddress;

    /**
     * @TODO make array with tax schemes max 2 items
     * @Serializer\SerializedName(name="PartyTaxScheme")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     */
    public PartyTaxScheme $partyTaxScheme;

    /**
     * @Serializer\SerializedName(name="PartyLegalEntity")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     */
    public PartyLegalEntity $partyLegalEntity;

    /**
     * SELLER CONTACT
     * A group of business terms providing contact information about the Seller.
     *
     * @Serializer\SerializedName(name="Contact")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     */
    public ?Contact $contact;

    public function __construct(
        ?PartyName $partyName,
        AdressType $postalAddress,
        PartyTaxScheme $partyTaxScheme,
        PartyLegalEntity $partyLegalEntity,
        ?Contact $contact
    ) {
        $this->partyName = $partyName;
        $this->postalAddress = $postalAddress;
        $this->partyTaxScheme = $partyTaxScheme;
        $this->partyLegalEntity = $partyLegalEntity;
        $this->contact = $contact;
    }
}

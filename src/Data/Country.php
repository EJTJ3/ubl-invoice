<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

/**
 * @see https://docs.peppol.eu/poacc/billing/3.0/syntax/ubl-invoice/cac-AccountingSupplierParty/cac-Party/cac-PostalAddress/cac-Country/
 */
final class Country
{
    /**
     * Seller country code
     * A code that identifies the country.
     *
     * @Serializer\SerializedName(name="IdentificationCode")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public IdentificationCode $identificationCode;

    public function __construct(IdentificationCode $identificationCode)
    {
        $this->identificationCode = $identificationCode;
    }

    public static function withIdentificationCode(string $identificationCode): self
    {
        return new self(new IdentificationCode($identificationCode, '6', 'ISO3166-1:Alpha2'));
    }
}

<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

/**
 * @see https://docs.peppol.eu/poacc/billing/3.0/syntax/ubl-invoice/cac-AccountingSupplierParty/cac-Party/cac-PostalAddress/cac-Country/cbc-IdentificationCode/
 */
final class IdentificationCode
{
    /**
     * @Serializer\XmlValue()
     * @Serializer\XmlElement(cdata=false)
     */
    public string $value;

    /**
     * @Serializer\SerializedName(name="listAgencyID")
     * @Serializer\XmlAttribute()
     */
    public string $listAgencyId;

    /**
     * @Serializer\SerializedName(name="listID")
     * @Serializer\XmlAttribute()
     */
    public string $listId;

    public function __construct(
        string $value = 'NL',
        string $listAgencyId = '6',
        string $listId = 'ISO3166-1:Alpha2'
    ) {
        $this->value = $value;
        $this->listAgencyId = $listAgencyId;
        $this->listId = $listId;
    }
}

<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

/**
 * @see https://docs.peppol.eu/poacc/billing/3.0/syntax/ubl-invoice/cbc-InvoiceTypeCode/
 */
final class InvoiceTypeCode
{
    /**
     * @see https://docs.peppol.eu/poacc/billing/3.0/codelist/UNCL1001-inv/
     *
     * @Serializer\XmlValue()
     */
    public string $value;

    /**
     * @Serializer\XmlAttribute()
     * @Serializer\SerializedName(name="listAgencyID")
     */
    public string $listAgencyId;

    /**
     * @Serializer\XmlAttribute()
     * @Serializer\SerializedName(name="listID")
     */
    public string $listId;

    public function __construct(
        string $value,
        string $listAgencyId,
        string $listId
    ) {
        $this->value = $value;
        $this->listAgencyId = $listAgencyId;
        $this->listId = $listId;
    }
}

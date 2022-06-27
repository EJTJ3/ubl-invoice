<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

/**
 * @see https://docs.peppol.eu/poacc/billing/3.0/syntax/ubl-invoice/cac-AccountingSupplierParty
 */
final class AccountingSupplierParty
{
    /**
     * @Serializer\SerializedName(name="Party")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     */
    public Party $party;

    public function __construct(Party $party)
    {
        $this->party = $party;
    }
}

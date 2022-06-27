<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

final class AccountingCustomerParty
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

<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

final class PartyName
{
    /**
     * @Serializer\SerializedName(name="Name")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

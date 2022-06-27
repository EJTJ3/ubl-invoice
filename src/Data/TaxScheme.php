<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

final class TaxScheme
{
    /**
     * @Serializer\SerializedName(name="ID")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public ID $id;

    public function __construct(ID $id)
    {
        $this->id = $id;
    }
}

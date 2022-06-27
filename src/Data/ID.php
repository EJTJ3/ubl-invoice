<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

final class ID
{
    /**
     * @Serializer\XmlValue()
     * @Serializer\XmlElement(cdata=false)
     */
    public string $value;

    /**
     * @Serializer\XmlAttribute()
     * @Serializer\SerializedName(name="schemeID")
     */
    public string $schemeId;

    /**
     * @Serializer\XmlAttribute()
     * @Serializer\SerializedName(name="schemeAgencyID")
     */
    public ?string $schemeAgencyId;

    public function __construct(
        string $value,
        string $schemeId,
        ?string $schemeAgencyId = null
    ) {
        $this->value = $value;
        $this->schemeId = $schemeId;
        $this->schemeAgencyId = $schemeAgencyId;
    }
}

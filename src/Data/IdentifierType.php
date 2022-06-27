<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

/**
 * A character string to identify and distinguish uniquely, one instance of an object in an identification scheme
 * from all other objects in the same scheme together with relevant supplementary information.
 */
class IdentifierType
{
    /**
     * @Serializer\XmlValue()
     * @Serializer\XmlElement(cdata=false)
     */
    public string $value;

    /**
     * The identification of the identification scheme.
     *
     * @Serializer\XmlAttribute()
     * @Serializer\SerializedName(name="schemeID")
     */
    public ?string $schemeId;

    /**
     * The identification of the agency that maintains the identification scheme.
     *
     * @Serializer\XmlAttribute()
     * @Serializer\SerializedName(name="schemeAgencyID")
     */
    public ?string $schemeAgencyId;

    public function __construct(
        string $value,
        ?string $schemeId = null,
        ?string $schemeAgencyId = null
    ) {
        $this->value = $value;
        $this->schemeId = $schemeId;
        $this->schemeAgencyId = $schemeAgencyId;
    }
}

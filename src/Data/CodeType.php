<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

final class CodeType
{
    /**
     * A character string (letters, figures, or symbols) that for brevity and/or languange independence may be used
     * to represent or replace a definitive value or text of an attribute together with relevant supplementary information.
     *
     * @Serializer\XmlValue()
     * @Serializer\XmlElement(cdata=false)
     */
    public string $value;

    /**
     * An agency that maintains one or more lists of codes.
     *
     * @Serializer\XmlAttribute()
     * @Serializer\SerializedName(name="listAgencyID")
     */
    public ?string $listAgencyId;

    /**
     * The identification of a list of codes.
     *
     * @Serializer\XmlAttribute()
     * @Serializer\SerializedName(name="listID")
     */
    public ?string $listId;

    public function __construct(
        string $value,
        ?string $listAgencyId = null,
        ?string $listId = null
    ) {
        $this->value = $value;
        $this->listAgencyId = $listAgencyId;
        $this->listId = $listId;
    }
}

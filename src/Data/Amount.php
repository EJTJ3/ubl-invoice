<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

/**
 * A number of monetary units specified in a currency where the unit of the currency is explicit or implied.
 */
final class Amount
{
    /**
     * Amount Currency. Code List Version. Identifier.
     *
     * @Serializer\XmlValue()
     */
    public float $value;

    /**
     * Reference UNECE Rec 9, using 3-letter alphabetic codes.
     *
     * @Serializer\XmlAttribute()
     * @Serializer\SerializedName(name="currencyID")
     */
    public string $currencyId;

    public function __construct(
        float $value,
        string $currencyId = 'EUR'
    ) {
        $this->value = $value;
        $this->currencyId = $currencyId;
    }
}

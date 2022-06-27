<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

final class InvoicedQuantity
{
    /**
     * @Serializer\XmlValue()
     */
    public float $value;

    /**
     * @Serializer\XmlAttribute()
     * @Serializer\SerializedName(name="unitCode")
     */
    public string $unitCode;

    public function __construct(float $value, string $unitCode)
    {
        $this->value = $value;
        $this->unitCode = $unitCode;
    }
}

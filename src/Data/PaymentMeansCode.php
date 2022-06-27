<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

final class PaymentMeansCode
{
    /**
     * @Serializer\XmlValue()
     */
    public string $value;

    /**
     * @Serializer\SerializedName(name="listID")
     * @Serializer\XmlAttribute()
     */
    public string $listId;

    public function __construct(
        string $value,
        string $listId = 'UNCL4461'
    ) {
        $this->value = $value;
        $this->listId = $listId;
    }
}

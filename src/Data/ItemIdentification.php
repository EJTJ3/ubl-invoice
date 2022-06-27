<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

final class ItemIdentification
{
    /**
     * @Serializer\SerializedName(name="ID")
     */
    public string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }
}

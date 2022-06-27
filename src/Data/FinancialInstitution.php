<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

final class FinancialInstitution
{
    /**
     * @Serializer\SerializedName(name="ID")
     */
    public ID $id;

    public function __construct(ID $id)
    {
        $this->id = $id;
    }
}

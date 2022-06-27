<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

final class Price
{
    /**
     * @Serializer\SerializedName(name="PriceAmount")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public Amount $priceAmount;

    public function __construct(Amount $priceAmount)
    {
        $this->priceAmount = $priceAmount;
    }

    public static function withAmount(float $amount, string $currency = 'EUR'): Price
    {
        return new Price(new Amount($amount, $currency));
    }
}

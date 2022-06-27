<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;

final class PaymentMeans
{
    /**
     * Payment means type code
     * The means, expressed as code, for how a payment is expected to be or has been settled.
     *
     * Example value: 30
     */
    public PaymentMeansCode $paymentMeansCode;

    /**
     * @Serializer\Type("DateTimeInterface<'Y-m-d'>")
     * @Serializer\SerializedName(name="PaymentDueDate")
     */
    public DateTimeInterface $paymentDueDate;

    public PayeeFinancialAccount $payeeFinancialAccount;
}

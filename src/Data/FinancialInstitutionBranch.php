<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

/**
 * @see https://docs.peppol.eu/poacc/billing/3.0/syntax/ubl-invoice/cac-PaymentMeans/cac-PayeeFinancialAccount/cac-FinancialInstitutionBranch/
 */
final class FinancialInstitutionBranch
{
    /**
     * Payment service provider identifier
     * An identifier for the payment service provider where a payment account is located. Such as a BIC or a national clearing code where required. No identification scheme Identifier to be used.
     *
     * Example value: 9999
     *
     * @Serializer\SerializedName(name="financialInstitution")
     */
    public FinancialInstitution $financialInstitution;

    public function __construct(FinancialInstitution $financialInstitution)
    {
        $this->financialInstitution = $financialInstitution;
    }
}

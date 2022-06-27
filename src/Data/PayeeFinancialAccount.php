<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

final class PayeeFinancialAccount
{
    /**
     * Payment account identifier
     * A unique identifier of the financial payment account, at a payment service provider,
     * to which payment should be made. Such as IBAN or BBAN.
     *
     * Example value: NO99991122222
     */
    public ID $ID;

    /**
     * @Serializer\SerializedName(name="FinancialInstitutionBranch")
     */
    public FinancialInstitutionBranch $financialInstitutionBranch;

    public function __construct(ID $ID, FinancialInstitutionBranch $financialInstitutionBranch)
    {
        $this->ID = $ID;
        $this->financialInstitutionBranch = $financialInstitutionBranch;
    }

    public static function createWithIban(string $iban, string $bic): PayeeFinancialAccount
    {
        return new self(
            new ID($iban, 'IBAN'),
            new FinancialInstitutionBranch(
                new FinancialInstitution(new ID($bic, 'BIC'))
            )
        );
    }
}

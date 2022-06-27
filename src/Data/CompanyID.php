<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

/**
 * @see https://docs.peppol.eu/poacc/billing/3.0/syntax/ubl-invoice/cac-AccountingSupplierParty/cac-Party/cac-PartyTaxScheme/cbc-CompanyID/
 */
final class CompanyID extends IdentifierType
{
    public static function createKvk(string $value): IdentifierType
    {
        return new IdentifierType($value, 'NL:KVK', 'ZZZ');
    }

    public static function createVat(string $countryCode = 'NL'): IdentifierType
    {
        return new IdentifierType('VAT', sprintf('%s:VAT', $countryCode), 'ZZZ');
    }
}

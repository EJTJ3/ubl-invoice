<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use DateTimeInterface;
use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlNamespace(uri="urn:oasis:names:specification:ubl:schema:xsd:Invoice-2")
 * @Serializer\XmlNamespace(prefix="cac", uri="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
 * @Serializer\XmlNamespace(prefix="cbc", uri="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
 * @Serializer\XmlNamespace(prefix="xsi", uri="http://www.w3.org/2001/XMLSchema-instance")
 * @Serializer\XmlRoot(name="Invoice")
 */
final class Invoice
{
    /**
     * @Serializer\XmlAttribute(namespace="http://www.w3.org/2001/XMLSchema-instance")
     */
    private string $schemaLocation = 'urn:oasis:names:specification:ubl:schema:xsd:Invoice-2&#xA;http://docs.oasis-open.org/ubl/os-UBL-2.1/xsd/maindoc/UBL-Invoice-2.1.xsd';

    /**
     * @Serializer\SerializedName(name="UBLVersionID")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public string $ublVersionId;

    /**
     * @Serializer\SerializedName(name="ID")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public string $id;

    /**
     * Invoice issue date
     * The date when the Invoice was issued. Format "YYYY-MM-DD".
     *
     * @Serializer\SerializedName(name="IssueDate")
     * @Serializer\Type("DateTimeInterface<'Y-m-d'>")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public DateTimeInterface $issueDate;

    /**
     * @see https://docs.peppol.eu/poacc/billing/3.0/syntax/ubl-invoice/cbc-DocumentCurrencyCode
     *
     * Invoice currency cod
     * The currency in which all Invoice amounts are given, except for the Total VAT amount in accounting currency.
     * Only one currency shall be used in the Invoice, except for the VAT accounting currency code (BT-6) and
     * the invoice total VAT amount in accounting currency (BT-111).
     *
     * Example value: 'EUR'
     *
     * @Serializer\SerializedName(name="DocumentCurrencyCode")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public CodeType $documentCurrencyCode;

    /**
     * ORDER AND SALES ORDER REFERENCE.
     *
     * @Serializer\SerializedName(name="OrderReference")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     */
    public ?OrderReference $orderReference;

    /**
     * SELLER
     * A group of business terms providing information about the Seller.
     *
     * @Serializer\SerializedName(name="AccountingSupplierParty")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     */
    public AccountingSupplierParty $accountingSupplierParty;

    /**
     * BUYER
     * A group of business terms providing information about the Buyer.
     *
     * @Serializer\SerializedName(name="AccountingCustomerParty")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     */
    public AccountingCustomerParty $accountingCustomerParty;

    /**
     * DELIVERY INFORMATION
     * A group of business terms providing information about where and when the goods and services invoiced are delivered.
     *
     * @Serializer\SerializedName(name="Delivery")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     */
    public ?Delivery $delivery;

    /**
     * TAX TOTAL
     * When tax currency code is provided, two instances of the tax total must be present, but only one with tax subtotal.
     *
     * @var TaxTotal[]
     * @Serializer\SerializedName(name="TaxTotal")
     * @Serializer\XmlList(inline=true, entry="TaxTotal", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     */
    public array $taxTotal;

    /**
     * DOCUMENT TOTALS
     * A group of business terms providing the monetary totals for the Invoice.
     *
     * @Serializer\SerializedName(name="LegalMonetaryTotal")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     */
    public LegalMonetaryTotal $legalMonetaryTotal;

    /**
     * INVOICE LINE
     * A group of business terms providing information on individual Invoice lines.
     *
     * @var InvoiceLine[]
     * @Serializer\XmlList(inline=true, entry="InvoiceLine", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     */
    public array $invoiceLine;

    public function __construct(
        string $ublVersionId,
        string $id,
        DateTimeInterface $issueDate,
        CodeType $documentCurrencyCode,
        ?OrderReference $orderReference,
        AccountingSupplierParty $accountingSupplierParty,
        AccountingCustomerParty $accountingCustomerParty,
        ?Delivery $delivery,
        array $taxTotal,
        LegalMonetaryTotal $legalMonetaryTotal,
        array $invoiceLines
    ) {
        $this->invoiceLine = [];
        $this->taxTotal = [];

        $this->ublVersionId = $ublVersionId;
        $this->id = $id;
        $this->issueDate = $issueDate;
        $this->setInvoiceLines($invoiceLines);
        $this->setTaxTotal($taxTotal);
        $this->documentCurrencyCode = $documentCurrencyCode;
        $this->orderReference = $orderReference;
        $this->accountingSupplierParty = $accountingSupplierParty;
        $this->accountingCustomerParty = $accountingCustomerParty;
        $this->delivery = $delivery;
        $this->taxTotal = $taxTotal;
        $this->legalMonetaryTotal = $legalMonetaryTotal;
    }

    private function setTaxTotal(array $taxTotals): void
    {
        foreach ($taxTotals as $taxTotal) {
            if (!$taxTotal instanceof TaxTotal) {
                throw new InvalidArgumentException('TaxTotal line excepted');
            }

            $this->taxTotal[] = $taxTotal;
        }
    }

    private function setInvoiceLines(array $invoiceLines): void
    {
        foreach ($invoiceLines as $invoiceLine) {
            if (!$invoiceLine instanceof InvoiceLine) {
                throw new InvalidArgumentException('Invoice line excepted');
            }

            $this->invoiceLine[] = $invoiceLine;
        }
    }
}

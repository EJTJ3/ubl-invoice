<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

/**
 * @see https://docs.peppol.eu/poacc/billing/3.0/syntax/ubl-invoice/cac-OrderReference/
 */
final class OrderReference
{
    /**
     * Purchase order reference
     * An identifier of a referenced purchase order, issued by the Buyer.An invoice must have
     * buyer reference (BT-10) or purchase order reference.
     *
     * @Serializer\SerializedName(name="ID")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public string $id;

    /**
     * Sales order reference
     * An identifier of a referenced sales order, issued by the Seller.
     *
     * Example value: 112233
     *
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @Serializer\SerializedName(name="SalesOrderID")
     */
    public ?string $salesOrderId;

    public function __construct(string $id, ?string $salesOrderId = null)
    {
        $this->id = $id;
        $this->salesOrderId = $salesOrderId;
    }
}

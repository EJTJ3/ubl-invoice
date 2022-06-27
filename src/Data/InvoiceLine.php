<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

final class InvoiceLine
{
    /**
     * Invoice line identifier
     * A unique identifier for the individual line within the Invoice.
     *
     * Example value: 12
     *
     * @Serializer\SerializedName(name="ID")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public string $id;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(name="InvoicedQuantity")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public InvoicedQuantity $invoicedQuantity;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(name="LineExtensionAmount")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public Amount $lineExtensionAmount;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(name="OrderLineReference")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     */
    public OrderLineReference $orderLineReference;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(name="TaxTotal")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     */
    public TaxTotal $taxTotal;

    /**
     * ITEM INFORMATION.
     *
     * A group of business terms providing information about the goods and services invoiced.
     *
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(name="Item")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     */
    public Item $item;

    /**
     * PRICE DETAILS.
     *
     * A group of business terms providing information about the price applied for the goods and services
     * invoiced on the Invoice line.
     *
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(name="Price")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     */
    public Price $price;

    public function __construct(
        string $id,
        InvoicedQuantity $invoicedQuantity,
        Amount $lineExtensionAmount,
        OrderLineReference $orderLineReference,
        TaxTotal $taxTotal,
        Item $item,
        Price $price
    ) {
        $this->id = $id;
        $this->invoicedQuantity = $invoicedQuantity;
        $this->lineExtensionAmount = $lineExtensionAmount;
        $this->orderLineReference = $orderLineReference;
        $this->taxTotal = $taxTotal;
        $this->item = $item;
        $this->price = $price;
    }
}

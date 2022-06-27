<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

/**
 * https://docs.peppol.eu/poacc/billing/3.0/syntax/ubl-invoice/cac-InvoiceLine/cac-Item/.
 */
final class Item
{
    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(name="Name")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public string $name;

    /**
     * A description for an item.The item description allows for describing the item and its features in more detail than the Item name.
     *
     * @Serializer\SerializedName(name="Description")
     */
    public ?string $description;

    /**
     * Item Seller's identifier
     * An identifier, assigned by the Seller, for the item.
     *
     * @Serializer\SerializedName(name="SellersItemIdentification")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     */
    public ?ItemIdentification $sellersItemIdentification;

    /**
     * Item Buyer's identifier
     * An identifier, assigned by the Buyer, for the item.
     *
     * @Serializer\SerializedName(name="BuyersItemIdentification")
     */
    public ?ItemIdentification $buyersItemIdentification;

    // @TODO ADD cac:ClassifiedTaxCategory
    // https://docs.peppol.eu/poacc/billing/3.0/syntax/ubl-invoice/cac-InvoiceLine/cac-Item/
    // LINE VAT INFORMATION
    // A group of business terms providing information about the VAT applicable for the goods and services invoiced on the Invoice line.

    public function __construct(
        string $name,
        ?string $description = null,
        ?ItemIdentification $sellersItemIdentification = null,
        ?ItemIdentification $buyersItemIdentification = null
    ) {
        $this->name = $name;
        $this->sellersItemIdentification = $sellersItemIdentification;
        $this->description = $description;
        $this->buyersItemIdentification = $buyersItemIdentification;
    }

    public function withSellersItemIdentification(string $sellersItemIdentification): void
    {
        $this->sellersItemIdentification = new ItemIdentification($sellersItemIdentification);
    }

    public function withBuyersItemIdentification(string $buyersItemIdentification): void
    {
        $this->buyersItemIdentification = new ItemIdentification($buyersItemIdentification);
    }
}

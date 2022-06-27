<?php

declare(strict_types=1);

namespace EJTJ3\Ubl\Data;

use JMS\Serializer\Annotation as Serializer;

/**
 * A group of business terms providing information about the postal address for the Buyer/Seller.
 * Sufficient components of the address are to be filled to comply with legal requirements.
 *
 * @see https://docs.peppol.eu/poacc/billing/3.0/syntax/ubl-invoice/cac-AccountingSupplierParty/cac-Party/cac-PostalAddress/
 * @see https://docs.peppol.eu/poacc/billing/3.0/syntax/ubl-invoice/cac-AccountingCustomerParty/cac-Party/cac-PostalAddress/
 */
final class AdressType
{
    /**
     * Address line 1
     * The main address line in an address.
     *
     * Example value: Main Street 1
     *
     * @Serializer\SerializedName(name="StreetName")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public ?string $streetName;

    /**
     * Address line 2
     * An additional address line in an address that can be used to give further details supplementing the main line.
     *
     * Example value: Po Box 351
     *
     * @Serializer\SerializedName(name="AdditionalStreetName")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public ?string $additionalStreetName;

    /**
     * City
     * The common name of the city, town or village, where the Buyer's address is located.
     *
     * Example value: Stockholm
     *
     * @Serializer\SerializedName(name="CityName")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public ?string $cityName;

    /**
     * Postcode
     * The identifier for an addressable group of properties according to the relevant postal service.
     *
     * Example value: 34567
     *
     * @Serializer\SerializedName(name="PostalZone")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     */
    public ?string $postalZone;

    /**
     * @Serializer\SerializedName(name="Country")
     * @Serializer\XmlElement(cdata=false, namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     */
    public Country $country;

    public function __construct(
        Country $country,
        ?string $streetName = null,
        ?string $additionalStreetName = null,
        ?string $cityName = null,
        ?string $postalZone = null
    ) {
        $this->streetName = $streetName;
        $this->cityName = $cityName;
        $this->postalZone = $postalZone;
        $this->country = $country;
        $this->additionalStreetName = $additionalStreetName;
    }
}

<?php
namespace AddressNormalizer\Model;

/**
 * Interface AddressInterface
 * Based on https://schema.org/address or https://schema.org/PostalAddress
 * @package AddressNormalizer\Model
 * @author Erwin Eu
 */
interface AddressInterface
{
    /**
     * @return string
     */
    public function getStreetAddress();
    /**
     * @param string $streetAddress
     * @return AddressInterface
     */
    public function setStreetAddress($streetAddress);
    /**
     * @return string
     */
    public function getPostalCode();
    /**
     * @param string $postalCode
     * @return AddressInterface
     */
    public function setPostalCode($postalCode);
    /**
     * @return string
     */
    public function getAddressLocality();
    /**
     * @param string $addressLocality
     * @return AddressInterface
     */
    public function setAddressLocality($addressLocality);
    /**
     * @return string
     */
    public function getAddressRegion();
    /**
     * @param string $addressRegion
     * @return AddressInterface
     */
    public function setAddressRegion($addressRegion);
    /**
     * https://en.wikipedia.org/wiki/ISO_3166-1
     * @return string
     */
    public function getAddressCountry();
    /**
     * @param string $addressCountry
     * @return AddressInterface
     */
    public function setAddressCountry($addressCountry);
    /**
     * Additional Property
     * @return string
     */
    public function getHouseNumber();
    /**
     * @param string $houseNumber
     * @return AddressInterface
     */
    public function setHouseNumber($houseNumber);
}

<?php
namespace AddressNormalizer\Model;

/**
 * Class Address
 * @package AddressNormalizer\Model
 * @author Erwin Eu
 * @inheritDoc \\AddressNormalizer\\Model\\AddressInterface
 */
abstract class Address implements AddressObjectInterface
{
    /** @inheritDoc */
    public $streetAddress;
    /** @inheritDoc */
    public $postalCode;
    /** @inheritDoc */
    public $addressLocality;
    /** @inheritDoc */
    public $addressRegion;
    /** @inheritDoc */
    public $addressCountry;
    /** @inheritDoc */
    public $houseNumber;
}

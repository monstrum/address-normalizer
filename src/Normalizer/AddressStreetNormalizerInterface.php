<?php
namespace AddressNormalizer\Normalizer;

use AddressNormalizer\Model\Address;
use AddressNormalizer\Model\AddressInterface;
use AddressNormalizer\Model\AddressObjectInterface;

/**
 * Interface AddressStreetNormalizerInterface
 * @package AddressNormalizer\Utils
 * @author Erwin Eu
 */
interface AddressStreetNormalizerInterface
{
    /**
     * @param $object
     * @return mixed|AddressInterface|AddressObjectInterface|Address
     */
    public function normalize($object);
}

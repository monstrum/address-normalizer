<?php
namespace AddressNormalizer\Normalizer;

/**
 * Interface AddressStreetNormalizerInterface
 * @package AddressNormalizer\Utils
 * @author Erwin Eu
 */
interface NormalizerInterface
{
    /**
     * @param $value
     * @return string|mixed
     */
    public function normalize($value);
}

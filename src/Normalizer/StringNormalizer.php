<?php
namespace AddressNormalizer\Normalizer;

use AddressNormalizer\Type\Base;
use AddressNormalizer\Utils\Normalizer;

/**
 * Class AddressStreetNormalizer
 * @package AddressNormalizer\Utils
 * @author Erwin Eu
 */
class StringNormalizer implements NormalizerInterface
{
    protected $normalizer;
    protected $className;
    /**
     * @var Normalizer
     */
    protected $engine;

    /**
     * AddressStreetNormalizer constructor.
     * @param $normalizerClass
     */
    public function __construct($normalizerClass, $util)
    {
        $this->className = $normalizerClass;
        if ($util) {
            $this->engine = $util;
        }
    }

    /**
     * @param Base $normalizer
     */
    public function setNormalizer(Base $normalizer)
    {
        $this->normalizer = $normalizer;
    }

    /**
     * @param $object
     */
    public function normalize($object)
    {
        return $this->engine->normalize($object);
    }
}

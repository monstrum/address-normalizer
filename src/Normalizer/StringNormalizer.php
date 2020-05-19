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
     * @param null $util
     */
    public function __construct($normalizerClass, $util = null)
    {
        $this->className = $normalizerClass;
        if ($util) {
            $this->engine = $util;
        } else {
            $this->engine = new Normalizer(new $normalizerClass());
        }
    }

    /**
     * @inheritDoc
     */
    public function setNormalizer(Base $normalizer)
    {
        $this->normalizer = $normalizer;
    }

    /**
     * @inheritDoc
     */
    public function normalize($object)
    {
        return $this->engine->normalize($object);
    }
}

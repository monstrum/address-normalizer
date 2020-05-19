<?php
namespace AddressNormalizer\Normalizer;

use AddressNormalizer\Model\Address;
use AddressNormalizer\Model\AddressInterface;
use AddressNormalizer\Model\AddressObjectInterface;
use AddressNormalizer\Type\Base;
use AddressNormalizer\Utils\Normalizer;

/**
 * Class AddressStreetNormalizer
 * @package AddressNormalizer\Utils
 * @author Erwin Eu
 */
class AddressStreetNormalizer implements AddressStreetNormalizerInterface, NormalizerInterface
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
        $normalizer = $this->engine;
        if ($object instanceof AddressInterface) {
            $object->setStreetAddress($normalizer->normalize($object->getStreetAddress()))
                ->setHouseNumber($normalizer->normalize($object->getHouseNumber()))
                ->setPostalCode($normalizer->normalize($object->getPostalCode()))
                ->setAddressLocality($normalizer->normalize($object->getAddressLocality()))
                ->setAddressRegion($normalizer->normalize($object->getAddressRegion()))
                ->getAddressCountry($normalizer->normalize($object->getAddressCountry()));
        } elseif ($object instanceof Address || $object instanceof AddressObjectInterface) {
            $object->streetAddress = $normalizer->normalize($object->streetAddress);
            $object->houseNumber = $normalizer->normalize($object->houseNumber);
            $object->postalCode = $normalizer->normalize($object->postalCode);
            $object->addressLocality = $normalizer->normalize($object->addressLocality);
            $object->addressRegion = $normalizer->normalize($object->addressRegion);
            $object->addressCountry = $normalizer->normalize($object->addressCountry);
        }

        return $object;
    }
}

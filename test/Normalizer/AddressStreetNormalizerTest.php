<?php
namespace AddressNormalizerTest\Normalizer;

use AddressNormalizer\Normalizer\AddressStreetNormalizer;
use AddressNormalizer\Normalizer\AddressStreetNormalizerInterface;
use AddressNormalizer\Normalizer\NormalizerInterface;
use AddressNormalizer\Type\Base;
use PHPUnit\Framework\TestCase;

/**
 * Class AddressStreetNormalizer
 * @package AddressNormalizer\Utils
 * @author Erwin Eu
 */
class AddressStreetNormalizerTest extends TestCase
{
    /**
     * @var AddressStreetNormalizer
     */
    protected $normalizer;

    protected function setUp()
    {
        $this->normalizer = new AddressStreetNormalizer(Base::class);
    }

    public function testImplementInterface()
    {
        $this->assertInstanceOf(NormalizerInterface::class, $this->normalizer);
        $this->assertInstanceOf(AddressStreetNormalizerInterface::class, $this->normalizer);
    }
}

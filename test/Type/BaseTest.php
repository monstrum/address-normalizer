<?php
namespace AddressNormalizerTest\Type;

use AddressNormalizer\Model\Address;
use AddressNormalizer\Normalizer\AddressStreetNormalizer;
use AddressNormalizer\Type\Base;
use PHPUnit\Framework\TestCase;

/**
 * Class BaseTest
 * @package AddressNormalizer\Normalizer
 * @author Erwin Eu
 */
class BaseTest extends TestCase
{
    /** @var AddressStreetNormalizer */
    protected $normalizer;
    /** @var Address */
    protected $address;

    protected function setUp()
    {
        $address = new class extends Address {};
        $address->streetAddress = "Hamburger strasse";
        $address->houseNumber = "12-a";
        $address->postalCode = 123456;
        $address->addressLocality = "Hamburg";
        $address->addressRegion = "Hamburg";
        $address->addressCountry = "DE";

        $this->normalizer = new AddressStreetNormalizer(Base::class);
        $this->address = $address;
    }

    public function testNormalize()
    {
        $address = $this->address;
        /** @var Address $address */
        $address = $this->normalizer->normalize($address);

        $this->assertEquals("Hamburger strasse", $address->streetAddress);
        $this->assertEquals("12-a", $address->houseNumber);
        $this->assertEquals("123456", $address->postalCode);
        $this->assertEquals("Hamburg", $address->addressLocality);
        $this->assertEquals("Hamburg", $address->addressRegion);
        $this->assertEquals("DE", $address->addressCountry);
    }

    public function testUmlaute()
    {
        $address = $this->address;
        $data = [
            "streetAddress" => "Altona Straße",
            "houseNumber" => "13/7",
            "postalCode" => "D-592431",
            "addressRegion" => "Hämburg",
            "addressCountry" => "",
        ];
        foreach ($data as $key => $value) $address->{$key} = $value;
        /** @var Address $address */
        $address = $this->normalizer->normalize($address);

        $this->assertEquals("Altona Strasse", $address->streetAddress);
        $this->assertEquals("13/7", $address->houseNumber);
        $this->assertEquals("D-592431", $address->postalCode);
        $this->assertEquals("Hamburg", $address->addressRegion);
        $this->assertEquals("", $address->addressCountry);
    }
}

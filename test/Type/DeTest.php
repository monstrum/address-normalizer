<?php
namespace AddressNormalizerTest\Type;

use AddressNormalizer\Model\Address;
use AddressNormalizer\Normalizer\AddressStreetNormalizer;
use AddressNormalizer\Type\De;
use PHPUnit\Framework\TestCase;

/**
 * Class De
 * @package AddressNormalizer\Normalizer
 * @author Erwin Eu
 */
class DeTest extends TestCase
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

        $this->normalizer = new AddressStreetNormalizer(De::class);
        $this->address = $address;
    }

    public function testNormalize()
    {
        $address = $this->address;
        /** @var Address $address */
        $address = $this->normalizer->normalize($address);

        $this->assertEquals("Hamburger str", $address->streetAddress);
        $this->assertEquals("12 a", $address->houseNumber);
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
        ];
        foreach ($data as $key => $value) $address->{$key} = $value;
        /** @var Address $address */
        $address = $this->normalizer->normalize($address);

        $this->assertEquals("Altona str", $address->streetAddress);
        $this->assertEquals("13 7", $address->houseNumber);
        $this->assertEquals("D 592431", $address->postalCode);
        $this->assertEquals("Haemburg", $address->addressRegion);
    }

    public function testMultipleSpaces()
    {
        $address = $this->address;
        $data = [
            "streetAddress" => "Altona    Straße   ",
        ];
        foreach ($data as $key => $value) $address->{$key} = $value;
        /** @var Address $address */
        $address = $this->normalizer->normalize($address);
        $this->assertEquals("Altona str", $address->streetAddress);
    }

    public function testNonAlphanumeric()
    {
        $address = $this->address;
        $data = [
            "streetAddress" => "Altona édie-Française !§$&/)=?  + Straße #':.,; -_<<< <>  ",
        ];
        foreach ($data as $key => $value) $address->{$key} = $value;
        /** @var Address $address */
        $address = $this->normalizer->normalize($address);
        $this->assertEquals("Altona edie Francaise str", $address->streetAddress);
    }
}

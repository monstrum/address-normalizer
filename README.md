```php
$address = new Address();
$address->streetAddress = "Hamburger strasse";
$address->houseNumber = "12-a";
$address->postalCode = 123456;
$address->addressLocality = "Hamburg";
$address->addressRegion = "Hamburg";
$address->addressCountry = "DE";

$normalizer = new AddressStreetNormalizer(De::class);
$normalizer->normalize($address);
```
Results:
```php
$address->streetAddress = "Hamburger str";
$address->houseNumber = "12 a";
$address->postalCode = 123456;
$address->addressLocality = "Hämburg";
$address->addressRegion = "Hämburg";
$address->addressCountry = "DE";
```
Using custom Type:
```php
# AtDe.php
class AtDe extends Base
{
    /**
     * @inheritDoc
     */
    const ACCENTS = [
        'ä' => 'ae',
        'Ä' => 'Ae',
        'ü' => 'ue',
        'Ü' => 'ue',
        'ö' => 'oe',
        'Ö' => 'oe',
        'ß' => 'ss',
    ];

    const REGEX = "/[^A-Za-z0-9 ]/";
}

$normalizer = new AddressStreetNormalizer(AtDe::class);
$address = $address;
$normalizer->normalize($address);
```
Results:
```php
$address->streetAddress = "Hamburger strasse";
$address->houseNumber = "12-a";
$address->postalCode = 123456;
$address->addressLocality = "Haemburg";
$address->addressRegion = "Haemburg";
$address->addressCountry = "DE";
```

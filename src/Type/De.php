<?php
namespace AddressNormalizer\Type;

/**
 * Class De
 * @package AddressNormalizer\Normalizer
 * @author Erwin Eu
 */
class De extends Base
{
    /**
     * @inheritDoc
     */
    const BASE = [
        '-' => ' ',
        '/' => ' ',
    ];

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

    /**
     * @inheritDoc
     */
    const ABBRS = [
        'strasse' => 'str',
        'Strasse' => 'str',
        'straße' => 'str',
        'Straße' => 'str',
        'chaussee' => 'ch',
        'Chaussee' => 'ch',
    ];

    const REGEX = "/[^A-Za-z0-9 ]/";
}

<?php
namespace AddressNormalizer\Type;

/**
 * Class Base
 * @package AddressNormalizer\Normalizer
 * @author Erwin Eu
 */
class Base
{
    /**
     * Base character to be keep
     * Order 1
     */
    const BASE = [];

    /**
     * List of abbreviations
     * Order 2
     */
    const ABBRS = [];

    /**
     * List of accents
     * Order 3
     */
    const ACCENTS = [];

    /**
     * string
     * Order 4
     */
    const REGEX = null;
}

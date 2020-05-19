<?php
namespace AddressNormalizer\Utils;

use AddressNormalizer\Type\Base;
use LukeMadhanga\Transliterator;

/**
 * Class AddressStreetNormalizer
 * @package AddressNormalizer\Utils
 * @author Erwin Eu
 */
class Normalizer
{
    protected $base;

    /**
     * Normalizer constructor.
     * @param Base $base
     */
    public function __construct(Base $base)
    {
        $this->base = $base;
    }

    /**
     * @param $value
     * @return false|string
     */
    public function normalize($value)
    {
        $value = $this->normalizeBaseCharacter($value);
        $value = $this->normalizeAbbr($value);
        $value = $this->normalizeAccent($value);
        /** Accents will be replaced */
        $value = Transliterator::convert($value);
        $value = $this->applyRegex($value);
        $value = $this->sanitize($value);

        return $value;
    }

    /**
     * Remove multiline and multiple space between words
     * @param $value
     * @return string
     */
    public function sanitize($value)
    {
        if (!$value) {
            return $value;
        }

        $value = preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $value));
        return trim($value);
    }

    /**
     * @param $value
     * @return string
     */
    private function normalizeStr($value, $keys)
    {
        if (!$keys || !$value) {
            return $value;
        }

        return str_replace(
            array_keys($keys),
            array_values($keys),
            $value
        );
    }

    /**
     * @param $value
     * @return string
     */
    public function normalizeBaseCharacter($value)
    {
        return $this->normalizeStr($value, $this->base::BASE);
    }

    /**
     * @param $value
     * @return string
     */
    public function normalizeAbbr($value)
    {
        return $this->normalizeStr($value, $this->base::ABBRS);
    }

    /**
     * @param $value
     * @return string
     */
    public function normalizeAccent($value)
    {
        return $this->normalizeStr($value, $this->base::ACCENTS);
    }

    /**
     * @param $value
     * @return string
     */
    public function applyRegex($value)
    {
        $regex = $this->base::REGEX;
        if ($regex) {
            return preg_replace($regex, '', $value);
        }

        return $value;
    }
}

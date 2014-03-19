<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Icu;

use Symfony\Component\Intl\Exception\MissingResourceException;
use Symfony\Component\Intl\ResourceBundle\Reader\BundleEntryReaderInterface;

/**
 * Data provider for currency-related data.
 *
 * @since  2.5
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class CurrencyDataProvider
{
    const INDEX_SYMBOL = 0;

    const INDEX_NAME = 1;

    const INDEX_FRACTION_DIGITS = 0;

    const INDEX_ROUNDING_INCREMENT = 1;

    /**
     * @var string
     */
    protected $path;

    /**
     * @var BundleEntryReaderInterface
     */
    protected $reader;

    /**
     * Returns the path to the directory where the resource bundle is stored.
     *
     * @return string The absolute path to the resource directory
     */
    public static function getResourceDirectory()
    {
        return realpath(IcuData::getResourceDirectory().'/curr');
    }

    /**
     * Creates a data provider that reads currency-related data from a
     * resource bundle.
     *
     * @param string                     $path   The path to the resource bundle.
     * @param BundleEntryReaderInterface $reader The reader for reading the resource bundle.
     */
    public function __construct($path, BundleEntryReaderInterface $reader)
    {
        $this->path = $path;
        $this->reader = $reader;
    }

    /**
     * Data provider for {@link \Symfony\Component\Intl\Currency::getCurrencies()}.
     */
    public function getCurrencies()
    {
        return array_keys($this->reader->readEntry($this->path, 'root', array('Currencies')));
    }

    /**
     * Data provider for {@link \Symfony\Component\Intl\Currency::getSymbol()}.
     */
    public function getSymbol($currency, $displayLocale)
    {
        return $this->reader->readEntry($this->path, $displayLocale, array('Currencies', $currency, static::INDEX_SYMBOL));
    }

    /**
     * Data provider for {@link \Symfony\Component\Intl\Currency::getName()}.
     */
    public function getName($currency, $displayLocale)
    {
        return $this->reader->readEntry($this->path, $displayLocale, array('Currencies', $currency, static::INDEX_NAME));
    }

    /**
     * Data provider for {@link \Symfony\Component\Intl\Currency::getNames()}.
     */
    public function getNames($displayLocale = null)
    {
        // ====================================================================
        // For reference: It is NOT possible to return names indexed by
        // numeric code here, because some numeric codes map to multiple
        // 3-letter codes (e.g. 32 => "ARA", "ARP", "ARS")
        // ====================================================================

        $names = $this->reader->readEntry($this->path, $displayLocale, array('Currencies'));

        if ($names instanceof \Traversable) {
            $names = iterator_to_array($names);
        }

        $index = static::INDEX_NAME;

        array_walk($names, function (&$value) use ($index) {
            $value = $value[$index];
        });

        // Sorting by value cannot be done during bundle generation, because
        // binary bundles are always sorted by keys
        $collator = new \Collator($displayLocale);
        $collator->asort($names);

        return $names;
    }

    /**
     * Data provider for {@link \Symfony\Component\Intl\Currency::getFractionDigits()}.
     */
    public function getFractionDigits($currency)
    {
        try {
            return $this->reader->readEntry($this->path, 'en', array('CurrencyMeta', $currency, static::INDEX_FRACTION_DIGITS));
        } catch (MissingResourceException $e) {
            return $this->reader->readEntry($this->path, 'en', array('CurrencyMeta', 'DEFAULT', static::INDEX_FRACTION_DIGITS));
        }
    }

    /**
     * Data provider for {@link \Symfony\Component\Intl\Currency::getRoundingIncrement()}.
     */
    public function getRoundingIncrement($currency)
    {
        try {
            return $this->reader->readEntry($this->path, 'en', array('CurrencyMeta', $currency, static::INDEX_ROUNDING_INCREMENT));
        } catch (MissingResourceException $e) {
            return $this->reader->readEntry($this->path, 'en', array('CurrencyMeta', 'DEFAULT', static::INDEX_ROUNDING_INCREMENT));
        }
    }

    /**
     * Data provider for {@link \Symfony\Component\Intl\Currency::getNumericCode()}.
     */
    public function getNumericCode($currency)
    {
        return $this->reader->readEntry($this->path, 'root', array('Alpha3ToNumeric', $currency));
    }

    /**
     * Data provider for {@link \Symfony\Component\Intl\Currency::forNumericCode()}.
     */
    public function forNumericCode($numericCode)
    {
        return $this->reader->readEntry($this->path, 'root', array('NumericToAlpha3', (string) $numericCode));
    }
}

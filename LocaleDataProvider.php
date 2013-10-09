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

use Symfony\Component\Intl\ResourceBundle\Reader\BundleEntryReaderInterface;

/**
 * Data provider for locale-related ICU data.
 *
 * @since  2.5
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class LocaleDataProvider
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var BundleEntryReaderInterface
     */
    private $reader;

    /**
     * Returns the path to the directory where the resource bundle is stored.
     *
     * @return string The absolute path to the resource directory
     */
    public static function getResourceDirectory()
    {
        return realpath(IcuData::getResourceDirectory().'/locales');
    }

    /**
     * Creates a data provider that reads locale-related data from .res files.
     *
     * @param string                     $path   The path to the directory
     *                                           containing the .res files.
     * @param BundleEntryReaderInterface $reader The reader for reading the .res
     *                                           files.
     */
    public function __construct($path, BundleEntryReaderInterface $reader)
    {
        $this->path = $path;
        $this->reader = $reader;
    }

    /**
     * Data provider for {@link \Symfony\Component\Intl\Locale::getLocales()}.
     */
    public function getLocales()
    {
        $locales = $this->reader->readEntry($this->path, 'root', array('Locales'));

        if ($locales instanceof \Traversable) {
            $locales = iterator_to_array($locales);
        }

        return array_keys($locales);
    }

    /**
     * Data provider for {@link \Symfony\Component\Intl\Locale::getAliases()}.
     */
    public function getAliases()
    {
        $aliases = $this->reader->readEntry($this->path, 'root', array('Aliases'));

        if ($aliases instanceof \Traversable) {
            $aliases = iterator_to_array($aliases);
        }

        return $aliases;
    }

    /**
     * Data provider for {@link \Symfony\Component\Intl\Locale::getName()}.
     */
    public function getName($locale, $displayLocale)
    {
        return $this->reader->readEntry($this->path, $displayLocale, array('Locales', $locale));
    }

    /**
     * Data provider for {@link \Symfony\Component\Intl\Locale::getNames()}.
     */
    public function getNames($displayLocale)
    {
        $names = $this->reader->readEntry($this->path, $displayLocale, array('Locales'));

        if ($names instanceof \Traversable) {
            $names = iterator_to_array($names);
        }

        $collator = new \Collator($displayLocale);
        $collator->asort($names);

        return $names;
    }
}

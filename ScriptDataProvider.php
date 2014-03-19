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
 * Data provider for script-related ICU data.
 *
 * @since  2.5
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class ScriptDataProvider
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
        return realpath(IcuData::getResourceDirectory().'/lang');
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
     * Data provider for {@link \Symfony\Component\Intl\Script::getScripts()}.
     */
    public function getScripts()
    {
        return array_keys($this->reader->readEntry($this->path, 'root', array('Scripts')));
    }

    public function getAliases()
    {
        return $this->reader->readEntry($this->path, 'root', array('Aliases'));
    }

    /**
     * Data provider for {@link \Symfony\Component\Intl\Script::getNames()}.
     */
    public function getName($script, $displayLocale)
    {
        return $this->reader->readEntry($this->path, $displayLocale, array('Scripts', $script));
    }

    /**
     * Data provider for {@link \Symfony\Component\Intl\Script::getNames()}.
     */
    public function getNames($displayLocale)
    {
        $scripts = $this->reader->readEntry($this->path, $displayLocale, array('Scripts'));

        if ($scripts instanceof \Traversable) {
            $scripts = iterator_to_array($scripts);
        }

        $collator = new \Collator($displayLocale);
        $collator->asort($scripts);

        return $scripts;
    }

    /**
     * Data provider for {@link \Symfony\Component\Intl\Script::getAlpha3Code()}.
     */
    public function getAlpha3Code($script)
    {
        return $this->reader->readEntry($this->path, 'root', array('Alpha2ToAlpha3', $script));
    }
}

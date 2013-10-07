<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Icu\Tests;

use Symfony\Component\Intl\Intl;
use Symfony\Component\Intl\Test\RegionBundleConsistencyTestCase;
use Symfony\Component\Intl\Util\IcuVersion;

/**
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class IcuRegionBundleConsistencyTest extends RegionBundleConsistencyTestCase
{
    // The below arrays document the state of the ICU data bundled with this
    // package. This state is verified in the tests in the base class.
    // You can add arbitrary rules here if you want to document the availability
    // of other countries.

    protected static $localesWithoutTranslationForAnyCountry = array('ti');

    protected static $localesWithoutTranslationForCountry = array(
        'US' => array(
            'bem', 'dua', 'dyo', 'gv', 'ig', 'jgo', 'kl', 'kok', 'kw', 'mgo',
            'nus', 'pa', 'ps', 'rw', 'uz'
        ),
        'DE' => array(
            'bem', 'dua', 'gv', 'ig', 'kl', 'kok', 'kw', 'mgh', 'mgo', 'nus',
            'pa', 'rw', 'uz'
        ),
        'GB' => array(
            'bem', 'dua', 'dyo', 'fo', 'ig', 'jgo', 'kl', 'kok', 'mgh', 'mgo',
            'nus', 'pa', 'rw', 'uz'
        ),
        'FR' => array(
            'bem', 'bo', 'dua', 'gv', 'ig', 'kl', 'kok', 'kw', 'mgo', 'nus',
            'pa', 'rw', 'uz'
        ),
        'IT' => array(
            'bem', 'dua', 'gv', 'ig', 'kl', 'kok', 'kw', 'mgo', 'nus', 'pa',
            'rw', 'uz'
        ),
        'BR' => array(
            'bem', 'bo', 'dua', 'gv', 'haw', 'ig', 'kl', 'kok', 'kw', 'mgh',
            'mgo', 'pa', 'ps', 'rw', 'uz'
        ),
        'RU' => array(
            'bem', 'dua', 'dyo', 'gv', 'ig', 'kl', 'kok', 'kw', 'mgh', 'mgo',
            'nus', 'pa', 'rw', 'uz'
        ),
        'CN' => array(
            'bem', 'dua', 'gv', 'kl', 'kok', 'kw', 'mgo', 'pa', 'rw', 'uz'
        ),
    );

    protected function setUp()
    {
        parent::setUp();

        if (!Intl::isExtensionLoaded()) {
            $this->markTestSkipped('The intl extension is not available.');
        }

        if (IcuVersion::compare(Intl::getIcuVersion(), '4.4', '<', $precision = 1)) {
            $this->markTestSkipped('Please change your ICU version to 4.4 or higher');
        }
    }

    protected static function getLocales()
    {
        return IcuLocaleBundleConsistencyTest::getLocales();
    }

    protected static function getLocaleAliases()
    {
        return IcuLocaleBundleConsistencyTest::getLocaleAliases();
    }
}

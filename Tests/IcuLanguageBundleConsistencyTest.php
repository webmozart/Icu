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
use Symfony\Component\Intl\Test\LanguageBundleConsistencyTestCase;
use Symfony\Component\Intl\Util\IcuVersion;

/**
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class IcuLanguageBundleConsistencyTest extends LanguageBundleConsistencyTestCase
{
    // The below arrays document the state of the ICU data bundled with this
    // package. This state is verified in the tests in the base class.
    // You can add arbitrary rules here if you want to document the availability
    // of other languages.

    protected static $localesWithoutTranslationForAnyLanguage = array();

    protected static $localesWithoutTranslationForLanguage = array(
        // locales without translation for themselves
        null => array('in', 'iw', 'nmg', 'tl'),

        // locales without translations for the languages given in the keys
        'en' => array(
            'as', 'bo', 'dua', 'fo', 'gv', 'kl', 'kw', 'mgo', 'uz'
        ),
        'fr' => array(
            'as', 'bo', 'dua', 'fo', 'gv', 'kl', 'kw', 'mgo', 'uz'
        ),
        'es' => array(
            'as', 'bo', 'dua', 'fo', 'gv','jgo', 'kl', 'kw', 'lo', 'mgo', 'ps',
            'uz'
        ),
        'ru' => array(
            'as', 'dua', 'fo', 'gv', 'jgo', 'kl', 'kw', 'mgo', 'pa', 'uz'
        ),
        'zh' => array(
            'as', 'dua', 'fo', 'gv', 'kl', 'kw', 'mgo', 'pa', 'rw', 'ti', 'uz'
        ),
        'de' => array(
            'as', 'bo', 'dua', 'fo', 'gv', 'kl', 'kw', 'mgo', 'uz'
        ),
    );

    protected static $localesWithoutTranslationForAnyScript = array(
        'agq', 'ak', 'asa', 'bas', 'bem', 'bez', 'bm', 'cgg', 'dav', 'dje',
        'dua', 'dyo', 'ebu', 'eo', 'ewo', 'ff', 'fo', 'ga', 'guz', 'gv', 'ha',
        'haw', 'ig', 'jmc', 'kab', 'kam', 'kde', 'khq', 'ki', 'kl', 'kln',
        'kok', 'ksb', 'ksf', 'kw', 'lag', 'lg', 'ln', 'lu', 'luo', 'luy', 'mas',
        'mer', 'mfe', 'mg', 'mgh', 'mua', 'naq', 'nd', 'nmg', 'nus', 'nyn',
        'pa', 'rn', 'rof', 'rw', 'rwk', 'saq', 'sbp', 'seh', 'ses', 'sg', 'shi',
        'sn', 'swc', 'teo', 'twq', 'tzm', 'uz', 'vai', 'vun', 'xog', 'yav', 'yo'
    );

    protected static $localesWithoutTranslationForScript = array(
        'Latn' => array(
            'as', 'bo', 'lo', 'ps', 'so'
        ),
        'Hans' => array(
            'as', 'bo', 'jgo', 'mgo', 'om', 'ps', 'so', 'sq', 'ti'
        ),
        'Hant' => array(
            'as', 'bo', 'jgo', 'mgo', 'om', 'ps', 'so', 'sq', 'ti'
        ),
        'Cyrl' => array(
            'as', 'bo', 'jgo', 'lo', 'mgo', 'mt', 'om', 'ps', 'so', 'sq', 'ti'
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

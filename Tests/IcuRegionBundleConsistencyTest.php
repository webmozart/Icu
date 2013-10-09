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

    protected static $countries = array(
        'AC', 'AD', 'AE', 'AF', 'AG', 'AI', 'AL', 'AM', 'AN', 'AO', 'AQ', 'AR',
        'AS', 'AT', 'AU', 'AW', 'AX', 'AZ', 'BA', 'BB', 'BD', 'BE', 'BF', 'BG',
        'BH', 'BI', 'BJ', 'BL', 'BM', 'BN', 'BO', 'BQ', 'BR', 'BS', 'BT', 'BV',
        'BW', 'BY', 'BZ', 'CA', 'CC', 'CD', 'CF', 'CG', 'CH', 'CI', 'CK', 'CL',
        'CM', 'CN', 'CO', 'CP', 'CR', 'CU', 'CV', 'CW', 'CX', 'CY', 'CZ', 'DE',
        'DG', 'DJ', 'DK', 'DM', 'DO', 'DZ', 'EA', 'EC', 'EE', 'EG', 'EH', 'ER',
        'ES', 'ET', 'EU', 'FI', 'FJ', 'FK', 'FM', 'FO', 'FR', 'GA', 'GB', 'GD',
        'GE', 'GF', 'GG', 'GH', 'GI', 'GL', 'GM', 'GN', 'GP', 'GQ', 'GR', 'GS',
        'GT', 'GU', 'GW', 'GY', 'HK', 'HM', 'HN', 'HR', 'HT', 'HU', 'IC', 'ID',
        'IE', 'IL', 'IM', 'IN', 'IO', 'IQ', 'IR', 'IS', 'IT', 'JE', 'JM', 'JO',
        'JP', 'KE', 'KG', 'KH', 'KI', 'KM', 'KN', 'KP', 'KR', 'KW', 'KY', 'KZ',
        'LA', 'LB', 'LC', 'LI', 'LK', 'LR', 'LS', 'LT', 'LU', 'LV', 'LY', 'MA',
        'MC', 'MD', 'ME', 'MF', 'MG', 'MH', 'MK', 'ML', 'MM', 'MN', 'MO', 'MP',
        'MQ', 'MR', 'MS', 'MT', 'MU', 'MV', 'MW', 'MX', 'MY', 'MZ', 'NA', 'NC',
        'NE', 'NF', 'NG', 'NI', 'NL', 'NO', 'NP', 'NR', 'NU', 'NZ', 'OM', 'PA',
        'PE', 'PF', 'PG', 'PH', 'PK', 'PL', 'PM', 'PN', 'PR', 'PS', 'PT', 'PW',
        'PY', 'QA', 'QO', 'RE', 'RO', 'RS', 'RU', 'RW', 'SA', 'SB', 'SC', 'SD',
        'SE', 'SG', 'SH', 'SI', 'SJ', 'SK', 'SL', 'SM', 'SN', 'SO', 'SR', 'SS',
        'ST', 'SV', 'SX', 'SY', 'SZ', 'TA', 'TC', 'TD', 'TF', 'TG', 'TH', 'TJ',
        'TK', 'TL', 'TM', 'TN', 'TO', 'TR', 'TT', 'TV', 'TW', 'TZ', 'UA', 'UG',
        'UM', 'US', 'UY', 'UZ', 'VA', 'VC', 'VE', 'VG', 'VI', 'VN', 'VU', 'WF',
        'WS', 'XK', 'YE', 'YT', 'ZA', 'ZM', 'ZW', 'ZZ',
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
        return LocaleDataProviderTest::getLocales();
    }

    protected static function getLocaleAliases()
    {
        return LocaleDataProviderTest::getLocaleAliases();
    }
}

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
use Symfony\Component\Intl\Test\CurrencyBundleConsistencyTestCase;
use Symfony\Component\Intl\Util\IcuVersion;

/**
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class IcuCurrencyBundleConsistencyTest extends CurrencyBundleConsistencyTestCase
{
    // The below arrays document the state of the ICU data bundled with this
    // package. This state is verified in the tests in the base class.
    // You can add arbitrary rules here if you want to document the availability
    // of other currencies.

    protected static $localesWithoutTranslationForAnyCurrency = array();

    protected static $localesWithoutTranslationForCurrency = array(
        'USD' => array(
            'as', 'bem', 'bo', 'dua', 'dyo', 'eo', 'fo', 'gv', 'ig', 'ii', 'kl',
            'kok', 'kw', 'mgh', 'mgo', 'mt', 'nus', 'or', 'pa', 'ps', 'rw',
            'to', 'uz', 'yav'
        ),
        'EUR' => array(
            'as', 'bem', 'bo', 'dua', 'eo', 'fo', 'gv', 'haw', 'ig', 'ii',
            'kok', 'kw', 'mgh', 'mgo', 'nus', 'or', 'pa', 'ps', 'rw', 'to', 'uz'
        ),
        'GBP' => array(
            'as', 'bem', 'bo', 'dua', 'dyo', 'eo', 'fo', 'gv', 'haw', 'ig',
            'ii', 'jgo', 'kl', 'kok', 'kw', 'mgh', 'mgo', 'mt', 'nus', 'or',
            'pa', 'ps', 'rw', 'so', 'to', 'uz'
        ),
        'JPY' => array(
            'as', 'bem', 'bo', 'dua', 'eo', 'fo', 'gv', 'haw', 'ig', 'ii',
            'jgo', 'kl', 'kok', 'kw', 'mgh', 'mgo', 'mt', 'nus', 'or', 'pa',
            'ps', 'rw', 'so', 'to', 'uz'
        ),
        'CNY' => array(
            'as', 'bem', 'dua', 'eo', 'fo', 'gv', 'haw', 'ig', 'jgo', 'kl',
            'kok', 'kw', 'mgh', 'mgo', 'mt', 'nus', 'or', 'pa', 'ps', 'rw',
            'so', 'to', 'uz'
        )
    );

    protected static $currencies = array (
        'ADP', 'AED', 'AFA', 'AFN', 'ALK', 'ALL', 'AMD', 'ANG', 'AOA', 'AOK',
        'AON', 'AOR', 'ARA', 'ARL', 'ARM', 'ARP', 'ARS', 'ATS', 'AUD', 'AWG',
        'AZM', 'AZN', 'BAD', 'BAM', 'BAN', 'BBD', 'BDT', 'BEC', 'BEF', 'BEL',
        'BGL', 'BGM', 'BGN', 'BGO', 'BHD', 'BIF', 'BMD', 'BND', 'BOB', 'BOL',
        'BOP', 'BOV', 'BRB', 'BRC', 'BRE', 'BRL', 'BRN', 'BRR', 'BRZ', 'BSD',
        'BTN', 'BUK', 'BWP', 'BYB', 'BYR', 'BZD', 'CAD', 'CDF', 'CHE', 'CHF',
        'CHW', 'CLE', 'CLF', 'CLP', 'CNX', 'CNY', 'COP', 'COU', 'CRC', 'CSD',
        'CSK', 'CUC', 'CUP', 'CVE', 'CYP', 'CZK', 'DDM', 'DEM', 'DJF', 'DKK',
        'DOP', 'DZD', 'ECS', 'ECV', 'EEK', 'EGP', 'ERN', 'ESA', 'ESB', 'ESP',
        'ETB', 'EUR', 'FIM', 'FJD', 'FKP', 'FRF', 'GBP', 'GEK', 'GEL', 'GHC',
        'GHS', 'GIP', 'GMD', 'GNF', 'GNS', 'GQE', 'GRD', 'GTQ', 'GWE', 'GWP',
        'GYD', 'HKD', 'HNL', 'HRD', 'HRK', 'HTG', 'HUF', 'IDR', 'IEP', 'ILP',
        'ILR', 'ILS', 'INR', 'IQD', 'IRR', 'ISJ', 'ISK', 'ITL', 'JMD', 'JOD',
        'JPY', 'KES', 'KGS', 'KHR', 'KMF', 'KPW', 'KRH', 'KRO', 'KRW', 'KWD',
        'KYD', 'KZT', 'LAK', 'LBP', 'LKR', 'LRD', 'LSL', 'LTL', 'LTT', 'LUC',
        'LUF', 'LUL', 'LVL', 'LVR', 'LYD', 'MAD', 'MAF', 'MCF', 'MDC', 'MDL',
        'MGA', 'MGF', 'MKD', 'MKN', 'MLF', 'MMK', 'MNT', 'MOP', 'MRO', 'MTL',
        'MTP', 'MUR', 'MVP', 'MVR', 'MWK', 'MXN', 'MXP', 'MXV', 'MYR', 'MZE',
        'MZM', 'MZN', 'NAD', 'NGN', 'NIC', 'NIO', 'NLG', 'NOK', 'NPR', 'NZD',
        'OMR', 'PAB', 'PEI', 'PEN', 'PES', 'PGK', 'PHP', 'PKR', 'PLN', 'PLZ',
        'PTE', 'PYG', 'QAR', 'RHD', 'ROL', 'RON', 'RSD', 'RUB', 'RUR', 'RWF',
        'SAR', 'SBD', 'SCR', 'SDD', 'SDG', 'SDP', 'SEK', 'SGD', 'SHP', 'SIT',
        'SKK', 'SLL', 'SOS', 'SRD', 'SRG', 'SSP', 'STD', 'SUR', 'SVC', 'SYP',
        'SZL', 'THB', 'TJR', 'TJS', 'TMM', 'TMT', 'TND', 'TOP', 'TPE', 'TRL',
        'TRY', 'TTD', 'TWD', 'TZS', 'UAH', 'UAK', 'UGS', 'UGX', 'USD', 'USN',
        'USS', 'UYI', 'UYP', 'UYU', 'UZS', 'VEB', 'VEF', 'VND', 'VNN', 'VUV',
        'WST', 'XAF', 'XAG', 'XAU', 'XBA', 'XBB', 'XBC', 'XBD', 'XCD', 'XDR',
        'XEU', 'XFO', 'XFU', 'XOF', 'XPD', 'XPF', 'XPT', 'XRE', 'XSU', 'XTS',
        'XUA', 'XXX', 'YDD', 'YER', 'YUD', 'YUM', 'YUN', 'YUR', 'ZAL', 'ZAR',
        'ZMK', 'ZMW', 'ZRN', 'ZRZ', 'ZWD', 'ZWL', 'ZWR',
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

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

use Symfony\Component\Icu\LanguageDataProvider;
use Symfony\Component\Intl\Intl;
use Symfony\Component\Intl\Tests\DataProvider\AbstractLanguageDataProviderTest;
use Symfony\Component\Intl\Util\IcuVersion;

/**
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class LanguageDataProviderTest extends AbstractLanguageDataProviderTest
{
    // The below arrays document the state of the ICU data bundled with this
    // package. This state is verified in the tests in the base class.

    protected static $languages = array(
        'aa', 'ab', 'ace', 'ach', 'ada', 'ady', 'ae', 'af', 'afa', 'afh', 'agq',
        'ain', 'ak', 'akk', 'ale', 'alg', 'alt', 'am', 'an', 'ang', 'anp',
        'apa', 'ar', 'ar_001', 'arc', 'arn', 'arp', 'art', 'arw', 'as', 'asa',
        'ast', 'ath', 'aus', 'av', 'awa', 'ay', 'az', 'ba', 'bad', 'bai', 'bal',
        'ban', 'bas', 'bat', 'bax', 'bbj', 'be', 'bej', 'bem', 'ber', 'bez',
        'bfd', 'bg', 'bh', 'bho', 'bi', 'bik', 'bin', 'bkm', 'bla', 'bm', 'bn',
        'bnt', 'bo', 'br', 'bra', 'brx', 'bs', 'bss', 'btk', 'bua', 'bug',
        'bum', 'byn', 'byv', 'ca', 'cad', 'cai', 'car', 'cau', 'cay', 'cch',
        'ce', 'ceb', 'cel', 'cgg', 'ch', 'chb', 'chg', 'chk', 'chm', 'chn',
        'cho', 'chp', 'chr', 'chy', 'ckb', 'cmc', 'co', 'cop', 'cpe', 'cpf',
        'cpp', 'cr', 'crh', 'crp', 'cs', 'csb', 'cu', 'cus', 'cv', 'cy', 'da',
        'dak', 'dar', 'dav', 'day', 'de', 'de_AT', 'de_CH', 'del', 'den', 'dgr',
        'din', 'dje', 'doi', 'dra', 'dsb', 'dua', 'dum', 'dv', 'dyo', 'dyu',
        'dz', 'dzg', 'ebu', 'ee', 'efi', 'egy', 'eka', 'el', 'elx', 'en',
        'en_AU', 'en_CA', 'en_GB', 'en_US', 'enm', 'eo', 'es', 'es_419',
        'es_ES', 'et', 'eu', 'ewo', 'fa', 'fan', 'fat', 'ff', 'fi', 'fil',
        'fiu', 'fj', 'fo', 'fon', 'fr', 'fr_CA', 'fr_CH', 'frm', 'fro', 'frr',
        'frs', 'fur', 'fy', 'ga', 'gaa', 'gay', 'gba', 'gd', 'gem', 'gez',
        'gil', 'gl', 'gmh', 'gn', 'goh', 'gon', 'gor', 'got', 'grb', 'grc',
        'gsw', 'gu', 'guz', 'gv', 'gwi', 'ha', 'hai', 'haw', 'he', 'hi', 'hil',
        'him', 'hit', 'hmn', 'ho', 'hr', 'hsb', 'ht', 'hu', 'hup', 'hy', 'hz',
        'ia', 'iba', 'ibb', 'id', 'ie', 'ig', 'ii', 'ijo', 'ik', 'ilo', 'inc',
        'ine', 'inh', 'io', 'ira', 'iro', 'is', 'it', 'iu', 'ja', 'jbo', 'jgo',
        'jmc', 'jpr', 'jrb', 'jv', 'ka', 'kaa', 'kab', 'kac', 'kaj', 'kam',
        'kar', 'kaw', 'kbd', 'kbl', 'kcg', 'kde', 'kea', 'kfo', 'kg', 'kha',
        'khi', 'kho', 'khq', 'ki', 'kj', 'kk', 'kkj', 'kl', 'kln', 'km', 'kmb',
        'kn', 'ko', 'kok', 'kos', 'kpe', 'kr', 'krc', 'krl', 'kro', 'kru', 'ks',
        'ksb', 'ksf', 'ksh', 'ku', 'kum', 'kut', 'kv', 'kw', 'ky', 'la', 'lad',
        'lag', 'lah', 'lam', 'lb', 'lez', 'lg', 'li', 'lkt', 'ln', 'lo', 'lol',
        'loz', 'lt', 'lu', 'lua', 'lui', 'lun', 'luo', 'lus', 'luy', 'lv',
        'mad', 'maf', 'mag', 'mai', 'mak', 'man', 'map', 'mas', 'mde', 'mdf',
        'mdr', 'men', 'mer', 'mfe', 'mg', 'mga', 'mgh', 'mgo', 'mh', 'mi',
        'mic', 'min', 'mis', 'mk', 'mkh', 'ml', 'mn', 'mnc', 'mni', 'mno',
        'mo', 'moh', 'mos', 'mr', 'ms', 'mt', 'mua', 'mul', 'mun', 'mus', 'mwl',
        'mwr', 'my', 'mye', 'myn', 'myv', 'na', 'nah', 'nai', 'nap', 'naq',
        'nb', 'nd', 'nds', 'ne', 'new', 'ng', 'nia', 'nic', 'niu', 'nl',
        'nl_BE', 'nmg', 'nn', 'nnh', 'no', 'nog', 'non', 'nqo', 'nr', 'nso',
        'nub', 'nus', 'nv', 'nwc', 'ny', 'nym', 'nyn', 'nyo', 'nzi', 'oc', 'oj',
        'om', 'or', 'os', 'osa', 'ota', 'oto', 'pa', 'paa', 'pag', 'pal', 'pam',
        'pap', 'pau', 'peo', 'phi', 'phn', 'pi', 'pl', 'pon', 'pra', 'pro',
        'ps', 'pt', 'pt_BR', 'pt_PT', 'qu', 'raj', 'rap', 'rar', 'rm', 'rn',
        'ro', 'roa', 'rof', 'rom', 'root', 'ru', 'rup', 'rw', 'rwk', 'sa',
        'sad', 'sah', 'sai', 'sal', 'sam', 'saq', 'sas', 'sat', 'sba', 'sbp',
        'sc', 'scn', 'sco', 'sd', 'se', 'see', 'seh', 'sel', 'sem', 'ses', 'sg',
        'sga', 'sgn', 'sh', 'shi', 'shn', 'shu', 'si', 'sid', 'sio', 'sit',
        'sk', 'sl', 'sla', 'sm', 'sma', 'smi', 'smj', 'smn', 'sms', 'sn', 'snk',
        'so', 'sog', 'son', 'sq', 'sr', 'srn', 'srr', 'ss', 'ssa', 'ssy', 'st',
        'su', 'suk', 'sus', 'sux', 'sv', 'sw', 'swb', 'swc', 'syc', 'syr', 'ta',
        'tai', 'te', 'tem', 'teo', 'ter', 'tet', 'tg', 'th', 'ti', 'tig', 'tiv',
        'tk', 'tkl', 'tl', 'tlh', 'tli', 'tmh', 'tn', 'to', 'tog', 'tpi', 'tr',
        'trv', 'ts', 'tsi', 'tt', 'tum', 'tup', 'tut', 'tvl', 'tw', 'twq', 'ty',
        'tyv', 'tzm', 'udm', 'ug', 'uga', 'uk', 'umb', 'und', 'ur', 'uz', 'vai',
        've', 'vi', 'vo', 'vot', 'vun', 'wa', 'wae', 'wak', 'wal', 'war', 'was',
        'wen', 'wo', 'xal', 'xh', 'xog', 'yao', 'yap', 'yav', 'ybb', 'yi', 'yo',
        'ypk', 'yue', 'za', 'zap', 'zbl', 'zen', 'zh', 'zh_Hans', 'zh_Hant',
        'znd', 'zu', 'zun', 'zxx', 'zza',
    );

    protected static $alpha2ToAlpha3 = array (
        'aa' => 'aar',
        'ab' => 'abk',
        'ae' => 'ave',
        'af' => 'afr',
        'ak' => 'aka',
        'am' => 'amh',
        'an' => 'arg',
        'ar' => 'ara',
        'as' => 'asm',
        'av' => 'ava',
        'ay' => 'aym',
        'az' => 'aze',
        'ba' => 'bak',
        'be' => 'bel',
        'bg' => 'bul',
        'bh' => 'bih',
        'bi' => 'bis',
        'bm' => 'bam',
        'bn' => 'ben',
        'bo' => 'bod',
        'br' => 'bre',
        'bs' => 'bos',
        'ca' => 'cat',
        'ce' => 'che',
        'ch' => 'cha',
        'co' => 'cos',
        'cr' => 'cre',
        'cs' => 'ces',
        'cu' => 'chu',
        'cv' => 'chv',
        'cy' => 'cym',
        'da' => 'dan',
        'de' => 'deu',
        'dv' => 'div',
        'dz' => 'dzo',
        'ee' => 'ewe',
        'el' => 'ell',
        'en' => 'eng',
        'eo' => 'epo',
        'es' => 'spa',
        'et' => 'est',
        'eu' => 'eus',
        'fa' => 'fas',
        'ff' => 'ful',
        'fi' => 'fin',
        'fj' => 'fij',
        'fo' => 'fao',
        'fr' => 'fra',
        'fy' => 'fry',
        'ga' => 'gle',
        'gd' => 'gla',
        'gl' => 'glg',
        'gn' => 'grn',
        'gu' => 'guj',
        'gv' => 'glv',
        'ha' => 'hau',
        'he' => 'heb',
        'hi' => 'hin',
        'ho' => 'hmo',
        'hr' => 'hrv',
        'ht' => 'hat',
        'hu' => 'hun',
        'hy' => 'hye',
        'hz' => 'her',
        'ia' => 'ina',
        'id' => 'ind',
        'ie' => 'ile',
        'ig' => 'ibo',
        'ii' => 'iii',
        'ik' => 'ipk',
        'io' => 'ido',
        'is' => 'isl',
        'it' => 'ita',
        'iu' => 'iku',
        'ja' => 'jpn',
        'jv' => 'jav',
        'ka' => 'kat',
        'kg' => 'kon',
        'ki' => 'kik',
        'kj' => 'kua',
        'kk' => 'kaz',
        'kl' => 'kal',
        'km' => 'khm',
        'kn' => 'kan',
        'ko' => 'kor',
        'kr' => 'kau',
        'ks' => 'kas',
        'ku' => 'kur',
        'kv' => 'kom',
        'kw' => 'cor',
        'ky' => 'kir',
        'la' => 'lat',
        'lb' => 'ltz',
        'lg' => 'lug',
        'li' => 'lim',
        'ln' => 'lin',
        'lo' => 'lao',
        'lt' => 'lit',
        'lu' => 'lub',
        'lv' => 'lav',
        'mg' => 'mlg',
        'mh' => 'mah',
        'mi' => 'mri',
        'mk' => 'mkd',
        'ml' => 'mal',
        'mn' => 'mon',
        'mr' => 'mar',
        'ms' => 'msa',
        'mt' => 'mlt',
        'my' => 'mya',
        'na' => 'nau',
        'nb' => 'nob',
        'nd' => 'nde',
        'ne' => 'nep',
        'ng' => 'ndo',
        'nl' => 'nld',
        'nn' => 'nno',
        'nr' => 'nbl',
        'nv' => 'nav',
        'ny' => 'nya',
        'oc' => 'oci',
        'oj' => 'oji',
        'om' => 'orm',
        'or' => 'ori',
        'os' => 'oss',
        'pa' => 'pan',
        'pi' => 'pli',
        'pl' => 'pol',
        'ps' => 'pus',
        'pt' => 'por',
        'qu' => 'que',
        'rm' => 'roh',
        'rn' => 'run',
        'ro' => 'ron',
        'ru' => 'rus',
        'rw' => 'kin',
        'sa' => 'san',
        'sc' => 'srd',
        'sd' => 'snd',
        'se' => 'sme',
        'sg' => 'sag',
        'si' => 'sin',
        'sk' => 'slk',
        'sl' => 'slv',
        'sm' => 'smo',
        'sn' => 'sna',
        'so' => 'som',
        'sq' => 'sqi',
        'sr' => 'srp',
        'ss' => 'ssw',
        'st' => 'sot',
        'su' => 'sun',
        'sv' => 'swe',
        'sw' => 'swa',
        'ta' => 'tam',
        'te' => 'tel',
        'tg' => 'tgk',
        'th' => 'tha',
        'ti' => 'tir',
        'tk' => 'tuk',
        'tn' => 'tsn',
        'to' => 'ton',
        'tr' => 'tur',
        'ts' => 'tso',
        'tt' => 'tat',
        'ty' => 'tah',
        'ug' => 'uig',
        'uk' => 'ukr',
        'ur' => 'urd',
        'uz' => 'uzb',
        've' => 'ven',
        'vi' => 'vie',
        'vo' => 'vol',
        'wa' => 'wln',
        'wo' => 'wol',
        'xh' => 'xho',
        'yi' => 'yid',
        'yo' => 'yor',
        'za' => 'zha',
        'zh' => 'zho',
        'zu' => 'zul',
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

    protected function createDataProvider()
    {
        return new LanguageDataProvider(
            LanguageDataProvider::getResourceDirectory(),
            Intl::getEntryReader()
        );
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

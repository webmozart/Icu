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
use Symfony\Component\Intl\Test\LocaleBundleConsistencyTestCase;
use Symfony\Component\Intl\Util\IcuVersion;

/**
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class IcuLocaleBundleConsistencyTest extends LocaleBundleConsistencyTestCase
{
    // The below arrays document the state of the ICU data bundled with this
    // package. This state is verified in the tests in the base class.
    // You can add arbitrary rules here if you want to document the availability
    // of other locale names.

    protected static $localesWithoutTranslationForAnyLocale = array();

    protected static $localesWithoutTranslationForLocale = array(
        // locales without translation for themselves
        null => array('in', 'iw', 'nmg', 'tl'),

        // locales without translations for the locales given in the keys
        'en' => array(
            'as', 'bo', 'dua', 'fo', 'gv', 'kl', 'kw', 'mgo', 'uz'
        ),
        'fr' => array(
            'as', 'bo', 'dua', 'fo', 'gv', 'kl', 'kw', 'mgo', 'uz'
        ),
        'es' => array(
            'as', 'bo', 'dua', 'fo', 'gv', 'jgo', 'kl', 'kw', 'lo', 'mgo', 'ps',
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

    // Include the locales statically so that the data providers are decoupled
    // from the Intl class. Otherwise tests will fail if the intl extension is
    // not loaded, because it is NOT possible to skip the execution of data
    // providers.
    public static function getLocales()
    {
        return array (
            'af', 'af_NA', 'af_ZA', 'agq', 'agq_CM', 'ak', 'ak_GH',
            'am', 'am_ET', 'ar', 'ar_001', 'ar_AE', 'ar_BH', 'ar_DJ', 'ar_DZ',
            'ar_EG', 'ar_EH', 'ar_ER', 'ar_IL', 'ar_IQ', 'ar_JO', 'ar_KM',
            'ar_KW', 'ar_LB', 'ar_LY', 'ar_MA', 'ar_MR', 'ar_OM', 'ar_PS',
            'ar_QA', 'ar_SA', 'ar_SD', 'ar_SO', 'ar_SY', 'ar_TD', 'ar_TN',
            'ar_YE', 'as', 'as_IN', 'asa', 'asa_TZ', 'az', 'az_AZ', 'az_Cyrl',
            'az_Cyrl_AZ', 'az_Latn', 'az_Latn_AZ', 'bas', 'bas_CM', 'be',
            'be_BY', 'bem', 'bem_ZM', 'bez', 'bez_TZ', 'bg', 'bg_BG', 'bm',
            'bm_ML', 'bn', 'bn_BD', 'bn_IN', 'bo', 'bo_CN', 'bo_IN', 'br',
            'br_FR', 'brx', 'brx_IN', 'bs', 'bs_BA', 'bs_Cyrl', 'bs_Cyrl_BA',
            'bs_Latn', 'bs_Latn_BA', 'ca', 'ca_AD', 'ca_ES', 'cgg', 'cgg_UG',
            'chr', 'chr_US', 'cs', 'cs_CZ', 'cy', 'cy_GB', 'da', 'da_DK', 'dav',
            'dav_KE', 'de', 'de_AT', 'de_BE', 'de_CH', 'de_DE', 'de_LI',
            'de_LU', 'dje', 'dje_NE', 'dua', 'dua_CM', 'dyo', 'dyo_SN', 'dz',
            'dz_BT', 'ebu', 'ebu_KE', 'ee', 'ee_GH', 'ee_TG', 'el', 'el_CY',
            'el_GR', 'en', 'en_150', 'en_AG', 'en_AS', 'en_AU', 'en_BB',
            'en_BE', 'en_BM', 'en_BS', 'en_BW', 'en_BZ', 'en_CA', 'en_CM',
            'en_DM', 'en_FJ', 'en_FM', 'en_GB', 'en_GD', 'en_GG', 'en_GH',
            'en_GI', 'en_GM', 'en_GU', 'en_GY', 'en_HK', 'en_IE', 'en_IM',
            'en_IN', 'en_JE', 'en_JM', 'en_KE', 'en_KI', 'en_KN', 'en_KY',
            'en_LC', 'en_LR', 'en_LS', 'en_MG', 'en_MH', 'en_MP', 'en_MT',
            'en_MU', 'en_MW', 'en_NA', 'en_NG', 'en_NH', 'en_NZ', 'en_PG',
            'en_PH', 'en_PK', 'en_PR', 'en_PW', 'en_RH', 'en_SB', 'en_SC',
            'en_SG', 'en_SL', 'en_SS', 'en_SZ', 'en_TC', 'en_TO', 'en_TT',
            'en_TZ', 'en_UG', 'en_UM', 'en_US', 'en_US_POSIX', 'en_VC', 'en_VG',
            'en_VI', 'en_VU', 'en_WS', 'en_ZA', 'en_ZM', 'en_ZW', 'eo', 'es',
            'es_419', 'es_AR', 'es_BO', 'es_CL', 'es_CO', 'es_CR', 'es_CU',
            'es_DO', 'es_EA', 'es_EC', 'es_ES', 'es_GQ', 'es_GT', 'es_HN',
            'es_IC', 'es_MX', 'es_NI', 'es_PA', 'es_PE', 'es_PH', 'es_PR',
            'es_PY', 'es_SV', 'es_US', 'es_UY', 'es_VE', 'et', 'et_EE', 'eu',
            'eu_ES', 'ewo', 'ewo_CM', 'fa', 'fa_AF', 'fa_IR', 'ff', 'ff_SN',
            'fi', 'fi_FI', 'fil', 'fil_PH', 'fo', 'fo_FO', 'fr', 'fr_BE',
            'fr_BF', 'fr_BI', 'fr_BJ', 'fr_BL', 'fr_CA', 'fr_CD', 'fr_CF',
            'fr_CG', 'fr_CH', 'fr_CI', 'fr_CM', 'fr_DJ', 'fr_DZ', 'fr_FR',
            'fr_GA', 'fr_GF', 'fr_GN', 'fr_GP', 'fr_GQ', 'fr_HT', 'fr_KM',
            'fr_LU', 'fr_MA', 'fr_MC', 'fr_MF', 'fr_MG', 'fr_ML', 'fr_MQ',
            'fr_MR', 'fr_MU', 'fr_NC', 'fr_NE', 'fr_PF', 'fr_RE', 'fr_RW',
            'fr_SC', 'fr_SN', 'fr_SY', 'fr_TD', 'fr_TG', 'fr_TN', 'fr_VU',
            'fr_YT', 'ga', 'ga_IE', 'gl', 'gl_ES', 'gsw', 'gsw_CH', 'gu',
            'gu_IN', 'guz', 'guz_KE', 'gv', 'gv_GB', 'ha', 'ha_GH', 'ha_Latn',
            'ha_Latn_GH', 'ha_Latn_NE', 'ha_Latn_NG', 'ha_NE', 'ha_NG', 'haw',
            'haw_US', 'he', 'he_IL', 'hi', 'hi_IN', 'hr', 'hr_BA', 'hr_HR',
            'hu', 'hu_HU', 'hy', 'hy_AM', 'id', 'id_ID', 'ig', 'ig_NG', 'ii',
            'ii_CN', 'in', 'in_ID', 'is', 'is_IS', 'it', 'it_CH', 'it_IT',
            'it_SM', 'iw', 'iw_IL', 'ja', 'ja_JP', 'ja_JP_TRADITIONAL', 'jgo',
            'jgo_CM', 'jmc', 'jmc_TZ', 'ka', 'ka_GE', 'kab', 'kab_DZ', 'kam',
            'kam_KE', 'kde', 'kde_TZ', 'kea', 'kea_CV', 'khq', 'khq_ML', 'ki',
            'ki_KE', 'kk', 'kk_Cyrl', 'kk_Cyrl_KZ', 'kk_KZ', 'kl', 'kl_GL',
            'kln', 'kln_KE', 'km', 'km_KH', 'kn', 'kn_IN', 'ko', 'ko_KP',
            'ko_KR', 'kok', 'kok_IN', 'ks', 'ks_Arab', 'ks_Arab_IN', 'ks_IN',
            'ksb', 'ksb_TZ', 'ksf', 'ksf_CM', 'kw', 'kw_GB', 'lag', 'lag_TZ',
            'lg', 'lg_UG', 'ln', 'ln_AO', 'ln_CD', 'ln_CF', 'ln_CG', 'lo',
            'lo_LA', 'lt', 'lt_LT', 'lu', 'lu_CD', 'luo', 'luo_KE', 'luy',
            'luy_KE', 'lv', 'lv_LV', 'mas', 'mas_KE', 'mas_TZ', 'mer', 'mer_KE',
            'mfe', 'mfe_MU', 'mg', 'mg_MG', 'mgh', 'mgh_MZ', 'mgo', 'mgo_CM',
            'mk', 'mk_MK', 'ml', 'ml_IN', 'mn', 'mn_Cyrl', 'mn_Cyrl_MN',
            'mn_MN', 'mo', 'mr', 'mr_IN', 'ms', 'ms_BN', 'ms_Latn',
            'ms_Latn_BN', 'ms_Latn_MY', 'ms_Latn_SG', 'ms_MY', 'ms_SG', 'mt',
            'mt_MT', 'mua', 'mua_CM', 'my', 'my_MM', 'naq', 'naq_NA', 'nb',
            'nb_NO', 'nd', 'nd_ZW', 'ne', 'ne_IN', 'ne_NP', 'nl', 'nl_AW',
            'nl_BE', 'nl_CW', 'nl_NL', 'nl_SR', 'nl_SX', 'nmg', 'nmg_CM', 'nn',
            'nn_NO', 'no', 'no_NO', 'no_NO_NY', 'nus', 'nus_SD', 'nyn',
            'nyn_UG', 'om', 'om_ET', 'om_KE', 'or', 'or_IN', 'pa', 'pa_Arab',
            'pa_Arab_PK', 'pa_Guru', 'pa_Guru_IN', 'pa_IN', 'pa_PK', 'pl',
            'pl_PL', 'ps', 'ps_AF', 'pt', 'pt_AO', 'pt_BR', 'pt_CV', 'pt_GW',
            'pt_MO', 'pt_MZ', 'pt_PT', 'pt_ST', 'pt_TL', 'rm', 'rm_CH', 'rn',
            'rn_BI', 'ro', 'ro_MD', 'ro_RO', 'rof', 'rof_TZ', 'ru', 'ru_BY',
            'ru_KG', 'ru_KZ', 'ru_MD', 'ru_RU', 'ru_UA', 'rw', 'rw_RW', 'rwk',
            'rwk_TZ', 'saq', 'saq_KE', 'sbp', 'sbp_TZ', 'seh', 'seh_MZ', 'ses',
            'ses_ML', 'sg', 'sg_CF', 'sh', 'sh_BA', 'sh_CS', 'sh_YU', 'shi',
            'shi_Latn', 'shi_Latn_MA', 'shi_MA', 'shi_Tfng', 'shi_Tfng_MA',
            'si', 'si_LK', 'sk', 'sk_SK', 'sl', 'sl_SI', 'sn', 'sn_ZW', 'so',
            'so_DJ', 'so_ET', 'so_KE', 'so_SO', 'sq', 'sq_AL', 'sq_MK', 'sq_XK',
            'sr', 'sr_BA', 'sr_CS', 'sr_Cyrl', 'sr_Cyrl_BA', 'sr_Cyrl_CS',
            'sr_Cyrl_ME', 'sr_Cyrl_RS', 'sr_Cyrl_XK', 'sr_Cyrl_YU', 'sr_Latn',
            'sr_Latn_BA', 'sr_Latn_CS', 'sr_Latn_ME', 'sr_Latn_RS',
            'sr_Latn_XK', 'sr_Latn_YU', 'sr_ME', 'sr_RS', 'sr_XK', 'sr_YU',
            'sv', 'sv_AX', 'sv_FI', 'sv_SE', 'sw', 'sw_KE', 'sw_TZ', 'sw_UG',
            'swc', 'swc_CD', 'ta', 'ta_IN', 'ta_LK', 'ta_MY', 'ta_SG', 'te',
            'te_IN', 'teo', 'teo_KE', 'teo_UG', 'th', 'th_TH',
            'th_TH_TRADITIONAL', 'ti', 'ti_ER', 'ti_ET', 'tl', 'tl_PH', 'to',
            'to_TO', 'tr', 'tr_CY', 'tr_TR', 'twq', 'twq_NE', 'tzm', 'tzm_Latn',
            'tzm_Latn_MA', 'tzm_MA', 'uk', 'uk_UA', 'ur', 'ur_IN', 'ur_PK',
            'uz', 'uz_AF', 'uz_Arab', 'uz_Arab_AF', 'uz_Cyrl', 'uz_Cyrl_UZ',
            'uz_Latn', 'uz_Latn_UZ', 'uz_UZ', 'vai', 'vai_LR', 'vai_Latn',
            'vai_Latn_LR', 'vai_Vaii', 'vai_Vaii_LR', 'vi', 'vi_VN', 'vun',
            'vun_TZ', 'xog', 'xog_UG', 'yav', 'yav_CM', 'yo', 'yo_NG', 'zh',
            'zh_CN', 'zh_HK', 'zh_Hans', 'zh_Hans_CN', 'zh_Hans_HK',
            'zh_Hans_MO', 'zh_Hans_SG', 'zh_Hant', 'zh_Hant_HK', 'zh_Hant_MO',
            'zh_Hant_TW', 'zh_MO', 'zh_SG', 'zh_TW', 'zu', 'zu_ZA',
        );
    }

    public static function getLocaleAliases()
    {
        return array (
            'az_AZ' => 'az_Latn_AZ',
            'bs_BA' => 'bs_Latn_BA',
            'en_NH' => 'en_VU',
            'en_RH' => 'en_ZW',
            'ha_GH' => 'ha_Latn_GH',
            'ha_NE' => 'ha_Latn_NE',
            'ha_NG' => 'ha_Latn_NG',
            'in' => 'id',
            'in_ID' => 'id_ID',
            'iw' => 'he',
            'iw_IL' => 'he_IL',
            'kk_KZ' => 'kk_Cyrl_KZ',
            'ks_IN' => 'ks_Arab_IN',
            'mn_MN' => 'mn_Cyrl_MN',
            'mo' => 'ro_MD',
            'ms_BN' => 'ms_Latn_BN',
            'ms_MY' => 'ms_Latn_MY',
            'ms_SG' => 'ms_Latn_SG',
            'no' => 'nb',
            'no_NO' => 'nb_NO',
            'no_NO_NY' => 'nn_NO',
            'pa_IN' => 'pa_Guru_IN',
            'pa_PK' => 'pa_Arab_PK',
            'sh' => 'sr_Latn',
            'sh_BA' => 'sr_Latn_BA',
            'sh_CS' => 'sr_Latn_RS',
            'sh_YU' => 'sr_Latn_RS',
            'shi_MA' => 'shi_Tfng_MA',
            'sr_BA' => 'sr_Cyrl_BA',
            'sr_CS' => 'sr_Cyrl_RS',
            'sr_Cyrl_CS' => 'sr_Cyrl_RS',
            'sr_Cyrl_YU' => 'sr_Cyrl_RS',
            'sr_Latn_CS' => 'sr_Latn_RS',
            'sr_Latn_YU' => 'sr_Latn_RS',
            'sr_ME' => 'sr_Latn_ME',
            'sr_RS' => 'sr_Cyrl_RS',
            'sr_XK' => 'sr_Cyrl_XK',
            'sr_YU' => 'sr_Cyrl_RS',
            'tl' => 'fil',
            'tl_PH' => 'fil_PH',
            'tzm_MA' => 'tzm_Latn_MA',
            'uz_AF' => 'uz_Arab_AF',
            'uz_UZ' => 'uz_Cyrl_UZ',
            'vai_LR' => 'vai_Vaii_LR',
            'zh_CN' => 'zh_Hans_CN',
            'zh_HK' => 'zh_Hant_HK',
            'zh_MO' => 'zh_Hant_MO',
            'zh_SG' => 'zh_Hans_SG',
            'zh_TW' => 'zh_Hant_TW',
        );
    }

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
}

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

use Symfony\Component\Intl\ResourceBundle\LocaleBundle;
use Symfony\Component\Intl\ResourceBundle\LocaleBundleInterface;
use Symfony\Component\Intl\ResourceBundle\Reader\StructuredBundleReaderInterface;

/**
 * Alias of {@link LocaleDataProvider}.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 *
 * @deprecated Deprecated since version 2.5, to be removed in Symfony 3.0.
 *             Use {@link LocaleDataProvider} instead.
 */
class IcuLocaleBundle extends LocaleBundle
{
    public function __construct(StructuredBundleReaderInterface $reader)
    {
        parent::__construct(LocaleDataProvider::getResourceDirectory(), $reader);
    }
}

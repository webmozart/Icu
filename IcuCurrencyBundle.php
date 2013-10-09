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

use Symfony\Component\Intl\ResourceBundle\CurrencyBundle;
use Symfony\Component\Intl\ResourceBundle\Reader\StructuredBundleReaderInterface;

/**
 * An ICU-specific implementation of {@link \Symfony\Component\Intl\ResourceBundle\CurrencyBundleInterface}.
 *
 * This class normalizes the data of the ICU .res files to satisfy the contract
 * defined in {@link \Symfony\Component\Intl\ResourceBundle\CurrencyBundleInterface}.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 *
 * @deprecated Deprecated since version 2.5, to be removed in Symfony 3.0.
 *             Use {@link CurrencyDataProvider} instead.
 */
class IcuCurrencyBundle extends CurrencyBundle
{
    public function __construct(StructuredBundleReaderInterface $reader)
    {
        parent::__construct(CurrencyDataProvider::getResourceDirectory(), $reader);
    }
}

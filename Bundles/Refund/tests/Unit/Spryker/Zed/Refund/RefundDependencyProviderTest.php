<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Unit\Spryker\Zed\Refund;

use Spryker\Shared\Library\Currency\CurrencyManagerInterface;
use Spryker\Shared\Library\DateFormatterInterface;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Refund\Dependency\Facade\RefundToSalesAggregatorBridge;
use Spryker\Zed\Refund\Dependency\Plugin\RefundCalculatorPluginInterface;
use Spryker\Zed\Refund\RefundDependencyProvider;
use Spryker\Zed\Sales\Persistence\SalesQueryContainerInterface;

/**
 * @group Unit
 * @group Spryker
 * @group Zed
 * @group Refund
 * @group RefundDependencyProviderTest
 */
class RefundDependencyProviderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @return void
     */
    public function testProvideBusinessLayerDependenciesShouldAddSalesAggregatorFacade()
    {
        $refundDependencyProvider = new RefundDependencyProvider();
        $container = new Container();
        $container = $refundDependencyProvider->provideBusinessLayerDependencies($container);

        $this->assertArrayHasKey(RefundDependencyProvider::FACADE_SALES_AGGREGATOR, $container);
        $this->assertInstanceOf(RefundToSalesAggregatorBridge::class, $container[RefundDependencyProvider::FACADE_SALES_AGGREGATOR]);
    }

    /**
     * @return void
     */
    public function testProvideBusinessLayerDependenciesShouldAddRefundableItemAmountCalculatorPlugin()
    {
        $refundDependencyProvider = new RefundDependencyProvider();
        $container = new Container();
        $container = $refundDependencyProvider->provideBusinessLayerDependencies($container);

        $this->assertArrayHasKey(RefundDependencyProvider::PLUGIN_ITEM_REFUND_CALCULATOR, $container);
        $this->assertInstanceOf(RefundCalculatorPluginInterface::class, $container[RefundDependencyProvider::PLUGIN_ITEM_REFUND_CALCULATOR]);
    }

    /**
     * @return void
     */
    public function testProvideBusinessLayerDependenciesShouldAddRefundableExpenseAmountCalculatorPlugin()
    {
        $refundDependencyProvider = new RefundDependencyProvider();
        $container = new Container();
        $container = $refundDependencyProvider->provideBusinessLayerDependencies($container);

        $this->assertArrayHasKey(RefundDependencyProvider::PLUGIN_ITEM_REFUND_CALCULATOR, $container);
        $this->assertInstanceOf(RefundCalculatorPluginInterface::class, $container[RefundDependencyProvider::PLUGIN_EXPENSE_REFUND_CALCULATOR]);
    }

    /**
     * @return void
     */
    public function testProvideBusinessLayerDependenciesShouldAddSalesQueryContainer()
    {
        $refundDependencyProvider = new RefundDependencyProvider();
        $container = new Container();
        $container = $refundDependencyProvider->provideBusinessLayerDependencies($container);

        $this->assertArrayHasKey(RefundDependencyProvider::QUERY_CONTAINER_SALES, $container);
        $this->assertInstanceOf(SalesQueryContainerInterface::class, $container[RefundDependencyProvider::QUERY_CONTAINER_SALES]);
    }

    /**
     * @return void
     */
    public function testProvideCommunicationLayerDependenciesShouldAddCurrencyManager()
    {
        $refundDependencyProvider = new RefundDependencyProvider();
        $container = new Container();
        $container = $refundDependencyProvider->provideCommunicationLayerDependencies($container);

        $this->assertArrayHasKey(RefundDependencyProvider::CURRENCY_MANAGER, $container);
        $this->assertInstanceOf(CurrencyManagerInterface::class, $container[RefundDependencyProvider::CURRENCY_MANAGER]);
    }

    /**
     * @return void
     */
    public function testProvideCommunicationLayerDependenciesShouldAddDateFormatter()
    {
        $refundDependencyProvider = new RefundDependencyProvider();
        $container = new Container();
        $container = $refundDependencyProvider->provideCommunicationLayerDependencies($container);

        $this->assertArrayHasKey(RefundDependencyProvider::DATE_FORMATTER, $container);
        $this->assertInstanceOf(DateFormatterInterface::class, $container[RefundDependencyProvider::DATE_FORMATTER]);
    }

}
<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductLabelSearch\Communication\Plugin\Event\Listener;

use Spryker\Shared\ProductLabelSearch\ProductLabelSearchConfig;
use Spryker\Zed\Event\Dependency\Plugin\EventBulkHandlerInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @deprecated Use {@link \Spryker\Zed\ProductLabelSearch\Communication\Plugin\Publisher\ProductLabel\ProductLabelWritePublisherPlugin} instead.
 *
 * @method \Spryker\Zed\ProductLabelSearch\Communication\ProductLabelSearchCommunicationFactory getFactory()
 * @method \Spryker\Zed\ProductLabelSearch\Persistence\ProductLabelSearchQueryContainerInterface getQueryContainer()
 * @method \Spryker\Zed\ProductLabelSearch\ProductLabelSearchConfig getConfig()
 * @method \Spryker\Zed\ProductLabelSearch\Business\ProductLabelSearchFacadeInterface getFacade()
 */
class ProductLabelSearchListener extends AbstractPlugin implements EventBulkHandlerInterface
{
    /**
     * @api
     *
     * @param array<\Generated\Shared\Transfer\EventEntityTransfer> $eventEntityTransfers
     * @param string $eventName
     *
     * @return void
     */
    public function handleBulk(array $eventEntityTransfers, $eventName)
    {
        $productLabelIds = $this->getFactory()->getEventBehaviorFacade()->getEventTransferIds($eventEntityTransfers);
        $productAbstractIds = $this->getQueryContainer()->queryProductLabelByProductLabelIds($productLabelIds)->find()->getData();

        $this->getFactory()->getProductPageSearchFacade()->refresh($productAbstractIds, [ProductLabelSearchConfig::PLUGIN_PRODUCT_LABEL_DATA]);
    }
}

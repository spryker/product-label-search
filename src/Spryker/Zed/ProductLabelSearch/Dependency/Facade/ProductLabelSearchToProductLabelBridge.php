<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductLabelSearch\Dependency\Facade;

use Generated\Shared\Transfer\ProductLabelCollectionTransfer;
use Generated\Shared\Transfer\ProductLabelCriteriaTransfer;

class ProductLabelSearchToProductLabelBridge implements ProductLabelSearchToProductLabelInterface
{
    /**
     * @var \Spryker\Zed\ProductLabel\Business\ProductLabelFacadeInterface
     */
    protected $productLabelFacade;

    /**
     * @param \Spryker\Zed\ProductLabel\Business\ProductLabelFacadeInterface $productLabelFacade
     */
    public function __construct($productLabelFacade)
    {
        $this->productLabelFacade = $productLabelFacade;
    }

    /**
     * @param int $idProductAbstract
     *
     * @return array<int>
     */
    public function findLabelIdsByIdProductAbstract($idProductAbstract)
    {
        return $this->productLabelFacade->findLabelIdsByIdProductAbstract($idProductAbstract);
    }

    /**
     * @param \Generated\Shared\Transfer\ProductLabelCriteriaTransfer $productLabelCriteriaTransfer
     *
     * @return \Generated\Shared\Transfer\ProductLabelCollectionTransfer
     */
    public function getProductLabelCollection(
        ProductLabelCriteriaTransfer $productLabelCriteriaTransfer
    ): ProductLabelCollectionTransfer {
        return $this->productLabelFacade->getProductLabelCollection($productLabelCriteriaTransfer);
    }
}

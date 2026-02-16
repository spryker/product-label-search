<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductLabelSearch\Business\Mapper;

use Generated\Shared\Transfer\ProductLabelCollectionTransfer;
use Generated\Shared\Transfer\ProductLabelTransfer;

class ProductLabelMapper implements ProductLabelMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductLabelCollectionTransfer $productLabelCollectionTransfer
     *
     * @return array<int, array<string, list<int>>>
     */
    public function getProductLabelIdsMappedByIdProductAbstractAndStoreName(ProductLabelCollectionTransfer $productLabelCollectionTransfer): array
    {
        $productLabelIdsMap = [];

        foreach ($productLabelCollectionTransfer->getProductLabels() as $productLabelTransfer) {
            $productLabelIdsMap = $this->mapProductLabelTransferToProductLabelIdsByIdProductAbstractAndStoreName(
                $productLabelTransfer,
                $productLabelIdsMap,
            );
        }

        return $productLabelIdsMap;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductLabelTransfer $productLabelTransfer
     * @param array<int, array<string, list<int>>> $productLabelIdsMap
     *
     * @return array<int, array<string, list<int>>>
     */
    protected function mapProductLabelTransferToProductLabelIdsByIdProductAbstractAndStoreName(
        ProductLabelTransfer $productLabelTransfer,
        array $productLabelIdsMap
    ): array {
        foreach ($productLabelTransfer->getStoreRelation()->getStores() as $storeTransfer) {
            foreach ($productLabelTransfer->getProductLabelProductAbstracts() as $productLabelProductAbstract) {
                $productLabelIdsMap[$productLabelProductAbstract->getFkProductAbstractOrFail()][$storeTransfer->getNameOrFail()][] = $productLabelTransfer->getIdProductLabelOrFail();
            }
        }

        return $productLabelIdsMap;
    }
}

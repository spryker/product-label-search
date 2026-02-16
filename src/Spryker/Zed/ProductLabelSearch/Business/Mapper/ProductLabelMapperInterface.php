<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductLabelSearch\Business\Mapper;

use Generated\Shared\Transfer\ProductLabelCollectionTransfer;

interface ProductLabelMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductLabelCollectionTransfer $productLabelCollectionTransfer
     *
     * @return array<int, array<string, list<int>>>
     */
    public function getProductLabelIdsMappedByIdProductAbstractAndStoreName(ProductLabelCollectionTransfer $productLabelCollectionTransfer): array;
}

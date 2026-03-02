<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\OauthAgentConnector\Dependency\Facade;

use Generated\Shared\Transfer\OauthScopeTransfer;

interface OauthAgentConnectorToOauthFacadeInterface
{
    public function saveScope(OauthScopeTransfer $oauthScopeTransfer): OauthScopeTransfer;

    /**
     * @param array<string> $customerScopes
     *
     * @return array<\Generated\Shared\Transfer\OauthScopeTransfer>
     */
    public function getScopesByIdentifiers(array $customerScopes): array;
}

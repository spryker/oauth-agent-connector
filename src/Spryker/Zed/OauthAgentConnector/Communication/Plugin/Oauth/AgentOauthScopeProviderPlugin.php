<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\OauthAgentConnector\Communication\Plugin\Oauth;

use Generated\Shared\Transfer\OauthScopeRequestTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\OauthAgentConnector\OauthAgentConnectorConfig;
use Spryker\Zed\OauthExtension\Dependency\Plugin\OauthScopeProviderPluginInterface;

/**
 * @method \Spryker\Zed\OauthAgentConnector\Business\OauthAgentConnectorFacadeInterface getFacade()
 * @method \Spryker\Zed\OauthAgentConnector\OauthAgentConnectorConfig getConfig()
 */
class AgentOauthScopeProviderPlugin extends AbstractPlugin implements OauthScopeProviderPluginInterface
{
    /**
     * {@inheritDoc}
     * - Returns true if `agent_credentials` grant type is provided.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\OauthScopeRequestTransfer $oauthScopeRequestTransfer
     *
     * @return bool
     */
    public function accept(OauthScopeRequestTransfer $oauthScopeRequestTransfer): bool
    {
        return $oauthScopeRequestTransfer->getGrantType() === OauthAgentConnectorConfig::GRANT_TYPE_AGENT_CREDENTIALS;
    }

    /**
     * {@inheritDoc}
     * - Returns the agent scopes.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\OauthScopeRequestTransfer $oauthScopeRequestTransfer
     *
     * @return array<\Generated\Shared\Transfer\OauthScopeTransfer>
     */
    public function getScopes(OauthScopeRequestTransfer $oauthScopeRequestTransfer): array
    {
        return $this->getFacade()->getScopes($oauthScopeRequestTransfer);
    }
}

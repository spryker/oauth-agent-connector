<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\OauthAgentConnector\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Spryker\Zed\OauthAgentConnector\Business\Adapter\PasswordEncoderAdapter;
use Spryker\Zed\OauthAgentConnector\Business\Adapter\PasswordEncoderAdapterInterface;
use Spryker\Zed\OauthAgentConnector\Business\Installer\AgentOauthScopeInstaller;
use Spryker\Zed\OauthAgentConnector\Business\Installer\AgentOauthScopeInstallerInterface;
use Spryker\Zed\OauthAgentConnector\Business\OauthUserProvider\AgentOauthUserProvider;
use Spryker\Zed\OauthAgentConnector\Business\OauthUserProvider\AgentOauthUserProviderInterface;
use Spryker\Zed\OauthAgentConnector\Business\ScopeProvider\AgentScopeProvider;
use Spryker\Zed\OauthAgentConnector\Business\ScopeProvider\AgentScopeProviderInterface;
use Spryker\Zed\OauthAgentConnector\Dependency\Facade\OauthAgentConnectorToAgentFacadeInterface;
use Spryker\Zed\OauthAgentConnector\Dependency\Facade\OauthAgentConnectorToOauthFacadeInterface;
use Spryker\Zed\OauthAgentConnector\Dependency\Service\OauthAgentConnectorToUtilEncodingServiceInterface;
use Spryker\Zed\OauthAgentConnector\OauthAgentConnectorDependencyProvider;

/**
 * @method \Spryker\Zed\OauthAgentConnector\OauthAgentConnectorConfig getConfig()
 */
class OauthAgentConnectorBusinessFactory extends AbstractBusinessFactory
{
    public function createAgentOauthUserProvider(): AgentOauthUserProviderInterface
    {
        return new AgentOauthUserProvider(
            $this->getAgentFacade(),
            $this->getUtilEncodingService(),
            $this->createPasswordEncoderAdapter(),
        );
    }

    public function createAgentScopeProvider(): AgentScopeProviderInterface
    {
        return new AgentScopeProvider($this->getConfig());
    }

    public function createAgentOauthScopeInstaller(): AgentOauthScopeInstallerInterface
    {
        return new AgentOauthScopeInstaller(
            $this->getOauthFacade(),
            $this->getConfig(),
        );
    }

    public function createPasswordEncoderAdapter(): PasswordEncoderAdapterInterface
    {
        return new PasswordEncoderAdapter();
    }

    public function getAgentFacade(): OauthAgentConnectorToAgentFacadeInterface
    {
        return $this->getProvidedDependency(OauthAgentConnectorDependencyProvider::FACADE_AGENT);
    }

    public function getOauthFacade(): OauthAgentConnectorToOauthFacadeInterface
    {
        return $this->getProvidedDependency(OauthAgentConnectorDependencyProvider::FACADE_OAUTH);
    }

    public function getUtilEncodingService(): OauthAgentConnectorToUtilEncodingServiceInterface
    {
        return $this->getProvidedDependency(OauthAgentConnectorDependencyProvider::SERVICE_UTIL_ENCODING);
    }
}

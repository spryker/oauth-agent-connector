<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\OauthAgentConnector\Business\Adapter;

interface PasswordEncoderAdapterInterface
{
    public function isPasswordValid(string $encoded, string $raw, ?string $salt = null): bool;
}

<?php

namespace Codebarista\NovaWebauthn;

use Laravel\Nova\ResourceTool;

class NovaWebauthn extends ResourceTool
{
    public function name(): string
    {
        return 'Nova WebAuthn';
    }

    public function component(): string
    {
        return 'nova-webauthn';
    }
}

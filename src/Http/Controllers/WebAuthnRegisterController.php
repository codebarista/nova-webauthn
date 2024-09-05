<?php

namespace Codebarista\NovaWebauthn\Http\Controllers;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;
use Laragear\WebAuthn\Http\Requests\AttestationRequest;
use Laragear\WebAuthn\Http\Requests\AttestedRequest;

use function response;

class WebAuthnRegisterController
{
    public function options(AttestationRequest $request): Responsable
    {
        return $request
            ->fastRegistration()
            ->toCreate();
    }

    public function register(AttestedRequest $request): Response
    {
        $request->save();

        return response()->noContent();
    }
}

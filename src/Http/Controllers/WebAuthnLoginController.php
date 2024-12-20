<?php

namespace Codebarista\NovaWebauthn\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;
use Laragear\WebAuthn\Http\Requests\AssertedRequest;
use Laragear\WebAuthn\Http\Requests\AssertionRequest;

use function response;

class WebAuthnLoginController
{
    /**
     * @throws BindingResolutionException
     */
    public function options(AssertionRequest $request): Responsable
    {
        return $request->toVerify($request->validate(['email' => 'sometimes|email|string']));
    }

    public function login(AssertedRequest $request): Response
    {
        $login = $request->login();

        if ($login && $var = config('nova-webauthn.session.disable_2fa_var')) {
            $request->session()->put($var, true);
        }

        return response()->noContent($login ? 204 : 422);
    }
}

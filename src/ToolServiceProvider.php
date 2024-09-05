<?php

namespace Codebarista\NovaWebauthn;

use Codebarista\NovaWebauthn\Console\Commands\WebAuthnSetup;
use Codebarista\NovaWebauthn\Http\Controllers\WebAuthnLoginController;
use Codebarista\NovaWebauthn\Http\Controllers\WebAuthnRegisterController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laragear\WebAuthn\Http\Routes as WebAuthnRoutes;
use Laravel\Nova\Nova;

class ToolServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'nova-webauthn');

        $this->app->booted(function () {
            $this->config();
            $this->routes();
        });

        Nova::serving(static function () {
            $localeFile = lang_path('vendor/nova-webauthn/' . app()->getLocale() . '.json');

            Nova::script('nova-webauthn', __DIR__ . '/../dist/js/tool.js');
            Nova::style('nova-webauthn', __DIR__ . '/../dist/css/tool.css');

            if (File::exists($localeFile)) {
                Nova::translations($localeFile);
            }
        });
    }

    public function register(): void
    {
        $this->commands([
            WebAuthnSetup::class,
        ]);
    }

    protected function routes(): void
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        $prefix = trim(config('nova.path'), '/') . '/webauthn';

        Route::middleware(['nova'])->prefix($prefix)
            ->group(__DIR__ . '/../routes/web.php');

        WebAuthnRoutes::register(
            attestController: WebAuthnRegisterController::class,
            assertController: WebAuthnLoginController::class,
        );
    }

    protected function config(): void
    {
        $path = rtrim(config('nova.path'), '/');

        config([
            'auth.providers.users.driver' => 'eloquent-webauthn',
            'auth.providers.users.password_fallback' => true,
            'nova.routes.login' => $path . '/webauthn/login',
        ]);
    }
}

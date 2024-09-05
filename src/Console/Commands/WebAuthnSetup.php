<?php

namespace Codebarista\NovaWebauthn\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Laragear\WebAuthn\WebAuthnServiceProvider;

class WebAuthnSetup extends Command
{
    /**
     * @var string
     */
    protected $signature = 'codebarista:webauthn-setup';

    /**
     * @var string
     */
    protected $description = 'Setup Laragear WebAuthn to use with Nova';

    public function handle(): int
    {
        if (Schema::hasTable('webauthn_credentials')) {
            $this->components->info('Laragear WebAuthn is already there.');

            return self::SUCCESS;
        }

        $this->publishLaragearWebAuthn();

        $this->components->info('Laragear WebAuthn has been installed.');

        return self::SUCCESS;
    }

    private function publishLaragearWebAuthn(): void
    {
        $command = 'vendor:publish';
        $tags = [
            'migrations'
        ];

        foreach ($tags as $tag) {
            $this->call($command, [
                '--provider' => WebAuthnServiceProvider::class,
                '--tag' => $tag,
            ]);
        }

        $this->call('migrate');
    }
}

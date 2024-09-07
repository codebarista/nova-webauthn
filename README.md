# Nova WebAuthn

[Laragear WebAuthn](https://github.com/Laragear/WebAuthn) implementation for Laravel Nova to authenticate users with
passkeys: fingerprints, patterns and biometrics.

![Laravel Nova Passkey Login](https://github.com/user-attachments/assets/a785a28d-1580-4fc9-8f39-b9cb07442d77)

## 1. Installation

```shell
composer require codebarista/nova-webauthn
```

## 2. Setup

Run the following command to publish and run the Laragear WebAuthn migrations.

```shell
php artisan codebarista:webauthn-setup
```

## 3. Implementation

Add the `WebAuthnAuthenticatable` contract and the `WebAuthnAuthentication` trait to the User class, or any other that
uses authentication.

```php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laragear\Webauthn\Contracts\WebAuthnAuthenticatable;
use Laragear\Webauthn\WebAuthnAuthentication;

class User extends Authenticatable implements WebAuthnAuthenticatable
{
    use WebAuthnAuthentication;

    // ...
}
```

Finally, add the `NovaWebauthn` registration form to the fields array of the Nova User Resource.

```php
namespace App\Nova;

use Codebarista\NovaWebauthn\NovaWebauthn;
use Laravel\Nova\Http\Requests\NovaRequest;

class User extends Resource
{
    public function fields(NovaRequest $request): array
    {
        return [
            // ...
            NovaWebauthn::make(),
        ];
    }
}
```

**Note: Make sure that passkey registration and login are done via a secure https connection.**

![Laravel Nova Passkey Registration](https://github.com/user-attachments/assets/6234d24b-666c-4c10-a8db-0e0c28838373)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (in_array(Schema::getConnection()->getDriverName(), ['mysql', 'mariadb'], true)) {
            Schema::table('webauthn_credentials', static function (Blueprint $table) {
                $table->char('aaguid', 36)->nullable()->change();
            });
        }
    }

    public function down(): void
    {
        Schema::table('webauthn_credentials', static function (Blueprint $table) {
            $table->uuid('aaguid')->nullable()->change();
        });
    }
};

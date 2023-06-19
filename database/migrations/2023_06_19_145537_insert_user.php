<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        \App\Models\User::create([
            'name' => 'Renata',
            'email' => 'rentcourt2000@yahoo.com.br',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
        ]);

        \App\Models\User::create([
            'name' => 'Ana Claudia',
            'email' => 'correiaalmeida@yahoo.com.br',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

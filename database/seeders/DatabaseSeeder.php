<?php

namespace Database\Seeders;

use DevIdkwhoami\PanelPlugin\Models\Tenant;
use DevIdkwhoami\PanelPlugin\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $tenant = Tenant::create([
            'name' => 'Test Tenant',
            'owner_id' => $user->id,
        ]);

        $user->tenants()->attach($tenant);

    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        if (!Role::where('name', 'admin')->exists()) {
            Role::create(['name' => 'admin']);
        }
        if (!Role::where('name', 'specialist')->exists()) {
            Role::create(['name' => 'specialist']);
        }
        if (!Role::where('name', 'patient')->exists()) {
            Role::create(['name' => 'patient']);
        }
        if (!Role::where('name', 'owner')->exists()) {
            Role::create(['name' => 'owner']);
        }
    

    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
        'name' => 'Administrator',
        'username' => 'kominfo01',
        'role' => 'admin',
        'email' => 'admin@surabaya.go.id',
        'password' => Hash::make('12345'),
      ]);
      User::factory()->count(50)->create();
    }
}

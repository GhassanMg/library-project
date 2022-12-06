<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name' => 'Ghassan',
            'last_name' => 'Al-Moghrabe',
            'phone' => '0993355478',
            'address' => 'Damas / Baramkeh',
            'password' => 'Admin@2022',
        ]);
        $user->assignRole('admin');
    }
}

<?php

namespace Database\Seeders\Accounts;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminAccount extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Populate Admin Table

        Admin::create([
            'username' => 'jayson',
            'password' => Hash::make('123'),
            'first_name' => strtoupper('Jayson'),
            'middle_name' => strtoupper('Daluyon'),
            'last_name' => strtoupper('Daluyon'),
            'email_address' => 'jayson123@gmail.com',
            'account_status' => 'ACTIVE'
        ]);
    }
}

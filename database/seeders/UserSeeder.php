<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\BankInfo;
use App\Models\Earning;
use App\Models\User;
use App\Models\UserTask;
use App\Models\Wallet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        // $user = User::create([
        //     'fullname' => 'Test User',
        //     'email' => 'user@gmail.com',
        //     'password' => Hash::make('12345678'),
        // ]);

        // BankInfo::create([
        //     'user_id' => $user->id,
        // ]);

        // UserTask::create([
        //     'user_id' => $user->id,
        // ]);

        // Wallet::create([
        //     'user_id' => $user->id,
        // ]);

        // Earning::create([
        //     'user_id' => $user->id,
        // ]);
    }
}

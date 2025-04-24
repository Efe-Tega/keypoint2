<?php

namespace Database\Seeders;

use App\Models\MembershipList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MembershipListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MembershipList::factory()->count(15)->create();
    }
}

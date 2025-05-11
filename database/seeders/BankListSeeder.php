<?php

namespace Database\Seeders;

use App\Models\BankList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BankList::insert([
            ['bank_name' => 'Access Bank'],
            ['bank_name' => 'Alpha Morgan Bank'],
            ['bank_name' => 'CashX'],
            ['bank_name' => 'Citibank Bank'],
            ['bank_name' => 'Dot Microfinance Bank'],
            ['bank_name' => 'Ecobank'],
            ['bank_name' => 'FairMoney Microfinance Bank'],
            ['bank_name' => 'Fidelity Bank'],
            ['bank_name' => 'First Bank Nigeria'],
            ['bank_name' => 'First City Monument Bank'],
            ['bank_name' => 'Globus Bank'],
            ['bank_name' => 'Guaranty Trust Bank'],
            ['bank_name' => 'Kuda Bank'],
            ['bank_name' => 'Keystone Bank'],
            ['bank_name' => 'Mkobo MFB'],
            ['bank_name' => 'Mint Finex MFB'],
            ['bank_name' => 'Moniepoint Microfinance Bank'],
            ['bank_name' => 'Nova Commercial Bank'],
            ['bank_name' => 'Opay bank'],
            ['bank_name' => 'Optimus bank'],
            ['bank_name' => 'Palmpay bank'],
            ['bank_name' => 'Parallax Bank'],
            ['bank_name' => 'Polaris Bank'],
            ['bank_name' => 'Premium Trust Bank'],
            ['bank_name' => 'Providus Bank'],
            ['bank_name' => 'Pryme App'],
            ['bank_name' => 'Raven Bank'],
            ['bank_name' => 'Rex Microfinance Bank'],
            ['bank_name' => 'Rubies Bank'],
            ['bank_name' => 'Signature Bank'],
            ['bank_name' => 'Sparkle Bank'],
            ['bank_name' => 'Stanbic IBTC Bank'],
            ['bank_name' => 'Standard Chartered Bank'],
            ['bank_name' => 'Sterling Bank'],
            ['bank_name' => 'SunTrust Bank'],
            ['bank_name' => 'Titan Trust Bank'],
            ['bank_name' => 'Union Bank of Nigeria'],
            ['bank_name' => 'United Bank for Africa'],
            ['bank_name' => 'Unity Bank'],
            ['bank_name' => 'VFD Microfinance Bank'],
            ['bank_name' => 'Wema Bank'],
            ['bank_name' => 'Zenith Bank'],
        ]);
    }
}

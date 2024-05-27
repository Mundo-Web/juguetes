<?php

namespace Database\Seeders;

use App\Models\PolyticsCondition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PolyticsDevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PolyticsCondition::create([
            'content' => 'Initial terms and conditions content.'
        ]);
    }
}

<?php

// database/seeders/PortfolioCategorySeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PortfolioCategory;
use Illuminate\Support\Str;

class PortfolioCategorySeeder extends Seeder {
    public function run(): void {
        $categories = [
            'IT Consultation',
            'Data Security',
            'Website Development',
            'UI/UX Design',
            'Cloud Service',
            'Game Development'
        ];

        foreach($categories as $cat) {
            PortfolioCategory::create([
                'name' => $cat,
                'slug' => Str::slug($cat)
            ]);
        }
    }
}

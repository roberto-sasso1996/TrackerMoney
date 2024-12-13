<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $categories = [
            'Cibo',
            'Trasporti',
            'Shopping',
            'Intrattenimento',
            'Salute',
            'Educazione',
            'Viaggi', 
            'Casa' , 
            'Machina', 
            'Hobby', 
            'Lavoro' , 
            'Extra'
        ];
        foreach ($categories as $categoryName) {
            Category::create([
                'name' => $categoryName,
            ]);
        }
    }
}

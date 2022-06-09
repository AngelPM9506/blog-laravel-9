<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Nanotecnología', 
            'Materiales 1D',
            'Materiales 2D',
            'Materiales 3D',
        ];    
        foreach($categories as $category){
            DB::table('categories')->insert([
                'title'=> $category,
                'slug'=> $category
            ]);
        }
    }
}

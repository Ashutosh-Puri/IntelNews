<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
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
        Category::create( [
            'id'=>1,
            'category_name'=>'Cities',
            'category_slug'=>'cities',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );
            
            
                        
            Category::create( [
            'id'=>2,
            'category_name'=>'Education',
            'category_slug'=>'education',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );
            
            
                        
            Category::create( [
            'id'=>3,
            'category_name'=>'Videos',
            'category_slug'=>'videos',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );
            
            
                        
            Category::create( [
            'id'=>4,
            'category_name'=>'Science',
            'category_slug'=>'science',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );
            
            
                        
            Category::create( [
            'id'=>5,
            'category_name'=>'India',
            'category_slug'=>'india',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );
            
            
                        
            Category::create( [
            'id'=>6,
            'category_name'=>'Trends',
            'category_slug'=>'trends',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );
    }
}

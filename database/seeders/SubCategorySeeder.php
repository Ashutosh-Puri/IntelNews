<?php

namespace Database\Seeders;


use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Subcategory::create( [
            'id'=>1,
            'category_id'=>5,
            'subcategory_name'=>'India Global',
            'subcategory_slug'=>'india-global',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );
            
            
                        
            Subcategory::create( [
            'id'=>2,
            'category_id'=>1,
            'subcategory_name'=>'Pune',
            'subcategory_slug'=>'pune',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );
            
            
                        
            Subcategory::create( [
            'id'=>3,
            'category_id'=>1,
            'subcategory_name'=>'Sangamner',
            'subcategory_slug'=>'sangamner',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );
            
            
                        
            Subcategory::create( [
            'id'=>4,
            'category_id'=>2,
            'subcategory_name'=>'Exam',
            'subcategory_slug'=>'exam',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );
            
            
                        
            Subcategory::create( [
            'id'=>5,
            'category_id'=>2,
            'subcategory_name'=>'Campus',
            'subcategory_slug'=>'campus',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );
            
                
            
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [ 'Business','Science','Technology'];
        
        foreach( $categories as $category){
            Category::create([
                'name' => $category
            ]);
        }

    }
}

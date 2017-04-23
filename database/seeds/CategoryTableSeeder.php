<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category([
            'name' => 'Guarniciones',
        ]);
        $category->save();

        $category = new Category([
            'name' => 'Postres',
        ]);
        $category->save();        
    }
}

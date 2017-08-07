<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // l'ordre dans lequel on doit faire l'insertion des données d'exemple
        // 
        $this->call(UsersTableSeeder::class); 
        $this->call(CategoriesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(RobotsTableSeeder::class);
    }
}

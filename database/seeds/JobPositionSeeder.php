<?php

use Illuminate\Database\Seeder;
use App\Models\JobPosition;

class JobPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobPosition::create([
            'name' => 'Frontend Developer',
            'city' => 'Beograd',
            'link' => 'https://quantox.com',
        ]);
        JobPosition::create([
            'name' => 'Senior PHP Developer',
            'city' => 'Beograd',
            'link' => 'https://quantox.com',
        ]);
        JobPosition::create([
            'name' => 'PHP Developer',
            'city' => 'Beograd',
            'link' => 'https://quantox.com',
        ]);
        JobPosition::create([
            'name' => 'Ruby on Rails Developer',
            'city' => 'Beograd',
            'link' => 'https://quantox.com',
        ]);
        JobPosition::create([
            'name' => 'Clojure Developer',
            'city' => 'Svi gradovi',
            'link' => 'https://quantox.com',
        ]);
        JobPosition::create([
            'name' => 'Crypto Project Community Manager',
            'city' => 'Svi gradovi',
            'link' => 'https://quantox.com',
        ]);
        JobPosition::create([
            'name' => 'NodeJS Developer',
            'city' => 'Svi gradovi',
            'link' => 'https://quantox.com',
        ]);
        JobPosition::create([
            'name' => 'Python Developer',
            'city' => 'Svi gradovi',
            'link' => 'https://quantox.com',
        ]);
        JobPosition::create([
            'name' => 'Java Deveoper',
            'city' => 'Svi gradovi',
            'link' => 'https://quantox.com',
        ]);
        JobPosition::create([
            'name' => 'Java QA Deveoper',
            'city' => 'Svi gradovi',
            'link' => 'https://quantox.com',
        ]);
        JobPosition::create([
            'name' => 'DevOps Engineer',
            'city' => 'Svi gradovi',
            'link' => 'https://quantox.com',
        ]);
        JobPosition::create([
            'name' => 'Blockchain Developer',
            'city' => 'Svi gradovi',
            'link' => 'https://quantox.com',
        ]);
        JobPosition::create([
            'name' => 'Frontend Developer',
            'city' => 'Kragujevac',
            'link' => 'https://quantox.com',
        ]);
        JobPosition::create([
            'name' => 'PHP Developer',
            'city' => 'Kragujevac',
            'link' => 'https://quantox.com',
        ]);
        JobPosition::create([
            'name' => 'Frontend Developer',
            'city' => 'Niš',
            'link' => 'https://quantox.com',
        ]);
        JobPosition::create([
            'name' => 'PHP Developer',
            'city' => 'Niš',
            'link' => 'https://quantox.com',
        ]);
    }
}

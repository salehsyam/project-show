<?php

use App\Models\Admin;
use App\Models\Supervisor;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Admin::class)->create([
            'name' => 'Saleh syam',
            'email' => 'Saleh@admin.com',
        ]);
        factory(Supervisor::class)->create([
            'name' => 'Mohamed ',
            'email' => 'themsaid@admin.com',
        ]);
        factory(Supervisor::class)->create([
            'name' => 'Dries',
            'email' => 'dries@admin.com',
        ]);
        factory(Admin::class)->create([
            'name' => 'Jeffrey ',
            'email' => 'jeffrey@admin.com',
        ]);
        factory(Supervisor::class)->create([
            'name' => 'Tom ',
            'email' => 'dev@admin.com',
        ]);
        factory(Supervisor::class)->create([
            'name' => 'Jonas ',
            'email' => 'mail@admin.com',
        ]);
       

    }
}

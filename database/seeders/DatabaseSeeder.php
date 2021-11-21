<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\CategoryHelp;
use App\Models\Help;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        User::factory(3)->create();

        Category::create([
            'name' => 'Produk',
            'slug' => 'produk'
        ]);
        Category::create([
            'name' => 'Teknologi',
            'slug' => 'teknologi'
        ]);
        Category::create([
            'name' => 'Pembayaran',
            'slug' => 'pembayaran'
        ]);

        Post::factory(20)->create();

        CategoryHelp::create([
            'name' => 'Feature',
            'slug' => 'feature'
        ]);
        CategoryHelp::create([
            'name' => 'Aplication',
            'slug' => 'aplication'
        ]);
        CategoryHelp::create([
            'name' => 'Payment',
            'slug' => 'payment'
        ]);

        Help::factory(20)->create();

        // User::create([
        //     'name' => 'Arif Yudha Wibisono',
        //     'email' => 'arifyudhawibisono@gmail.com',
        //     'password'=> bcrypt('12345')
        // ]);
        // User::create([
        //     'name' => 'Hankodes',
        //     'email' => 'kodes@gmail.com',
        //     'password'=> bcrypt('12345')
        // ]);

    }
}

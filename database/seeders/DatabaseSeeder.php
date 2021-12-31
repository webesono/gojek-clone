<?php

namespace Database\Seeders;

use App\Models\Help;
use App\Models\Post;
use App\Models\User;
use App\Models\Leader;
use App\Models\Product;
use App\Models\Category;
use App\Models\CategoryHelp;
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
       
        User::create([
            'name' => 'SuperAdmin',
            'username'=> 'superadmin',
            'email' => 'admin@gmail.com',
            'password'=> bcrypt('password'),
            'status' => 1,
            'photo' => 'photo/TxF64E1qzKBUUCo9LnQI80b6RUbKCCFuF54KPKRL.png'
        ]);

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

        Post::factory(8)->create();

        CategoryHelp::create([
            'name' => 'fitur',
            'slug' => 'fitur'
        ]);
        CategoryHelp::create([
            'name' => 'Aplication',
            'slug' => 'aplication'
        ]);
        CategoryHelp::create([
            'name' => 'Payment',
            'slug' => 'payment'
        ]);

        Help::factory(8)->create();

        Product::create([
            'name' => 'Glontor',
            'productImage' =>'product-images/scooter.jpg',
            'excerpt' => 'Glontor, adalah singkatan dari Glone Motor yang merupakan produk jasa pertama dari kami.',
            'body' =>'<p>Glontor, adalah singkatan dari Glone Motor yang merupakan produk jasa pertama dari kami. Glontor merupakan jasa transportasi menggunakan sepeda motor<p>'
        ]);
        Product::create([
            'name' => 'Glocar',
            'productImage' =>'product-images/car.jpg',
            'excerpt' => 'Glocar, merupakan produk jasa kedua dari kami.',
            'body' =>'<p>Glocar, merupakan produk jasa kedua dari kami Glocar merupakan jasa transportasi menggunakan mobil<p>'
        ]);

        Leader::factory(5)->create();

    }
}

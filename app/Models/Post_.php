<?php

namespace App\Models;



class Post 
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author"=> "Arif Yudha Wibisono",
            "body"  => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus temporibus magnam, ipsum quasi quaerat quis beatae, debitis vitae aut,eum deserunt soluta. Nemo quisquam magnam tempora error perferendis rerum animi."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author"=> "Arif Yudha Wibisono",
            "body"  => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis totam dolor illum labore error pariatur, cumque eius voluptatum nobis aliquid consequuntur asperiores iure, dignissimos rem distinctio minus. Quibusdam adipisci fuga animi nihil, sit similique eaque tempora? Tenetur nam recusandae asperiores mollitia vel, aliquid minima nobis ab illum deleniti sapiente atque, soluta omnis ad cupiditate nostrum doloremque obcaecati. Explicabo cupiditate iure et, molestias perferendis consectetur quasi nam dolorum placeat, laborum molestiae quisquam quia doloribus aliquam eveniet dolores quae eius velit temporibus omnis. Modi quia, aliquid odio maxime in voluptas fugiat blanditiis nihil consequatur a ipsam quam ratione aperiam aspernatur ab minima."
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug',$slug);
    }
}

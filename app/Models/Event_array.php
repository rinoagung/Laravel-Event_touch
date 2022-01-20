<?php

namespace App\Models;

class Event
{
    private static $data_Events = [
        [
            "title" => "Judul Event Pertama",
            "slug" => "judul-event-pertama",
            "author" => "Bob",
            "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus quo fugit, magnam maiores nulla facere distinctio quaerat nostrum laudantium fuga adipisci laborum quae tempore repellat optio ipsum ab rerum quibusdam ex voluptate quisquam, magni veniam nam. Quod consequatur mollitia sapiente ullam est itaque, ipsam possimus, blanditiis provident dolorem, architecto iure. Dolore ipsam placeat, illum odio ex officiis fuga recusandae! Eligendi necessitatibus excepturi quasi ratione animi quia architecto. Quasi ullam distinctio architecto quos explicabo enim vel."
        ],
        [
            "title" => "Judul Event Kedua",
            "slug" => "judul-event-kedua",
            "author" => "Pooh",
            "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Obcaecati repellendus numquam magni? Eos beatae cupiditate esse ducimus magni officiis autem quod impedit provident magnam distinctio cum iste a quos nihil vel eius soluta recusandae ratione officia, laboriosam ab dicta quia. Facilis, perspiciatis distinctio! Maxime consequatur nisi consectetur esse libero quisquam rerum, ullam recusandae, aperiam neque, iure beatae non? Perspiciatis, sint temporibus esse nihil consectetur vitae beatae, cumque voluptatibus ipsam at ut iusto earum fugiat autem fugit a perferendis rem distinctio eaque debitis. Illum impedit modi unde, voluptatum autem repudiandae esse dolor nam consequuntur vel facilis ea eveniet quidem maiores exercitationem!"
        ],
    ];

    public  static function all()
    {
        return collect(self::$data_Events);
    }

    public static function find($slug)
    {
        $events = static::all();

        // $event = [];
        // foreach ($events as $e) {
        //     if ($e["slug"] === $slug) {
        //         $event = $e;
        //     }
        // }

        return $events->firstWhere("slug", $slug);
    }
}

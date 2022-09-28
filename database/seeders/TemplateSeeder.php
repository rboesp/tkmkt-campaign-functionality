<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    public $data = [
        "attrs" => [
            "width" => 380,
            "height" => 380,
            "scaleX" => 0.35185185185185186,
            "scaleY" => 0.35185185185185186
        ],
        "className" => "Stage",
        "children" => [
            [
                "attrs" => [],
                "className" => "Layer",
                "children" => [
                    [
                        "attrs" => [
                            "width" => 1080,
                            "height" => 1080,
                            "listening" => false,
                            "image_type" => "background"
                        ],
                        "className" => "Image"
                    ],
                    [
                        "attrs" => [
                            "width" => 1080,
                            "height" => 1080,
                            "listening" => false,
                            "image_type" => "background"
                        ],
                        "className" => "Image"
                    ]
                ]
            ],
            [
                "attrs" => [],
                "className" => "Layer",
                "children" => [
                    [
                        "attrs" => [
                            "x" => 583.4645669291342,
                            "y" => 46.85039370078741,
                            "width" => 200,
                            "height" => 50,
                            "strokeWidth" => 60,
                            "draggable" => true,
                            "image_type" => "logo",
                            "scaleX" => 2.1622047244094516,
                            "scaleY" => 5.025196850393697
                        ],
                        "className" => "Image"
                    ],
                    [
                        "attrs" => [
                            "x" => 0,
                            "y" => 380,
                            "text" => 'example text',
                            "fontSize" => 100,
                            "fontFamily" => 'Calibri',
                            "fill" => 'WHITE',
                        ],
                        "className" => "Text"
                    ],
                    [
                        "attrs" => [
                            "fill" => "rgba(0,0,255,0.5)",
                            "visible" => false
                        ],
                        "className" => "Rect"
                    ]
                ]
            ],
            [
                "attrs" => [],
                "className" => "Layer",
                "children" => [
                    [
                        "attrs" => [
                            "x" => 50,
                            "y" => 50,
                            "width" => 200,
                            "height" => 200,
                            "strokeWidth" => 10,
                            "draggable" => true
                        ],
                        "className" => "Image"
                    ]
                ]
            ],
            [
                "attrs" => [],
                "className" => "Layer",
                "children" => [
                    [
                        "attrs" => [
                            "x" => 50,
                            "y" => 350,
                            "width" => 400,
                            "height" => 237,
                            "strokeWidth" => 10,
                            "draggable" => true
                        ],
                        "className" => "Image"
                    ]
                ]
            ],
            [
                "attrs" => [],
                "className" => "Layer",
                "children" => []
            ],
            [
                "attrs" => [],
                "className" => "Layer",
                "children" => [
                    [
                        "attrs" => [
                            "x" => 44.01574803149604,
                            "y" => 89.3700787401575,
                            "draggable" => true
                        ],
                        "className" => "Image"
                    ]
                ]
            ],
            [
                "attrs" => [],
                "className" => "Layer",
                "children" => [
                    [
                        "attrs" => [
                            "x" => 10,
                            "y" => 50,
                            "draggable" => true
                        ],
                        "className" => "Image"
                    ]
                ]
            ]
        ]
    ];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Template::create([
            "name" => "template1",
            "description" => "campaign testing",
            "data" => json_encode($this->data)
        ]);
    }
}

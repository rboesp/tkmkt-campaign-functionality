<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Inventory::create([
            "make" => "volvo",
            "model" => "xc90",
            "text" => "Get your volvo XC90 today!",
            "background_img" => "/assets/xc90.jpg",
            "logo_img" => "/assets/volvo_dealer.png"
        ]);
        Inventory::create([
            "make" => "infiniti",
            "model" => "g30",
            "text" => "Life is better in an infiniti...",
            "background_img" => "/assets/qx60.jpg",
            "logo_img" => "/assets/infiniti_dealer.png"
        ]);
    }
}

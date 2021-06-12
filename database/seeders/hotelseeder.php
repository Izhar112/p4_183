<?php

namespace Database\Seeders;
use App\Models\hotel;
use Illuminate\Database\Seeder;

class hotelseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $htl1 = new hotel();
        $htl1->pengunjung ="183";
        $htl1->nama_hotel = "Oval";
        $htl1->save();

        $htl2 = new hotel();
        $htl2->pengunjung ="1461800183";
        $htl2->nama_hotel = "Satelit";
        $htl2->save();

        $htl3 = new hotel();
        $htl3->pengunjung ="0183";
        $htl3->nama_hotel = "DVasa";
        $htl3->save();
    }
}

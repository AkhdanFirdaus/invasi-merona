<?php

namespace Database\Seeders;

use App\Models\Artikel;
use App\Models\JadwalRumahSakit;
use App\Models\RumahSakit;
use App\Models\User;
use App\Models\Vaksin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $rs = new RumahSakit();
        $rs->name = "Hasan Sajiwa";
        $rs->address = "Jl. Raya Hasan Sajiwa No.1";
        $rs->quota_per_day = 20;
        $rs->save();

        $adminApp  = new User();
        $adminApp->name = "Admin APP";
        $adminApp->email = "admin@admin.com";
        $adminApp->password = Hash::make('admin');
        $adminApp->gender = 1;
        $adminApp->role = 1;
        $adminApp->save();

        $adminRS  = new User();
        $adminRS->rumah_sakit_id = 1;
        $adminRS->name = "Admin RS HS";
        $adminRS->email = "admin@rshs.com";
        $adminRS->password = Hash::make('admin');
        $adminRS->gender = 1;
        $adminRS->no_telp = "0832134xxx";
        $adminRS->address = "Jl. jalan road street";
        $adminRS->birth_date = \Carbon\Carbon::now()->subYears(10);
        $adminRS->role = 2;
        $adminRS->save();

        $user  = new User();
        $user->name = "User";
        $user->email = "user@gmail.com";
        $user->password = Hash::make('password');
        $user->gender = 1;
        $user->no_telp = "0832134xxx";
        $user->address = "Jl. jalan aja jadiang nggak";
        $user->birth_date = \Carbon\Carbon::now()->subYears(20);
        $user->role = 3;
        $user->save();

        $jadwalRS = new JadwalRumahSakit();
        $jadwalRS->rumah_sakit_id = $rs->id;
        $jadwalRS->start = 07;
        $jadwalRS->end = 21;
        $jadwalRS->day = "Minggu";
        $jadwalRS->save();


        $artikel = new Artikel();
        $artikel->title = "Judul Pertama";
        $artikel->content = "Konten Pertama";
        $artikel->user_id = $adminApp->id;
        $artikel->save();

        $artikel2 = new Artikel();
        $artikel2->title = "Judul Kedua";
        $artikel2->content = "Konten Kedua";
        $artikel2->user_id = $adminRS->id;
        $artikel2->save();

        $vaksin = new Vaksin();
        $vaksin->name = "Vaksin Sinovack";
        $vaksin->description = "Vaksin ini adalah vaksin";
        $vaksin->user_id = $adminRS->id;
        $vaksin->save();
    }
}

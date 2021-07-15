<?php

namespace Database\Seeders;

use App\Models\MailAttribute;
use Illuminate\Database\Seeder;

class MailAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'PERMOHONAN',
            "code" => 'PRMHN',
            "color" => '#1bcfb4',
        ]);

        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'PEBERITAHUAN',
            "code" => 'PBRTHN',
            "color" => '#ffd500',
        ]);

        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'KETERANGAN',
            "code" => 'KTRGN',
            "color" => '#1bcfb4',
        ]);

        MailAttribute::create([
            "type" => 'Tipe',
            'name' => 'UNDANGAN',
            "code" => 'UNDGN',
            "color" => '#c3bdbd',
        ]);

        // Mail Reference
        MailAttribute::create([
            "type" => 'Sifat',
            'name' => 'Umum',
            "code" => 'UM',
            "color" => '#fe5678',
        ]);

        MailAttribute::create([
            "type" => 'Sifat',
            'name' => 'Tertutup',
            "code" => 'TRTP',
            "color" => '#ffd500',
        ]);

        MailAttribute::create([
            "type" => 'Sifat',
            'name' => 'Rahasia',
            "code" => 'RHS',
            "color" => '#1bcfb4',
        ]);

        // Mail Priority
        MailAttribute::create([
            "type" => 'Prioritas',
            'name' => 'Biasa',
            "code" => 'BS',
            "color" => '#1bcfb4',
        ]);

        MailAttribute::create([
            "type" => 'Prioritas',
            'name' => 'Segera',
            "code" => 'SGR',
            "color" => '#ffd500',
        ]);

        MailAttribute::create([
            "type" => 'Prioritas',
            'name' => 'Mendesak',
            "code" => 'MNDSK',
            "color" => '#fe5678',
        ]);
    }
}

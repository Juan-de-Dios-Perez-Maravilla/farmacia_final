<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistribuidoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('distribuidores')->insert(['laboratorio' => 'Hasler','direccion' => 'C. Tunez 19','telefono' => '3316352790',]);
        DB::table('distribuidores')->insert(['laboratorio' => 'Meissen','direccion' => 'C. José Encarnación Rosas 1051','telefono' => '3311359812',]);
        DB::table('distribuidores')->insert(['laboratorio' => 'Nartex','direccion' => 'C. Emilio Castelar 184','telefono' => '3310322890',]);
        DB::table('distribuidores')->insert(['laboratorio' => 'Gliser','direccion' => 'Av 8 de julio 1896','telefono' => '3307256720',]);
    }
}

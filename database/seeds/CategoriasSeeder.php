<?php

use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'nome' => "Alimentos"
        ]);

        DB::table('categorias')->insert([
            'nome' => "Limpeza"
        ]);

        DB::table('categorias')->insert([
            'nome' => "Eletronicos"
        ]);
    }
}

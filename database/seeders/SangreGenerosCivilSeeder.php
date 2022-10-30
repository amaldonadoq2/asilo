<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Generos;
use App\Models\EstadosCivil;
use App\Models\TiposSangre;

class SangreGenerosCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertarGeneros();
        $this->insertarEstadosCivil();
        $this->insertarTiposSangre();
    }

    public function insertarGeneros(){
        //DB::table('generos')->truncate();
        $nombres = [
            'Masculino',
            'Femenino'
        ];
        foreach ($nombres as $key => $nombre) {
           Generos::create([
                'nombre' => $nombre,
            ]);
        }
    }

    public function insertarEstadosCivil(){
        //DB::table('estados_civil')->truncate();
        $nombres = [
            'Soltero',
            'Casado'
        ];
        foreach ($nombres as $key => $nombre) {
           EstadosCivil::create([
                'nombre' => $nombre,
            ]);
        }
    }

    public function insertarTiposSangre(){
        //DB::table('tipos_sangre')->truncate();
        $nombres = [
            'O Positivo',
            'A Negativo'
        ];
        foreach ($nombres as $key => $nombre) {
           TiposSangre::create([
                'nombre' => $nombre,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create(['image'=>'/storage/usuario/reSCabc5MRgn7C5wAlm5J8G2JTOQTjIJ9vi23faJ.jpg','nombre'=>'ANGELO MARCOS','apellido'=>'AVILES VALENZUELA'
        ,'email'=>'aavilesv@unemi.edu.ec','cedula'=>'0927990242',
        'direccion'=>'MILAGRO PEDRO CARBO Y CHIMBORAZO','telefono'=>'09891427551',
        'nacimiento'=>'1995-05-02',
        'email_verified_at' => now(),
        'password'=>bcrypt('quantika324'),'remember_token'=>Str::random(10)])->assignRole('Administrativo');

        
        
        User::create(['image'=>'/storage/usuario/kB87IIKvMZOeF3heejrZZjWu5khBeOCbQomJ7Do0.jpg','nombre'=>'CARLOS EDUARDO','apellido'=>'BARRERA VINUEZA'
        ,'email'=>'eb026058@gmail.com','cedula'=>'0955440326',
        'direccion'=>'CDLA SAN ELIAS CALLE AMAZONAS Y GENERAL CORDOVA','telefono'=>'0961196166',
        'nacimiento'=>'2000-04-28',
        'email_verified_at' => now(),
        'password'=>bcrypt('quantika324'),'remember_token'=>Str::random(10)])->assignRole('Soporte1');


        User::create(['image'=>'/storage/usuario/kmZAjD8O9JG28Zi3hXrueW3xCPJE1pVUCDra6wA9.jpg','nombre'=>'JOHNNY SAMUEL','apellido'=>'CEDEÑO RIOS'
        ,'email'=>'cedenojohnny15@gmail.com','cedula'=>'0928067263',
        'direccion'=>'CDLA XAVIER MARCOS AV 9 DE OCTUBRE Y OSWALDO BACUY','telefono'=>'0999912611',
        'nacimiento'=>'2000-12-12',
        'email_verified_at' => now(),
        'password'=>bcrypt('quantika324'),'remember_token'=>Str::random(10)])->assignRole('Soporte1');


        User::create(['image'=>'/storage/usuario/pvH82JlpBTJT3VAh05JXFqbshsx5PWwkPbbnhIcj.jpg','nombre'=>'KERLY DENNISSE','apellido'=>'MÉNDEZ VALENCIA'
        ,'email'=>'kerlydennissemv@outlook.com','cedula'=>'0921634291',
        'direccion'=>'CDLA XAVIER MARCOS 3ERA CALLE IVAN DIAZ','telefono'=>'0990751117',
        'nacimiento'=>'1995-09-26',
        'email_verified_at' => now(),
        'password'=>bcrypt('quantika324'),'remember_token'=>Str::random(10)])->assignRole('Soporte');


        User::create(['image'=>'/storage/usuario/QMvIzPwgtEQt8lu3Yit1RCnihp3UztULDs9R7phL.jpg','nombre'=>'VICTOR EDUARDO','apellido'=>'MOLINA SIMANCA'
        ,'email'=>'victoreduardotecnology@gmail.com','cedula'=>'6105418112',
        'direccion'=>'CDLA XAVIER MARCOS CALLE JOSE FERRIN','telefono'=>'0980676080',
        'nacimiento'=>'1993-07-07',
        'email_verified_at' => now(),
        'password'=>bcrypt('quantika324'),'remember_token'=>Str::random(10)])->assignRole('Soporte1');


        User::create(['image'=>'/storage/usuario/u63lqiEX08HRoqUUABNsFTMOZzMWD0BD2F1UBAhE.jpg','nombre'=>'EVELYN ANABELLE','apellido'=>'ORTIZ LEON'
        ,'email'=>'evaortizl21@gmail.com','cedula'=>'0919069948',
        'direccion'=>'CDLA SANTA MARGARITA AV GUAYAQUIL Y 24 DE MAYO','telefono'=>'0960636911',
        'nacimiento'=>'1993-02-09',
        'email_verified_at' => now(),
        'password'=>bcrypt('quantika324'),'remember_token'=>Str::random(10)])->assignRole('Administrativo');
       


        User::create(['image'=>'/storage/usuario/0ITyy1IW9eBHA6TXqpMcBqgxNtcUwKR93CrK4XYg.jpg','nombre'=>'LUIS CRISTOBAL','apellido'=>'ROSALES CEVALLOS'
        ,'email'=>'luisaxel2021@outlook.com','cedula'=>'0928416973',
        'direccion'=>'CDLA JAIME ROLDOS CALLE NICOLAS BARRERA Y CARMEN BARRERA','telefono'=>'0962096997',
        'nacimiento'=>'1990-09-20',
        'email_verified_at' => now(),
        'password'=>bcrypt('quantika324'),'remember_token'=>Str::random(10)])->assignRole('Soporte1');


    }
}

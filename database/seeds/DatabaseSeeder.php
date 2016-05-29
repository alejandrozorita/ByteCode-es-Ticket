<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->truncarTablas(array(
            'users',
            'tickets',
            'ticket_comentarios',
            'ticket_votos'
        ));

        $this->call('UserTableSeeder');
        $this->call('TicketTableSeeder');
        $this->call('TicketVotoTableSeeder');
        $this->call('TicketComentarioTableSeeder');
    }



    private function truncarTablas(array $tablas)
    {

        //Con esta instrucción, evitamos que revise las claves foraneas
        $this->revisarClavesExternas(false);

        foreach ($tablas as $tabla) {
            DB::table($tabla)->truncate();
        }

        //Con esta instrucción, Volvemos a activar la revisión de las claves foraneas
        $this->revisarClavesExternas(true);
    }


    /**
     * Revisamos las claves foreaneas
     */
    private function revisarClavesExternas($revisar)
    {
        $revisar = $revisar ? '1': '0';
        DB::statement('SET foreign_key_checks = ' . $revisar . ';');
    }
}

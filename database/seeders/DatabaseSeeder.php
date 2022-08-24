<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Publication;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Nildson',
            'email' => 'nildsond@gmail.com',
            'password' => bcrypt('12345678'),
            'super_admin' => true,
            'cpf' => '61222785307',
            'phone' => '9800000000'
        ]);

        for ($i=1; $i < 10; $i++) { 
            $evento = Event::create([
                'name' => 'Evento '.$i,
                'description' => 'Evento Teste teste stevtstshdbsajd sd sajd sajdsadsa djasd jas djs djsa djs djsa djasjdasjdjsd js djasjd sajd asjd asj djas djasd jas ',
                'active' => true,
                'start_registration_volunteers' => now(),
                'end_registration_volunteers' => now(),
                'start_registration_schools' => now(),
                'end_registration_schools' => now()
            ]);

            for ($j=1; $j <=3 ; $j++) { 
                Publication::create([
                    'name' => 'Publicação '.$j,
                    'order' => $j,
                    'link' => '#',
                    'id_events' => $evento->id_events
                ]);
            }
        }

        
        // \App\Models\User::factory(10)->create();
    }
}

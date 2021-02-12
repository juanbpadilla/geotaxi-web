<?php

use Illuminate\Database\Seeder;

use App\Message;
use Carbon\Carbon;
class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Message::truncate();

        // for ($i=1 ; $i < 101 ; $i++)
        // {
        //     Message::create([
        //         'nombre' => "Usuario{$i}",
        //         'email' => "usuario{$i}@email.com",
        //         'mensaje' => "Este es el mensaje del usuario {$i}",
        //         'created_at' => Carbon::now()->subDays(100)->addDays($i)
        //     ]);
        // }
    }
}


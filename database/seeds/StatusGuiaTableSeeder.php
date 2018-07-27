<?php

use Illuminate\Database\Seeder;
use App\Models\Agendamento\Guia\Status;

class StatusGuiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itens = ['Pendente', 'Pago'];

        foreach ($itens as $key => $item) {
            $status = new Status();
            $status->nome = $item;
            $status->save();
        }
    }
}

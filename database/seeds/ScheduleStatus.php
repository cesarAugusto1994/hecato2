<?php

use Illuminate\Database\Seeder;
use App\Models\Schedule\Status;

class ScheduleStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itens = [
          [
            'nome' => 'Pendente',
            'label' => 'pendente',
          ],
          [
            'nome' => 'Em Andamento',
            'label' => 'em_andamento',
          ],
          [
            'nome' => 'Finalzada',
            'label' => 'finalizada',
          ],
          [
            'nome' => 'Cancelada',
            'label' => 'cancelada',
          ],
        ];

        foreach ($itens as $key => $item) {
            $status = new Status();
            $status->nome = $item['nome'];
            $status->label = $item['label'];
            $status->save();
        }
    }
}

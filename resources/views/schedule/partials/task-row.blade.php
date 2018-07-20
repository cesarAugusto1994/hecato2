<tr>
    @if($task->status_id != 3 || $task->status_id != 4)
    <td>
      @if($task->status_id == 1)
        {!! Form::model($task, array('action' => ['ScheduleController@iniciarAgendamento', $task->uuid], 'method' => 'PUT', 'class'=>'form-inline', 'style' => 'display:inline-block', 'role' => 'form')) !!}
            <label for="completed-{{ $task->id }}" class="mdl-js-ripple-effect">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Iniciar</button>
                <span class="mdl-checkbox__label sr-only">Complete Task</span>
            </label>
        {!! Form::close() !!}
      @elseif($task->status_id == 2)
        {!! Form::model($task, array('action' => ['ScheduleController@finalizarAgendamento', $task->uuid], 'method' => 'PUT', 'class'=>'form-inline', 'style' => 'display:inline-block', 'role' => 'form')) !!}
            <label for="completed-{{ $task->id }}" class="mdl-js-ripple-effect">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Finalizar</button>
                <span class="mdl-checkbox__label sr-only">Complete Task</span>
            </label>
        {!! Form::close() !!}
      @endif

      @if($task->status_id == 1 || $task->status_id == 2)
        {!! Form::model($task, array('action' => ['ScheduleController@cancelarAgendamento', $task->uuid], 'method' => 'PUT', 'class'=>'form-inline', 'style' => 'display:inline-block', 'role' => 'form')) !!}
            <label for="completed-{{ $task->id }}" class="mdl-js-ripple-effect">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Cancelar</button>
                <span class="mdl-checkbox__label sr-only">Complete Task</span>
            </label>
        {!! Form::close() !!}
      @endif
    </td>
    @endif

    <td class="mdl-data-table__cell--non-numeric hide-mobile">
        {{ $task->id }}
    </td>

    <td class="mdl-data-table__cell--non-numeric">
        {{ $task->pessoa->nome }}
    </td>

    <td class="mdl-data-table__cell--non-numeric hide-mobile">
        {{ $task->inicio->format('d/m/Y H:i') }}
    </td>

    <td class="mdl-data-table__cell--non-numeric hide-mobile">
        {{ $task->fim->format('d/m/Y H:i') }}
    </td>

    <td class="mdl-data-table__cell--non-numeric hide-mobile">
        {{ $task->notas }}
    </td>

    <td class="mdl-data-table__cell--non-numeric">
        @if ($task->status->id === 3)
            <span class="badge mdl-color--green-400 mdl-color-text--white">
                {{ $task->status->nome }}
            </span>
        @ELSEIF ($task->status->id === 2)
            <span class="badge mdl-color--blue-400 mdl-color-text--white">
                {{ $task->status->nome }}
            </span>
        @else
            <span class="badge mdl-color--red-400 mdl-color-text--white">
                {{ $task->status->nome }}
            </span>
        @endif
    </td>



    <td class="mdl-data-table__cell--non-numeric">

          @if($task->status_id != 3 && $task->status_id != 4)

              <a href="{{ route('schedule.edit', $task->id) }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                  <i class="material-icons mdl-color-text--grey-700">edit</i>
                  <span class="sr-only">Edit Task</span>
              </a>
              {!! Form::open(array('class' => 'inline-block', 'id' => 'delete_'.$task->id, 'method' => 'DELETE', 'route' => array('schedule.destroy', $task->id))) !!}
                  {{ method_field('DELETE') }}
                  <a href="#" class="dialog-button dialiog-trigger-delete dialiog-trigger{{$task->id}} mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" data-taskid="{{$task->id}}">
                      <i class="material-icons mdl-color-text--grey-700">delete_forever</i>
                      <span class="sr-only">Delete Task</span>
                  </a>
              {!! Form::close() !!}

          @endif
    </td>



</tr>

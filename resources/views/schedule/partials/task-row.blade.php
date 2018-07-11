<tr>
    <td>
        {!! Form::model($task, array('action' => ['ScheduleController@update', $task->id], 'method' => 'PUT', 'class'=>'form-inline', 'role' => 'form')) !!}
            <label for="completed-{{ $task->id }}" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                {!! Form::hidden('pessoa_id', $task->name, ['id' => 'task-name-'.$task->name]) !!}
                {!! Form::hidden('notas', $task->description, ['id' => 'task-description-'.$task->id]) !!}
                {!! Form::checkbox('status_id', 1, $task->status_id, ['id' => 'completed-'.$task->id, 'class' => 'mdl-checkbox__input','onClick' => 'this.form.submit()']) !!}
                <span class="mdl-checkbox__label sr-only">Complete Task</span>
            </label>
        {!! Form::close() !!}
    </td>

    <td class="mdl-data-table__cell--non-numeric hide-mobile">
        {{ $task->id }}
    </td>

    <td class="mdl-data-table__cell--non-numeric">
        {{ $task->pessoa->nome }}
    </td>

    <td class="mdl-data-table__cell--non-numeric hide-mobile">
        {{ $task->notas }}
    </td>

    <td class="mdl-data-table__cell--non-numeric">
        @if ($task->status->id === 3)
            <span class="badge mdl-color--green-400 mdl-color-text--white">
                {{ $task->status->nome }}
            </span>
        @else
            <span class="badge mdl-color--red-400 mdl-color-text--white">
                {{ $task->status->nome }}
            </span>
        @endif
    </td>

    <td class="mdl-data-table__cell--non-numeric">
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
    </td>

</tr>

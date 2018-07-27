@extends('layouts.dashboard')

@section('template_title')
    Minhas Tarefas
@endsection

@section('template_fastload_css')
@endsection

@section('header')
    Minhas Tarefas
@endsection

@section('breadcrumbs')

    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="{{url('/')}}">
            <span itemprop="name">
                {{ trans('titles.app') }}
            </span>
        </a>
        <i class="material-icons">chevron_right</i>
        <meta itemprop="position" content="1" />
    </li>
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="active">
        <a itemprop="item" href="" class="">
            <span itemprop="name">
                Minhas Tarefas
            </span>
        </a>
        <meta itemprop="position" content="2" />
    </li>

@endsection

@section('content')

        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">

            <div class="mdl-tabs__tab-bar">
                <a href="#all" class="mdl-tabs__tab is-active">Todas</a>
                <a href="#incomplete" class="mdl-tabs__tab">Incompletas</a>
                <a href="#complete" class="mdl-tabs__tab">Completadas</a>
            </div>

            @include('tasks/partials/task-tab', ['tab' => 'all', 'tasks' => $tasks, 'title' => 'Todas Tarefas', 'status' => 'is-active'])
            @include('tasks/partials/task-tab', ['tab' => 'incomplete', 'tasks' => $tasksInComplete, 'title' => 'Tarefas Incompletas'])
            @include('tasks/partials/task-tab', ['tab' => 'complete', 'tasks' => $tasksComplete, 'title' => 'Tarefas Completadas'])

        </div>

        @include('dialogs.dialog-delete', ['dialogTitle' => 'Confirmar Exclusão', 'dialogSaveBtnText' => 'Remover'])



@endsection

@section('footer_scripts')

    @if (count($tasks) > 0)

        @include('scripts.mdl-datatables')

        <script type="text/javascript">

            @foreach ($tasks as $task)
                mdl_dialog('.dialiog-trigger{{$task->id}}','','#dialog_delete');
            @endforeach

            var taskId;

            $('.dialiog-trigger-delete').click(function(event) {
                event.preventDefault();
                taskId = $(this).attr('data-taskid');
            });

            $('#confirm').click(function(event) {
                $('form#delete_'+taskId).submit();
            });

        </script>

    @else

    @include('scripts.mdl-required-input-fix')

        <script type="text/javascript">
            mdl_dialog('.dialog-button-save');
            mdl_dialog('.dialog-button-icon-save');
        </script>

    @endif

@endsection

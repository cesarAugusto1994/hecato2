@extends('layouts.dashboard')

@section('template_title')
    Editar Agendamento
@endsection

@section('header')
    Editar Agendamento
@endsection

@if($task->completed == '1')
    @php
        $breadcrumb_status_link     = '/tasks-complete';
        $breadcrumb_status_title    = 'Complete';
    @endphp
@elseif($task->completed == '0')
    @php
        $breadcrumb_status_link     = '/tasks-incomplete';
        $breadcrumb_status_title    = 'Incomplete';
    @endphp
@endif

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
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="/schedule">
            <span itemprop="name">
                Agenda
            </span>
        </a>
        <i class="material-icons">chevron_right</i>
        <meta itemprop="position" content="2" />
    </li>


@endsection

@section('content')

    <div class="mdl-grid full-grid margin-top-0 padding-0">
        <div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">
            <div class="mdl-color--grey-50 mdl-color-text--white mdl-card mdl-shadow--2dp" style="width:100%;" itemscope itemtype="https://schema.org/Person">

                <div class="mdl-card__title mdl-card--expand mdl-color--primary mdl-color-text--white">
                    <h2 class="mdl-card__title-text">
                        Editar Agendamento
                    </h2>
                </div>

                {!! Form::model($task, array('action' => array('ScheduleController@update', $task->id), 'method' => 'PUT', 'role' => 'form')) !!}

                    <div class="mdl-card__supporting-text">
                        <div class="mdl-grid full-grid padding-0">
                            <div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">

                                <div class="mdl-grid ">

                                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('name') ? 'is-invalid' :'' }}">
                                            {!! Form::hidden('pessoa_id', $task->pessoa->id) !!}
                                            {!! Form::text('paciente', $task->pessoa->nome, array('id' => 'name', 'readonly' => true, 'class' => 'mdl-textfield__input mdl-color-text--grey-700')) !!}
                                            {!! Form::label('paciente', 'Paciente', array('class' => 'mdl-textfield__label mdl-color-text--grey-700')); !!}
                                            <span class="mdl-textfield__error">Task name is required</span>
                                        </div>
                                    </div>

                                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth {{ $errors->has('user_level') ? 'is-invalid' :'' }}">
                                            {!! Form::select('status_id', array('0' => 'Pendente', '1' => 'Em Andamento', '3' => 'Finalizado', '4' => 'Cancelado'), $task->status_id, array('class' => 'mdl-selectfield__select mdl-textfield__input mdl-color-text--grey-700', 'id' => 'status')) !!}
                                            <label for="completed">
                                                <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                                            </label>
                                            {!! Form::label('status_id', 'Status', array('class' => 'mdl-textfield__label mdl-selectfield__label mdl-color-text--grey-700')); !!}
                                            <span class="mdl-textfield__error"></span>
                                        </div>
                                    </div>

                                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('name') ? 'is-invalid' :'' }}">
                                            {!! Form::text('inicio', $task->inicio->format('d/m/Y H:i'), array('id' => 'task-name', 'class' => 'mdl-textfield__input mdl-color-text--black datetime')) !!}
                                            {!! Form::label('inicio', 'Início', array('class' => 'mdl-textfield__label mdl-color-text--black')); !!}
                                            <span class="mdl-textfield__error">Task name is required</span>
                                        </div>
                                    </div>

                                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('name') ? 'is-invalid' :'' }}">
                                            {!! Form::text('fim', $task->fim->format('d/m/Y H:i'), array('id' => 'task-name', 'class' => 'mdl-textfield__input mdl-color-text--black datetime')) !!}
                                            {!! Form::label('fim', 'Fim', array('class' => 'mdl-textfield__label mdl-color-text--black')); !!}
                                            <span class="mdl-textfield__error">Task name is required</span>
                                        </div>
                                    </div>

                                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('description') ? 'is-invalid' :'' }}">
                                            {!! Form::textarea('notas', NULL, array('id' => 'description', 'class' => 'mdl-textfield__input mdl-color-text--grey-700')) !!}
                                            {!! Form::label('notas', 'Descrição', array('class' => 'mdl-textfield__label mdl-color-text--grey-700')); !!}
                                            <span class="mdl-textfield__error"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="mdl-card__actions padding-top-0">
                        <div class="mdl-grid padding-top-0">
                            <div class="mdl-cell mdl-cell--12-col padding-top-0 margin-top-0 margin-left-1-1">

                                {{-- SAVE BUTTON--}}
                                <span class="save-actions">
                                    {!! Form::button('Salvar', array('class' => 'dialog-button-save mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--primary mdl-color-text--white mdl-button--raised margin-bottom-1 margin-top-1 margin-top-0-desktop margin-right-1 padding-left-1 padding-right-1 ')) !!}
                                </span>

                                @permission('delete.agenda')

                                {{-- DELETE TASK BUTTON--}}
                                {!! Form::button('Remover', array('class' => 'dialog-button-delete mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--accent mdl-button-colored mdl-color-text--white mdl-button--raised margin-bottom-1 margin-top-1 margin-top-0-desktop padding-left-1 padding-right-1 ')) !!}

                                @endpermission

                            </div>
                        </div>
                    </div>

                    <div class="mdl-card__menu mdl-color-text--white">



                    </div>

                    @include('dialogs.dialog-save')

                {!! Form::close() !!}

                {!! Form::open(array('class' => '', 'id' => 'delete', 'method' => 'Remover', 'route' => array('schedule.destroy', $task->id))) !!}
                    {{ method_field('DELETE') }}
                    @include('dialogs.dialog-delete', ['dialogTitle' => 'Confirmar Remoção', 'dialogSaveBtnText' => 'Remover'])
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')

    @include('scripts.mdl-required-input-fix')

    <script type="text/javascript">
        mdl_dialog('.dialog-button-save');
        mdl_dialog('.dialog-button-icon-save');
        mdl_dialog('.dialog-button-delete','.dialog-delete-close','#dialog_delete');
        mdl_dialog('.dialog-button-delete-icon','.dialog-delete-close','#dialog_delete');
    </script>

@endsection

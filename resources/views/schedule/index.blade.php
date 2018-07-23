@extends('layouts.dashboard')

@section('template_title')
    Agenda
@endsection

@section('template_fastload_css')
@endsection

@section('header')
    Agenda
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
                Agenda
            </span>
        </a>
        <meta itemprop="position" content="2" />
    </li>

@endsection

@section('content')

    <div class="mdl-grid full-grid margin-top-0 padding-0">

    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">

        <div class="mdl-tabs__tab-bar">
            <a href="#all" class="mdl-tabs__tab is-active">Todos</a>
            <a href="#incomplete" class="mdl-tabs__tab">Pendentes</a>
            <a href="#complete" class="mdl-tabs__tab">Finalizados</a>
            <a href="#cancelados" class="mdl-tabs__tab">Cancelados</a>
        </div>

        @include('schedule/partials/task-tab', ['tab' => 'all', 'tasks' => $tasks, 'title' => 'Agendamentos', 'status' => 'is-active'])
        @include('schedule/partials/task-tab', ['tab' => 'incomplete', 'tasks' => $tasksInComplete, 'title' => 'Agendamentos Pendentes'])
        @include('schedule/partials/task-tab', ['tab' => 'complete', 'tasks' => $tasksComplete, 'title' => 'Agendamentos Finalizados'])
        @include('schedule/partials/task-tab', ['tab' => 'cancelados', 'tasks' => $tasksCancelados, 'title' => 'Agendamentos Cancelados'])

    </div>

    @include('dialogs.dialog-delete', ['dialogTitle' => 'Confirmar exclusão', 'dialogSaveBtnText' => 'Excluir'])


        <div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp">
            <div class=" mdl-color-text--white  mdl-shadow--2dp" style="width:100%;" itemscope itemtype="https://schema.org/Person">

                <div class="mdl-card__title mdl-color--primary mdl-card--expand mdl-color-text--white">
                    <h4 class="mdl-card__title-text">
                        Agenda
                    </h4>
                </div>

                <div style="padding:2em">

                    <div class="calendar mdl-color-text--grey-700"></div>

                </div>

            </div>
        </div>
    </div>

    <dialog id="dialog" class="mdl-dialog">
      <h3 class="mdl-dialog__title">Agendamento</h3>

      {!! Form::model(new App\Models\Schedule, ['route' => ['schedule.store'], 'class'=>'formAgendamento', 'role' => 'form']) !!}

      <div class="mdl-dialog__content">

        <div class="mdl-grid ">

          <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                <input type="text" value="" name="pessoa" class="mdl-textfield__input" id="schedule-pessoa-id" readonly required>
                <input type="hidden" value="" name="pessoa_id" id="schedule-pessoa" required>
                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                <label for="schedule-pessoa-id" class="mdl-textfield__label mdl-color-text--grey-700">Cliente</label>
                <ul for="schedule-pessoa-id" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                  @foreach(\App\Models\Pessoa::all() as $pessoa)
                    <li class="mdl-menu__item" data-val="{{ $pessoa->id }}">{{ $pessoa->nome }}</li>
                  @endforeach
                </ul>
            </div>
          </div>

          <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('start') ? 'is-invalid' :'' }}">
                  {!! Form::text('inicio', NULL, array('id' => 'schedule-inicio', 'class' => 'mdl-textfield__input mdl-color-text--grey-700 datetime')) !!}
                  {!! Form::label('inicio', 'Início', array('class' => 'mdl-textfield__label mdl-color-text--grey-700')); !!}
                  <span class="mdl-textfield__error">Task name is required</span>
              </div>
          </div>

          <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('start') ? 'is-invalid' :'' }}">
                  {!! Form::text('fim', NULL, array('id' => 'schedule-fim', 'class' => 'mdl-textfield__input mdl-color-text--grey-700 datetime')) !!}
                  {!! Form::label('fim', 'Fim', array('class' => 'mdl-textfield__label mdl-color-text--grey-700')); !!}
                  <span class="mdl-textfield__error">Task name is required</span>
              </div>
          </div>

          <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('description') ? 'is-invalid' :'' }}">
                  {!! Form::textarea('notas', NULL, array('id' => 'schedule-notas', 'class' => 'mdl-textfield__input mdl-color-text--black', 'rows' => 3)) !!}
                  {!! Form::label('notas', 'Notas', array('class' => 'mdl-textfield__label mdl-color-text--black')); !!}
                  <span class="mdl-textfield__error"></span>
              </div>
          </div>

        </div>

      </div>
      <div class="mdl-dialog__actions">
        <button type="submit" class="mdl-button">Salvar</button>
        <button type="button" class="mdl-button dialog-button-close">Fechar</button>
      </div>

      @include('dialogs.dialog-save')

      {!! Form::close() !!}
    </dialog>

    <input type="hidden" id="agendamentos-json" value="{{ route('agendamentos_json') }}">
    <input type="hidden" id="atualizar-agendamento-route" value="{{ route('atualizar_agendamento') }}">
    <input type="hidden" id="store-agendamento-route" value="{{ route('schedule.store') }}">

@endsection

@section('footer_scripts')

    @include('scripts.mdl-datatables')

    <script src="{{asset('js/fullcalendar/moment.min.js')}}"></script>
    <script src="{{asset('js/fullcalendar/fullcalendar.min.js')}}"></script>

    <script type="text/javascript">


      var atualizarAgendamento = $("#atualizar-agendamento-route").val();
      var adicionarAgendamento = $("#store-agendamento-route").val();

     var dialog = document.querySelector('#dialog');

     if (! dialog.showModal) {
       dialogPolyfill.registerDialog(dialog);
     }

     dialog.querySelector('button:not([submit])')
     .addEventListener('click', function() {
        dialog.close();
     });

     var dialogButtonClose = document.querySelector('.dialog-button-close');

     dialogButtonClose.addEventListener('click', function() {
       dialog.close();
     });

     function popularModal(event) {

       var evento = event.id;

       $(".formAgendamento").prop('action', atualizarAgendamento);

       //$("#cadastra-consulta-modal").modal('show');
       //$("#cadastra-consulta-modal").find('#title').val(event.title);

       $("#schedule-inicio").val(event.start.format('DD/MM/YYYY HH:mm'));
       $("#schedule-fim").val(event.end.format('DD/MM/YYYY HH:mm'));

       //$('#schedule-status').val(event.paciente);

       $('#schedule-pessoa').val(event.pessoaId);
       $("#schedule-notas").val(event.notas);

       //$("#formConsultaModal").submit();

       $.ajax({
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
         type: "POST",
         url: $(".formAgendamento").attr('action'),
         data: {
           id : evento,
           inicio: $("#schedule-inicio").val(),
           fim: $("#schedule-fim").val(),
           pessoa: $("#schedule-pessoa").val(),
           notas: $("#schedule-notas").val()
         },
         dataType: 'json',
         success: function (data) {
             //openSwalScreenProgress();
         },
         error: function (data) {
             //openSwalMessage('Erro', data.message);
         }
       })


     }

     function popularModalAndShow(event) {
       $(".formAgendamento").prop('action', atualizarAgendamento);

       //$("#cadastra-consulta-modal").modal('show');
       //$("#cadastra-consulta-modal").find('#title').val(event.title);

       $("#schedule-inicio").val(event.start.format('DD/MM/YYYY HH:mm')).parent().addClass('is-dirty');
       $("#schedule-fim").val(event.end.format('DD/MM/YYYY HH:mm')).parent().addClass('is-dirty');
       $('#schedule-status').val(event.status);
       $('#schedule-pessoa-id').val(event.pessoaId);
       $('#schedule-pessoa').val(event.pessoa);
       $("#schedule-notas").val(event.notas).parent().addClass('is-dirty');

       dialog.showModal();

     }

        $('.calendar').fullCalendar({
          height: 450,
          contentHeight: 600,
          lang: 'pt-br',
          defaultView: 'agendaWeek',
          eventBorderColor: "#de1f1f",
          eventColor: "#AC1E23",
            minTime: '06:00:00',
            maxTime: '22:00:00',
           header:
          {
              left: 'prev,next,today',
              center: 'title',
              right: 'month,agendaWeek,agendaDay,listDay,listWeek,listMonth'
          },

            navLinks: true,
            selectable: true,
            selectHelper: true,
            select: function(start, end, jsEvent, view) {

                var view = $('.calendar').fullCalendar('getView');

                if(view.name == 'agendaDay' || view.name == 'agendaWeek') {

                  $("#schedule-inicio").val(start.format('DD/MM/YYYY HH:mm')).parent().addClass('is-dirty');
                  $("#schedule-fim").val(end.format('DD/MM/YYYY HH:mm')).parent().addClass('is-dirty');

                  dialog.showModal();

                }

            },
            eventClick: function(event, element, view) {
              if(event.status_id == 1 || event.status_id == 2) {
                popularModalAndShow(event);
              }
            },
            editable: true,
            allDaySlot: false,
            eventLimit: true,
            dayClick: function(date, jsEvent, view) {

              jsEvent.preventDefault();

                if(view.name == 'month') {

                  setTimeout(function() {


                    $("#formConsultaModal").prop('action', $("#consultas-store").val());

                    $('.calendar').fullCalendar('gotoDate', date);
                    $('.calendar').fullCalendar('changeView','agendaDay');

                  }, 100);

                }

            },
            events: $("#agendamentos-json").val(),
            color: 'black',     // an option!
            textColor: 'yellow', // an option!
            //When u drop an event in the calendar do the following:
            eventDrop: function (event, delta, revertFunc) {
              popularModal(event);
            },
            //When u resize an event in the calendar do the following:
            eventResize: function (event, delta, revertFunc) {
              popularModal(event);
            },
            eventRender: function(event, element) {
                //$(element).tooltip({title: event.title});
            },
            ignoreTimezone: false,
            allDayText: 'Dia Inteiro',
            monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'],
            dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
            titleFormat: {
                month: 'MMMM YYYY',
                week: "MMMM YYYY",
                day: 'dddd, DD MMMM YYYY'
            },
            columnFormat: {
                month: 'ddd',
                week: 'ddd D',
                day: ''
            },
            axisFormat: 'HH:mm',
            timeFormat: {
                '': 'HH:mm',
                agenda: 'HH:mm'
            },
            buttonText: {
                prev: "<",
                next: ">",
                prevYear: "Ano anterior",
                nextYear: "Proximo ano",
                today: "Hoje",
                month: "Mês",
                week: "Semana",
                day: "Dia"
            }

        });

        $('.fc-event').addClass('mdl-color--primary');

        @foreach ($tasks as $task)
            @if($task->status_id != 3 && $task->status_id != 4)
                mdl_dialog('.dialiog-trigger{{$task->id}}','','#dialog_delete');
            @endif
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

    @include('scripts.mdl-required-input-fix')

    <script type="text/javascript">
        /*mdl_dialog('.dialog-button-save');
        mdl_dialog('.dialog-button-icon-save');*/
    </script>

@endsection
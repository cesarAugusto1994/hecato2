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

    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">

        <div class="mdl-tabs__tab-bar">
            <a href="#all" class="mdl-tabs__tab is-active">Todos</a>
            <a href="#incomplete" class="mdl-tabs__tab">Pendentes</a>
            <a href="#complete" class="mdl-tabs__tab">Finalizados</a>
        </div>

        @include('schedule/partials/task-tab', ['tab' => 'all', 'tasks' => $tasks, 'title' => 'Agendamentos', 'status' => 'is-active'])
        @include('schedule/partials/task-tab', ['tab' => 'incomplete', 'tasks' => $tasksInComplete, 'title' => 'Agendamentos Pendentes'])
        @include('schedule/partials/task-tab', ['tab' => 'complete', 'tasks' => $tasksComplete, 'title' => 'Agendamentos Finalizados'])

    </div>

    @include('dialogs.dialog-delete', ['dialogTitle' => 'Confirmar exclusão', 'dialogSaveBtnText' => 'Excluir'])

    <div class="mdl-grid full-grid margin-top-0 padding-0">
        <div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">
            <div class="mdl-color--grey-50 mdl-color-text--white mdl-card mdl-shadow--2dp" style="width:100%;" itemscope itemtype="https://schema.org/Person">

                <div class="mdl-card__title mdl-card--expand mdl-color--primary mdl-color-text--white">
                    <h4 class="mdl-card__title-text">
                        Agenda
                    </h4>
                </div>

                <div class="margin-top-50">

                    <div class="calendar mdl-color-text--grey-700"></div>

                <div>

            </div>
        </div>
    </div>

    <dialog id="dialog" class="mdl-dialog">
      <h3 class="mdl-dialog__title">Agendamento</h3>

      {!! Form::model(new App\Models\Schedule, ['route' => ['schedule.store'], 'class'=>'', 'role' => 'form']) !!}

      <div class="mdl-dialog__content">

        <div class="mdl-grid ">

          <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
                <input type="text" value="" name="pessoa" class="mdl-textfield__input" id="sample5" readonly>
                <input type="hidden" value="" name="pessoa_id">
                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                <label for="sample5" class="mdl-textfield__label">Cliente</label>
                <ul for="sample5" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                  @foreach(\App\Models\Pessoa::all() as $pessoa)
                    <li class="mdl-menu__item" data-val="{{ $pessoa->id }}">{{ $pessoa->nome }}</li>
                  @endforeach
                </ul>
            </div>
          </div>

          <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('start') ? 'is-invalid' :'' }}">
                  {!! Form::text('start', NULL, array('id' => 'schedule-start', 'class' => 'mdl-textfield__input mdl-color-text--grey-700')) !!}
                  {!! Form::label('start', 'Início', array('class' => 'mdl-textfield__label mdl-color-text--grey-700')); !!}
                  <span class="mdl-textfield__error">Task name is required</span>
              </div>
          </div>

          <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('start') ? 'is-invalid' :'' }}">
                  {!! Form::text('end', NULL, array('id' => 'schedule-end', 'class' => 'mdl-textfield__input mdl-color-text--grey-700')) !!}
                  {!! Form::label('end', 'Fim', array('class' => 'mdl-textfield__label mdl-color-text--grey-700')); !!}
                  <span class="mdl-textfield__error">Task name is required</span>
              </div>
          </div>

          <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('description') ? 'is-invalid' :'' }}">
                  {!! Form::textarea('description', NULL, array('id' => 'schedule-description', 'class' => 'mdl-textfield__input mdl-color-text--black', 'rows' => 3)) !!}
                  {!! Form::label('description', 'Notas', array('class' => 'mdl-textfield__label mdl-color-text--black')); !!}
                  <span class="mdl-textfield__error"></span>
              </div>
          </div>

        </div>

      </div>
      <div class="mdl-dialog__actions">
        <button type="submit" class="mdl-button">Salvar</button>
        <button type="button" class="mdl-button">Fechar</button>
      </div>

      @include('dialogs.dialog-save')

      {!! Form::close() !!}
    </dialog>

@endsection

@section('footer_scripts')

    @if (count($tasks) > 0)

        @include('scripts.mdl-datatables')

            <script src="{{asset('js/fullcalendar/moment.min.js')}}"></script>
            <script src="{{asset('js/fullcalendar/fullcalendar.min.js')}}"></script>

            <script type="text/javascript">

            var dialog = document.querySelector('#dialog');
             if (! dialog.showModal) {
               dialogPolyfill.registerDialog(dialog);
             }

            $('.calendar').fullCalendar({
              height: 380,
              contentHeight: 590,
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

                      //limparModal();

                      //confirmSave

                      //$("#confirmSave").modal('show');
                      //$("#cadastra-consulta-modal").modal('show');
                      $("#schedule-start").val(start.format('DD/MM/YYYY HH:mm')).parent().addClass('is-dirty');
                      $("#schedule-end").val(end.format('DD/MM/YYYY HH:mm')).parent().addClass('is-dirty');
                      //$("#schedule-end").MaterialTextfield.change();

                      dialog.showModal();

                    }

                },
                eventClick: function(event, element, view) {
                    popularModalAndShow(event);
                },
                businessHours: {
                  // days of week. an array of zero-based day of week integers (0=Sunday)
                  dow: [ 1, 2, 3, 4, 5 ], // Monday - Thursday

                  start: '08:00', // a start time (10am in this example)
                  end: '20:00', // an end time (6pm in this example)
                },
                editable: true,
                allDaySlot: false,
                eventLimit: true,
                dayClick: function(date, jsEvent, view) {

                    jsEvent.preventDefault();

                      if(view.name == 'month') {

                        setTimeout(function() {

                          //limparModal();

                          $("#formConsultaModal").prop('action', $("#consultas-store").val());

                          $('.calendar').fullCalendar('gotoDate', date);
                          $('.calendar').fullCalendar('changeView','agendaDay');

                        }, 100);

                      }


                },
                events: $("#consultas-json").val(),
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
                    $(element).tooltip({title: event.title});
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

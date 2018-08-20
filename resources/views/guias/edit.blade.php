@extends('layouts.dashboard')

@section('template_title')
  Editar Guia
@endsection

@section('header')
  Editar Guia
@endsection

@section('breadcrumbs')
  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
    <a itemprop="item" href="{{url('/')}}">
      <span itemprop="name">
        {{ trans('titles.app') }}
      </span>
    </a>
    <i class="material-icons">chevron_right</i>
    <meta itemprop="position" content="1" />
  </li>
  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
    <a itemprop="item" href="{{ route('guias.index') }}">
      <span itemprop="name">
        Guias
      </span>
    </a>
    <i class="material-icons">chevron_right</i>
    <meta itemprop="position" content="2" />
  </li>
  <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
    <a itemprop="item" href="{{ route('guias.create') }}">
      <span itemprop="name">
        Editar Guia
      </span>
    </a>
    <meta itemprop="position" content="3" />
  </li>
@endsection

@section('content')

  <div class="mdl-grid full-grid margin-top-0 padding-0">
    <div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">
        <div class="mdl-card card-new-user" style="width:100%;" itemscope itemtype="http://schema.org/Person">

        <div class="mdl-card__title mdl-card--expand mdl-color--primary mdl-color-text--white">
          <h2 class="mdl-card__title-text logo-style">Editar Guia</h2>
        </div>

        {!! Form::model($guia, array('action' => ['GuiasController@update', $guia->id], 'method' => 'PUT', 'role' => 'form')) !!}

            <div class="mdl-card__supporting-text">
              <div class="mdl-grid full-grid padding-0">
                <div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">

                  <div class="mdl-grid ">

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">

                          {!! Form::label('pessoa', 'Paciente' , array('class' => 'mdl-textfield__label')); !!}

                          <select class="mdl-selectfield__select mdl-textfield__input" name="pessoa_id" id="pessoa">
                            @foreach(\App\Models\Pessoa::where('paciente', true)->get() as $pessoa)
                              <option value="{{ $pessoa->id }}" {{ \Request::has('client') && \Request::get('client') == $pessoa->uuid ? 'selected' : '' }}> {{ $pessoa->nome }} </option>
                            @endforeach
                          </select>

                          <span class="mdl-textfield__error">Informe o Cliente</span>
                      </div>
                    </div>

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">

                          {!! Form::label('status', 'Status' , array('class' => 'mdl-textfield__label')); !!}
                          <select class="mdl-selectfield__select mdl-textfield__input" name="status_id" id="status">
                            @foreach(\App\Models\Agendamento\Guia\Status::all() as $status)
                              <option value="{{ $status->id }}" {{ $status->id == $guia->status_id ? 'selected' : '' }}> {{ $status->nome }} </option>
                            @endforeach
                          </select>

                          <span class="mdl-textfield__error">Informe o Status</span>
                      </div>
                    </div>

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('email') ? 'is-invalid' :'' }}">
                        {!! Form::text('data_vencimento', $guia->data_vencimento->format('d/m/Y'), array('id' => 'email', 'class' => 'mdl-textfield__input datemask')) !!}
                        {!! Form::label('data_vencimento', 'Data Vencimento' , array('class' => 'mdl-textfield__label')); !!}
                        <span class="mdl-textfield__error">Informe a data de nascimento</span>
                      </div>
                    </div>

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth {{ $errors->has('role') ? 'is-invalid' :'' }}">
                        {!! Form::text('valor', $guia->valor*100, array('id' => 'valor', 'class' => 'mdl-textfield__input money', 'required' => 'required')) !!}
                        {!! Form::label('valor', 'Valor R$' , array('class' => 'mdl-textfield__label')); !!}
                        <span class="mdl-textfield__error">Informe um valor</span>
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
                    {!! Form::submit('Salvar', array('class' => 'mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--primary mdl-color-text--white mdl-button--raised margin-bottom-1 margin-top-1 margin-top-0-desktop margin-right-1 padding-left-1 padding-right-1 ')) !!}
                  </span>

                </div>
              </div>
            </div>

            <div class="mdl-card__menu mdl-color-text--white">

            </div>

          {!! Form::close() !!}

        </div>
    </div>
  </div>

  <div class="mdl-grid full-grid margin-top-0 padding-0">

  <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">

      <div class="mdl-tabs__tab-bar">
          <a href="#all" class="mdl-tabs__tab">Todos</a>
          <a href="#incomplete" class="mdl-tabs__tab is-active">Pendentes</a>
          <a href="#complete" class="mdl-tabs__tab">Finalizados</a>
          <a href="#cancelados" class="mdl-tabs__tab">Cancelados</a>
      </div>

      @include('guias/partials/task-tab', ['tab' => 'incomplete', 'tasks' => $tasksInComplete, 'title' => 'Agendamentos Pendentes', 'status' => 'is-active'])
      @include('guias/partials/task-tab', ['tab' => 'complete', 'tasks' => $tasksComplete, 'title' => 'Agendamentos Finalizados'])
      @include('guias/partials/task-tab', ['tab' => 'cancelados', 'tasks' => $tasksCancelados, 'title' => 'Agendamentos Cancelados'])
      @include('guias/partials/task-tab', ['tab' => 'all', 'tasks' => $tasks, 'title' => 'Agendamentos'])

  </div>

      <div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp">
          <div class=" mdl-color-text--white  mdl-shadow--2dp" style="width:100%;" itemscope itemtype="https://schema.org/Person">

              <div class="mdl-card__title mdl-color--primary mdl-card--expand mdl-color-text--white">
                  <h4 class="mdl-card__title-text">
                      Agenda
                  </h4>
              </div>

              <div style="padding:2em;overflow:auto">

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

        {!! Form::hidden('guia_id', $guia->id, array('id' => 'guia', 'class' => 'mdl-textfield__input mdl-color-text--grey-700')) !!}

        <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth {{ $errors->has('grupo_id') ? 'is-invalid' :'' }}">
            <select class="mdl-selectfield__select mdl-textfield__input" name="pessoa_id" id="schedule-pessoa">
              @foreach(\App\Models\Pessoa::all() as $pessoa)
                <option value="{{ $pessoa->id }}" {{ $pessoa->id == $guia->pessoa_id ? 'selected' : '' }}> {{ $pessoa->nome }} </option>
              @endforeach
            </select>
            <label for="role">
                <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
            </label>
            {!! Form::label('pessoa_id', 'Cliente', array('class' => 'mdl-textfield__label mdl-selectfield__label')); !!}
            <span class="mdl-textfield__error">Selecione um cliente</span>
          </div>
        </div>

        <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('start') ? 'is-invalid' :'' }}">
                {!! Form::text('inicio', NULL, array('id' => 'schedule-inicio', 'class' => 'mdl-textfield__input mdl-color-text--grey-700 datemask')) !!}
                {!! Form::label('inicio', 'Início', array('class' => 'mdl-textfield__label mdl-color-text--grey-700')); !!}
                <span class="mdl-textfield__error">Task name is required</span>
            </div>
        </div>

        <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('start') ? 'is-invalid' :'' }}">
                {!! Form::text('fim', NULL, array('id' => 'schedule-fim', 'class' => 'mdl-textfield__input mdl-color-text--grey-700 datemask')) !!}
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
      <button type="submit" class="mdl-button btnSalvarGuia">Salvar</button>
      <button type="button" class="mdl-button dialog-button-close">Fechar</button>
    </div>

    {!! Form::close() !!}
  </dialog>

  <input type="hidden" id="agendamentos-json" value="{{ route('agendamentos_json', ['guia_id' => $guia->id]) }}">
  <input type="hidden" id="atualizar-agendamento-route" value="{{ route('atualizar_agendamento') }}">
  <input type="hidden" id="store-agendamento-route" value="{{ route('schedule.store') }}">


@endsection

@section('footer_scripts')

  @include('scripts.mdl-required-input-fix')
  @include('scripts.gmaps-address-lookup-api3')

  <script type="text/javascript">
    $('.datemask').mask("00/00/0000");
    $('.money').mask('000.000.000.000.000,00', {reverse: true});
  </script>

  <script type="text/javascript">

    $('.datemask').mask("00/00/0000 00:00");

    $(".btnSalvarGuia").click(function() {
      $("#guia").submit();
    })

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

     $(".formAgendamento").prop('action', adicionarAgendamento);
   });

   function popularModal(event) {

     var evento = event.id;

     //console.log(event);

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
     $("#schedule-inicio").val(event.start.format('DD/MM/YYYY HH:mm')).parent().addClass('is-dirty');
     $("#schedule-fim").val(event.end.format('DD/MM/YYYY HH:mm')).parent().addClass('is-dirty');
     $('#schedule-status').val(event.status);
     $('#schedule-pessoa-id').val(event.pessoaId);
     $('#schedule-pessoa').val(event.pessoa);
     $("#schedule-notas").val(event.notas).parent().addClass('is-dirty');
     dialog.showModal();
   }

    $('.calendar').fullCalendar({
      header:
      {
          left: 'prev,next,today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay,listMonth,listWeek,listDay'
      },
      views: {
        listDay: {
          buttonText: 'list day',
          titleFormat: "dddd, DD MMMM YYYY",
          columnFormat: "",
          timeFormat: "HH:mm"
        },

        listWeek: {
          buttonText: 'list week',
          titleFormat: "MMMM YYYY",
          columnFormat: "ddd D",
          timeFormat: "HH:mm"
        },

        listMonth: {
          buttonText: 'list month',
          titleFormat: "MMMM YYYY"
        },

        month: {
          buttonText: 'month',
          titleFormat: 'MMMM YYYY',
          columnFormat: "ddd",
          timeFormat: "HH:mm"
        },

        agendaWeek: {
          buttonText: 'agendaWeek',
          titleFormat: "MMMM YYYY",
          columnFormat: "ddd D"
        },

        agendaDay: {
          buttonText: 'agendaDay',
          titleFormat: 'dddd, DD MMMM YYYY',
          columnFormat: "",
          timeFormat: "HH:mm"
        },
      },
      lang: 'pt-br',
      displayEventTime: true,
      defaultView: 'listMonth',
      eventColor: "#AC1E23",
      minTime: '06:00:00',
      maxTime: '22:00:00',
      slotDuration: '00:15:00',
      slotLabelInterval: 15,
      slotLabelFormat: 'HH:mm',
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
          //popularModalAndShow(event);

          window.location.href = '/schedule/' + event.id + '/edit';

        }
      },
      editable: true,
      allDaySlot: false,
      eventLimit: true,
      dayClick: function(date, jsEvent, view) {

        //jsEvent.preventDefault();

          if(view.name == 'month') {

            setTimeout(function() {


              $("#formConsultaModal").prop('action', $("#consultas-store").val());

              $('.calendar').fullCalendar('gotoDate', date);
              $('.calendar').fullCalendar('changeView','agendaDay');

            }, 100);

          }

      },
      events: $("#agendamentos-json").val(),
      eventDrop: function (event, delta, revertFunc) {
        popularModal(event);
        //console.log('drop');
      },
      eventResize: function (event, delta, revertFunc) {
        popularModal(event);
        //console.log('eventResize');
      },
      eventRender: function(event, element) {
          //console.log('eventRender');
          //$(".formAgendamento").prop('action', adicionarAgendamento);
          //$(element).tooltip({title: event.title});
      },
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
          day: "Dia",
          listMonth: "Lista Mês",
          listWeek: "Lista Semana",
          listDay: "Lista Dia"
      }

    });

    $('.fc-event').addClass('mdl-color--primary');

  </script>


@endsection

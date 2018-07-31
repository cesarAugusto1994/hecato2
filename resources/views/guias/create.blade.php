@extends('layouts.dashboard')

@section('template_title')
  Novo Guia
@endsection

@section('header')
  Novo Guia
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
        Novo Guia
      </span>
    </a>
    <meta itemprop="position" content="3" />
  </li>
@endsection

@section('content')

  <div class="mdl-grid full-grid margin-top-0 padding-0">
    <div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">
        <div class="mdl-card card-new-user" style="width:100%;" itemscope itemtype="http://schema.org/Person">

        <div class="mdl-card__title mdl-card--expand mdl-color--primary mdl-color-text--white">
          <h2 class="mdl-card__title-text logo-style">Novo Guia</h2>
        </div>

        {!! Form::open(array('action' => 'GuiasController@store', 'method' => 'POST', 'role' => 'form')) !!}

            <div class="mdl-card__supporting-text">
              <div class="mdl-grid full-grid padding-0">
                <div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">

                  <div class="mdl-grid ">

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
                          <input type="text" value="" name="pessoa" class="mdl-textfield__input" id="sample5" readonly>
                          <input type="hidden" value="" name="pessoa_id" required>
                          <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                          <label for="sample5" class="mdl-textfield__label">Cliente</label>
                          <ul for="sample5" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                            @foreach(\App\Models\Pessoa::where('paciente', true)->get() as $pessoa)
                              <li class="mdl-menu__item" data-val="{{ $pessoa->id }}">{{ $pessoa->nome }}</li>
                            @endforeach
                          </ul>
                          <span class="mdl-textfield__error">Informe o Cliente</span>
                      </div>
                    </div>

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
                          <input type="text" value="" name="status" class="mdl-textfield__input" id="sample6" readonly>
                          <input type="hidden" value="" name="status_id" required>
                          <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                          <label for="sample6" class="mdl-textfield__label">Status</label>
                          <ul for="sample6" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                            @foreach(\App\Models\Agendamento\Guia\Status::all() as $status)
                              <li class="mdl-menu__item" data-val="{{ $status->id }}" {{ $loop->first ? 'data-selected="true"' : '' }}>{{ $status->nome }}</li>
                            @endforeach
                          </ul>
                          <span class="mdl-textfield__error">Informe o Status</span>
                      </div>
                    </div>

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('email') ? 'is-invalid' :'' }}">
                        {!! Form::text('data_vencimento', (now()->modify('+ 7 days'))->format('d/m/Y'), array('id' => 'email', 'class' => 'mdl-textfield__input datemask')) !!}
                        {!! Form::label('data_vencimento', 'Data Vencimento' , array('class' => 'mdl-textfield__label')); !!}
                        <span class="mdl-textfield__error">Informe a data de nascimento</span>
                      </div>
                    </div>

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth {{ $errors->has('role') ? 'is-invalid' :'' }}">
                        {!! Form::text('valor', NULL, array('id' => 'ramo_atividade', 'class' => 'mdl-textfield__input money')) !!}
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
                    {!! Form::button('<i class="material-icons">save</i> Salvar', array('class' => 'dialog-button-save mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--primary mdl-color-text--white mdl-button--raised margin-bottom-1 margin-top-1 margin-top-0-desktop margin-right-1 padding-left-1 padding-right-1 ')) !!}
                  </span>

                </div>
              </div>
            </div>

            <div class="mdl-card__menu mdl-color-text--white">

              <span class="save-actions">
                {!! Form::button('<i class="material-icons">save</i>', array('class' => 'dialog-button-icon-save mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect', 'title' => 'Save New User')) !!}
              </span>

              <a href="{{ url('/users/') }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--white" title="Back to Users">
                  <i class="material-icons">reply</i>
                  <span class="sr-only">Back to Users</span>
              </a>

            </div>

            @include('dialogs.dialog-save')

          {!! Form::close() !!}

        </div>
    </div>
  </div>

@endsection

@section('footer_scripts')

  @include('scripts.mdl-required-input-fix')
  @include('scripts.gmaps-address-lookup-api3')

  <script type="text/javascript">
    mdl_dialog('.dialog-button-save');
    mdl_dialog('.dialog-button-icon-save');

    $('.datemask').mask("00/00/0000");
    $('.money').mask('000.000.000.000.000,00', {reverse: true});
  </script>

@endsection

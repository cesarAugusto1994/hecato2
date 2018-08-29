@extends('layouts.dashboard')

@section('template_title')
  Editar Empresa
@endsection

@section('header')
  Editar Empresa
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
    <a itemprop="item" href="/empresas">
      <span itemprop="name">
        Empresas
      </span>
    </a>
    <i class="material-icons">chevron_right</i>
    <meta itemprop="position" content="2" />
  </li>
  <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
    <a itemprop="item" href="/empresas">
      <span itemprop="name">
        Editar Empresa
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
          <h2 class="mdl-card__title-text logo-style">Editar Empresa</h2>
        </div>

        {!! Form::model($empresa, array('action' => ['EmpresaController@update', $empresa->id], 'id' => 'formEditEmpresa', 'method' => 'PUT', 'role' => 'form')) !!}

          <div class="mdl-card__supporting-text">
            <div class="mdl-grid full-grid padding-0">
              <div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">

                <div class="mdl-grid ">

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('name') ? 'is-invalid' :'' }}">
                      {!! Form::text('nome', NULL, array('id' => 'name', 'class' => 'mdl-textfield__input')) !!}
                      {!! Form::label('nome', 'Nome' , array('class' => 'mdl-textfield__label')); !!}
                      <span class="mdl-textfield__error">Letters and numbers only</span>
                    </div>
                  </div>

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('email') ? 'is-invalid' :'' }}">
                      {!! Form::email('email', NULL, array('id' => 'email', 'class' => 'mdl-textfield__input')) !!}
                      {!! Form::label('email', trans('auth.email') , array('class' => 'mdl-textfield__label')); !!}
                      <span class="mdl-textfield__error">Please Enter a Valid {{ trans('auth.email') }}</span>
                    </div>
                  </div>

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth {{ $errors->has('role') ? 'is-invalid' :'' }}">
                      <select class="mdl-selectfield__select mdl-textfield__input" name="tipo_id" id="tipo-pessoa">
                        @foreach($tipos as $tipo)
                          <option value="{{ $tipo->id }}" {{ $tipo->id == $empresa->tipo->id ? 'selected' : '' }}> {{ $tipo->nome }} </option>
                        @endforeach
                      </select>
                      <label for="role">
                          <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                      </label>
                      {!! Form::label('tipo_id', 'Tipo', array('class' => 'mdl-textfield__label mdl-selectfield__label')); !!}
                      <span class="mdl-textfield__error">Select user access level</span>
                    </div>
                  </div>

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label margin-bottom-1 {{ $errors->has('nascimento') ? 'is-invalid' :'' }}">
                        {!! Form::text('aniversario_fundacao', $empresa->aniversario_fundacao ? $empresa->aniversario_fundacao->format('d/m/Y') : '', array('id' => 'aniversario_fundacao', 'class' => 'mdl-textfield__input datemask' )) !!}
                        {!! Form::label('aniversario_fundacao', 'Aniversário / Fundação', array('class' => 'mdl-textfield__label')); !!}
                      <span class="mdl-textfield__error">Informe uma data de nascimento válida</span>
                    </div>
                  </div>

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('first_name') ? 'is-invalid' :'' }}">
                            {!! Form::text('site', NULL, array('id' => 'site', 'class' => 'mdl-textfield__input')) !!}
                            {!! Form::label('site', 'Site', array('class' => 'mdl-textfield__label')); !!}
                            <span class="mdl-textfield__error">Letters only</span>
                        </div>
                    </div>

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('first_name') ? 'is-invalid' :'' }}">
                            {!! Form::text('cpf_cnpj', $empresa->cpf_cnpj, array('id' => 'cpf_cnpj', 'class' => 'mdl-textfield__input')) !!}
                            {!! Form::label('cpf_cnpj', 'CPF/CNPJ', array('class' => 'mdl-textfield__label')); !!}
                            <span class="mdl-textfield__error">Letters only</span>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('last_name') ? 'is-invalid' :'' }}">
                          {!! Form::text('rg_ie', $empresa->rg_ie, array('id' => 'rg_ie', 'class' => 'mdl-textfield__input')) !!}
                          {!! Form::label('rg_ie', 'RG/IE', array('class' => 'mdl-textfield__label')); !!}
                          <span class="mdl-textfield__error">Letters only</span>
                      </div>
                    </div>


                  <div class="mdl-cell mdl-cell--12-col">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('bio') ? 'is-invalid' :'' }}">
                          {!! Form::textarea('informacoes',  NULL, array('id' => 'bio', 'class' => 'mdl-textfield__input')) !!}
                          {!! Form::label('informacoes', 'Informações', array('class' => 'mdl-textfield__label')); !!}
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
    $('.datemask').mask("00/00/0000");
    mdl_dialog('.dialog-button-save');
    mdl_dialog('.dialog-button-icon-save');
  </script>

@endsection

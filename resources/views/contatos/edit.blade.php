@extends('layouts.dashboard')

@section('template_title')
  Editar Contato
@endsection

@section('header')
  Editar Contato
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
    <a itemprop="item" href="{{ route('contatos.index') }}">
      <span itemprop="name">
        Contatos
      </span>
    </a>
    <i class="material-icons">chevron_right</i>
    <meta itemprop="position" content="2" />
  </li>
  <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
    <a itemprop="item" href="{{ route('contatos.create') }}">
      <span itemprop="name">
        Editar Contato
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
          <h2 class="mdl-card__title-text logo-style">Editar Contato</h2>
        </div>

        {!! Form::model($pessoa, array('action' => ['PessoasController@update', $pessoa->id], 'method' => 'PUT', 'role' => 'form')) !!}

          <div class="mdl-card__supporting-text">
            <div class="mdl-grid full-grid padding-0">
              <div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">

                <div class="mdl-grid ">

                  <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                    <span class="mdl-chip mdl-chip--contact">
                        <span class="mdl-chip__contact mdl-color--primary mdl-color-text--white">I</span>
                        <span class="mdl-chip__text full">Informações</span>
                    </span>
                  </div>

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('nome') ? 'is-invalid' :'' }}">
                      {!! Form::hidden('id', old('id'), array('id' => 'id')) !!}
                      {!! Form::text('nome', NULL, array('id' => 'name', 'class' => 'mdl-textfield__input')) !!}
                      {!! Form::label('nome', old('nome') , array('class' => 'mdl-textfield__label')); !!}
                      <span class="mdl-textfield__error">Letters and numbers only</span>
                    </div>
                  </div>

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('email') ? 'is-invalid' :'' }}">
                      {!! Form::email('email', NULL, array('id' => 'email', 'class' => 'mdl-textfield__input')) !!}
                      {!! Form::label('email', old('email') , array('class' => 'mdl-textfield__label')); !!}
                      <span class="mdl-textfield__error">Please Enter a Valid {{ trans('auth.email') }}</span>
                    </div>
                  </div>

                  <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--2-col-desktop">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth {{ $errors->has('role') ? 'is-invalid' :'' }}">
                      <select class="mdl-selectfield__select mdl-textfield__input" name="tipo_id" id="role">
                        @foreach($tipos as $tipo)
                          <option value="{{ $tipo->id }}" {{ $pessoa->tipo_id == $tipo->id ? 'selected' : ''}}> {{ $tipo->nome }} </option>
                        @endforeach
                      </select>
                      <label for="role">
                          <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                      </label>
                      {!! Form::label('tipo_id', Tipo, array('class' => 'mdl-textfield__label mdl-selectfield__label')); !!}
                      <span class="mdl-textfield__error">Select user access level</span>
                    </div>
                  </div>

                  <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--2-col-desktop">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth {{ $errors->has('role') ? 'is-invalid' :'' }}">
                      {!! Form::text('ramo_atividade', $pessoa->ramo_atividade, array('id' => 'ramo_atividade', 'class' => 'mdl-textfield__input')) !!}
                      {!! Form::label('ramo_atividade', 'Ramo atividade' , array('class' => 'mdl-textfield__label')); !!}
                      <span class="mdl-textfield__error">Select user access level</span>
                    </div>
                  </div>
                  <!--
                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--2-col-desktop">
                       <label class = "mdl-checkbox mdl-js-checkbox" for = "checkbox1">
                          <input type="checkbox" name="cliente" id="checkbox1"
                              class="mdl-checkbox__input" value="1" {{ $pessoa->cliente == 1 ? 'checked' : '' }}>
                          <span class = "mdl-checkbox__label">Cliente</span>
                       </label>
                  </div>

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--2-col-desktop">
                       <label class = "mdl-checkbox mdl-js-checkbox" for = "checkbox2">
                          <input type = "checkbox" name="fornecedor" id = "checkbox2"
                             class = "mdl-checkbox__input" value="1" {{ $pessoa->fornecedor == 1 ? 'checked' : '' }}>
                          <span class = "mdl-checkbox__label">Fornecedor</span>
                       </label>
                  </div>
                -->
                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--2-col-desktop">
                       <label class = "mdl-checkbox mdl-js-checkbox" for = "checkbox2">
                          <input type = "checkbox" name="paciente" id = "checkbox2"
                             class = "mdl-checkbox__input" value="1" {{ $pessoa->paciente == 1 ? 'checked' : '' }}>
                          <span class = "mdl-checkbox__label">Paciente</span>
                       </label>
                  </div>

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--2-col-desktop">
                       <label class = "mdl-checkbox mdl-js-checkbox" for = "checkbox3">
                          <input type = "checkbox" name="funcionario" id = "checkbox3"
                             class = "mdl-checkbox__input" value="1" {{ $pessoa->funcionario == 1 ? 'checked' : '' }}>
                          <span class = "mdl-checkbox__label">Funcionário</span>
                       </label>
                  </div>
                  <!--
                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--2-col-desktop">
                       <label class = "mdl-checkbox mdl-js-checkbox" for = "checkbox4">
                          <input type = "checkbox" name="prospecto" id = "checkbox4"
                             class = "mdl-checkbox__input" value="1" {{ $pessoa->prospecto == 1 ? 'checked' : '' }}>
                          <span class = "mdl-checkbox__label">Propecto</span>
                       </label>
                  </div>
                -->
                  <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                    <span class="mdl-chip mdl-chip--contact">
                        <span class="mdl-chip__contact mdl-color--primary mdl-color-text--white">C</span>
                        <span class="mdl-chip__text">Contatos</span>
                    </span>
                  </div>

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--4-col-desktop">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('last_name') ? 'is-invalid' :'' }}">
                        {!! Form::text('telefone', $pessoa->telefones ? $pessoa->telefones->first()->numero : '', array('id' => 'telefone', 'class' => 'mdl-textfield__input')) !!}
                        {!! Form::label('telefone', 'Telefone', array('class' => 'mdl-textfield__label')); !!}
                        <span class="mdl-textfield__error">Letters only</span>
                    </div>
                  </div>
                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--4-col-desktop">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('twitter_username') ? 'is-invalid' :'' }}">
                        {!! Form::text('telefone_comercial', $pessoa->telefones ? $pessoa->telefones->where('tipo_contato_id', 2)->first()->numero : '', array('id' => 'telefone_comercial', 'class' => 'mdl-textfield__input')) !!}
                        {!! Form::label('telefone_comercial', 'Telefone Comercial', array('class' => 'mdl-textfield__label')); !!}
                    </div>
                  </div>
                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--4-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('first_name') ? 'is-invalid' :'' }}">
                          {!! Form::text('celular', $pessoa->telefones ? $pessoa->telefones->where('tipo_contato_id', 3)->first()->numero : '', array('id' => 'celular', 'class' => 'mdl-textfield__input')) !!}
                          {!! Form::label('celular', 'Celular', array('class' => 'mdl-textfield__label')); !!}
                          <span class="mdl-textfield__error">Letters only</span>
                      </div>
                  </div>

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth {{ $errors->has('role') ? 'is-invalid' :'' }}">
                      <select class="mdl-selectfield__select mdl-textfield__input" name="grupo_id" id="role">
                        @foreach($grupos as $grupo)
                          <option value="{{ $grupo->id }}" {{ $pessoa->grupo_id == $grupo->id }}> {{ $grupo->nome }} </option>
                        @endforeach
                      </select>
                      <label for="role">
                          <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                      </label>
                      {!! Form::label('grupo_id', Grupo, array('class' => 'mdl-textfield__label mdl-selectfield__label')); !!}
                      <span class="mdl-textfield__error">Select user access level</span>
                    </div>
                  </div>

                  @if($pessoa->tipo_id == 1)

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                      <span class="mdl-chip mdl-chip--contact">
                          <span class="mdl-chip__contact mdl-color--primary mdl-color-text--white">PF</span>
                          <span class="mdl-chip__text">Pessoa Fisica</span>
                      </span>
                    </div>

                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--4-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('twitter_username') ? 'is-invalid' :'' }}">
                          {!! Form::text('cpf', $pessoa->fisica->cpf, array('id' => 'cpf', 'class' => 'mdl-textfield__input')) !!}
                          {!! Form::label('cpf', 'CPF', array('class' => 'mdl-textfield__label')); !!}
                      </div>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--4-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('github_username') ? 'is-invalid' :'' }}">
                          {!! Form::text('rg', $pessoa->fisica->rg, array('id' => 'rg', 'class' => 'mdl-textfield__input')) !!}
                          {!! Form::label('rg', 'RG', array('class' => 'mdl-textfield__label')); !!}
                      </div>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--4-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label margin-bottom-1 {{ $errors->has('location') ? 'is-invalid' :'' }}">
                          {!! Form::text('nascimento', $pessoa->fisica->nascimento ? $pessoa->fisica->nascimento->format('d/m/Y') : '', array('id' => 'nascimento', 'class' => 'mdl-textfield__input date' )) !!}
                          {!! Form::label('nascimento', 'Nascimento', array('class' => 'mdl-textfield__label')); !!}
                        <span class="mdl-textfield__error">Informe uma data de nascimento válida</span>
                      </div>
                    </div>

                  @else

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                      <span class="mdl-chip mdl-chip--contact">
                          <span class="mdl-chip__contact mdl-color--primary mdl-color-text--white">PJ</span>
                          <span class="mdl-chip__text">Pessoa Jurídica</span>
                      </span>
                    </div>

                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--4-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('twitter_username') ? 'is-invalid' :'' }}">
                          {!! Form::text('cnpj', $pessoa->juridica->cnpj, array('id' => 'cnpj', 'class' => 'mdl-textfield__input')) !!}
                          {!! Form::label('cnpj', 'CNPJ', array('class' => 'mdl-textfield__label')); !!}
                      </div>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--4-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('github_username') ? 'is-invalid' :'' }}">
                          {!! Form::text('ie', $pessoa->juridica->ie, array('id' => 'ie', 'class' => 'mdl-textfield__input')) !!}
                          {!! Form::label('ie', 'Inscrição Estadual', array('class' => 'mdl-textfield__label')); !!}
                      </div>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--4-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label margin-bottom-1 {{ $errors->has('location') ? 'is-invalid' :'' }}">
                          {!! Form::text('fundacao', $pessoa->juridica->fundacao ? $pessoa->juridica->fundacao->format('d/m/Y') : '', array('id' => 'funcacao', 'class' => 'mdl-textfield__input date' )) !!}
                          {!! Form::label('fundacao', 'Funcação', array('class' => 'mdl-textfield__label')); !!}
                        <span class="mdl-textfield__error">Informe uma data de fundação válida</span>
                      </div>
                    </div>

                  @endif

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                      <span class="mdl-chip mdl-chip--contact">
                          <span class="mdl-chip__contact mdl-color--primary mdl-color-text--white">E</span>
                          <span class="mdl-chip__text full">Endereço</span>
                      </span>
                    </div>

                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--2-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('twitter_username') ? 'is-invalid' :'' }}">
                          {!! Form::text('cep', $pessoa->enderecos->isNotEmpty() ? $pessoa->enderecos->first()->cep : '', array('id' => 'postal_code', 'class' => 'mdl-textfield__input', 'autocomplete' => 'off')) !!}
                          {!! Form::label('cep', 'CEP', array('class' => 'mdl-textfield__label')); !!}
                      </div>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--2-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('github_username') ? 'is-invalid' :'' }}">
                          {!! Form::text('uf', $pessoa->enderecos->isNotEmpty() ? $pessoa->enderecos->first()->uf : '', array('id' => 'administrative_area_level_1', 'class' => 'mdl-textfield__input')) !!}
                          {!! Form::label('uf', 'Estado (UF)', array('class' => 'mdl-textfield__label')); !!}
                      </div>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--4-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label margin-bottom-1 {{ $errors->has('location') ? 'is-invalid' :'' }}">
                          {!! Form::text('cidade', $pessoa->enderecos->isNotEmpty() ? $pessoa->enderecos->first()->cidade : '', array('id' => 'administrative_area_level_2', 'class' => 'mdl-textfield__input' )) !!}
                          {!! Form::label('cidade', 'Cidade', array('class' => 'mdl-textfield__label')); !!}
                        <span class="mdl-textfield__error">Please Enter a Valid Location</span>
                      </div>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--4-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label margin-bottom-1 {{ $errors->has('location') ? 'is-invalid' :'' }}">
                          {!! Form::text('bairro', $pessoa->enderecos->isNotEmpty() ? $pessoa->enderecos->first()->bairro : '', array('id' => 'bairro', 'class' => 'mdl-textfield__input' )) !!}
                          {!! Form::label('bairro', 'Bairro', array('class' => 'mdl-textfield__label')); !!}
                        <span class="mdl-textfield__error">Please Enter a Valid Location</span>
                      </div>
                    </div>

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label margin-bottom-1 {{ $errors->has('location') ? 'is-invalid' :'' }}">
                          {!! Form::text('endereco', $pessoa->enderecos->isNotEmpty() ? $pessoa->enderecos->first()->endereco : '', array('id' => 'locality', 'class' => 'mdl-textfield__input' )) !!}
                          {!! Form::label('endereco', 'Endereço ', array('class' => 'mdl-textfield__label')); !!}
                        <span class="mdl-textfield__error">Please Enter a Valid Location</span>
                      </div>
                    </div>


                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                      <span class="mdl-chip mdl-chip--contact">
                          <span class="mdl-chip__contact mdl-color--primary mdl-color-text--white">O</span>
                          <span class="mdl-chip__text full">Observações</span>
                      </span>
                    </div>

                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('twitter_username') ? 'is-invalid' :'' }}">
                          {!! Form::text('identificacao_estrangeiro', NULL, array('id' => 'estrangeiro', 'class' => 'mdl-textfield__input')) !!}
                          {!! Form::label('identificacao_estrangeiro', 'Identificador Estrangeiro', array('class' => 'mdl-textfield__label')); !!}
                      </div>
                    </div>

                  <div class="mdl-cell mdl-cell--12-col">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('bio') ? 'is-invalid' :'' }}">
                          {!! Form::textarea('informacoes',  NULL, array('id' => 'informacoes', 'class' => 'mdl-textfield__input')) !!}
                          {!! Form::label('informacoes', 'Informações', array('class' => 'mdl-textfield__label')); !!}
                      </div>
                  </div>

                  <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                    <span class="mdl-chip mdl-chip--contact">
                        <span class="mdl-chip__contact mdl-color--primary mdl-color-text--white">A</span>
                        <span class="mdl-chip__text full">Anexos</span>
                    </span>
                  </div>

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('twitter_username') ? 'is-invalid' :'' }}">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--file">
                        {!! Form::file('anexos',  NULL, array('id' => 'anexos', 'class' => 'mdl-textfield__input')) !!}
                        {!! Form::label('anexos', 'Anexos', array('class' => 'mdl-textfield__label')); !!}
                      </div>
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

              <a href="{{ url('/contatos/') }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--white" title="Back to Users">
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

    $('.date').mask("00/00/0000", {placeholder: "__/__/____"});
  </script>

@endsection

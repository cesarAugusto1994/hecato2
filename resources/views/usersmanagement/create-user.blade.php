@extends('layouts.dashboard')

@section('template_title')
  Novo Usuário
@endsection

@section('header')
  Novo Usuário
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
    <a itemprop="item" href="/users">
      <span itemprop="name">
        Usuários
      </span>
    </a>
    <i class="material-icons">chevron_right</i>
    <meta itemprop="position" content="2" />
  </li>
  <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
    <a itemprop="item" href="/users/create">
      <span itemprop="name">
        Novo Usuário
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
          <h2 class="mdl-card__title-text logo-style">Novo Usuário</h2>
        </div>

        {!! Form::open(array('action' => 'UsersManagementController@store', 'method' => 'POST', 'role' => 'form')) !!}

          <div class="mdl-card__supporting-text">
            <div class="mdl-grid full-grid padding-0">
              <div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">

                <div class="mdl-grid">

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('name') ? 'is-invalid' :'' }}">
                      {!! Form::text('name', NULL, array('id' => 'name', 'class' => 'mdl-textfield__input', 'required' => 'required', 'autocomplete' => 'off')) !!}
                      {!! Form::label('name', trans('auth.name') , array('class' => 'mdl-textfield__label')); !!}
                      <span class="mdl-textfield__error">Apenas letras</span>
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
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('first_name') ? 'is-invalid' :'' }}">
                            {!! Form::text('first_name', NULL, array('id' => 'first_name', 'class' => 'mdl-textfield__input')) !!}
                            {!! Form::label('first_name', 'Nome', array('class' => 'mdl-textfield__label')); !!}
                            <span class="mdl-textfield__error">Letters only</span>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('last_name') ? 'is-invalid' :'' }}">
                          {!! Form::text('last_name', NULL, array('id' => 'last_name', 'class' => 'mdl-textfield__input', 'pattern' => '[A-Z,a-z]*')) !!}
                          {!! Form::label('last_name', 'Sobrenome', array('class' => 'mdl-textfield__label')); !!}
                          <span class="mdl-textfield__error">Letters only</span>
                      </div>
                    </div>

                    <div class="mdl-cell mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth {{ $errors->has('role') ? 'is-invalid' :'' }}">
                        <select class="mdl-selectfield__select mdl-textfield__input" name="empresa" id="empresa">

                            @foreach(\App\Models\Empresa::all() as $empresa)
                              <option value="{{ $empresa->id }}">{{ $empresa->nome }}</option>
                            @endforeach
                        </select>
                        <label for="role">
                            <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                        </label>
                        {!! Form::label('empresa', 'Empresa', array('class' => 'mdl-textfield__label mdl-selectfield__label')); !!}
                        <span class="mdl-textfield__error">Select user access level</span>
                      </div>
                    </div>

                    <div class="mdl-cell mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth {{ $errors->has('role') ? 'is-invalid' :'' }}">
                        <select class="mdl-selectfield__select mdl-textfield__input" name="role" id="role">
                          <option value=""></option>
                          @if ($roles->count())
                            @foreach($roles as $role)
                              <option value="{{ $role->id }}" {{ $role->name == 'User' ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                          @endif
                        </select>
                        <label for="role">
                            <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                        </label>
                        {!! Form::label('role', trans('forms.label-userrole_id'), array('class' => 'mdl-textfield__label mdl-selectfield__label')); !!}
                        <span class="mdl-textfield__error">Select user access level</span>
                      </div>
                    </div>





                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('password') ? 'is-invalid' :'' }}">
                          {!! Form::password('password', array('id' => 'password', 'class' => 'mdl-textfield__input')) !!}
                          {!! Form::label('password', 'Senha', array('class' => 'mdl-textfield__label')); !!}
                        <span class="mdl-textfield__error">Please enter a valid password</span>
                      </div>
                  </div>

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('password_confirmation') ? 'is-invalid' :'' }}">
                          {!! Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'mdl-textfield__input')) !!}
                          {!! Form::label('password_confirmation', 'Confirmar Senha', array('class' => 'mdl-textfield__label')); !!}
                        <span class="mdl-textfield__error">Must match password</span>
                      </div>
                  </div>

                  <div class="mdl-cell mdl-cell--12-col">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('bio') ? 'is-invalid' :'' }}">
                          {!! Form::textarea('bio',  NULL, array('id' => 'bio', 'class' => 'mdl-textfield__input')) !!}
                          {!! Form::label('bio', 'Informações', array('class' => 'mdl-textfield__label')); !!}
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
    mdl_dialog('.dialog-button-save');
    mdl_dialog('.dialog-button-icon-save');
  </script>

@endsection

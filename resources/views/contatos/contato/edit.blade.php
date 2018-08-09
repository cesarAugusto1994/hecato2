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
    <a itemprop="item" href="{{ route('guias.index') }}">
      <span itemprop="name">
        Contatos
      </span>
    </a>
    <i class="material-icons">chevron_right</i>
    <meta itemprop="position" content="2" />
  </li>
  <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
    <a itemprop="item" href="{{ route('guias.create') }}">
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

        {!! Form::model($contato, array('action' => ['PessoaContatosController@update', $contato->id], 'method' => 'PUT', 'role' => 'form')) !!}

            <div class="mdl-card__supporting-text">
              <div class="mdl-grid full-grid padding-0">
                <div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">

                  <div class="mdl-grid ">

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('nome') ? 'is-invalid' :'' }}">
                        {!! Form::text('nome', NULL, array('id' => 'nome', 'class' => 'mdl-textfield__input')) !!}
                        {!! Form::label('nome', 'Nome' , array('class' => 'mdl-textfield__label')); !!}
                        <span class="mdl-textfield__error">Informe o nome</span>
                      </div>
                    </div>

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('email') ? 'is-invalid' :'' }}">
                        {!! Form::email('email', NULL, array('id' => 'email', 'class' => 'mdl-textfield__input')) !!}
                        {!! Form::label('email', 'Email' , array('class' => 'mdl-textfield__label')); !!}
                        <span class="mdl-textfield__error">Informe o email</span>
                      </div>
                    </div>

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('email') ? 'is-invalid' :'' }}">
                        {!! Form::text('celular', NULL, array('id' => 'celular', 'class' => 'mdl-textfield__input')) !!}
                        {!! Form::label('celular', 'Celular' , array('class' => 'mdl-textfield__label')); !!}
                        <span class="mdl-textfield__error">Informe o celular</span>
                      </div>
                    </div>

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('email') ? 'is-invalid' :'' }}">
                        {!! Form::text('telefone', NULL, array('id' => 'telefone', 'class' => 'mdl-textfield__input')) !!}
                        {!! Form::label('telefone', 'Telefone' , array('class' => 'mdl-textfield__label')); !!}
                        <span class="mdl-textfield__error">Informe o telefone/span>
                      </div>
                    </div>

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('cargo') ? 'is-invalid' :'' }}">
                        {!! Form::text('filiacao', NULL, array('id' => 'cargo', 'class' => 'mdl-textfield__input')) !!}
                        {!! Form::label('filiacao', 'Filiação - Parentesco' , array('class' => 'mdl-textfield__label')); !!}
                        <span class="mdl-textfield__error">Informe a filiação</span>
                      </div>
                    </div>

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('created_at') ? 'is-invalid' :'' }}">
                        {!! Form::text('created_at', $contato->created_at ? $contato->created_at->format('d/m/Y') : '', array('id' => 'created_at', 'class' => 'mdl-textfield__input datemask', 'disabled' => 'disabled')) !!}
                        {!! Form::label('created_at', 'Adicionado Em' , array('class' => 'mdl-textfield__label')); !!}

                      </div>
                    </div>

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('email') ? 'is-invalid' :'' }}">
                        {!! Form::text('updated_at', $contato->updated_at ? $contato->updated_at->format('d/m/Y') : '', array('id' => 'updated_at', 'class' => 'mdl-textfield__input datemask', 'disabled' => 'disabled')) !!}
                        {!! Form::label('updated_at', 'Atualizado Em' , array('class' => 'mdl-textfield__label')); !!}
                        <span class="mdl-textfield__error">Informe a data de nascimento</span>
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
                {!! Form::button('<i class="material-icons">save</i>', array('class' => 'dialog-button-icon-save mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect', 'title' => 'Salvar Edição')) !!}
              </span>

              <a href="{{ route('guias.index') }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--white" title="Voltar aos contatos">
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
  </script>

@endsection

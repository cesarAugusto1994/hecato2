@extends('layouts.dashboard')

@section('template_title')
  Permissões
@endsection

@section('header')
  Permissões
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

  <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
    <a itemprop="item" href="{{ route('guias.create') }}">
      <span itemprop="name">
        Permissões
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
          <h2 class="mdl-card__title-text logo-style">Permissões para {{ $user->name }}</h2>
        </div>

        {!! Form::open(array('action' => 'PermissoesController@store', 'method' => 'POST', 'role' => 'form')) !!}

            <div class="mdl-card__supporting-text">
              <div class="mdl-grid full-grid padding-0">
                <div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">

                  <div class="mdl-grid">

                    <input type="hidden" name="user" value="{{ $user->id }}" class="mdl-textfield__input" readonly>

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                      @foreach(\App\Permission::all() as $permissao)
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth {{ $errors->has('role') ? 'is-invalid' :'' }}">

                        <label class="mdl-checkbox mdl-js-checkbox">
                            <input class="mdl-checkbox__input" type="checkbox" name="permissoes[]" value="{{ $permissao->id }}" {{  $user->hasPermission($permissao->slug) ? 'checked' : '' }}/> {{ $permissao->name }}
                        </label>

                      </div>
                      @endforeach
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

    $('.datemask').mask("00/00/0000");
    $('.money').mask('000.000.000.000.000,00', {reverse: true});
  </script>

@endsection

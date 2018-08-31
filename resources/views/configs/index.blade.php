@extends('layouts.dashboard')

@section('template_title')
  Configurações
@endsection

@section('header')
  Configurações
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
        Configurações
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
          <h2 class="mdl-card__title-text logo-style">Configurações para {{ $user->empresa->nome }}</h2>
        </div>

        {!! Form::open(array('action' => 'ConfigsController@store', 'method' => 'POST', 'role' => 'form', 'id' => 'formStoreConfig')) !!}

            <div class="mdl-card__supporting-text">
              <div class="mdl-grid full-grid padding-0">
                <div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">

                  <div class="mdl-grid">

                    <input type="hidden" name="user" value="{{ $user->id }}" class="mdl-textfield__input" readonly>

                    @foreach(\App\Models\Empresa\Config::all() as $config)

                      @if($config->config->tipo == 'float')

                          <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth {{ $errors->has('role') ? 'is-invalid' :'' }}">
                              {!! Form::text($config->config->slug, number_format((float)$config->valor, 2, '.', ','), array('id' => 'valor', 'class' => 'mdl-textfield__input money')) !!}
                              {!! Form::label('valor', $config->config->nome , array('class' => 'mdl-textfield__label')); !!}
                              <span class="mdl-textfield__error">Informe um valor</span>
                            </div>
                          </div>

                      @else


                      @endif

                    @endforeach

                  </div>
                </div>

              </div>
            </div>

            <div class="mdl-card__actions padding-top-0">
              <div class="mdl-grid padding-top-0">
                <div class="mdl-cell mdl-cell--12-col padding-top-0 margin-top-0 margin-left-1-1">

                  {{-- SAVE BUTTON--}}
                  <span class="save-actions">
                    {!! Form::button('<i class="material-icons">save</i> Salvar', array('class' => 'mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--primary mdl-color-text--white mdl-button--raised margin-bottom-1 margin-top-1 margin-top-0-desktop margin-right-1 padding-left-1 padding-right-1 btnStoreConfig')) !!}
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

@endsection

@section('footer_scripts')

  @include('scripts.mdl-required-input-fix')
  @include('scripts.gmaps-address-lookup-api3')

  <script type="text/javascript">
    $('.datemask').mask("00/00/0000");
    $('.money').mask('000.000.000.000.000,00', {reverse: true});
    $(".btnStoreConfig").click(function() {
        $("#formStoreConfig").submit();
    });
  </script>

@endsection

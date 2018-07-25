@extends('layouts.dashboard')

@section('template_title')
    Agenda
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
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="/schedule">
            <span itemprop="name">
                Agenda
            </span>
        </a>
        <i class="material-icons">chevron_right</i>
        <meta itemprop="position" content="2" />
    </li>
    <li class="active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="/schedule/create">
            <span itemprop="name">
                Novo Compromisso
            </span>
        </a>
        <meta itemprop="position" content="3" />
    </li>

@endsection

@section('content')

    <div class="mdl-grid full-grid margin-top-0 padding-0">
        <div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">
            <div class="mdl-color--grey-50 mdl-color-text--grey-50 mdl-card mdl-shadow--2dp" style="width:100%;" itemscope itemtype="https://schema.org/Person">

                <div class="mdl-card__title mdl-card--expand mdl-color--primary mdl-color-text--white">
                    <h2 class="mdl-card__title-text">
                        Agenda
                    </h2>
                </div>

                @include('schedule.partials.create-task')

            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')

    @include('scripts.mdl-required-input-fix')

    <script type="text/javascript">
        mdl_dialog('.dialog-button-save');
        mdl_dialog('.dialog-button-icon-save');
    </script>

    <script type="text/javascript">

      const picker = new MaterialDatePicker({})
      .on('submit', (d) => {
      output.innerText = d;
      });

      const el = document.querySelector('.c-datepicker-btn');
      el.addEventListener('click', () => {
      picker.open();
      }, false);

    </script>

@endsection

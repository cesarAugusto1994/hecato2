@extends('layouts.dashboard')

@section('template_title')
  Guias
@endsection

@section('template_linked_css')
@endsection

@section('header')
    Guias
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
        <a itemprop="item" href="{{ route('guias.index') }}" disabled>
            <span itemprop="name">
                Lista de Guias
            </span>
        </a>
        <meta itemprop="position" content="2" />
    </li>
@endsection

@section('content')

<div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop margin-top-0">
    <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        <h2 class="mdl-card__title-text logo-style">
            @if ($guias->count() === 1)
                {{ $guias->count() }} Guia
            @elseif ($guias->count() > 1)
                Total de {{ $guias->count() }} Guias
            @else
                Nenhum registro encontrado :(
            @endif
        </h2>

    </div>
    <div class="mdl-card__supporting-text mdl-color-text--grey-600 padding-0 context">
        <div class="table-responsive material-table">
            <table id="user_table" class="mdl-data-table mdl-js-data-table data-table" cellspacing="0" width="100%">
              <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">ID</th>
                    <th class="mdl-data-table__cell--non-numeric">Agendamento</th>
                    <th class="mdl-data-table__cell--non-numeric">Status</th>
                    <th class="mdl-data-table__cell--non-numeric">Nome</th>
                    @role('admin')
                    <th class="mdl-data-table__cell--non-numeric">Valor</th>
                    @endrole
                    <th class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only">Vencimento</th>
                    @role('admin')
                    <th class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only">Pago em</th>
                    @endrole
                    <th class="mdl-data-table__cell--non-numeric no-sort no-search">Opções</th>
                </tr>
              </thead>
              <tbody>
                    @foreach ($guias as $guia)
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric"><a>{{$guia->id}}</a></td>
                            <td class="mdl-data-table__cell--non-numeric"><a>{{$guia->agendamento->id ?? ''}}</a></td>
                            <td class="mdl-data-table__cell--non-numeric"><a >{{$guia->status->nome}}</a></td>
                            <td class="mdl-data-table__cell--non-numeric"><a href="{{ route('contatos.edit', $guia->pessoa->uuid) }}">{{$guia->pessoa->nome}} </a></td>
                            @role('admin')
                            <td class="mdl-data-table__cell--non-numeric"><a>{{number_format($guia->valor, 2, ',', '.')}} </a></td>
                            @endrole
                            <td class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only"><a >{{$guia->data_vencimento ? $guia->data_vencimento->format('d/m/Y') : '' }} </a></td>
                            @role('admin')
                            <td class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only"><a >{{$guia->data_pagamento ? $guia->data_pagamento->format('d/m/Y') : '' }} </a></td>
                            @endrole
                            <td class="mdl-data-table__cell--non-numeric">

                              @if($guia->status_id == 1)
                                <a title="Confirmar Pagamento" href="{{ route('confirmar_pagamento', $guia->uuid) }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                    <i class="material-icons mdl-color-text--green">money</i>
                                </a>
                              @endif

                                @permission('edit.guia')

                                {{-- EDIT USER ICON BUTTON --}}
                                <a href="{{ URL::to('guias/' . $guia->uuid . '/edit') }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                    <i class="material-icons mdl-color-text--orange">edit</i>
                                </a>

                                @endpermission

                                @permission('delete.guia')

                                {{-- DELETE ICON BUTTON AND FORM CALL --}}
                                {!! Form::open(array('url' => route('guias.destroy', $guia->id), 'class' => 'inline-block', 'id' => 'delete_'.$guia->id)) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    <a href="#" class="dialog-button dialiog-trigger-delete dialiog-trigger{{$guia->id}} mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" data-userid="{{$guia->id}}">
                                        <i class="material-icons mdl-color-text--red">delete</i>
                                    </a>
                                {!! Form::close() !!}

                                @endpermission


                            </td>
                        </tr>
                    @endforeach
              </tbody>
            </table>
        </div>
    </div>
    <div class="mdl-card__menu" style="top: -4px;">

        @if(\Request::has('client'))
          @permission('create.guia')
          <a href="{{ route('guias.create', ['client' => \Request::get('client')]) }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
              <i class="material-icons mdl-color-text--white">add</i>
          </a>
          @endpermission
        @else
          @permission('create.guia')
            <a href="{{ route('guias.create') }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                <i class="material-icons mdl-color-text--white">add</i>
            </a>
          @endpermission
        @endif

        @include('partials.mdl-highlighter')

        @include('partials.mdl-search')

        <!--
        <a href="{{ URL::to('/guias/deleted') }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--white" title="Show Deleted Users">
            <i class="material-icons" aria-hidden="true">delete_sweep</i>
            <span class="sr-only">Show Deleted Users</span>
        </a>
        -->

    </div>
</div>

@include('dialogs.dialog-delete')

@endsection

@section('footer_scripts')
    @include('scripts.highlighter-script')
    @include('scripts.mdl-datatables')
    <script type="text/javascript">
        @foreach ($guias as $guia)
          @if($guia->status_id == 1)
            mdl_dialog('.dialiog-trigger{{$guia->id}}','','#dialog_delete');
          @endif
        @endforeach
        var userid;
        $('.dialiog-trigger-delete').click(function(event) {
            event.preventDefault();
            userid = $(this).attr('data-userid');
        });
        $('#confirm').click(function(event) {
            $('form#delete_'+userid).submit();
        });
    </script>
@endsection

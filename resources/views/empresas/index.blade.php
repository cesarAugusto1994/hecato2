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
                Lista de Empresas
            </span>
        </a>
        <meta itemprop="position" content="2" />
    </li>
@endsection

@section('content')

<div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop margin-top-0">
    <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        <h2 class="mdl-card__title-text logo-style">
            @if ($empresas->count() === 1)
                {{ $empresas->count() }} Empresa
            @elseif ($empresas->count() > 1)
                Total de {{ $empresas->count() }} Empresas
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
                    <th class="mdl-data-table__cell--non-numeric">Nome</th>
                    <th class="mdl-data-table__cell--non-numeric">Email</th>
                    <th class="mdl-data-table__cell--non-numeric">Tipo</th>
                    <th class="mdl-data-table__cell--non-numeric">Aniversáio/Fundação</th>

                    <th class="mdl-data-table__cell--non-numeric">CPF/CNPJ</th>

                    <th class="mdl-data-table__cell--non-numeric">RG/IE</th>

                    <th class="mdl-data-table__cell--non-numeric no-sort no-search">Opções</th>
                </tr>
              </thead>
              <tbody>
                    @foreach ($empresas as $empresa)
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric"><a>{{$empresa->id}}</a></td>
                            <td class="mdl-data-table__cell--non-numeric"><a href="{{ route('empresas.edit', $empresa->id) }}">{{$empresa->nome}} </a></td>
                            <td class="mdl-data-table__cell--non-numeric"><a href="{{ route('empresas.edit', $empresa->id) }}">{{$empresa->email}} </a></td>
                            <td class="mdl-data-table__cell--non-numeric"><a href="{{ route('empresas.edit', $empresa->id) }}">{{$empresa->tipo->nome}} </a></td>
                            <td class="mdl-data-table__cell--non-numeric"><a href="{{ route('empresas.edit', $empresa->id) }}">{{$empresa->aniversario_fundacao}} </a></td>

                            <td class="mdl-data-table__cell--non-numeric"><a href="{{ route('empresas.edit', $empresa->id) }}">{{$empresa->cpf_cnpj}} </a></td>
                            <td class="mdl-data-table__cell--non-numeric"><a href="{{ route('empresas.edit', $empresa->id) }}">{{$empresa->rg_ie}} </a></td>

                            <td class="mdl-data-table__cell--non-numeric">


                                {{-- EDIT USER ICON BUTTON --}}
                                <a href="{{ URL::to('empresas/' . $empresa->id . '/edit') }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                    <i class="material-icons mdl-color-text--orange">edit</i>
                                </a>

                                {{-- DELETE ICON BUTTON AND FORM CALL --}}
                                {!! Form::open(array('url' => route('guias.destroy', $empresa->id), 'class' => 'inline-block', 'id' => 'delete_'.$empresa->id)) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    <a href="#" class="dialog-button dialiog-trigger-delete dialiog-trigger{{$empresa->id}} mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" data-userid="{{$empresa->id}}">
                                        <i class="material-icons mdl-color-text--red">delete</i>
                                    </a>
                                {!! Form::close() !!}

                            </td>
                        </tr>
                    @endforeach
              </tbody>
            </table>
        </div>
    </div>
    <div class="mdl-card__menu" style="top: -4px;">

        <a href="{{ route('empresas.create') }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
            <i class="material-icons mdl-color-text--white">add</i>
        </a>

        @include('partials.mdl-highlighter')

        @include('partials.mdl-search')

    </div>
</div>

@include('dialogs.dialog-delete')

@endsection

@section('footer_scripts')
    @include('scripts.highlighter-script')
    @include('scripts.mdl-datatables')
    <script type="text/javascript">
        @foreach ($empresas as $empresa)
          @if($empresa->status_id == 1)
            mdl_dialog('.dialiog-trigger{{$empresa->id}}','','#dialog_delete');
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

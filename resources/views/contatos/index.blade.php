@extends('layouts.dashboard')

@section('template_title')
  Contatos
@endsection

@section('template_linked_css')
@endsection

@section('header')
    Contatos
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
        <a itemprop="item" href="{{ route('contatos.index') }}" disabled>
            <span itemprop="name">
                Lista de Contatos
            </span>
        </a>
        <meta itemprop="position" content="2" />
    </li>
@endsection

@section('content')

<div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop margin-top-0">
    <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        <h2 class="mdl-card__title-text logo-style">
            @if ($pessoas->count() === 1)
                {{ $pessoas->count() }} Contato
            @elseif ($pessoas->count() > 1)
                Total de {{ $pessoas->count() }} Contatos
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
                    @role('owner')
                      <th class="mdl-data-table__cell--non-numeric">Empresa</th>
                    @endrole
                    <th class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only">Cadastro</th>
                    <th class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only">Atualizado</th>
                    <th class="mdl-data-table__cell--non-numeric no-sort no-search">Opções</th>
                </tr>
              </thead>
              <tbody>
                    @foreach ($pessoas as $pessoa)
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric"><a href="{{ URL::to('contatos/' . $pessoa->uuid . '/edit') }}">{{$pessoa->id}}</a></td>
                            <td class="mdl-data-table__cell--non-numeric"><a href="{{ URL::to('contatos/' . $pessoa->uuid . '/edit') }}">{{$pessoa->nome}} </a></td>
                            <td class="mdl-data-table__cell--non-numeric"><a href="{{ URL::to('contatos/' . $pessoa->uuid . '/edit') }}">{{$pessoa->email}} </a></td>
                            <td class="mdl-data-table__cell--non-numeric"><a href="{{ URL::to('contatos/' . $pessoa->uuid . '/edit') }}">Pessoa {{$pessoa->tipo->nome}}</a></td>
                            @role('owner')

                            <td class="mdl-data-table__cell--non-numeric">{{$pessoa->empresa->nome}}</td>

                            @endrole
                            <td class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only"><a href="{{ URL::to('contatos/' . $pessoa->uuid . '/edit') }}">{{$pessoa->created_at ? $pessoa->created_at->format('d/m/Y') : '' }} </a></td>
                            <td class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only"><a href="{{ URL::to('contatos/' . $pessoa->uuid . '/edit') }}">{{$pessoa->updated_at ? $pessoa->updated_at->format('d/m/Y') : '' }} </a></td>
                            <td class="mdl-data-table__cell--non-numeric">

                                {{-- VIEW USER ACCOUNT ICON BUTTON --}}
                                <a href="{{ route('guias.index', ['client' => $pessoa->uuid]) }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="Visualizar Guias">
                                    <i class="material-icons mdl-color-text--blue">assignment</i>
                                </a>

                                {{-- VIEW USER ACCOUNT ICON BUTTON
                                <a href="{{ URL::to('contatos/' . $pessoa->uuid) }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="Conta do usuário">
                                    <i class="material-icons mdl-color-text--blue">account_circle</i>
                                </a>
                                --}}

                                @permission('edit.contato')
                                {{-- EDIT USER ICON BUTTON --}}
                                <a href="{{ URL::to('contatos/' . $pessoa->uuid . '/edit') }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                    <i class="material-icons mdl-color-text--orange">edit</i>
                                </a>
                                @endpermission

                                @permission('delete.contato')
                                {{-- DELETE ICON BUTTON AND FORM CALL --}}
                                {!! Form::open(array('url' => route('contatos.destroy', $pessoa->id), 'class' => 'inline-block', 'id' => 'delete_'.$pessoa->id)) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    <a href="#" class="dialog-button dialiog-trigger-delete dialiog-trigger{{$pessoa->id}} mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" data-userid="{{$pessoa->id}}">
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

        @include('partials.mdl-highlighter')

        @include('partials.mdl-search')

        @permission('create.contato')
        <a href="{{ route('contatos.create') }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--white" title="Add New User">
            <i class="material-icons">person_add</i>
            <span class="sr-only">Add New User</span>
        </a>
        @endpermission

        <a href="{{ URL::to('/users/deleted') }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--white" title="Show Deleted Users">
            <i class="material-icons" aria-hidden="true">delete_sweep</i>
            <span class="sr-only">Show Deleted Users</span>
        </a>

    </div>
</div>

@include('dialogs.dialog-delete')

@endsection

@section('footer_scripts')
    @include('scripts.highlighter-script')
    @include('scripts.mdl-datatables')
    <script type="text/javascript">
        @foreach ($pessoas as $pessoa)
            mdl_dialog('.dialiog-trigger{{$pessoa->id}}','','#dialog_delete');
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

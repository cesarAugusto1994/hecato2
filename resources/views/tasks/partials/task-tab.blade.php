<div class="mdl-color--grey-50 mdl-card dark-table mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop margin-top-0 mdl-tabs__panel {{{ $status or '' }}}" id="{{ $tab }}">
    <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        <h2 class="mdl-card__title-text logo-style">
            {{ $title }}
        </h2>
    </div>
    <div class="mdl-card__supporting-text mdl-color-text--grey-700 padding-0">
        <div class="table-responsive material-table inverse">
            <table class="mdl-color--grey-50 mdl-color-text--grey-700 mdl-data-table-block mdl-js-data-table data-table full-span table-striped" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric mdl-color-text--grey-700 no-sort no-search"></th>
                        <th class="mdl-data-table__cell--non-numeric mdl-color-text--grey-700 hide-mobile">ID</th>
                        <th class="mdl-data-table__cell--non-numeric mdl-color-text--grey-700">Nome</th>
                        <th class="mdl-data-table__cell--non-numeric mdl-color-text--grey-700 hide-mobile">Descrição</th>
                        <th class="mdl-data-table__cell--non-numeric mdl-color-text--grey-700">Status</th>
                        <th class="mdl-data-table__cell--non-numeric mdl-color-text--grey-700 no-sort no-search">Opções</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($tasks as $task)

                        @include('tasks.partials.task-row')

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <div class="mdl-card__menu" style="top: -4px;">
        @include('partials.mdl-search')
        <a href="{{ url('/tasks/create') }}" class="mdl-button mdl-button--icon mdl-inline-expanded mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color-text--white inline-block">
            <i class="material-icons">add</i>
        </a>
    </div>
</div>

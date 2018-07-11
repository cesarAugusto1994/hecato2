<div class="mdl-color--grey-50 mdl-card dark-table mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop margin-top-0 mdl-tabs__panel {{{ $status or '' }}}" id="{{ $tab }}">
    <div class="mdl-card__title mdl-color-text--grey-700">
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
                        <th class="mdl-data-table__cell--non-numeric mdl-color-text--grey-700">Pessoa</th>
                        <th class="mdl-data-table__cell--non-numeric mdl-color-text--grey-700 hide-mobile">Notas</th>
                        <th class="mdl-data-table__cell--non-numeric mdl-color-text--grey-700">Status</th>
                        <th class="mdl-data-table__cell--non-numeric mdl-color-text--grey-700 no-sort no-search">Opções</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($tasks as $task)

                        @include('schedule.partials.task-row')

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <div class="mdl-card__menu">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable search-white padding-top-0 hide-mobile">
            <label class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-button--icon" for="search_table">
                <i class="material-icons">search</i>
            </label>

            <div class="mdl-textfield__expandable-holder">
                <input class="mdl-textfield__input" type="search" id="search_table" placeholder="Search Terms">
                <label class="mdl-textfield__label" for="search_table">
                    Search Terms
                </label>
            </div>
        </div>
        <a href="{{ url('/schedule/create') }}" class="mdl-button mdl-button--icon mdl-inline-expanded mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color-text--grey-700 inline-block">
            <i class="material-icons">add</i>
        </a>
    </div>
</div>

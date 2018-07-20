{!! Form::model(new App\Models\Schedule, ['route' => ['schedule.store'], 'class'=>'', 'role' => 'form']) !!}

    <div class="mdl-card__supporting-text">
        <div class="mdl-grid full-grid padding-0">
            <div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">

                <div class="mdl-grid ">

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
                          <input type="text" value="" name="pessoa" class="mdl-textfield__input" id="sample5" readonly>
                          <input type="hidden" value="" name="pessoa_id">
                          <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                          <label for="sample5" class="mdl-textfield__label">Cliente</label>
                          <ul for="sample5" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                            @foreach(\App\Models\Pessoa::all() as $pessoa)
                              <li class="mdl-menu__item" data-val="{{ $pessoa->id }}">{{ $pessoa->nome }}</li>
                            @endforeach
                          </ul>
                      </div>
                    </div>

                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('start') ? 'is-invalid' :'' }}">
                            {!! Form::text('inicio', NULL, array('id' => 'task-start', 'class' => 'mdl-textfield__input mdl-color-text--black datetime')) !!}
                            {!! Form::label('inicio', 'Início', array('class' => 'mdl-textfield__label mdl-color-text--black')); !!}
                            <span class="mdl-textfield__error">Task name is required</span>
                        </div>
                    </div>

                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('start') ? 'is-invalid' :'' }}">
                            {!! Form::text('fim', NULL, array('id' => 'task-end', 'class' => 'mdl-textfield__input mdl-color-text--black datetime')) !!}
                            {!! Form::label('fim', 'Fim', array('class' => 'mdl-textfield__label mdl-color-text--black')); !!}
                            <span class="mdl-textfield__error">Task name is required</span>
                        </div>
                    </div>

                    {{--
                        <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth {{ $errors->has('user_level') ? 'is-invalid' :'' }}">
                                {!! Form::select('completed', array('1' => 'Complete', '0' => 'Incomplete'), '0', array('class' => 'mdl-selectfield__select mdl-textfield__input mdl-color-text--black', 'id' => 'status')) !!}
                                <label for="completed">
                                    <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                                </label>
                                {!! Form::label('completed', 'Task Status', array('class' => 'mdl-textfield__label mdl-selectfield__label mdl-color-text--black')); !!}
                                <span class="mdl-textfield__error"></span>
                            </div>
                        </div>
                    --}}

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('description') ? 'is-invalid' :'' }}">
                            {!! Form::textarea('description', NULL, array('id' => 'task-description', 'class' => 'mdl-textfield__input mdl-color-text--black')) !!}
                            {!! Form::label('description', 'Descrição', array('class' => 'mdl-textfield__label mdl-color-text--black')); !!}
                            <span class="mdl-textfield__error"></span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="mdl-card__actions padding-top-0">
        <div class="mdl-grid padding-top-0">
            <div class="mdl-cell mdl-cell--12-col padding-top-0 margin-top-0 margin-left-1-1">

                <span class="save-actions">
                    {!! Form::button('Salvar', array('class' => 'dialog-button-save mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--primary mdl-color-text--white mdl-button--raised margin-bottom-1 margin-top-1 margin-top-0-desktop margin-right-1 padding-left-1 padding-right-1 ')) !!}
                </span>

            </div>
        </div>
    </div>

    <div class="mdl-card__menu mdl-color-text--white">

        <span class="save-actions">
            {!! Form::button('<i class="material-icons">save</i>', array('class' => 'dialog-button-icon-save mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-button-colored', 'title' => 'Update Task')) !!}
        </span>

    </div>

    @include('dialogs.dialog-save')

{!! Form::close() !!}

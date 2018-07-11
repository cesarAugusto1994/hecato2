{!! Form::model($empresa, array('method' => 'PATCH', 'route' => ['empresa.update', $empresa->id], 'class' => 'form-horizontal', 'role' => 'form')) !!}
    <div class="mdl-card__supporting-text">
        <div class="mdl-grid full-grid padding-0">
            <div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">

                <div class="mdl-grid ">

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--4-col-desktop">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('title') ? 'is-invalid' :'' }}">
                            {!! Form::text('nome', NULL, array('id' => 'task-title', 'class' => 'mdl-textfield__input mdl-color-text--grey-700')) !!}
                            {!! Form::label('nome', 'Nome', array('class' => 'mdl-textfield__label mdl-color-text--grey-700')); !!}
                            <span class="mdl-textfield__error">Este campo é obrigatório</span>
                        </div>
                    </div>

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--4-col-desktop">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('title') ? 'is-invalid' :'' }}">
                            {!! Form::text('email', NULL, array('id' => 'task-title', 'class' => 'mdl-textfield__input mdl-color-text--grey-700')) !!}
                            {!! Form::label('email', 'E-mail', array('class' => 'mdl-textfield__label mdl-color-text--grey-700')); !!}
                            <span class="mdl-textfield__error">Este campo é obrigatório</span>
                        </div>
                    </div>

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--4-col-desktop">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('title') ? 'is-invalid' :'' }}">
                            {!! Form::text('aniversario_fundacao', NULL, array('id' => 'task-title', 'class' => 'mdl-textfield__input mdl-color-text--grey-700')) !!}
                            {!! Form::label('aniversario_fundacao', 'Fundação', array('class' => 'mdl-textfield__label mdl-color-text--grey-700')); !!}
                            <span class="mdl-textfield__error">Este campo é obrigatório</span>
                        </div>
                    </div>

                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--4-col-desktop">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth {{ $errors->has('user_level') ? 'is-invalid' :'' }}">
                            {!! Form::select('tipo_id', $tipos, $empresa->tipo_id, array('class' => 'mdl-selectfield__select mdl-textfield__input mdl-color-text--black', 'id' => 'status')) !!}
                            <label for="completed">
                                <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                            </label>
                            {!! Form::label('tipo_id', 'Tipo', array('class' => 'mdl-textfield__label mdl-selectfield__label mdl-color-text--black')); !!}
                            <span class="mdl-textfield__error"></span>
                        </div>
                    </div>

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--4-col-desktop">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('title') ? 'is-invalid' :'' }}">
                            {!! Form::text('cpf_cnpj', NULL, array('id' => 'empresa-id', 'class' => 'mdl-textfield__input mdl-color-text--grey-700')) !!}
                            {!! Form::label('cpf_cnpj', 'CPF/CNPJ', array('class' => 'mdl-textfield__label mdl-color-text--grey-700')); !!}
                            <span class="mdl-textfield__error">Este campo é obrigatório</span>
                        </div>
                    </div>

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--4-col-desktop">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('title') ? 'is-invalid' :'' }}">
                            {!! Form::text('site', NULL, array('id' => 'task-title', 'class' => 'mdl-textfield__input mdl-color-text--grey-700')) !!}
                            {!! Form::label('site', 'Site', array('class' => 'mdl-textfield__label mdl-color-text--grey-700')); !!}
                            <span class="mdl-textfield__error">Este campo é obrigatório</span>
                        </div>
                    </div>

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('description') ? 'is-invalid' :'' }}">
                            {!! Form::textarea('informacoes', NULL, array('id' => 'task-description', 'class' => 'mdl-textfield__input mdl-color-text--grey-700')) !!}
                            {!! Form::label('informacoes', 'Informações', array('class' => 'mdl-textfield__label mdl-color-text--grey-700')); !!}
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

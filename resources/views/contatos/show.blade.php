@extends('layouts.dashboard')

@section('template_title')
  Mostrando {{ $pessoa->nome }}
@endsection

@section('header')
  Mostrando {{ $pessoa->nome }}
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
  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
    <a itemprop="item" href="{{ route('contatos.index') }}">
      <span itemprop="name">
        Contatos
      </span>
    </a>
    <i class="material-icons">chevron_right</i>
    <meta itemprop="position" content="2" />
  </li>
  <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
    <a itemprop="item" href="{{ route('contatos.show', $pessoa->id) }}">
      <span itemprop="name">
        {{ $pessoa->nome }}
      </span>
    </a>
    <meta itemprop="position" content="3" />
  </li>
@endsection

@section('content')

<div class="mdl-grid full-grid margin-top-0 padding-0">
  <div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">
          <div class="mdl-card card-wide" style="width:100%;" itemscope itemtype="http://schema.org/Person">
          <div class="mdl-user-avatar">
            <img src="{{ Gravatar::get($pessoa->email) }}" alt="{{ $pessoa->nome }}">
            <span itemprop="image" style="display:none;">{{ Gravatar::get($pessoa->email) }}</span>
          </div>

          <div class="mdl-card__title" @if ($pessoa->profile->user_profile_bg != NULL) style="background: url('{{$pessoa->profile->user_profile_bg}}') center/cover;" @endif>
              <h3 class="mdl-card__title-text mdl-title-username">
                {{ $pessoa->nome }}
              </h3>
          </div>

          <div class="mdl-card__supporting-text">
              <div class="mdl-grid full-grid padding-0">
                <div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--6-col-desktop">
                    <ul class="demo-list-icon mdl-list">

                        <li class="mdl-list__item mdl-typography--font-light">
                          <div class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-icon">person</i>
                            <span itemprop="name">
                              {{ $pessoa->nome }}
                            </span>
                          </div>
                        </li>

                        <li class="mdl-list__item mdl-typography--font-light">
                          <div class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-icon">contact_mail</i>
                            <span itemprop="email">
                              {{ $pessoa->email }}
                            </span>
                          </div>
                        </li>

                        <li class="mdl-list__item mdl-typography--font-light">
                          <div class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-icon">event</i>
                            Cadastro: {{ $pessoa->created_at->format('H:i d.m.Y') }}
                          </div>
                        </li>

                        <li class="mdl-list__item mdl-typography--font-light">
                          <div class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-icon">event</i>
                          Última Atualização: {{ $pessoa->updated_at->format('H:i d.m.Y') }}
                          </div>
                        </li>
                    </ul>
                </div>
              </div>

          <div class="mdl-card__menu">

          <a href="{{ route('contatos.edit', $pessoa->uuid) }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
            <i class="material-icons">edit</i>
          </a>

          {!! Form::open(array('url' => route('contatos.destroy', $pessoa->id) , 'class' => 'inline-block')) !!}
            {!! Form::hidden('_method', 'DELETE') !!}
            <a href="#" class="dialog-button-delete mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
              <i class="material-icons">delete</i>
            </a>
            @include('dialogs.dialog-delete')
          {!! Form::close() !!}
{{--
          <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
            <i class="material-icons">share</i>
          </button>
--}}
          </div>
        </div>
    </div>
  </div>
</div>






















{{--



  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <div class="panel @if ($pessoa->activated == 1) panel-success @else panel-danger @endif">

          <div class="panel-heading">
            <a href="/users/" class="btn btn-primary btn-xs pull-right">
              <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
              <span class="hidden-xs">{{ trans('usersmanagement.usersBackBtn') }}</span>
            </a>
            {{ trans('usersmanagement.usersPanelTitle') }}
          </div>
          <div class="panel-body">

            <div class="well">
              <div class="row">
                <div class="col-sm-6">
                  <img src="@if ($pessoa->profile && $pessoa->profile->avatar_status == 1) {{ $pessoa->profile->avatar }} @else {{ Gravatar::get($pessoa->email) }} @endif" alt="{{ $pessoa->name }}" id="" class="img-circle center-block margin-bottom-2 margin-top-1 user-image">
                </div>

                <div class="col-sm-6">
                  <h4 class="text-muted margin-top-sm-1 text-center text-left-tablet">
                    {{ $pessoa->name }}
                  </h4>
                  <p class="text-center text-left-tablet">
                    <strong>
                      {{ $pessoa->first_name }} {{ $pessoa->last_name }}
                    </strong>
                    <br />
                    {{ HTML::mailto($pessoa->email, $pessoa->email) }}
                  </p>

                  @if ($pessoa->profile)
                    <div class="text-center text-left-tablet margin-bottom-1">

                      <a href="{{ url('/profile/'.$pessoa->name) }}" class="btn btn-sm btn-info">
                        <i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> {{ trans('usersmanagement.viewProfile') }}</span>
                      </a>

                      <a href="/users/{{$pessoa->uuid}}/edit" class="btn btn-sm btn-warning">
                        <i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> {{ trans('usersmanagement.editUser') }} </span>
                      </a>

                      {!! Form::open(array('url' => 'users/' . $pessoa->uuid, 'class' => 'form-inline')) !!}
                        {!! Form::hidden('_method', 'DELETE') !!}
                        {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">' . trans('usersmanagement.deleteUser') . '</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this user?')) !!}
                      {!! Form::close() !!}

                    </div>
                  @endif

                </div>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            @if ($pessoa->name)

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelUserName') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $pessoa->name }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($pessoa->email)

            <div class="col-sm-5 col-xs-6 text-larger">
              <strong>
                {{ trans('usersmanagement.labelEmail') }}
              </strong>
            </div>

            <div class="col-sm-7">
              {{ HTML::mailto($pessoa->email, $pessoa->email) }}
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            @endif

            @if ($pessoa->first_name)

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelFirstName') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $pessoa->first_name }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($pessoa->last_name)

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelLastName') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $pessoa->last_name }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            <div class="col-sm-5 col-xs-6 text-larger">
              <strong>
                {{ trans('usersmanagement.labelRole') }}
              </strong>
            </div>

            <div class="col-sm-7">
              @foreach ($pessoa->roles as $pessoa_role)

                @if ($pessoa_role->name == 'User')
                  @php $labelClass = 'primary' @endphp

                @elseif ($pessoa_role->name == 'Admin')
                  @php $labelClass = 'warning' @endphp

                @elseif ($pessoa_role->name == 'Unverified')
                  @php $labelClass = 'danger' @endphp

                @else
                  @php $labelClass = 'default' @endphp

                @endif

                <span class="label label-{{$labelClass}}">{{ $pessoa_role->name }}</span>

              @endforeach
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-xs-6 text-larger">
              <strong>
                {{ trans('usersmanagement.labelStatus') }}
              </strong>
            </div>

            <div class="col-sm-7">
              @if ($pessoa->activated == 1)
                <span class="label label-success">
                  Activated
                </span>
              @else
                <span class="label label-danger">
                  Not-Activated
                </span>
              @endif
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-xs-6 text-larger">
              <strong>
                {{ trans('usersmanagement.labelAccessLevel')}} {{ $levelAmount }}:
              </strong>
            </div>

            <div class="col-sm-7">

              @if($pessoa->level() >= 5)
                <span class="label label-primary margin-half margin-left-0">5</span>
              @endif

              @if($pessoa->level() >= 4)
                 <span class="label label-info margin-half margin-left-0">4</span>
              @endif

              @if($pessoa->level() >= 3)
                <span class="label label-success margin-half margin-left-0">3</span>
              @endif

              @if($pessoa->level() >= 2)
                <span class="label label-warning margin-half margin-left-0">2</span>
              @endif

              @if($pessoa->level() >= 1)
                <span class="label label-default margin-half margin-left-0">1</span>
              @endif

            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-xs-6 text-larger">
              <strong>
                {{ trans('usersmanagement.labelPermissions') }}
              </strong>
            </div>

            <div class="col-sm-7">
              @if($pessoa->canViewUsers())
                <span class="label label-primary margin-half margin-left-0"">
                  {{ trans('permsandroles.permissionView') }}
                </span>
              @endif

              @if($pessoa->canCreateUsers())
                <span class="label label-info margin-half margin-left-0"">
                  {{ trans('permsandroles.permissionCreate') }}
                </span>
              @endif

              @if($pessoa->canEditUsers())
                <span class="label label-warning margin-half margin-left-0"">
                  {{ trans('permsandroles.permissionEdit') }}
                </span>
              @endif

              @if($pessoa->canDeleteUsers())
                <span class="label label-danger margin-half margin-left-0"">
                  {{ trans('permsandroles.permissionDelete') }}
                </span>
              @endif
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            @if ($pessoa->created_at)

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelCreatedAt') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $pessoa->created_at }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($pessoa->updated_at)

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelUpdatedAt') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $pessoa->updated_at }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($pessoa->signup_ip_address)

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelIpEmail') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $pessoa->signup_ip_address }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($pessoa->signup_confirmation_ip_address)

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelIpConfirm') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $pessoa->signup_confirmation_ip_address }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($pessoa->signup_sm_ip_address)

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelIpSocial') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $pessoa->signup_sm_ip_address }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($pessoa->admin_ip_address)

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelIpAdmin') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $pessoa->admin_ip_address }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($pessoa->updated_ip_address)

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelIpUpdate') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $pessoa->updated_ip_address }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

          </div>

        </div>
      </div>
    </div>
  </div>

--}}


@endsection

@section('footer_scripts')

  @include('scripts.google-maps-geocode-and-map')

  <script type="text/javascript">

    mdl_dialog('.dialog-button-delete','.dialog-delete-close','#dialog_delete');

  </script>

@endsection

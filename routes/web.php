<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| Middleware options can be located in `app/Http/Kernel.php`
|
 */

// Homepage Route
//Route::get('/', 'WelcomeController@welcome')->name('welcome');

// Authentication Routes
Auth::routes();

// Public Resource Route
Route::get('material.min.css.template', 'ThemesManagementController@template');

// Public Routes
Route::group(['middleware' => 'web'], function () {
    // Activation Routes
    Route::get('/activate', ['as' => 'activate', 'uses' => 'Auth\ActivateController@initial']);

    Route::get('/activate/{token}', ['as' => 'authenticated.activate', 'uses' => 'Auth\ActivateController@activate']);
    Route::get('/activation', ['as'       => 'authenticated.activation-resend', 'uses'       => 'Auth\ActivateController@resend']);
    Route::get('/exceeded', ['as'         => 'exceeded', 'uses'         => 'Auth\ActivateController@exceeded']);

    // Socialite Register Routes
    Route::get('/social/redirect/{provider}', ['as' => 'social.redirect', 'uses' => 'Auth\SocialController@getSocialRedirect']);
    Route::get('/social/handle/{provider}', ['as'   => 'social.handle', 'uses'   => 'Auth\SocialController@getSocialHandle']);

    // Route to for user to reactivate their user deleted account.
    Route::get('/re-activate/{token}', ['as' => 'user.reactivate', 'uses' => 'RestoreUserController@userReActivate']);
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated']], function () {
    // Homepage Route
    Route::get('/', ['as' => 'public.home', 'uses' => 'UserController@index']);

    // Activation Routes
    Route::get('/activation-required', ['uses' => 'Auth\ActivateController@activationRequired'])->name('activation-required');
    Route::get('/logout', ['uses'              => 'Auth\LoginController@logout'])->name('logout');

    //  Homepage Route - Redirect based on user role is in controller.
    Route::get('/home', ['as' => 'public.home', 'uses' => 'UserController@index']);

    // Show users profile - viewable by other users.
    Route::get('profile/{username}', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@show',
    ]);

    // Route to show user avatar
    Route::get('images/profile/{id}/avatar/{image}', [
        'uses' => 'ProfilesController@userProfileAvatar',
    ]);

    // Route for user profile background image
    Route::get('images/profile/{id}/background/{image}', [
        'uses' 		=> 'ProfilesController@userProfileBackgroundImage',
    ]);
});

// Registered, activated, and is current user routes.
Route::group(['middleware' => ['auth', 'activated', 'currentUser']], function () {
    // User Profile and Account Routes
    Route::resource(
        'profile',
        'ProfilesController', [
            'only' => [
                'account',
                'show',
                'edit',
                'update',
                'create',
            ],
        ]
    );
    Route::put('profile/{username}/updateUserAccount', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@updateUserAccount',
    ]);
    Route::put('profile/{username}/updateUserPassword', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@updateUserPassword',
    ]);
    Route::delete('profile/{username}/deleteUserAccount', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@deleteUserAccount',
    ]);

    // Route for user profile background image
    Route::get('account', [
        'as'   	=> '{username}',
        'uses' 	=> 'ProfilesController@account',
    ]);

    // Update User Profile Ajax Route
    Route::post('profile/{username}/updateAjax', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@update',
    ]);

    // Route to upload user avatar.
    Route::post('avatar/upload', ['as' => 'avatar.upload', 'uses' => 'ProfilesController@upload']);

    // Route to uplaod user background image
    Route::post('background/upload', ['as' => 'background.upload', 'uses' => 'ProfilesController@uploadBackground']);

    // User Tasks Routes
    Route::resource('/tasks', 'TasksController');
});

// Registered, activated, and is admin routes.
Route::group(['middleware' => ['auth', 'activated', 'role:admin']], function () {
    Route::resource('/users/deleted', 'SoftDeletesController', [
        'only' => [
            'index', 'show', 'update', 'destroy',
        ],
    ]);
    Route::resource('users', 'UsersManagementController', [
        'names'    => [
            'index'   => 'users',
            'create'  => 'create',
            'destroy' => 'user.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);
    Route::resource('themes', 'ThemesManagementController', [
        'names'    => [
            'index'   => 'themes',
            'destroy' => 'themes.destroy',
        ],
    ]);
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('php', 'AdminDetailsController@listPHPInfo');
    Route::get('routes', 'AdminDetailsController@listRoutes');


});

    Route::resource('empresas', 'EmpresasController');

/*
|--------------------------------------------------------------------------
| Where the main app (ScaffoldInterface) routes
|--------------------------------------------------------------------------
|
 */
Route::group(['middleware' => 'web'], function () {
    Route::get('scaffold', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@index');

    Route::post('scaffold/guipost', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@store');

    Route::get('scaffold/guirollback/{id}', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@destroy');

    Route::get('scaffold/guidelete/{id}', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@deleteMsg');

    Route::get('scaffold/getAttributes/{table}', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@getResult');

    Route::get('scaffold/migrate', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@migrate');

    Route::get('scaffold/rollback', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@rollback');

    Route::get('scaffold/manyToManyForm', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@manyToManyForm');

    Route::post('scaffold/manyToMany', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@manyToMany');

    Route::get('scaffold/graph', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@graph');
});

/*
|------------------------------------------------------------------------------
| Where user managment system routes (User-Role-Permission)
|------------------------------------------------------------------------------
|
 */
Route::group(['middleware' => ['web', 'auth']], function () {
    // you can change anything you want.
    //Dashboard
    Route::get('scaffold-dashboard', '\App\Http\Controllers\ScaffoldInterface\AppController@dashboard');

    //Users
    Route::get('scaffold-users', '\App\Http\Controllers\ScaffoldInterface\UserController@index');
    Route::get('scaffold-users/edit/{user_id}', '\App\Http\Controllers\ScaffoldInterface\UserController@edit');
    Route::post('scaffold-users/update', '\App\Http\Controllers\ScaffoldInterface\UserController@update');
    Route::get('scaffold-users/create', '\App\Http\Controllers\ScaffoldInterface\UserController@create');
    Route::post('scaffold-users/store', '\App\Http\Controllers\ScaffoldInterface\UserController@store');
    Route::get('scaffold-users/delete/{user_id}', '\App\Http\Controllers\ScaffoldInterface\UserController@destroy');
    Route::post('scaffold-users/addRole', '\App\Http\Controllers\ScaffoldInterface\UserController@addRole');
    Route::post('scaffold-users/addPermission', '\App\Http\Controllers\ScaffoldInterface\UserController@addPermission');
    Route::get('scaffold-users/removePermission/{permission}/{user_id}', '\App\Http\Controllers\ScaffoldInterface\UserController@revokePermission');
    Route::get('scaffold-users/removeRole/{role}/{user_id}', '\App\Http\Controllers\ScaffoldInterface\UserController@revokeRole');

    //Roles
    Route::get('scaffold-roles', '\App\Http\Controllers\ScaffoldInterface\RoleController@index');
    Route::get('scaffold-roles/edit/{role_id}', '\App\Http\Controllers\ScaffoldInterface\RoleController@edit');
    Route::post('scaffold-roles/update', '\App\Http\Controllers\ScaffoldInterface\RoleController@update');
    Route::get('scaffold-roles/create', '\App\Http\Controllers\ScaffoldInterface\RoleController@create');
    Route::post('scaffold-roles/store', '\App\Http\Controllers\ScaffoldInterface\RoleController@store');
    Route::get('scaffold-roles/delete/{role_id}', '\App\Http\Controllers\ScaffoldInterface\RoleController@destroy');

    //Permissions
    Route::get('scaffold-permissions', '\App\Http\Controllers\ScaffoldInterface\PermissionController@index');
    Route::get('scaffold-permissions/edit/{role_id}', '\App\Http\Controllers\ScaffoldInterface\PermissionController@edit');
    Route::post('scaffold-permissions/update', '\App\Http\Controllers\ScaffoldInterface\PermissionController@update');
    Route::get('scaffold-permissions/create', '\App\Http\Controllers\ScaffoldInterface\PermissionController@create');
    Route::post('scaffold-permissions/store', '\App\Http\Controllers\ScaffoldInterface\PermissionController@store');
    Route::get('scaffold-permissions/delete/{role_id}', '\App\Http\Controllers\ScaffoldInterface\PermissionController@destroy');

    Route::resource('schedule', '\App\Http\Controllers\ScheduleController');
    Route::resource('empresa', '\App\Http\Controllers\EmpresaController');
    Route::resource('contatos', '\App\Http\Controllers\PessoasController');
    Route::resource('guias', '\App\Http\Controllers\GuiasController');

    Route::get('/guia/{id}/confimar-pagamento', 'GuiasController@confirmarPagamento')->name('confirmar_pagamento');

    Route::post('schedule/update-data', 'ScheduleController@updateData')->name('atualizar_agendamento');
    Route::get('agendamentos/json', 'ScheduleController@agendamentos')->name('agendamentos_json');

    Route::put('schedule/{id}/start', 'ScheduleController@iniciarAgendamento')->name('iniciar_agendamento');
    Route::put('schedule/{id}/finish', 'ScheduleController@finalizarAgendamento')->name('finalizar_agendamento');
    Route::put('schedule/{id}/cancel', 'ScheduleController@cancelarAgendamento')->name('cancelar_agendamento');


});

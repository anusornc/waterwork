<?php

/**
 * All route names are prefixed with 'admin.access'.
 */
Route::group([
    'prefix'     => 'access',
    'as'         => 'access.',
    'namespace'  => 'Access',
], function () {

    /*
     * User Management
     */
    Route::group([
        'middleware' => 'access.routeNeedsPermission:manage-users',
    ], function () {
        Route::group(['namespace' => 'User'], function () {
            /*
             * For DataTables
             */
            Route::post('user/get', 'UserTableController')->name('user.get');

            /*
             * User Status'
             */
            Route::get('user/deactivated', 'UserStatusController@getDeactivated')->name('user.deactivated');
            Route::get('user/deleted', 'UserStatusController@getDeleted')->name('user.deleted');

            /*
             * User CRUD
             */
            Route::resource('user', 'UserController');

            /*
             * Specific User
             */
            Route::group(['prefix' => 'user/{user}'], function () {
                // Account
                Route::get('account/confirm/resend', 'UserConfirmationController@sendConfirmationEmail')->name('user.account.confirm.resend');

                // Status
                Route::get('mark/{status}', 'UserStatusController@mark')->name('user.mark')->where(['status' => '[0,1]']);

                // Password
                Route::get('password/change', 'UserPasswordController@edit')->name('user.change-password');
                Route::patch('password/change', 'UserPasswordController@update')->name('user.change-password');

                // Access
                Route::get('login-as', 'UserAccessController@loginAs')->name('user.login-as');
            });

            /*
             * Deleted User
             */
            Route::group(['prefix' => 'user/{deletedUser}'], function () {
                Route::get('delete', 'UserStatusController@delete')->name('user.delete-permanently');
                Route::get('restore', 'UserStatusController@restore')->name('user.restore');
            });
        });
    });

    /*
     * Role Management
     */
    Route::group([
        'middleware' => 'access.routeNeedsPermission:manage-roles',
    ], function () {
        Route::group(['namespace' => 'Role'], function () {
            Route::resource('role', 'RoleController', ['except' => ['show']]);

            //For DataTables
            Route::post('role/get', 'RoleTableController')->name('role.get');
        });
    });

    /*
     * Customer Management
     */
    Route::group([
        'middleware' => 'access.routeNeedsPermission:view-backend',
    ], function () {
        Route::group(['namespace' => 'Customer'], function () {
            Route::resource('customer', 'CustomerController');

            //For DataTables
            Route::post('customer/get', 'CustomerTableController')->name('customer.get');

            // Route::group(['namespace' => 'Service','as' =>'customer.','prefix'=>'customer'], function () {
            //     Route::resource('service', 'CustomerServiceController');

            //     //For DataTables
            //     Route::post('service/get', 'CustomerServiceTableController')->name('service.get');
            // });

            // Route::group(['namespace' => 'Service', 'as' => 'customer.','prefix' => 'customer/{customer}/'],function () {
            //         Route::get('/services','CustomerServiceController@index')->name('service.list');
            //         Route::get('/services/create','CustomerServiceController@create')->name('service.create');
            //         Route::delete('/services/{service}','CustomerServiceController@destroy')->name('service.destroy');
            //         Route::patch('/service/{service}','CustomerServiceController@update')->name('service.update');
            //         Route::get('/service/{service}/edit','CustomerServiceController@edit')->name('service.edit');

            //         //For DataTables
            //         Route::post('service/get', 'CustomerServiceTableController')->name('service.get');
            // });

            Route::group(['prefix' => 'customer/{customer}' , 'as' => 'customer.'],function() {
                Route::get('/services','CustomerController@serviceList')->name('service.list');
                Route::get('/services/create','CustomerController@serviceCreate')->name('service.create');
                //Route::delete('/services/{service}','CustomerController@serviceDestroy')->name('service.destroy');
                //Route::patch('/service/{service}','CustomerController@serviceUpdate')->name('service.update');
                Route::get('/service/{service}/edit','CustomerController@serviceEdit')->name('service.edit');
            });
            //For DataTables
            Route::group(['namespace' => 'Service', 'as' => 'customer.'],function() {
                Route::post('service/get', 'CustomerServiceTableController')->name('service.get');
            });

        });       
    });
});

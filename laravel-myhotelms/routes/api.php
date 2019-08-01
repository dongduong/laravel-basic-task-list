<?php

Route::group(['prefix' => 'v1', 'as' => 'admin.', 'namespace' => 'Api\V1\Admin'], function () {
    Route::apiResource('permissions', 'PermissionsApiController');

    Route::apiResource('roles', 'RolesApiController');

    Route::apiResource('users', 'UsersApiController');

    Route::apiResource('room-types', 'RoomTypesApiController');

    Route::apiResource('room-statuses', 'RoomStatusesApiController');

    Route::apiResource('rooms', 'RoomApiController');

    Route::apiResource('guests', 'GuestsApiController');

    Route::apiResource('reservations', 'ReservationsApiController');

    Route::apiResource('task-statuses', 'TaskStatusApiController');

    Route::apiResource('task-tags', 'TaskTagApiController');

    Route::apiResource('tasks', 'TaskApiController');

    Route::apiResource('tasks-calendars', 'TasksCalendarApiController');

    Route::apiResource('contact-companies', 'ContactCompanyApiController');

    Route::apiResource('contact-contacts', 'ContactContactsApiController');
});

<?php

Route::get('/', 'HomeController@index');
Route::get('rooms', ['uses' => 'RoomsController@index', 'as' => 'rooms.index']);
Route::get('services', ['uses' => 'ServicesController@index', 'as' => 'services.index']);
Route::get('about', ['uses' => 'AboutController@index', 'as' => 'about.index']);
Route::get('blog', ['uses' => 'BlogController@index', 'as' => 'blog.index']);
Route::get('contact', ['uses' => 'ContactController@index', 'as' => 'contact.index']);
Route::get('find_rooms', ['uses' => 'FindRoomsController@index', 'as' => 'find-rooms.index']);
Route::post('find_rooms', ['uses' => 'FindRoomsController@find', 'as' => 'find-rooms.find']);
Route::get('book_rooms', ['uses' => 'BookRoomsController@index', 'as' => 'book-rooms.index']);
Route::post('book_rooms', ['uses' => 'BookRoomsController@store', 'as' => 'book-rooms.store']);
Route::get('book_success', ['uses' => 'BookRoomsController@success', 'as' => 'book-rooms.success']);
Route::get('payment', ['uses' => 'PaymentController@index', 'as' => 'payment.index']);
Route::get('payment_success', ['uses' => 'PaymentController@success', 'as' => 'payment.success']);
Route::get('payment_failed', ['uses' => 'PaymentController@failed', 'as' => 'payment.failed']);
Route::post('paypal', ['uses' => 'PaymentController@paypal', 'as' => 'payment.paypal']);
Route::get('paypal_status', ['uses' => 'PaymentController@paypalStatus', 'as' => 'payment.paypal.status']);
Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('room-types/destroy', 'RoomTypesController@massDestroy')->name('room-types.massDestroy');

    Route::resource('room-types', 'RoomTypesController');

    Route::delete('room-statuses/destroy', 'RoomStatusesController@massDestroy')->name('room-statuses.massDestroy');

    Route::resource('room-statuses', 'RoomStatusesController');

    Route::delete('rooms/destroy', 'RoomController@massDestroy')->name('rooms.massDestroy');

    Route::resource('rooms', 'RoomController');

    Route::get('find_rooms', 'FindRoomsController@index')->name('find-rooms.index');

    Route::post('find_rooms', 'FindRoomsController@index');

    Route::delete('guests/destroy', 'GuestsController@massDestroy')->name('guests.massDestroy');

    Route::resource('guests', 'GuestsController');

    Route::delete('reservations/destroy', 'ReservationsController@massDestroy')->name('reservations.massDestroy');

    Route::resource('reservations', 'ReservationsController');

    Route::post('confirm_revervation/{reservation_id}', 'ReservationsController@confirm')->name('reservations.confirm');

    Route::post('cancel_revervation/{reservation_id}', 'ReservationsController@cancel')->name('reservations.cancel');

    Route::post('checkin_revervation/{reservation_id}', 'ReservationsController@checkin')->name('reservations.checkin');

    Route::post('checkout_revervation/{reservation_id}', 'ReservationsController@checkout')->name('reservations.checkout');

    Route::delete('reservation-statuses/destroy', 'ReservationStatusesController@massDestroy')->name('reservation-statuses.massDestroy');

    Route::resource('reservation-statuses', 'ReservationStatusesController');

    Route::delete('task-statuses/destroy', 'TaskStatusController@massDestroy')->name('task-statuses.massDestroy');

    Route::resource('task-statuses', 'TaskStatusController');

    Route::delete('task-tags/destroy', 'TaskTagController@massDestroy')->name('task-tags.massDestroy');

    Route::resource('task-tags', 'TaskTagController');

    Route::delete('tasks/destroy', 'TaskController@massDestroy')->name('tasks.massDestroy');

    Route::resource('tasks', 'TaskController');

    Route::post('tasks/media', 'TaskController@storeMedia')->name('tasks.storeMedia');

    Route::delete('tasks-calendars/destroy', 'TasksCalendarController@massDestroy')->name('tasks-calendars.massDestroy');

    Route::resource('tasks-calendars', 'TasksCalendarController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    Route::delete('contact-companies/destroy', 'ContactCompanyController@massDestroy')->name('contact-companies.massDestroy');

    Route::resource('contact-companies', 'ContactCompanyController');

    Route::delete('contact-contacts/destroy', 'ContactContactsController@massDestroy')->name('contact-contacts.massDestroy');

    Route::resource('contact-contacts', 'ContactContactsController');
});

<?php


Route::group(['as' => 'frontend.', 'namespace' => 'Frontend'], function () {
    Route::get('/', 'PagesController@index')->name('home');
    Route::get('/blogs/{slug}', 'PagesController@postDetail')->name('postDetail');
    Route::get('/package/{package}', 'PagesController@packageDetail')->name('packageDetail');
    Route::post('/package/{package}/book', 'PagesController@book');
    Route::get('/about', 'PagesController@about')->name('about');
    Route::get('/services', 'PagesController@services')->name('service');
    Route::get('/packages', 'PagesController@packages')->name('packages');
    Route::get('/destinations', 'PagesController@destinations')->name('destinations');
    Route::get('/blogs', 'PagesController@blogs')->name('blogs');
    Route::get('/contact', 'PagesController@contact')->name('contact');
    Route::post('/contact', 'PagesController@contactMail')->name('mail');
    Route::post('/{package}/comment', 'PagesController@comment')->name('comment');
    Route::delete('/comment/{comment}/delete', 'PagesController@deleteComment')->name('comment.delete');
});
// Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Slider
    Route::delete('sliders/destroy', 'SliderController@massDestroy')->name('sliders.massDestroy');
    Route::post('sliders/media', 'SliderController@storeMedia')->name('sliders.storeMedia');
    Route::post('sliders/ckmedia', 'SliderController@storeCKEditorImages')->name('sliders.storeCKEditorImages');
    Route::resource('sliders', 'SliderController');

    // Destination
    Route::delete('destinations/destroy', 'DestinationController@massDestroy')->name('destinations.massDestroy');
    Route::post('destinations/media', 'DestinationController@storeMedia')->name('destinations.storeMedia');
    Route::post('destinations/ckmedia', 'DestinationController@storeCKEditorImages')->name('destinations.storeCKEditorImages');
    Route::resource('destinations', 'DestinationController');

    // Post Category
    Route::delete('post-categories/destroy', 'PostCategoryController@massDestroy')->name('post-categories.massDestroy');
    Route::resource('post-categories', 'PostCategoryController');

    // Tag
    Route::delete('tags/destroy', 'TagController@massDestroy')->name('tags.massDestroy');
    Route::resource('tags', 'TagController');

    // Post
    Route::delete('posts/destroy', 'PostController@massDestroy')->name('posts.massDestroy');
    Route::post('posts/media', 'PostController@storeMedia')->name('posts.storeMedia');
    Route::post('posts/ckmedia', 'PostController@storeCKEditorImages')->name('posts.storeCKEditorImages');
    Route::resource('posts', 'PostController');

    // Package Type
    Route::delete('package-types/destroy', 'PackageTypeController@massDestroy')->name('package-types.massDestroy');
    Route::resource('package-types', 'PackageTypeController');

    // Package
    Route::delete('packages/destroy', 'PackageController@massDestroy')->name('packages.massDestroy');
    Route::post('packages/media', 'PackageController@storeMedia')->name('packages.storeMedia');
    Route::post('packages/ckmedia', 'PackageController@storeCKEditorImages')->name('packages.storeCKEditorImages');
    Route::resource('packages', 'PackageController');

    // Package Plan
    Route::delete('package-plans/destroy', 'PackagePlanController@massDestroy')->name('package-plans.massDestroy');
    Route::post('package-plans/media', 'PackagePlanController@storeMedia')->name('package-plans.storeMedia');
    Route::post('package-plans/ckmedia', 'PackagePlanController@storeCKEditorImages')->name('package-plans.storeCKEditorImages');
    Route::resource('package-plans', 'PackagePlanController');

    // Booking
    Route::delete('bookings/destroy', 'BookingController@massDestroy')->name('bookings.massDestroy');
    Route::resource('bookings', 'BookingController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

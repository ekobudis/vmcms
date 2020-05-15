<?php


//Route::get('{uri_link}',['as'=>'page','uses','Frontends\WebController@pages']);

//Dynamic Page
/*Route::get('{slug}', ['as' => 'page', 'uses' => 'FrontendController@getView']);
Route::get('{slug}/{detailSlug}',['as' => 'page','uses'=> 'FrontendController@getDetailView']);//->with('uri_tail', $detailSlug);
Route::get('sitemap.xml', ['as' => 'sitemap', 'uses' => 'SitemapController@index']);*/

//Route Back end
Auth::routes(['verify' => true]);

Route::group( array('prefix' => 'admin', 'as' => 'admin.','middleware' => ['auth']), function() {    
    Route::get('login','Auth\LoginController@showLoginForm')->name('login');
    
    Route::group(['prefix' => 'dashboard'], function() {
        Route::get('/','Backends\DashboardController@index')->name('dashboard');
       
    });

    Route::group(['prefix' => 'images'], function() {
        Route::get('/','Backends\BannerController@index')->name('images');
        Route::get('/create','Backends\BannerController@create')->name('images.create');
        Route::post('/','Backends\BannerController@store')->name('images.store');
        Route::get('/{id}','Backends\BannerController@edit')->name('images.edit');
        Route::patch('/{id}','Backends\BannerController@update')->name('images.update');
        Route::delete('/{id}','Backends\BannerController@delete')->name('images.delete');
    });

    Route::group(['prefix' => 'clients'], function() {
        Route::get('/','Backends\ClientController@index')->name('clients');
        Route::match(['get', 'post'],'/{webmaster_id}/create', 'Backends\ClientController@storeClient')->name('clients.store');
        Route::match(['get', 'put'],'/{webmaster_id}/client/{id}/update', 'Backends\ClientController@updateClient')->name('clients.update');

    });

    Route::group(['prefix' => 'careers'], function() {
        Route::get('/','Backends\CareerController@index')->name('careers');
        Route::match(['get', 'post'],'/{webmaster_id}/create', 'Backends\CareerController@storeClient')->name('careers.store');
        Route::match(['get', 'put'],'/{webmaster_id}/recruitments/{id}/update', 'Backends\CareerController@updateClient')->name('careers.update');

    });

    Route::group(['prefix' => 'pages'], function() {
        Route::get('/','Backends\PageController@index')->name('pages');
        Route::get('/create','Backends\PageController@create')->name('pages.create');
        Route::post('/','Backends\PageController@store')->name('pages.store');
        Route::get('/{id}','Backends\PageController@edit')->name('pages.edit');
        Route::patch('/{id}','Backends\PageController@update')->name('pages.update');
        Route::delete('/{id}','Backends\PageController@delete')->name('pages.delete');

        Route::get('{menu_id}/show','Backends\PageController@getCategoryByMenuID')->name('pages.show-category');
        //Add Category
        Route::get('/{id}/category','Backends\PageController@indexCategory')->name('pages.category');
        Route::match(['get', 'post'],'/{page_id}/category/create', 'Backends\PageController@storeCategory')->name('pages.category.store');
        Route::match(['get', 'put'],'/{page_id}/category/{id}/update', 'Backends\PageController@updateCategory')->name('pages.category.update');
        
    });

    Route::group(['prefix' => 'settings'], function() {
        Route::get('/','Backends\WebmasterController@getWebmaster')->name('settings');
        Route::get('/{id}','Backends\WebmasterController@edit')->name('settings.edit');
        Route::post('/','Backends\WebmasterController@store')->name('settings.store');
        Route::patch('/{id}','Backends\WebmasterController@update')->name('settings.update');

        //get Banner
        Route::get('{webmaster_id}/banner','Backends\WebmasterController@getBanner')->name('settings.banners');
        Route::match(['get', 'post'],'/{webmaster_id}/banner/create', 'Backends\WebmasterController@storeBanner')->name('settings.banners.store');
        Route::match(['get', 'put'],'/{webmaster_id}/banner/{id}', 'Backends\WebmasterController@updateBanner')->name('settings.banners.update');

        //get Site Page Section
        Route::get('{webmaster_id}/section','Backends\WebmasterController@getPageSection')->name('settings.section');
        Route::match(['get', 'post'],'/{webmaster_id}/section/create', 'Backends\WebmasterController@storePageSection')->name('settings.section.store');
        Route::match(['get', 'put'],'/{webmaster_id}/section/{id}', 'Backends\WebmasterController@updatePageSection')->name('settings.section.update');

        //get Work Hour
        Route::get('{webmaster_id}/work-hours','Backends\WebmasterController@getWorkHour')->name('settings.work-hours');
        Route::match(['get', 'post'],'/{webmaster_id}/work-hours/create', 'Backends\WebmasterController@storeWorkHour')->name('settings.work-hours.store');
        Route::match(['get', 'put'],'/{webmaster_id}/work-hours/{id}', 'Backends\WebmasterController@updateWorkHour')->name('settings.work-hours.update');

        //get Social Media
        Route::get('{webmaster_id}/social-media','Backends\WebmasterController@getSocial')->name('settings.social-medias');
        Route::match(['get', 'post'],'/{webmaster_id}/social-media/create', 'Backends\WebmasterController@storeSocial')->name('settings.social-medias.store');
        Route::match(['get', 'put'],'/{webmaster_id}/social-media/{id}', 'Backends\WebmasterController@updateSocial')->name('settings.social-medias.update');

        //get Phone Call Sales
        Route::get('{webmaster_id}/phones','Backends\WebmasterController@getPhoneCall')->name('settings.phones');
        Route::match(['get', 'post'],'/{webmaster_id}/phones/create', 'Backends\WebmasterController@storePhoneCall')->name('settings.phones.store');
        Route::match(['get', 'put'],'/{webmaster_id}/phones/{id}', 'Backends\WebmasterController@updatePhoneCall')->name('settings.phones.update');

        //get Mail Address
        Route::get('{webmaster_id}/mails','Backends\WebmasterController@getMailAddress')->name('settings.mails');
        Route::match(['get', 'post'],'/{webmaster_id}/mails/create', 'Backends\WebmasterController@storeMailAddress')->name('settings.mails.store');
        Route::match(['get', 'put'],'/{webmaster_id}/mails/{id}', 'Backends\WebmasterController@updateMailAddress')->name('settings.mails.update');

        //get Document
        Route::get('{webmaster_id}/documents','Backends\WebmasterController@getDocument')->name('settings.documents');
        Route::match(['get', 'post'],'/{webmaster_id}/documents/create', 'Backends\WebmasterController@storeDocument')->name('settings.documents.store');
        Route::match(['get', 'put'],'/{webmaster_id}/documents/{id}', 'Backends\WebmasterController@updateDocument')->name('settings.documents.update');
       
        //Menu Setting
        Route::get('/{webmaster_id}/menus','Backends\WebmasterController@getMenu')->name('settings.menus');

        //User Permission
        Route::get('/{webmaster_id}/user','Backends\WebmasterController@getUser')->name('settings.user');
        Route::match(['get', 'post'],'/{webmaster_id}/add-permission', 'Backends\WebmasterController@storePermission')->name('settings.permission.store');

        Route::match(['get', 'post'],'/{webmaster_id}/add-user', 'Backends\WebmasterController@storeUser')->name('settings.user.store');
    });
});

//Route Front End
Route::get('/', ['as' => 'root', 'uses' => 'Frontends\WebController@index']);
//Route::get('/{uri_link}', 'Frontends\WebController@pages');
Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
Route::get('/{uri_link}', 'Frontends\WebController@pages');
Route::get('/{uri_link}/{detail_content}', 'Frontends\WebController@pageContentDetails');
Route::post('contact','Frontends\WebController@storeCommentOrTesti');
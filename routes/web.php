<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsandUpdatesController;
use App\Http\Controllers\HomepageController;

Route::group(['namespace' => 'App\Http\Controllers'], function()
{ 
     //Homepage Routes
      Route::get('/', 'Frontend\HomeController@home')->name('home');

     // AboutUs Routes
      Route::get('/about/history', 'Frontend\AboutController@indexhistory')->name('about.history');
      Route::get('/about/location', 'Frontend\AboutController@indexlocation')->name('about.location');
      Route::get('/about/missionandvision', 'Frontend\AboutController@indexmissionandvision')->name('about.missionandvision');
      Route::get('/about/municipalityseal', 'Frontend\AboutController@indexmunicipalityseal')->name('about.municipalityseal');
      Route::get('/about/mandate', 'Frontend\AboutController@indexmandate')->name('about.mandate');
      Route::get('/about/servicepledge', 'Frontend\AboutController@indexservicepledge')->name('about.servicepledge');
      Route::get('/about/directory', 'Frontend\AboutController@indexdirectory')->name('about.directory');


     //News and Updates
     Route::get('/newsandupdates/news', 'Frontend\NewsandUpdatesController@indexnews')->name('newsandupdates.news');
     Route::get('/newsandupdates/upcomingupdates', 'Frontend\NewsandUpdatesController@indexupcomingupdates')->name('newsandupdates.upcomingupdates');

     //Services
     Route::get('/services/mayorsoffice', 'Frontend\ServicesController@indexmayorsoffice')->name('services.mayorsoffice');
     Route::get('/services/citizenscharter', 'Frontend\ServicesController@indexcitizenscharter')->name('services.citizenscharter');
     Route::get('/services/bomwasa','Frontend\ServicesController@indexbomwasa')->name('services.bomwasa');

     //Transparency
     Route::get('/transparency/municipalordinances', 'Frontend\TransparencyController@indexmunicipalordinances')->name('transparency.municipalordinances');
     Route::get('/transparency/resolutions', 'Frontend\TransparencyController@indexresolutions')->name('transparency.resolutions');

     //Tourism
     Route::get('/tourism/bontocattractions', 'Frontend\TourismController@indexbontocattractions')->name('tourism.bontocattractions');

     //Careers
     Route::get('/careers/jobvacancies', 'Frontend\CareersController@indexjobvacancies')->name('careers.jobvacancies');

     //Others
     Route::get('/others/downloadableforms', 'Frontend\OthersController@indexdownloadableforms')->name('others.downloadableforms');
     Route::get('/others/gallery', 'Frontend\OthersController@indexgallery')->name('others.gallery');
     Route::get('/others/memorandom', 'Frontend\OthersController@indexmemorandom')->name('others.memorandom');
     

    //Logout Routes
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');;

    //Login Routes
        Route::get('login' , [AuthController::class, 'login_show'])->name('login.show');
        Route::post('login' , [AuthController::class, 'login_perform'])->name('login.perform');

    //Register Routes
        // Route::get('register' , [AuthController::class, 'register_show']);
        // Route::post('register' , [AuthController::class, 'create_user']);

    //Forgot
        Route::get('forgot-password' , [AuthController::class, 'forgot']); 

    Route::group(['middleware' => ['auth'],'prefix'=> 'admin'], function() {

        // Dashboard
            Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

        // Home
        Route::get('home', [HomepageController::class, 'home']);
        Route::get('home/add', [HomepageController::class, 'home_add']);
        Route::post('home/add', [HomepageController::class, 'home_add_post']);
        Route::post('home/add', [HomepageController::class, 'home_add_post']);
        Route::get('home/edit/{id}', [HomepageController::class, 'home_edit']);
        Route::post('home/edit/{id}', [HomepageController::class, 'home_edit_post']);
        Route::get('home/delete/{id}', [HomepageController::class, 'home_delete']);

        //Admin Dashboard About Us
        Route::get('/aboutus/history', 'AboutusController@indexhistory')->name('admin.aboutus.history');
        Route::post('/aboutus/history/add', 'AboutusController@addhistory')->name('admin.aboutus.history.add');

        Route::get('/aboutus/location', 'AboutusController@indexlocation')->name('admin.aboutus.location');
        Route::post('/aboutus/location/add', 'AboutusController@addlocation')->name('admin.aboutus.location.add');
    
        Route::get('/aboutus/missionandvision', 'AboutusController@indexmissionandvision')->name('admin.aboutus.missionandvision');
        Route::post('/aboutus/missionandvision/add', 'AboutusController@addmissionandvision')->name('admin.aboutus.missionandvision.add');
                 
        Route::get('/aboutus/municipalityseal', 'AboutusController@indexmunicipalityseal')->name('admin.aboutus.municipalityseal');
        Route::post('/aboutus/municipalityseal/add', 'AboutusController@addmunicipalityseal')->name('admin.aboutus.municipalityseal.add');

        Route::get('/aboutus/servicepledge', 'AboutusController@indexservicepledge')->name('admin.aboutus.servicepledge');
        Route::post('/aboutus/servicepledge/add', 'AboutusController@addservicepledge')->name('admin.aboutus.servicepledge.add');

        Route::get('/aboutus/mandate', 'AboutusController@indexmandate')->name('admin.aboutus.mandate');
        Route::post('/aboutus/mandate/add', 'AboutusController@addmandate')->name('admin.aboutus.mandate.add');

        Route::get('/aboutus/directory', 'AboutusController@indexdirectory')->name('admin.aboutus.directory');
        Route::post('/aboutus/directory/add', 'AboutusController@adddirectory')->name('admin.aboutus.directory.add');

        //Admin Dashboard Careers
        Route::get('/careers/jobvacancies', 'CareersController@indexjobvacancies')->name('admin.careers.jobvacancies');
        Route::post('/careers/jobvacancies/add', 'CareersController@addjobvacancies')->name('admin.careers.jobvacancies.add');

        //Admin Dashboard Services
        Route::get('/services/mayorsoffice', 'ServicesController@indexmayorsoffice')->name('admin.services.mayorsoffice');
        Route::post('/services/mayorsoffice/add', 'ServicesController@addmayorsoffice')->name('admin.services.mayorsoffice.add');

        //Admin Dashboard Tourism
        Route::get('/tourism/bontocattractions', 'TourismController@indexbontocattractions')->name('admin.tourism.bontocattractions');

        Route::post('/tourism/bontocattractions/add', 'TourismController@addbontocattractions')->name('admin.tourism.bontocattractions.add');

        //Admin News and Updates
        Route::get('/newsandupdates/news/add', 'NewsandUpdatesController@addnews')->name('admin.newsandupdates.news.add');
        Route::get('/newsandupdates/news/list', 'NewsandUpdatesController@list')->name('admin.newsandupdates.news.list');
        // Route::get('/newsandupdates/news/list', 'NewsandUpdatesController@addnews')->name('admin.newsandupdates.news.list');
        Route::get('/newsandupdates/news/{id}', 'NewsandUpdatesController@addnews')->name('admin.newsandupdates.news');
        Route::post('/newsandupdates/news/add', 'NewsandUpdatesController@insertnews')->name('admin.newsandupdates.news.insert');
        Route::get('/newsandupdates/news/list', 'NewsandUpdatesController@listnews')->name('admin.newsandupdates.news.list');
        Route::get('/newsandupdates/news/edit/{id}', 'NewsandUpdatesController@editnews')->name('admin.newsandupdates.news.edit');
        Route::post('/newsandupdates/news/edit/{id}', 'NewsandUpdatesController@updatenews')->name('admin.newsandupdates.news.edit.update');
        Route::get('/newsandupdates/news/delete/{id}', 'NewsandUpdatesController@deletenews')->name('admin.newsandupdates.news.edit.delete');

        Route::get('/newsandupdates/upcomingupdates/add', 'NewsandUpdatesController@addnews')->name('admin.newsandupdates.upcomingupdates.add');
        Route::get('/newsandupdates/upcomingupdates/list', 'NewsandUpdatesController@list')->name('admin.newsandupdates.upcomingupdates.list');
        // Route::get('/newsandupdates/upcomingupdates/list', 'NewsandUpdatesController@addnews')->name('admin.newsandupdates.upcomingupdates.list');
        Route::get('/newsandupdates/upcomingupdates/{id}', 'NewsandUpdatesController@addupcomingupdates')->name('admin.newsandupdates.upcomingupdates');
        Route::post('/newsandupdates/upcomingupdates/add', 'NewsandUpdatesController@insertupcomingupdates')->name('admin.newsandupdates.upcomingupdates.insert');
        Route::get('/newsandupdates/upcomingupdates/list', 'NewsandUpdatesController@listupcomingupdates')->name('admin.newsandupdates.upcomingupdates.list');
        Route::get('/newsandupdates/upcomingupdates/edit/{id}', 'NewsandUpdatesController@editupcomingupdates')->name('admin.newsandupdates.upcomingupdates.edit');
        Route::post('/newsandupdates/upcomingupdates/edit/{id}', 'NewsandUpdatesController@updateupcomingupdates')->name('admin.newsandupdates.upcomingupdates.edit.update');
        Route::get('/newsandupdates/upcomingupdates/delete/{id}', 'NewsandUpdatesController@deleteupcomingupdates')->name('admin.newsandupdates.upcomingupdates.edit.delete');

        // Route::get('/newsandupdates/upcomingupdates', 'NewsandUpdatesController@indexupcomingupdates')->name('admin.newsandupdates.upcomingupdates');
        // Route::post('/newsandupdates/upcomingupdates/add', 'NewsandUpdatesController@addupcomingupdates')->name('admin.newsandupdates.upcomingupdates.add');

        //Admin Dashboard Transparency
        Route::get('/transparency/municipalordinances', 'TransparencyController@indexmunicipalordinances')->name('admin.transparency.municipalordinances');
        Route::post('/transparency/municipalordinances/add', 'TransparencyController@addmunicipalordinances')->name('admin.transparency.municipalordinances.add');
        Route::get('/transparency/resolutions', 'TransparencyController@indexresolutions')->name('admin.transparency.resolutions');
        Route::post('/transparency/resolutions/add', 'TransparencyController@addresolutions')->name('admin.transparency.resolutions.add');

        //Admin Dashboard Others
        Route::get('/others/downloadableforms', 'OthersController@indexdownloadableforms')->name('admin.others.downloadableforms');
        Route::post('/others/downloadableforms/add', 'OthersController@adddownloadableforms')->name('admin.others.downloadableforms.add');

        Route::get('/others/gallery', 'OthersController@indexgallery')->name('admin.others.gallery');
        Route::post('/others/gallery/add', 'OthersController@addgallery')->name('admin.others.gallery.add');

        Route::get('/others/memorandom', 'OthersController@indexmemorandom')->name('admin.others.memorandom');
        Route::post('/others/memorandom/add', 'OthersController@addmemorandom')->name('admin.others.memorandom.add');

        // Gallery

        Route::get('gallery' , [AuthController::class, 'gallery']);



    }); 
});
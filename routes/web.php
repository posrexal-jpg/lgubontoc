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
      // Load balancer health checks
      Route::get('/health', 'HealthCheckController@live')->name('health');
      Route::get('/health/live', 'HealthCheckController@live')->name('health.live');
      Route::get('/health/ready', 'HealthCheckController@ready')->name('health.ready');

      //Homepage Routes
      Route::get('/', 'Frontend\HomeController@home')->name('home');
      Route::get('/updates/{id}', 'Frontend\HomeController@show')->name('home.show');
      Route::redirect('/home/{id}', '/updates/{id}');
      Route::get('/search', 'Frontend\SearchController@index')->name('search');

     // AboutUs Routes
      Route::get('/about/history', 'Frontend\AboutController@indexhistory')->name('about.history');
      Route::get('/about/location', 'Frontend\AboutController@indexlocation')->name('about.location');
      Route::get('/about/missionandvision', 'Frontend\AboutController@indexmissionandvision')->name('about.missionandvision');
      Route::get('/about/municipalityseal', 'Frontend\AboutController@indexmunicipalityseal')->name('about.municipalityseal');
      Route::get('/about/mandate', 'Frontend\AboutController@indexmandate')->name('about.mandate');
      Route::get('/about/servicepledge', 'Frontend\AboutController@indexservicepledge')->name('about.servicepledge');
      Route::get('/about/directory', 'Frontend\AboutController@indexdirectory')->name('about.directory');
      Route::get('/government/elected-officials', 'Frontend\GovernmentController@electedOfficials')->name('government.elected-officials');
      Route::get('/government/legislative', 'Frontend\GovernmentController@legislative')->name('government.legislative');


     //News and Updates
     Route::get('/newsandupdates/news', 'Frontend\NewsandUpdatesController@indexnews')->name('newsandupdates.news');
     Route::get('/newsandupdates/news/{id}', 'Frontend\NewsandUpdatesController@shownews')->name('newsandupdates.news.show');
     Route::get('/newsandupdates/upcomingupdates', 'Frontend\NewsandUpdatesController@indexupcomingupdates')->name('newsandupdates.upcomingupdates');
     Route::get('/newsandupdates/upcomingupdates/{id}', 'Frontend\NewsandUpdatesController@showupcomingupdates')->name('newsandupdates.upcomingupdates.show');

     //Services
     Route::get('/services/mayorsoffice', 'Frontend\ServicesController@indexmayorsoffice')->name('services.mayorsoffice');
     Route::get('/services/citizenscharter', 'Frontend\ServicesController@indexcitizenscharter')->name('services.citizenscharter');
     Route::get('/services/bomwasa','Frontend\ServicesController@indexbomwasa')->name('services.bomwasa');

     //Transparency
     Route::get('/transparency/fdp-reports', 'Frontend\TransparencyController@indexFdpReports')->name('transparency.fdp-reports');
     Route::get('/transparency/municipalordinances', 'Frontend\TransparencyController@indexmunicipalordinances')->name('transparency.municipalordinances');
     Route::get('/transparency/resolutions', 'Frontend\TransparencyController@indexresolutions')->name('transparency.resolutions');

     //Tourism
     Route::get('/tourism', 'Frontend\TourismController@indexbontocattractions')->name('tourism.index');
     Route::get('/tourism/bontocattractions', 'Frontend\TourismController@indexbontocattractions')->name('tourism.bontocattractions');
     Route::get('/tourism/bontocattractions/{id}', 'Frontend\TourismController@showbontocattractions')->name('tourism.bontocattractions.show');

     //Careers
     Route::get('/careers/jobvacancies', 'Frontend\CareersController@indexjobvacancies')->name('careers.jobvacancies');
     Route::get('/careers/jobvacancies/{id}', 'Frontend\CareersController@showjobvacancies')->name('careers.jobvacancies.show');

     //Others
     Route::get('/others/downloadableforms', 'Frontend\OthersController@indexdownloadableforms')->name('others.downloadableforms');
     Route::get('/others/gallery', 'Frontend\OthersController@indexgallery')->name('others.gallery');
     Route::get('/others/gallery/{id}', 'Frontend\OthersController@showgallery')->name('others.gallery.show');
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

    Route::group(['middleware' => ['auth', 'admin.access', 'admin.activity'],'prefix'=> 'admin'], function() {

        // Dashboard
            Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

        // Activity logs
        Route::get('logs', 'ActivityLogController@index')->name('admin.logs.index');

        // Profile
        Route::get('profile', 'ProfileController@edit')->name('admin.profile.edit');
        Route::put('profile', 'ProfileController@update')->name('admin.profile.update');
        Route::put('profile/password', 'ProfileController@updatePassword')->name('admin.profile.password');

        // User management
        Route::resource('users', 'UserManagementController')
            ->except(['show'])
            ->names('admin.users');

        // Home
        Route::get('hero-images', 'HeroImageController@index')->name('admin.hero-images.index');
        Route::post('hero-images', 'HeroImageController@update')->name('admin.hero-images.update');
        Route::get('header-banner', 'HeroImageController@index')->name('admin.header-banner.index');
        Route::get('carousel', 'CarouselItemController@index')->name('admin.carousel.index');
        Route::post('carousel', 'CarouselItemController@store')->name('admin.carousel.store');
        Route::post('carousel/{id}', 'CarouselItemController@update')->name('admin.carousel.update');
        Route::get('carousel/delete/{id}', 'CarouselItemController@destroy')->name('admin.carousel.delete');
        Route::get('home', [HomepageController::class, 'home']);
        Route::get('home/add', [HomepageController::class, 'home_add']);
        Route::post('home/add', [HomepageController::class, 'home_add_post']);
        Route::post('home/add', [HomepageController::class, 'home_add_post']);
        Route::get('home/read/{id}', [HomepageController::class, 'home_show']);
        Route::get('home/edit/{id}', [HomepageController::class, 'home_edit']);
        Route::post('home/edit/{id}', [HomepageController::class, 'home_edit_post']);
        Route::get('home/delete/{id}', [HomepageController::class, 'home_delete']);

        //Admin Dashboard About Us
        Route::get('/aboutus/history', 'AboutusController@indexhistory')->name('admin.aboutus.history');
        Route::post('/aboutus/history/add', 'AboutusController@addhistory')->name('admin.aboutus.history.add');
        Route::get('/aboutus/history/read/{id}', 'AboutusController@showhistory')->name('admin.aboutus.history.show');
        Route::get('/aboutus/history/edit/{id}', 'AboutusController@edithistory')->name('admin.aboutus.history.edit');
        Route::get('/aboutus/history/delete/{id}', 'AboutusController@deletehistory')->name('admin.aboutus.history.delete');

        Route::get('/aboutus/location', 'AboutusController@indexlocation')->name('admin.aboutus.location');
        Route::post('/aboutus/location/add', 'AboutusController@addlocation')->name('admin.aboutus.location.add');
        Route::get('/aboutus/location/read/{id}', 'AboutusController@showlocation')->name('admin.aboutus.location.show');
        Route::get('/aboutus/location/edit/{id}', 'AboutusController@editlocation')->name('admin.aboutus.location.edit');
        Route::get('/aboutus/location/delete/{id}', 'AboutusController@deletelocation')->name('admin.aboutus.location.delete');
    
        Route::get('/aboutus/missionandvision', 'AboutusController@indexmissionandvision')->name('admin.aboutus.missionandvision');
        Route::post('/aboutus/missionandvision/add', 'AboutusController@addmissionandvision')->name('admin.aboutus.missionandvision.add');
        Route::get('/aboutus/missionandvision/read/{id}', 'AboutusController@showmissionandvision')->name('admin.aboutus.missionandvision.show');
        Route::get('/aboutus/missionandvision/edit/{id}', 'AboutusController@editmissionandvision')->name('admin.aboutus.missionandvision.edit');
        Route::get('/aboutus/missionandvision/delete/{id}', 'AboutusController@deletemissionandvision')->name('admin.aboutus.missionandvision.delete');
                 
        Route::get('/aboutus/municipalityseal', 'AboutusController@indexmunicipalityseal')->name('admin.aboutus.municipalityseal');
        Route::post('/aboutus/municipalityseal/add', 'AboutusController@addmunicipalityseal')->name('admin.aboutus.municipalityseal.add');
        Route::get('/aboutus/municipalityseal/read/{id}', 'AboutusController@showmunicipalityseal')->name('admin.aboutus.municipalityseal.show');
        Route::get('/aboutus/municipalityseal/edit/{id}', 'AboutusController@editmunicipalityseal')->name('admin.aboutus.municipalityseal.edit');
        Route::get('/aboutus/municipalityseal/delete/{id}', 'AboutusController@deletemunicipalityseal')->name('admin.aboutus.municipalityseal.delete');

        Route::get('/aboutus/servicepledge', 'AboutusController@indexservicepledge')->name('admin.aboutus.servicepledge');
        Route::post('/aboutus/servicepledge/add', 'AboutusController@addservicepledge')->name('admin.aboutus.servicepledge.add');
        Route::get('/aboutus/servicepledge/read/{id}', 'AboutusController@showservicepledge')->name('admin.aboutus.servicepledge.show');
        Route::get('/aboutus/servicepledge/edit/{id}', 'AboutusController@editservicepledge')->name('admin.aboutus.servicepledge.edit');
        Route::get('/aboutus/servicepledge/delete/{id}', 'AboutusController@deleteservicepledge')->name('admin.aboutus.servicepledge.delete');

        Route::get('/aboutus/mandate', 'AboutusController@indexmandate')->name('admin.aboutus.mandate');
        Route::post('/aboutus/mandate/add', 'AboutusController@addmandate')->name('admin.aboutus.mandate.add');
        Route::get('/aboutus/mandate/read/{id}', 'AboutusController@showmandate')->name('admin.aboutus.mandate.show');
        Route::get('/aboutus/mandate/edit/{id}', 'AboutusController@editmandate')->name('admin.aboutus.mandate.edit');
        Route::get('/aboutus/mandate/delete/{id}', 'AboutusController@deletemandate')->name('admin.aboutus.mandate.delete');

        Route::get('/aboutus/directory', 'AboutusController@indexdirectory')->name('admin.aboutus.directory');
        Route::post('/aboutus/directory/add', 'AboutusController@adddirectory')->name('admin.aboutus.directory.add');
        Route::get('/aboutus/directory/read/{id}', 'AboutusController@showdirectory')->name('admin.aboutus.directory.show');
        Route::get('/aboutus/directory/edit/{id}', 'AboutusController@editdirectory')->name('admin.aboutus.directory.edit');
        Route::get('/aboutus/directory/delete/{id}', 'AboutusController@deletedirectory')->name('admin.aboutus.directory.delete');

        //Admin Dashboard Government Officials
        Route::get('/government/officials', 'GovernmentOfficialController@index')->name('admin.government.officials.index');
        Route::post('/government/officials', 'GovernmentOfficialController@store')->name('admin.government.officials.store');
        Route::post('/government/officials/{id}', 'GovernmentOfficialController@update')->name('admin.government.officials.update');
        Route::get('/government/officials/delete/{id}', 'GovernmentOfficialController@destroy')->name('admin.government.officials.delete');

        //Admin Dashboard Careers
        Route::get('/careers/jobvacancies', 'CareersController@indexjobvacancies')->name('admin.careers.jobvacancies');
        Route::get('/careers/jobvacancies/read/{id}', 'CareersController@showjobvacancies')->name('admin.careers.jobvacancies.show');
        Route::get('/careers/jobvacancies/edit/{id}', 'CareersController@editjobvacancies')->name('admin.careers.jobvacancies.edit');
        Route::post('/careers/jobvacancies/add', 'CareersController@addjobvacancies')->name('admin.careers.jobvacancies.add');
        Route::get('/careers/jobvacancies/delete/{id}', 'CareersController@deletejobvacancies')->name('admin.careers.jobvacancies.delete');

        //Admin Dashboard Services
        Route::get('/services/mayorsoffice', 'ServicesController@indexmayorsoffice')->name('admin.services.mayorsoffice');
        Route::post('/services/mayorsoffice/add', 'ServicesController@addmayorsoffice')->name('admin.services.mayorsoffice.add');
        Route::get('/services/mayorsoffice/read/{id}', 'ServicesController@showmayorsoffice')->name('admin.services.mayorsoffice.show');
        Route::get('/services/mayorsoffice/edit/{id}', 'ServicesController@editmayorsoffice')->name('admin.services.mayorsoffice.edit');
        Route::get('/services/mayorsoffice/delete/{id}', 'ServicesController@deletemayorsoffice')->name('admin.services.mayorsoffice.delete');
        Route::get('/transactions/links', 'TransactionLinkController@index')->name('admin.transactions.links.index');
        Route::post('/transactions/links', 'TransactionLinkController@store')->name('admin.transactions.links.store');
        Route::post('/transactions/links/{id}', 'TransactionLinkController@update')->name('admin.transactions.links.update');
        Route::get('/transactions/links/delete/{id}', 'TransactionLinkController@destroy')->name('admin.transactions.links.delete');

        //Admin Dashboard Tourism
        Route::get('/tourism/bontocattractions', 'TourismController@indexbontocattractions')->name('admin.tourism.bontocattractions');
        Route::get('/tourism/bontocattractions/read/{id}', 'TourismController@showbontocattractions')->name('admin.tourism.bontocattractions.show');
        Route::get('/tourism/bontocattractions/edit/{id}', 'TourismController@editbontocattractions')->name('admin.tourism.bontocattractions.edit');
        Route::post('/tourism/bontocattractions/add', 'TourismController@addbontocattractions')->name('admin.tourism.bontocattractions.add');
        Route::get('/tourism/bontocattractions/photo/delete/{id}', 'TourismController@deletebontocattractionphoto')->name('admin.tourism.bontocattractions.photo.delete');
        Route::get('/tourism/bontocattractions/delete/{id}', 'TourismController@deletebontocattractions')->name('admin.tourism.bontocattractions.delete');

        //Admin News and Updates
        Route::get('/newsandupdates/news/add', 'NewsandUpdatesController@addnews')->name('admin.newsandupdates.news.add');
        Route::get('/newsandupdates/news/list', 'NewsandUpdatesController@list')->name('admin.newsandupdates.news.list');
        // Route::get('/newsandupdates/news/list', 'NewsandUpdatesController@addnews')->name('admin.newsandupdates.news.list');
        Route::get('/newsandupdates/news/{id}', 'NewsandUpdatesController@addnews')->name('admin.newsandupdates.news');
        Route::post('/newsandupdates/news/add', 'NewsandUpdatesController@insertnews')->name('admin.newsandupdates.news.insert');
        Route::get('/newsandupdates/news/list', 'NewsandUpdatesController@listnews')->name('admin.newsandupdates.news.list');
        Route::get('/newsandupdates/news/read/{id}', 'NewsandUpdatesController@shownews')->name('admin.newsandupdates.news.show');
        Route::get('/newsandupdates/news/edit/{id}', 'NewsandUpdatesController@editnews')->name('admin.newsandupdates.news.edit');
        Route::post('/newsandupdates/news/edit/{id}', 'NewsandUpdatesController@updatenews')->name('admin.newsandupdates.news.edit.update');
        Route::get('/newsandupdates/news/delete/{id}', 'NewsandUpdatesController@deletenews')->name('admin.newsandupdates.news.edit.delete');

        Route::get('/newsandupdates/upcomingupdates/add', 'NewsandUpdatesController@addupcomingupdates')->name('admin.newsandupdates.upcomingupdates.add');
        Route::post('/newsandupdates/upcomingupdates/add', 'NewsandUpdatesController@insertupcomingupdates')->name('admin.newsandupdates.upcomingupdates.insert');
        Route::get('/newsandupdates/upcomingupdates/list', 'NewsandUpdatesController@listupcomingupdates')->name('admin.newsandupdates.upcomingupdates.list');
        Route::get('/newsandupdates/upcomingupdates/read/{id}', 'NewsandUpdatesController@showupcomingupdates')->name('admin.newsandupdates.upcomingupdates.show');
        Route::get('/newsandupdates/upcomingupdates/edit/{id}', 'NewsandUpdatesController@editupcomingupdates')->name('admin.newsandupdates.upcomingupdates.edit');
        Route::post('/newsandupdates/upcomingupdates/edit/{id}', 'NewsandUpdatesController@updateupcomingupdates')->name('admin.newsandupdates.upcomingupdates.edit.update');
        Route::get('/newsandupdates/upcomingupdates/delete/{id}', 'NewsandUpdatesController@deleteupcomingupdates')->name('admin.newsandupdates.upcomingupdates.edit.delete');

        // Route::get('/newsandupdates/upcomingupdates', 'NewsandUpdatesController@indexupcomingupdates')->name('admin.newsandupdates.upcomingupdates');
        // Route::post('/newsandupdates/upcomingupdates/add', 'NewsandUpdatesController@addupcomingupdates')->name('admin.newsandupdates.upcomingupdates.add');

        //Admin Dashboard Transparency
        Route::get('/transparency/fdp-reports', 'FdpReportController@index')->name('admin.transparency.fdp-reports.index');
        Route::post('/transparency/fdp-reports', 'FdpReportController@store')->name('admin.transparency.fdp-reports.store');
        Route::post('/transparency/fdp-reports/{id}', 'FdpReportController@update')->name('admin.transparency.fdp-reports.update');
        Route::get('/transparency/fdp-reports/delete/{id}', 'FdpReportController@destroy')->name('admin.transparency.fdp-reports.delete');
        Route::get('/transparency/municipalordinances', 'TransparencyController@indexmunicipalordinances')->name('admin.transparency.municipalordinances');
        Route::post('/transparency/municipalordinances/add', 'TransparencyController@addmunicipalordinances')->name('admin.transparency.municipalordinances.add');
        Route::get('/transparency/municipalordinances/read/{id}', 'TransparencyController@showmunicipalordinances')->name('admin.transparency.municipalordinances.show');
        Route::get('/transparency/municipalordinances/edit/{id}', 'TransparencyController@editmunicipalordinances')->name('admin.transparency.municipalordinances.edit');
        Route::get('/transparency/municipalordinances/delete/{id}', 'TransparencyController@deletemunicipalordinances')->name('admin.transparency.municipalordinances.delete');
        Route::get('/transparency/resolutions', 'TransparencyController@indexresolutions')->name('admin.transparency.resolutions');
        Route::post('/transparency/resolutions/add', 'TransparencyController@addresolutions')->name('admin.transparency.resolutions.add');
        Route::get('/transparency/resolutions/read/{id}', 'TransparencyController@showresolutions')->name('admin.transparency.resolutions.show');
        Route::get('/transparency/resolutions/edit/{id}', 'TransparencyController@editresolutions')->name('admin.transparency.resolutions.edit');
        Route::get('/transparency/resolutions/delete/{id}', 'TransparencyController@deleteresolutions')->name('admin.transparency.resolutions.delete');

        //Admin Dashboard Others
        Route::get('/others/downloadableforms', 'OthersController@indexdownloadableforms')->name('admin.others.downloadableforms');
        Route::post('/others/downloadableforms/add', 'OthersController@adddownloadableforms')->name('admin.others.downloadableforms.add');
        Route::get('/others/downloadableforms/read/{id}', 'OthersController@showdownloadableforms')->name('admin.others.downloadableforms.show');
        Route::get('/others/downloadableforms/edit/{id}', 'OthersController@editdownloadableforms')->name('admin.others.downloadableforms.edit');
        Route::get('/others/downloadableforms/delete/{id}', 'OthersController@deletedownloadableforms')->name('admin.others.downloadableforms.delete');

        Route::get('/others/gallery', 'OthersController@indexgallery')->name('admin.others.gallery');
        Route::post('/others/gallery/add', 'OthersController@addgallery')->name('admin.others.gallery.add');
        Route::get('/others/gallery/read/{id}', 'OthersController@showgallery')->name('admin.others.gallery.show');
        Route::get('/others/gallery/edit/{id}', 'OthersController@editgallery')->name('admin.others.gallery.edit');
        Route::get('/others/gallery/delete/{id}', 'OthersController@deletegallery')->name('admin.others.gallery.delete');

        Route::get('/others/memorandom', 'OthersController@indexmemorandom')->name('admin.others.memorandom');
        Route::post('/others/memorandom/add', 'OthersController@addmemorandom')->name('admin.others.memorandom.add');
        Route::get('/others/memorandom/read/{id}', 'OthersController@showmemorandom')->name('admin.others.memorandom.show');
        Route::get('/others/memorandom/edit/{id}', 'OthersController@editmemorandom')->name('admin.others.memorandom.edit');
        Route::get('/others/memorandom/delete/{id}', 'OthersController@deletememorandom')->name('admin.others.memorandom.delete');

        // Gallery

        Route::get('gallery' , [AuthController::class, 'gallery']);



    }); 
});

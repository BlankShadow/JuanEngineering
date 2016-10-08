<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


    /*  LANDING PAGE */
    Route::get('/','LoginController@getLandingPage');
    Route::post('getInTouch','LoginController@getInTouch');
    Route::get('/logout', 'LoginController@logout');

    /*  SIGN UP */
    Route::group(array('prefix' => 'signup'), function(){
        Route::get('/', 'SignUpController@getSignUpPage');
        Route::post('/', 'SignUpController@addUser');

        Route::get('/checkemail', 'SignUpController@checkEmail');
        Route::get('/checkusername', 'SignUpController@checkUsername');
        Route::get('/verifyaccount', 'SignUpController@getVerificationPage');
        Route::get('/verifyaccount/{userid}/{verificationCode}',  ['uses' =>'SignUpController@verifyUserAccount']);

        Route::get('step-2', 'SignUpController@getSignUpPageStep2');
        Route::post('step-2', 'SignUpController@addUserType');

        Route::get('step-3', 'SignUpController@getSignUpPageStep3');
        Route::post('step-3', 'SignUpController@addUserTags');

        Route::get('step-4', 'SignUpController@getSignUpPageStep4');
        Route::get('step-4', 'SignUpController@addUserInfo');

    });


    /*  LOG IN */
    Route::group(array('prefix' => 'login'), function(){
        Route::get('/', 'LoginController@getLoginModal');
        Route::get('/checkemail', 'LoginController@checkEmail');
        Route::get('/checkaccount', 'LoginController@checkAccount');        
        Route::post('/forgot', 'LoginController@sendMail');
        
     
      
    });


    /*  Profile */
    Route::group(array('prefix' => 'profile'), function(){
        Route::get('/', 'LoginController@getProfilePage');
        Route::get('/{user_name}', 'UserAccountController@getProfilePage');
        Route::get('/{user_id}/portfolio', 'ArtistProfileController@getPortfolio');
        Route::get('/{user_id}/portfolio/get', 'ArtistProfileController@getSelectedPortfolio');
        Route::post('/portfolio/save', 'ArtistProfileController@savePortfolio');
        Route::get('/{user_id}/follow', 'UserAccountController@follow');
        Route::post('/update', 'UserAccountController@updateUserInfo');
        Route::post('/updateimage', 'UserAccountController@updateUserPicture');
    });


    /*  Account Settings */
    Route::group(array('prefix' => 'account-settings'), function(){

        Route::get('/', 'UserAccountController@getAccountSettingsPage');
        Route::get('/checkemail', 'UserAccountController@checkEmail');
        Route::get('/checkusername', 'UserAccountController@checkUsername');
        Route::get('/changeemail', 'UserAccountController@changeEmail');
        Route::get('/changepassword', 'UserAccountController@changePassword');

    });

    /*  Contests */
    Route::group(array('prefix' => 'contest'), function(){


        Route::get('/new', 'EmployerContestController@getNewContestPage');
        Route::post('/add', 'EmployerContestController@addContest');
        Route::post('/update', 'EmployerContestController@updateContestBrief');

        Route::post('/{contestid}/entry/add', 'ArtistContestController@addContestEntry');

        Route::get('/', 'ContestController@getContestPage');
        Route::get('/browse', 'ContestController@getAllContests');
        Route::get('/my-contest', 'ContestController@getMyContestsPage');
        Route::get('/employer/{status}', 'ContestController@getEmployerContests');
        Route::get('/{contestid}', 'ContestController@getContestViewPage');
        Route::get('/{contestid}/watch', 'ContestController@watch');
        Route::get('/entry/{contest_entry_id}', 'ContestController@getDesignDetails');
        Route::get('/entry/{contest_entry_id}/comments', 'ContestController@getDesignComments');
        Route::post('/entry/{contest_entry_id}/comment/add', 'ContestController@addDesignComment');
        Route::get('/entry/{contest_entry_id}/comment/{comment_id}/delete', 'ContestController@deleteDesignComment');
        Route::get('/entry/{contest_entry_id}/like/add', 'ContestController@addLike');
        Route::get('/entry/{contest_entry_id}/likes', 'ContestController@getDesignLikes');
        Route::post('/entry/report', 'ContestController@addReport');

    });

    Route::group(array('prefix' => 'discover'), function(){



    });

    Route::group(array('prefix' => 'shop'), function(){
      Route::get('/', 'ShopController@getCreativeShopPage');
      Route::get('/my-shop', 'ShopController@getMyShopPage');

    });




//
//
// //--------------------------------------------------------------------------
// //  Admin
// //-------------------------------------------------------------------------
// Route::get('/admin', function () {
//     return view('pages/admin/index');
// });
//

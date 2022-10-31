<?php

  // async login({state, commit, rootState }, params ){
  //   return await auth.login(rootState.apiServer+"/authentication/login", params) 
  // },
   
  // async logout({state , commit, rootState},params){
  //   return await auth.logout(rootState.apiServer+"/authentication/logout",params)
  // },

  // async signup({state, commit, rootState }, params ){
  //   return await auth.signup(rootState.apiServer+"/authentication/signup", params) 
  // },

  /**
   * Section client
   */
  // async list ({ state, commit, rootState },params) {
  //   return await crud.list(rootState.apiServer+"/"+state.model.name,params)
  // },
  // async read ({ state, commit, rootState },params) {
  //   return await crud.read(rootState.apiServer+"/"+state.model.name+"/"+params.id)
  // },
  // async create ({ state, commit, rootState },params) {
  //   return await crud.create(rootState.apiServer+"/"+state.model.name+"/create",params)
  // },
  // async update ({ state, commit, rootState },params) {
  //   return await crud.update(rootState.apiServer+"/"+state.model.name+"/update",params)
  // },
  // async delete ({ state, commit, rootState },params) {
  //   return await crud.delete(rootState.apiServer+"/"+state.model.name+"/"+params.id)
  // }

  /**
   * Section folder
   */
  // async list ({ state, commit, rootState },params) {
  //   return await crud.list(rootState.apiServer+"/"+state.model.name,params)
  // },
  // async read ({ state, commit, rootState },params) {
  //   return await crud.read(rootState.apiServer+"/"+state.model.name+"/"+params.id)
  // },
  // async create ({ state, commit, rootState },params) {
  //   return await crud.create(rootState.apiServer+"/"+state.model.name+"/create",params)
  // },
  // async update ({ state, commit, rootState },params) {
  //   return await crud.update(rootState.apiServer+"/"+state.model.name+"/update",params)
  // },
  // async delete ({ state, commit, rootState },params) {
  //   return await crud.delete(rootState.apiServer+"/"+state.model.name+"/"+params.id)
  // },
  // async regulators ({ state, commit, rootState },params) {
  //   return await crud.read(rootState.apiServer+"/"+state.model.name+"/"+params.id+"/regulators")
  // },
  // async addRegulator ({ state, commit, rootState },params) {
  //   return await crud.update(rootState.apiServer+"/"+state.model.name+"/regulators/add")
  // },
  // async removeRegulator ({ state, commit, rootState },params) {
  //   return await crud.update(rootState.apiServer+"/"+state.model.name+"/regulators/remove")
  // },

  /**
   * Section regulator
   */

  // async list ({ state, commit, rootState },params) {
  //   return await crud.list(
  //     rootState.apiServer+"/"+state.model.name + "?" + new URLSearchParams({
  //       // unit: params.unit ,
  //       // date: params.date ,
  //       // number: params.number ,
  //       // type: params.type ,
  //       search: params.search ,
  //       perPage: params.perPage ,
  //       page: params.page
  //     }).toString(),
  //     null,
  //     false
  //   )
  // },
  // async read ({ state, commit, rootState },params) {
  //   return await crud.read(rootState.apiServer+"/"+state.model.name+"/"+params.id)
  // },
  // async compact ({ state, commit, rootState },params) {
  //   return await crud.list(rootState.apiServer+"/"+state.model.name + "/compact" + ( params !== undefined ? "?" + new URLSearchParams({
  //     page: params.page ,
  //     perPage : params.perPage ,
  //     search: params.search ,
  //   }).toString(): ""))
  // },

  /**
   * Section staff
   */
  // async list ({ state, commit, rootState },params) {
  //   return await crud.list(rootState.apiServer+"/"+state.model.name,params)
  // },
  // async read ({ state, commit, rootState },params) {
  //   return await crud.read(rootState.apiServer+"/"+state.model.name+"/"+params.id)
  // },
  // async create ({ state, commit, rootState },params) {
  //   return await crud.create(rootState.apiServer+"/"+state.model.name+"/create",params)
  // },
  // async update ({ state, commit, rootState },params) {
  //   return await crud.update(rootState.apiServer+"/"+state.model.name+"/update",params)
  // },
  // async delete ({ state, commit, rootState },params) {
  //   return await crud.delete(rootState.apiServer+"/"+state.model.name+"/"+params.id)
  // }

  /**
   * Section user / account
   */
  // async list ({ state, commit, rootState },params) {
  //   return await crud.list(rootState.apiServer+"/"+state.model.name + "?" + new URLSearchParams({
  //       search: params.search ,
  //       perPage: params.perPage ,
  //       page: params.page
  //     }).toString()
  //   )
  // },
  // async read ({ state, commit, rootState },params) {
  //   return await crud.read(rootState.apiServer+"/"+state.model.name+"/"+params.id)
  // },
  // async create ({ state, commit, rootState },params) {
  //   return await crud.create(rootState.apiServer+"/"+state.model.name,params)
  // },
  // async update ({ state, commit, rootState },params) {
  //   return await crud.update(rootState.apiServer+"/"+state.model.name,params)
  // },
  // async passwordChange ({ state, commit, rootState },params) {
  //   return await crud.update(rootState.apiServer+"/"+state.model.name+"/password/change",params)
  // },
  // async delete ({ state, commit, rootState },params) {
  //   return await crud.delete(rootState.apiServer+"/"+state.model.name+"/"+params.id)
  // },
  // async checkUsername({ state, commit, rootState },params) {
  //   return await crud.read(rootState.apiServer+"/"+state.model.name+"/username/exist?username="+params.username)
  // },
  // async checkPhone({ state, commit, rootState },params) {
  //   return await crud.read(rootState.apiServer+"/"+state.model.name+"/phone/exist?phone="+params.phone)
  // },
  // async checkEmail({ state, commit, rootState },params) {
  //   return await crud.read(rootState.apiServer+"/"+state.model.name+"/email/exist?email="+params.email)
  // },
  // async signupConfirmation({ state, commit, rootState },params) {
  //   return await crud.get(rootState.apiServer+"/authentication/signup/activate/"+params.token)
  // },

use Illuminate\Http\Request;

Route::group([
  'prefix' => 'webapp' ,
  'namespace' => 'Api\Webapp' ,
  'api'
],function(){
  /** SIGNING SECTION */
  Route::group([
    'prefix' => 'authentication'
  ], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::put('signup/activate', 'AuthController@signupActivate');

    Route::group([
      'middleware' => 'auth'
    ], function() {
        Route::post('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
  });

  /** USER/ACCOUNT SECTION */
  Route::group([
    'prefix' => 'users' ,
    'middleware' => 'auth'
    ], function() {
      /**
       * Api for cin
       */
      Route::get('','UserController@index');
      Route::post('','UserController@create');
      Route::put('','UserController@update');
      Route::get('{id}','UserController@read');
      Route::delete('','UserController@destroy');
      Route::put('activate','UserController@active');
      Route::put('password/change','UserController@passwordChange');
  });

  Route::group([
    'prefix' => 'users/authenticated' ,
    'middleware' => 'auth:api'
    ], function() {
      /**
       * Api for profile
       */
          Route::get('','ProfileController@getAuthUser');
          Route::put('','ProfileController@updateAuthUser');
          Route::put('password','ProfileController@updateAuthUserPassword');
          Route::post('picture/upload','ProfileController@upload');
  });

  
  /** RESET PASSWORD */
  Route::put('password/forgot','UserController@forgotPassword');
  Route::put('password/forgot/confirm','UserController@checkConfirmationCode');
  Route::put('password/reset','UserController@passwordReset');

  /** SEARCH SECTION */
  Route::group([
    'prefix' => 'regulators' ,
    ], function() {
        Route::get('','SearchController@index');
        Route::get('pdf','SearchController@pdf');
        Route::get('get/document/years','SearchController@getYears');
        Route::group([
            'prefix' => 'types' ,
            ], function() {
                Route::get('compact', "TypeController@compactList");
        });
        Route::get('types/compact', "TypeController@compactList");
        Route::get('{id}','RegulatorController@read');
        Route::post('','RegulatorController@create');
        Route::put('','RegulatorController@update');
        Route::delete('','RegulatorController@destroy');

  });
  /** FOLDER SECTION */
  Route::group([
    'prefix' => 'folders' ,
    'middleware' => 'auth:api'
    ], function() {
        Route::get('','FolderController@index');
        Route::post('','FolderController@create');
        Route::get('{id}/read','FolderController@read');
        Route::put('','FolderController@update');
        Route::delete('','FolderController@delete');
        
        Route::get('regulators','FolderController@regulators');
        Route::put('regulators/add','FolderController@addDocumentToFolder');
        Route::put('regulators/remove','FolderController@removeDocumentToFolder');
        Route::put('regulators/check','FolderController@checkDocument');
        
        Route::get('user','FolderController@user');
  });
  /** SECTION OF DOCUMENT TYPE */
  Route::group([
    'prefix' => 'types' ,
    'middleware' => 'auth'
    ], function() {
        Route::get('','TypeController@index');
  });

  /** SECTION OF MINISTRY */
  Route::group([
    'prefix' => 'ministries' ,
    'middleware' => 'auth'
    ], function() {
        Route::get('','MinistryController@index');
  });

  /** PROFILE SECTION */
  Route::group([
    'prefix' => 'profile',
    'middleware' => 'auth'
  ], function() {
    
  });

});
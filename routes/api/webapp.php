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

use \App\Models\TrackPerformance;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Webapp\SearchController;
use App\Http\Controllers\Api\Webapp\AuthController;
use App\Http\Controllers\Api\Webapp\UserController;
use App\Http\Controllers\Api\Webapp\ProfileController;
use App\Http\Controllers\Api\Webapp\RegulatorController;
use App\Http\Controllers\Api\Webapp\TypeController;
use App\Http\Controllers\Api\Webapp\FolderController;
use App\Http\Controllers\Api\Webapp\MinistryController;

Route::group([
  'prefix' => 'webapp' ,
  'api'
],function(){
  /** SIGNING SECTION */
  Route::group([
    'prefix' => 'authentication'
  ], function () {
    Route::post('login', [AuthController::class,'login']);
    Route::post('signup', [AuthController::class,'signup']);
    Route::put('signup/activate', [AuthController::class,'signupActivate']);
    Route::group([
      'middleware' => 'auth'
    ], function() {
        Route::post('logout', [AuthController::class,'logout']);
        Route::get('user', [AuthController::class,'user']);
    });
  });

  /** USER/ACCOUNT SECTION */
  Route::group([
    'prefix' => 'users' ,
    'middleware' => 'auth:api'
    ], function() {
      /**
       * Api for cin
       */
      Route::get('',[UserController::class,'index']);
      Route::post('',[UserController::class,'index']);
      Route::put('',[UserController::class,'update']);
      Route::get('{id}',[UserController::class,'read']);
      Route::delete('',[UserController::class,'destroy']);
      Route::put('activate',[UserController::class,'active']);
      Route::put('password/change',[UserController::class,'logout']);
      Route::post('upload',[UserController::class,'upload']);
  });

  Route::group([
    'prefix' => 'users/authenticated' ,
    'middleware' => 'auth:api'
    ], function() {
      /**
       * Api for profile
       */
          Route::get('',[ProfileController::class,'getAuthUser']);
          Route::put('',[ProfileController::class,'updateAuthUser']);
          Route::put('password',[ProfileController::class,'updateAuthUserPassword']);
          Route::post('picture/upload',[ProfileController::class,'upload']);
  });

  
  /** RESET PASSWORD */
  Route::put('password/forgot',[UserController::class,'forgotPassword']);
  Route::put('password/forgot/confirm',[UserController::class,'checkConfirmationCode']);
  Route::put('password/reset',[UserController::class,'passwordReset']);

  /** SEARCH SECTION */
  Route::group([
    'prefix' => 'search_regulators' ,
    ], function() {
      TrackPerformance::start('WebappSearchRegulator');
      Route::get('',[ SearchController::class , 'index']);
      TrackPerformance::end('WebappSearchRegulator');
      TrackPerformance::save();
      // Route::get('',function(){
      //   return 'I am "regulators->SearchController"';
      // });
      Route::get('pdf',[ SearchController::class , 'pdf']);
      Route::get('get/document/years',[ SearchController::class , 'getYears']);
      Route::group([
          'prefix' => 'types' ,
          ], function() {
              Route::get('compact', [ TypeController::class , 'index']);
      });
      Route::get('types/compact', [ TypeController::class , 'compactList']);
      Route::get('{id}',[ RegulatorController::class , 'read']);

  });

  /** SEARCH SECTION */
  Route::group([
    'prefix' => 'regulators' ,
    'namespace' => 'Api' ,
    'middleware' => 'auth:api'
    ], function() {;
        Route::get('',[RegulatorController::class,'index']);
        Route::post('',[RegulatorController::class,'create']);
        Route::put('',[RegulatorController::class,'update']);
        Route::put('{id}/activate',[RegulatorController::class,'activate']);
        Route::put('{id}/deactivate',[RegulatorController::class,'deactivate']);
        Route::delete('',[RegulatorController::class,'destroy']);
        Route::post('upload',[RegulatorController::class,'upload']);

        Route::put('addreader',[RegulatorController::class,'addReaders']);
        Route::put('removereader',[RegulatorController::class,'removeReaders']);
        Route::put('{id}/accessibility',[RegulatorController::class,'accessibility']);

        Route::get('pdf',[RegulatorController::class,'pdf']);
        Route::group([
            'prefix' => 'types' ,
            ], function() {
                Route::get('compact', [TypeController::class,'compactList']);
        });

});

  /** FOLDER SECTION */
  Route::group([
    'prefix' => 'folders' ,
    'middleware' => 'auth:api'
    ], function() {

        Route::get('',[ FolderController::class , 'index']);
        Route::post('',[ FolderController::class , 'create']);
        Route::get('{id}/read',[ FolderController::class , 'read']);
        Route::put('',[ FolderController::class , 'update']);
        Route::delete('',[ FolderController::class , 'delete']);
        Route::get('regulators',[ FolderController::class , 'regulators']);
        Route::put('regulators/add',[ FolderController::class , 'addDocumentToFolder']);
        Route::put('regulators/remove',[ FolderController::class , 'removeDocumentFromFolder']);
        Route::put('regulators/check',[ FolderController::class , 'checkDocument']);
        Route::get('user',[ FolderController::class , 'user']);
        Route::get('list/document/validation',[ FolderController::class , 'listFolderWithDocumentValidation']);

        Route::put('{id}/accessibility',[FolderController::class,'accessibility']);
        
  });
  /** FOLDER SECTION */
  Route::group([
    'prefix' => 'folders' ,
    'middleware' => 'api'
    ], function() {
        Route::get('global',[ FolderController::class , 'globalFolder']);
        
  });
  /** SECTION OF DOCUMENT TYPE */
  Route::group([
    'prefix' => 'types' ,
    'middleware' => 'auth'
    ], function() {
        Route::get('',[TypeController::class,'index']);
  });

  /** SECTION OF MINISTRY */
  Route::group([
    'prefix' => 'ministries' ,
    'middleware' => 'auth'
    ], function() {
        Route::get('',[MinistryController::class,'@index']);
  });

});
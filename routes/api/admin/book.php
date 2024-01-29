<?php
/** Book SECTION */
Route::group([
  'prefix' => 'books' ,
  'namespaces' => '\App\Http\Controllers\Api\Admin\Book' ,
  'middleware' => 'auth:api'
  ], function() {

  /**
   * Book Section
   */
  Route::group([
    'prefix' => '' ,
    ], function() {
      Route::get('', 'BookController@index');
      Route::get('{id}', 'BookController@read')->where('id', '[0-9]+');
      Route::get('{id}/structure', 'BookController@structure')->where('id', '[0-9]+');
      Route::get('{id}/kunties', 'BookController@kunties')->where('id', '[0-9]+');
      Route::get('{id}/matikas', 'BookController@matikas')->where('id', '[0-9]+');
      Route::get('{id}/matras', 'MatraController@ofBook')->where('id', '[0-9]+');
      Route::get('exists', 'BookController@exists');
      /** Mini display */
      Route::get('compact', "BookController@compactList");

      Route::post('', 'BookController@store');
      Route::post('{id}/save/structure', 'BookController@saveStructure')->where('id', '[0-9]+');
      Route::post('removefile', 'BookController@removefile');

      Route::put('', 'BookController@update')->where('id', '[0-9]+');
      Route::post('upload', 'BookController@upload');
      /** Activate / Deactivate the data for using */
      Route::put('{id}/activate', 'BookController@active')->where('id', '[0-9]+');
      Route::put('{id}/deactivate', 'BookController@unactive')->where('id', '[0-9]+');

      Route::delete('{id}', 'BookController@delete')->where('id', '[0-9]+');
  });
  /**
   * Kunty Section
   */
  Route::group([
    'prefix' => 'kunties' ,
    ], function() {
      Route::get('', 'KuntyController@index');
      Route::get('{id}', 'KuntyController@read')->where('id', '[0-9]+');
      Route::get('{id}/structure', 'KuntyController@structure')->where('id', '[0-9]+');
      Route::get('{id}/matikas', 'KuntyController@matikas')->where('id', '[0-9]+');
      Route::get('{id}/chapters', 'KuntyController@chapters')->where('id', '[0-9]+');
      Route::get('exists', 'KuntyController@exists');
      /** Mini display */
      Route::get('compact', "KuntyController@compactList");

      Route::post('', 'KuntyController@store');
      Route::post('{id}/save/structure', 'KuntyController@saveStructure')->where('id', '[0-9]+');

      Route::put('', 'KuntyController@update')->where('id', '[0-9]+');
      /** Activate / Deactivate the data for using */
      Route::put('{id}/activate', 'KuntyController@active')->where('id', '[0-9]+');
      Route::put('{id}/deactivate', 'KuntyController@unactive')->where('id', '[0-9]+');

      Route::delete('{id}', 'KuntyController@delete')->where('id', '[0-9]+');
  });
  /**
   * Matika Section
   */
  Route::group([
    'prefix' => 'matikas' ,
    ], function() {
      Route::get('', 'MatikaController@index');
      Route::get('{id}', 'MatikaController@read')->where('id', '[0-9]+');
      Route::get('{id}/structure', 'MatikaController@structure')->where('id', '[0-9]+');
      Route::get('{id}/chapters', 'MatikaController@chapters')->where('id', '[0-9]+');
      Route::get('exists', 'MatikaController@exists');
      /** Mini display */
      Route::get('compact', "MatikaController@compactList");

      Route::post('', 'MatikaController@store');
      Route::post('{id}/save/structure', 'MatikaController@saveStructure')->where('id', '[0-9]+');

      Route::put('', 'MatikaController@update')->where('id', '[0-9]+');
      /** Activate / Deactivate the data for using */
      Route::put('{id}/activate', 'MatikaController@active')->where('id', '[0-9]+');
      Route::put('{id}/deactivate', 'MatikaController@unactive')->where('id', '[0-9]+');

      Route::delete('{id}', 'MatikaController@delete')->where('id', '[0-9]+');
  });
  /**
   * Chapter Section
   */
  Route::group([
    'prefix' => 'chapters' ,
    ], function() {
      Route::get('', 'ChapterController@index');
      Route::get('{id}', 'ChapterController@read')->where('id', '[0-9]+');
      Route::get('{id}/structure', 'ChapterController@structure')->where('id', '[0-9]+');
      Route::get('{id}/parts', 'ChapterController@parts')->where('id', '[0-9]+');
      Route::get('exists', 'ChapterController@exists');
      /** Mini display */
      Route::get('compact', "ChapterController@compactList");

      Route::post('create', 'ChapterController@store');
      Route::post('{id}/save/structure', 'ChapterController@saveStructure')->where('id', '[0-9]+');

      Route::post('update', 'ChapterController@update')->where('id', '[0-9]+');
      /** Activate / Deactivate the data for using */
      Route::put('{id}/activate', 'ChapterController@active')->where('id', '[0-9]+');
      Route::put('{id}/deactivate', 'ChapterController@unactive')->where('id', '[0-9]+');

      Route::delete('{id}', 'ChapterController@delete')->where('id', '[0-9]+');
  });
  /**
   * Chapter Section
   */
  Route::group([
    'prefix' => 'parts' ,
    ], function() {
      Route::get('', 'PartController@index');
      Route::get('{id}', 'PartController@read')->where('id', '[0-9]+');
      Route::get('{id}/structure', 'PartController@structure')->where('id', '[0-9]+');
      Route::get('{id}/sections', 'PartController@sections')->where('id', '[0-9]+');
      Route::get('exists', 'PartController@exists');
      /** Mini display */
      Route::get('compact', "PartController@compactList");

      Route::post('', 'PartController@store');
      Route::post('{id}/save/structure', 'PartController@saveStructure')->where('id', '[0-9]+');

      Route::put('', 'PartController@update')->where('id', '[0-9]+');
      /** Activate / Deactivate the data for using */
      Route::put('{id}/activate', 'PartController@active')->where('id', '[0-9]+');
      Route::put('{id}/deactivate', 'PartController@unactive')->where('id', '[0-9]+');

      Route::delete('{id}', 'PartController@delete')->where('id', '[0-9]+');
  });
  /**
   * Chapter Section
   */
  Route::group([
    'prefix' => 'sections' ,
    ], function() {
      Route::get('', 'SectionController@index');
      Route::get('{id}', 'SectionController@read')->where('id', '[0-9]+');
      Route::get('{id}/structure', 'SectionController@structure')->where('id', '[0-9]+');
      Route::get('exists', 'SectionController@exists');
      /** Mini display */
      Route::get('compact', "SectionController@compactList");

      Route::post('', 'SectionController@store');
      Route::post('{id}/save/structure', 'SectionController@saveStructure')->where('id', '[0-9]+');

      Route::put('', 'SectionController@update')->where('id', '[0-9]+');
      /** Activate / Deactivate the data for using */
      Route::put('{id}/activate', 'SectionController@active')->where('id', '[0-9]+');
      Route::put('{id}/deactivate', 'SectionController@unactive')->where('id', '[0-9]+');

      Route::delete('{id}', 'SectionController@delete')->where('id', '[0-9]+');
  });
  /**
   * types Section
   */
  Route::group([
    'prefix' => 'types' ,
    ], function() {
      Route::get('', 'TypeController@index');
      Route::post('create', 'TypeController@store');
      Route::post('update', 'TypeController@update');
      Route::get('{id}/read', 'TypeController@read');
      Route::delete('{id}/delete', 'TypeController@delete');
      Route::get('{id}/structure', 'TypeController@structure');
      Route::post('{id}/save/structure', 'TypeController@saveStructure');

      Route::put('exists', 'TypeController@exists');

      /** Activate / Deactivate the data for using */
      Route::put('{id}/activate', 'TypeController@active');
      Route::put('{id}/deactivate', 'TypeController@unactive');

      /** Mini display */
      Route::get('compact', "TypeController@compactList");
  });
  /**
   * types Section
   */
  Route::group([
    'prefix' => 'matras' ,
    ], function() {
      Route::get('', 'MatraController@index');
      Route::post('', 'MatraController@store');
      Route::put('', 'MatraController@update');
      Route::get('{id}', 'MatraController@read')->where('id', '[0-9]+');
      Route::delete('{id}', 'MatraController@delete')->where('id', '[0-9]+');
      Route::put('exists', 'MatraController@exists');

      /** Activate / Deactivate the data for using */
      Route::put('{id}/activate', 'MatraController@active')->where('id', '[0-9]+');
      Route::put('{id}/deactivate', 'MatraController@unactive')->where('id', '[0-9]+');
      /** Mini display */
      Route::get('compact', "MatraController@compactList");
  });
});
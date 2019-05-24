<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/test',function(){
    return App\User::find(1)->profile ;
});
Route::get('/',[
    'uses'=>'FrontEndController@index',
    'as'=>'index'

]);
Route::post('/subscribe',function(){
    $email=request('email');
    Newsletter::subscribe($email);
    Session::flash('subscribed','Subscribed successfully');
    return redirect()->back();
});
Route::get('/results', function(){
$post=\App\Post::where('title','like','%'.request('query').'%')->get();
return view('results')->with('posts',$post)
                            ->with('title','Search result:'.request('query'))
                            ->with('settings',\App\Setting::first())
                            ->with('categories',\App\Category::take(5)->get())
                            ->with('query',request('query'));
});
Auth::routes();


Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('/dashboard', [
        'uses'=>'HomeController@index',
        'as'=>'home']);
    Route::get('/post/create',[
        'uses'=>'PostsController@create',
        'as'=>'posts.create'
    ]);
    Route::post('/post/store',[
        'uses'=>'PostsController@store',
        'as'=>'posts.store'
    ]);
    Route::post('/post/store',[
        'uses'=>'PostsController@store',
        'as'=>'posts.store'
    ]);
    Route::get('/category/create',[
        'uses'=>'CategoriesController@create',
        'as'=>'category.create'
    ]);
    Route::get('/posts',[
        'uses'=>'PostsController@index',
        'as'=>'posts'
    ]);
    Route::get('/posts/thrashed',[
        'uses'=>'PostsController@thrashed',
        'as'=>'posts.trashed'
    ]);
    Route::get('/posts/kill/{$id}',[
        'uses'=>'PostsController@kill',
        'as'=>'post.kill'
    ]);
    Route::get('/posts/restore/{$id}',[
        'uses'=>'PostsController@restore',
        'as'=>'post.restore'
    ]);
    Route::get('/posts/edit/{$id}',[
        'uses'=>'PostsController@edit',
        'as'=>'post.edit'
    ]);
    Route::post('/posts/update/{$id}',[
        'uses'=>'PostsController@update',
        'as'=>'post.update'
    ]);
    Route::get('/post/delete/{id}',[
        'uses'=>'PostsController@destroy',
        'as'=>'post.delete'
    ]);
    Route::post('/category/store',[
        'uses'=>'CategoriesController@store',
        'as'=>'category.store'
    ]);
    Route::get('/categories',[
        'uses'=>'CategoriesController@index',
        'as'=>'categories'
    ]);
    Route::get('/categories/edit/{id}',[
        'uses'=>'CategoriesController@edit',
        'as'=>'category.edit'
    ]);
    Route::get('/categories/delete/{id}',[
        'uses'=>'CategoriesController@destroy',
        'as'=>'category.delete'
    ]);
    Route::post('/categories/update/{id}',[
        'uses'=>'CategoriesController@update',
        'as'=>'category.update'
    ]);
    Route::get('/tag',[
        'uses'=>'TagsController@index',
        'as'=>'tags'
    ]);
    Route::get('/tag/edit/{$id}',[
        'uses'=>'TagsController@edit',
        'as'=>'tag.edit'
    ]);
    Route::post('/tag/update/{$id}',[
        'uses'=>'TagsController@update',
        'as'=>'tag.update'
    ]);
    Route::get('/tag/delete/{$id}',[
        'uses'=>'TagsController@destroy',
        'as'=>'tag.delete'
    ]);
    Route::get('/tag/create',[
        'uses'=>'TagsController@create',
        'as'=>'tag.create'
    ]);
    Route::post('/tag/store',[
        'uses'=>'TagsController@store',
        'as'=>'tag.store'
    ]);
    Route::get('/users',[
        'uses'=> 'UsersController@index',
        'as'=>'users'
    ]);
    Route::get('/user/create',[
        'uses'=> 'UsersController@create',
        'as'=>'user.create'
    ]);
    Route::post('/user/store',[
        'uses'=> 'UsersController@store',
        'as'=>'user.store'
    ]);
    Route::get('/user/admin/{$id}',[
        'uses'=> 'UsersController@admin',
        'as'=>'user.admin'
    ]);
    Route::get('/user/not-admin/{$id}',[
        'uses'=> 'UsersController@not_admin',
        'as'=>'user.not.admin'
    ]);
    Route::get('/user/profile',[
        'uses'=> 'ProfilesController@index',
        'as'=>'user.profile'
    ]);
    Route::get('/user/profile/update',[
        'uses'=> 'ProfilesController@update',
        'as'=>'user.profile.update'
    ]);
    Route::get('/user/delete/{$id}',[
        'uses'=> 'UsersController@destroy',
        'as'=>'user.delete'
    ]);
    Route::get('/settings',[
        'uses'=> 'SettingsController@index',
        'as'=>'settings'
    ]);
    Route::post('/setting/update',[
        'uses'=> 'SettingsController@update',
        'as'=>'setting.update'
    ]);
    Route::get('/{slug}',[
        'uses'=>'FrontEndController@singlePost',
        'as'=>'post.single'
    ]);
    Route::get('/category/{$id}',[
        'uses'=>'FrontEndController@category',
        'as'=>'category.single'
    ]);
    Route::get('/tag/{$id}',[
        'uses'=>'FrontEndController@tag',
        'as'=>'tag.single'
    ]);


});
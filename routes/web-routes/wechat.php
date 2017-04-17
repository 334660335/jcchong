<?php
/**
 * Web Routes
 * Created by wangrenjie.
 * User: smile_kevin
 * Date: 2017/3/22
 * Time: 16:49
 * Project_name: vicky
 * File_name: wechat-web.php
 */
Route::group(['domain' => 'wechat.jcchong.com'], function () {
    //get
    Route::get('/get_menu', 'Wechat\MenuController@get_menu');
    //post
    Route::post('/store_menu', 'Wechat\MenuController@store_menu');
    //any
    Route::any('/serve', 'Wechat\WechatBaseController@serve');//微信连接

    /***************************** mini program ***********************/
    //get
    Route::get('/mini_index', 'Wechat\MiniProgramController@index');

    //post
    Route::post('upload', function(){
        \Illuminate\Support\Facades\Storage::put('logs/test.log', json_encode($_FILES));
    });
});
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
    //any
    echo 1;die;
    Route::any('serve', 'Wechat\WechatBaseController@serve');//微信连接
});
<?php
/**
 * Web Routes
 * Created by wangrenjie.
 * User: smile_kevin
 * Date: 2017/4/01
 * Time: 16:49
 * Project_name: jcchong
 * File_name: web.php
 */
require_once 'web-routes/wechat.php';

Route::get('/', function () {
    return view('welcome');
});


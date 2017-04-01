<?php
namespace App\Http\Controllers\Wechat;
use App\Http\Controllers\BaseController;

/*
 * 微信基类
 * add by wangrenjie at 2017 04 01
 */
class WechatBaseController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

        $wechat = app('wechat');
        $wechat->server->setMessageHandler(function($message){
            return "欢迎关注 overtrue！";
        });

        Log::info('return response.');

        return $wechat->server->serve();
    }

}

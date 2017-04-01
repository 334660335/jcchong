<?php
namespace App\Http\Controllers\Wechat;
use App\Http\Controllers\BaseController;
use EasyWeChat\Foundation\Application;

/*
 * 微信基类
 * add by wangrenjie at 2017 04 01
 */
class WechatBaseController extends BaseController
{
    protected $wechat;

    public function __construct()
    {
        parent::__construct();
        //$this->__initwechat();
    }

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        $base = app('wechat');
        $base->server->setMessageHandler(function(){
            return "欢迎订阅!";
        });
        return $base->server->serve();
    }

    protected function __initwechat($scopes='',$callback='')
    {
        if(empty($scopes))
        {
            $this->wechat = new Application(config('wechat'));
        }
        else
        {
            if($scopes=='edit_callback')
            {
                $callback = is_array($callback) ? http_build_query($callback) : '';
                $config = config('wechat');
                $config['oauth']['callback'] = '/wechat/oauth_callback?'.$callback;
                $this->wechat = new Application($config);
            }
            else
            {
                $config = config('wechat');
                $config['oauth']['scopes'][0] = 'snsapi_base';
                $this->wechat = new Application($config);
            }
        }
    }

}
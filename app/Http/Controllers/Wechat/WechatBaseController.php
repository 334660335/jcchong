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
        $options = [
            'debug'     => true,
            'app_id'    => 'wxe5f3d6597b5a4995',
            'secret'    => '2f123ecff3176ba199004e65cfd01e33',
            'token'     => 'h7rmNN01oEbYyzFV0MMV3DxzwuC1fgpM',
            'aes_key'   => 'V4ZvqidoYCzcHQur572jujIRj1VHIH8bg5sAN3VlrmN',

            /*
            'app_id'    => 'wx8ef3d613e1888b77',
            'secret'    => '03323f0257173491b4d2b1f714db6ef2',
            'token'     => 'hZ0Mosln7UgVOrfC',
            'aes_key'   => 'a9JlDAodzAfNZ1hx93bYPYRKwefq4RWyJgJiEof2XRL',
            */
            'log' => [
                'level' => 'debug',
                'file'  => '/data/wwwroot/default/storage/logs/easywechat.log',
            ],
            // ...
        ];
        $app = new Application($options);
        // 从项目实例中得到服务端应用实例。
        $server = $app->server;
        $server->setMessageHandler(function(){
            return "您好！欢迎关注 overtrue!";
        });
        //return $app->server->serve();
    }

}
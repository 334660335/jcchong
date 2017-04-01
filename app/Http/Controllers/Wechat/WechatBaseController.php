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
        $this->__initwechat();
    }

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        $base = app('wechat');
        $base->server->setMessageHandler(function($message){
            switch ($message->MsgType) {
                case 'event':
                    //订阅公众号
                    if($message->Event == 'subscribe')
                    {
                        return "欢迎订阅!";
                    }
                    //取消订阅公众号
                    else if($message->Event == 'unsubscribe')
                    {
                        return "感谢您的支持!";
                    }
                    else
                    {
                        //do something
                    }
                    break;
                case 'text':
                    # 文字消息...
                    return '我们已收到您的消息，感谢您对私律的支持！';
                    //return $info;
                    break;
                case 'image':
                    return '我们已收到您的图片，感谢您对私律的支持！';
                    # 图片消息...
                    break;
                case 'voice':
                    return '我们已收到您的语音，感谢您对私律的支持！';
                    # 语音消息...
                    break;
                case 'video':
                    return '我们已收到您的视频，感谢您对私律的支持！';
                    # 视频消息...
                    break;
                case 'location':
                    return '我们已收到您的地址，感谢您对私律的支持！';
                    # 坐标消息...
                    break;
                case 'link':
                    return '我们已收到您的链接，感谢您对私律的支持！';
                    # 链接消息...
                    break;
                // ... 其它消息
                default:
                    # code...
                    break;
            }
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
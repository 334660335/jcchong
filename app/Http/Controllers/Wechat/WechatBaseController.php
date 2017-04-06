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
        $server = $this->wechat->server;
        $server->setMessageHandler(function($message){
//            $info = '您的账号为:'.$message->ToUserName.',';
//            $info.= 'OpenID为:'.$message->FromUserName;
            switch ($message->MsgType) {
                case 'event':
                    $msg = '其他的事件!'.$message->Event;
                    switch ($message->Event)
                    {
                        case 'subscribe':
                            $msg = '感谢订阅';
                        break;
                        case 'unsubscribe':
                            $msg = '谢谢你的订阅';
                        break;
                        case 'CLICK':
                            $msg = '开发中 '.$message->EventKey;
                        break;
                        default:
                        # code...
                        break;
                    }
                    return $msg;
                break;
                case 'text':
                    # 文字消息...
                    return '我们已收到您的消息，诶嘿嘿！';
                    //return $info;
                break;
                case 'image':
                    return '我们已收到您的图片，诶嘿嘿！';
                    # 图片消息...
                break;
                case 'voice':
                    return '我们已收到您的语音，诶嘿嘿！';
                    # 语音消息...
                break;
                case 'video':
                    return '我们已收到您的视频，诶嘿嘿！';
                    # 视频消息...
                break;
                case 'location':
                    return '我们已收到您的地址，诶嘿嘿！';
                    # 坐标消息...
                break;
                case 'link':
                    return '我们已收到您的链接，诶嘿嘿！';
                    # 链接消息...
                break;
                // ... 其它消息
                default:
                    # code...
                break;
            }
        });
        return $server->serve();
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
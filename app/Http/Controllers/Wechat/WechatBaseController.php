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
        $app = new Application(config('wechat'));
        // 从项目实例中得到服务端应用实例。
        $server = $app->server;
        $server->setMessageHandler(function($message){
            switch ($message->MsgType) {
                case 'event':
                    //订阅公众号
                    if($message->Event == 'subscribe')
                    {
                        return '感谢您的关注';
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
        return $server->serve();
    }

}

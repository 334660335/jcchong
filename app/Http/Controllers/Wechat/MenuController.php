<?php

namespace App\Http\Controllers\Wechat;
use Carbon\Carbon;
/*
 * 微信菜单
 * add by wangrenjie at 2017 04 06
 */

class MenuController extends WechatBaseController
{

    private $menu;
    //
    public function __construct()
    {
        parent::__construct();
        $this->menu = $this->wechat->menu;
    }

    //创建微信菜单
    public function store_menu()
    {
        $buttons = [
            [
                'name'  => '有趣的东西',
                'sub_button'  => [
                    [
                        'type' => 'click',
                        'name' => '聊天室',
                        'key' => 'CODING'
                    ],
                    [
                        'type' => 'click',
                        'name' => '小程序',
                        'key' => 'CODING'
                    ],
                    [
                        'type' => 'click',
                        'name' => '我的日程',
                        'key' => 'CODING'
                    ],
                    [
                        'type' => 'click',
                        'name' => '同步播放视频',
                        'key' => 'CODING'
                    ],
                ],
            ],
            [
                'name'  => '🔥我的爱佳',
                'sub_button' => [
                    [
                        'type' => 'view',
                        'name' => 'kevin的世界',
                        'url' => 'http://kevin.jcchong.com'
                    ],
                    [
                        'type' => 'view',
                        'name' => 'vicky的世界',
                        'url' => 'http://vicky.jcchong.com'
                    ],
                    [
                        'type' => 'view',
                        'name' => 'Home',
                        'url' => 'http://www.jcchong.com'
                    ],
                ]
            ],
            [
                'name'  => '发现',
                'sub_button'  => [
                    [
                        'type' => 'view',
                        'name' => '关于我',
                        'url' => 'http://kevin.jcchong.com',
                    ]
                ]
            ],
        ];
        $this->menu->add($buttons);
        echo 'Menu Created At '.Carbon::now();
    }

    //获取微信菜单
    public function get_menu()
    {
        dd($this->menu->current());
    }

}

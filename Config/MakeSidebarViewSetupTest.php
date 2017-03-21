<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/3/1
 * Time: 15:12
 */

namespace kuaigeng\pushconfig\Config;


use kuaigeng\pushconfig\App\Base;
use kuaigeng\pushconfig\App\Index\Pushconfig;
use kuaigeng\pushconfig\App\Index\PushconfigAdd;
use kuaigeng\pushconfig\App\Index\PushconfigAddDo;
use kuaigeng\pushconfig\App\Index\PushconfigReview_BO_HUI;
use kuaigeng\pushconfig\App\Index\PushconfigReview_SHEN_HE_TONG_GUO;
use kuaigeng\pushconfig\App\Index\Pushconfigtestuser;
use kuaigeng\pushconfig\App\Index\PushconfigtestuserAdd;
use kuaigeng\pushconfig\App\Index\PushconfigtestuserAddDo;
use kuaigeng\pushconfig\App\Index\PushconfigtestuserJson;
use kuaigeng\pushconfig\App\Index\Pushconfigtime;
use kuaigeng\pushconfig\App\Index\PushconfigtimeAdd;
use kuaigeng\pushconfig\App\Index\PushconfigtimeAddDo;
use PHPUnit\Framework\TestCase;
use xltxlm\h5skin\MakeSidebarView;
use xltxlm\h5skin\SidebarViewLink;

class MakeSidebarViewSetupTest extends TestCase
{

    public function test()
    {
        (new MakeSidebarView(Base::class))
            ->setNode("个性化推送")
            ->setNode(
                (new SidebarViewLink())->setClassName(Pushconfig::class)->setName("个性化推送")
                    ->setHighlightClass(PushconfigAdd::class)
                    ->setHighlightClass(PushconfigAddDo::class)
                    ->setHighlightClass(PushconfigReview_BO_HUI::class)
                    ->setHighlightClass(PushconfigReview_SHEN_HE_TONG_GUO::class)
            )
            ->setNode(
                (new SidebarViewLink())->setClassName(Pushconfigtime::class)->setName("时间段")
                    ->setHighlightClass(PushconfigtimeAdd::class)
                    ->setHighlightClass(PushconfigtimeAddDo::class)
            )
            ->setNode(
                (new SidebarViewLink())->setClassName(Pushconfigtestuser::class)->setName("测试机管理")
                    ->setHighlightClass(PushconfigtestuserAdd::class)
                    ->setHighlightClass(PushconfigtestuserAddDo::class)
            )
            ->setNode(
                (new SidebarViewLink())->setClassName(PushconfigtestuserJson::class)->setName("测试机全部数据")
            )
            ->make();
    }
}
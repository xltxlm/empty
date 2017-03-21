<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/3/2
 * Time: 17:33
 */

namespace kuaigeng\pushconfig\Config;


use kuaigeng\pushconfig\App\Base;
use \kuaigeng\pushconfig\App\Index\Pushconfig;
use \kuaigeng\pushconfig\App\Index\Pushconfigtestuser;
use \kuaigeng\pushconfig\App\Index\Pushconfigtime;
use \kuaigeng\pushconfig\App\Index\Pushconfiglog;
use kuaigeng\pushconfig\Config\KuaigengPushConfig\PushconfiglogModel;
use kuaigeng\pushconfig\Config\KuaigengPushConfig\PushconfigModel;
use kuaigeng\pushconfig\Config\KuaigengPushConfig\PushconfigtestuserModel;
use kuaigeng\pushconfig\Config\KuaigengPushConfig\PushconfigtimeModel;
use PHPUnit\Framework\TestCase;
use xltxlm\h5skin\PackTool\MakeCtroller;

class MakeCtrollerTest extends TestCase
{

    public function testPushconfig()
    {
        (new MakeCtroller(Base::class))
            ->setTableClassName(PushconfigModel::class)
            ->setClassName(Pushconfig::class)
            ->setMakeAdd(true)
            ->setMakeDelete(true)
            ->__invoke();
    }
    public function testPushconfigtestuser()
    {
        (new MakeCtroller(Base::class))
            ->setTableClassName(PushconfigtestuserModel::class)
            ->setClassName(Pushconfigtestuser::class)
            ->setMakeAdd(true)
            ->setMakeDelete(true)
            ->__invoke();
    }
    public function testPushconfigtime()
    {
        (new MakeCtroller(Base::class))
            ->setTableClassName(PushconfigtimeModel::class)
            ->setClassName(Pushconfigtime::class)
            ->setMakeAdd(true)
            ->setMakeDelete(true)
            ->__invoke();
    }
    public function testpushconfiglog()
    {
        (new MakeCtroller(Base::class))
            ->setTableClassName(PushconfiglogModel::class)
            ->setClassName(Pushconfiglog::class)
            ->__invoke();
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/1/3
 * Time: 12:17.
 */

namespace kuaigeng\pushconfig\Config;

use PHPUnit\Framework\TestCase;
use xltxlm\ormTool\OrmMaker;

/**
 * 生成数据表的模型文件
 * Class MysqlSetup.
 */
class MysqlSetupTest extends TestCase
{
    public function testKuaigengCore()
    {
        (new OrmMaker())
            ->setDbConfig(new KuaigengPushConfig())
            ->setNeedTableNames([
                'pushconfig',
                'pushconfiglog',
                'pushconfigtestuser',
                'pushconfigtime',
            ])
            ->__invoke();
    }
    public function testKuaigengCoreSlave()
    {
        (new OrmMaker())
            ->setDbConfig(new KuaigengCoreSlave())
            ->setNeedTableNames(
                [
                    "UserBasicInfo",
                    "VideoInfo",
                ]
            )
            ->__invoke();
    }
}

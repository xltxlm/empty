<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/3/3
 * Time: 18:12
 */

namespace kuaigeng\pushconfig\Crontab;


use PHPUnit\Framework\TestCase;
use xltxlm\crontab\CrontabMaker;

class CrontabMakerTest extends TestCase
{


    public function test()
    {
        (new CrontabMaker())
            ->setCrontabDir(__DIR__)
            ->setConfigDir(__DIR__.'/../Config/')
            ->__invoke();
    }
}
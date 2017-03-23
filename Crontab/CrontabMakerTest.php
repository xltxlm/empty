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

    /** @var  SqlMaker */
    protected $sqlMaker;

    public function setUp()
    {
        $this->sqlMaker = (new SqlMaker(Base::class))
            ->setCrontabDir(__DIR__)
            ->setDbconfig(new KuaigengReview());
    }

    public function testservicequality_456buf_time()
    {
        $this->sqlMaker
            ->setSqlFile(__DIR__.'/../SQL/servicequality_456buf_time.sql')
            ->__invoke();
    }

    public function test()
    {
        (new CrontabMaker())
            ->setCrontabDir(__DIR__)
            ->setConfigDir(__DIR__.'/../Config/')
            ->__invoke();
    }
}
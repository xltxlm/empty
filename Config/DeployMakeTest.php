<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/3/6
 * Time: 17:48
 */

namespace kuaigeng\pushconfig\Config;

use PHPUnit\Framework\TestCase;
use xltxlm\deployer\Deploy\DeployMake;
use xltxlm\deployer\Deploy\DockerVolumes;

/**
 * 测试生成整个服务的部署脚本
 * Class DeployMakeTest
 * @package xltxlm\deployer
 */
class DeployMakeTest extends TestCase
{

    public function test()
    {
        $deployMake = new DeployMake();
        $code = (new DockerVolumes($deployMake))
            ->setDockerPath("registry-internal.cn-hangzhou.aliyuncs.com/xialintai/kuaigeng-pushconfig")
            ->setVolumes("/opt/logs/", "/opt/logs/")
            ->setVolumes("/root/.ssh/", "/root/.ssh/")
            ->setPorts(422, 22);

        $nginx = (new DockerVolumes($deployMake))
            ->setDockerPath("registry-internal.cn-hangzhou.aliyuncs.com/xialintai/nginx")
            ->setVolumes("/opt/logs/", "/opt/logs/")
            ->setVolumes("./nginx/", "/etc/nginx/conf.d/")
            ->setPorts(84, 80)
            ->setCopyDockerVolumes($code);
        $php = (new DockerVolumes($deployMake))
            ->setDockerPath("registry-internal.cn-hangzhou.aliyuncs.com/xialintai/php")
            ->setVolumes("/opt/logs/", "/opt/logs/")
            ->setEnvFile("env_file.env")
            ->setCopyDockerVolumes($code);
        $deployMake
            ->setGit("http://10.165.99.238:8809/xialintai/pushconfig-deploy.git")
            ->setTesthost("root@116.62.32.197")
            ->setOnlinehost('root@118.178.129.189')
            ->setProjectDocker($code)
            ->setDockerVolumes($nginx)
            ->setDockerVolumes($php)
            ->__invoke();
    }
}
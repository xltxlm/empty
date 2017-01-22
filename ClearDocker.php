<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-01-22
 * Time: 下午 10:11
 */

//1:杀掉全部活着的的容器
$containers = shell_exec("docker ps -a");
foreach (explode("\n", $containers) as $container) {
    $containers2 = explode(" ", $container);
    if ($containers2[0]) {
        $cmd1 = "docker rm -f  {$containers2[0]}";
        shell_exec($cmd1);
    }
}
//2:第二步，清除掉编译中留下的过程无名字docker镜像
$images = shell_exec("docker images");
foreach (explode("\n", $images) as $image) {
    $images2 = explode('       ', $image);
    $images2 = array_diff($images2, ['']);
    $images2 = array_map('trim', $images2);
    if ($images2[0] == '<none>') {
        $cmd = "docker rmi -f {$images2[4]}";
        shell_exec($cmd);
    }
}

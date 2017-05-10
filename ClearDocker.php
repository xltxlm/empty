<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-01-22
 * Time: 下午 10:11
 */

//1:杀掉全部活着的的容器
$containers = shell_exec("docker ps -a -f status=exited");
foreach (explode("\n", $containers) as $container) {
    //数据备份容器不能删除

    $containers2 = explode("  ", $container);
    $containers2 = array_diff($containers2, ['']);
    $containers3 = [];
    foreach ($containers2 as $item) {
        $containers3[] = $item;
    }
    if ($containers3[0]) {
        $cmd1 = "docker rm -f  {$containers2[0]}";
        echo $cmd1." [$containers]\n";
        shell_exec($cmd1);
    }
}

//docker images | awk '{print $3}' | xargs docker rmi
//2:第二步，清除掉编译中留下的过程无名字docker镜像
$images = shell_exec("docker images");
foreach (explode("\n", $images) as $image) {
    $images2 = explode('       ', $image);
    $images2 = array_diff($images2, ['']);
    $images2 = array_map('trim', $images2);
    $images3 = [];
    foreach ($images2 as $item) {
        $images3[] = $item;
    }
    if ($images3[0] == '<none>' || $images3[1] == '<none>') {
        $cmd = "docker rmi rm {$images3[2]}";
        echo $cmd."[images]\n";
        shell_exec($cmd);
    }
}
//docker volume ls | awk '{print $2}' | xargs docker volume rm
//2:第3步，清除掉数据卷
$images = shell_exec("docker volume ls");
foreach (explode("\n", $images) as $image) {
    $images2 = explode('       ', $image);
    $images2 = array_diff($images2, ['']);
    $images2 = array_map('trim', $images2);
    $images3 = [];
    foreach ($images2 as $item) {
        $images3[] = $item;
    }
    $cmd = "docker volume rm {$images3[1]}";
    echo $cmd."[images]\n";
    shell_exec($cmd);
}

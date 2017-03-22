<?php

namespace kuaigeng\pushconfig\Siteroot;


use kuaigeng\pushconfig\App\Base;
use xltxlm\helper\Ctroller\LoadClass;
use xltxlm\ssoclient\LoginTrait;

eval('include "/var/www/html/vendor/autoload.php";');
LoginTrait::setSsoUrl("http://116.62.32.197:85/");
LoginTrait::setPrivatekeyPath(__DIR__."/../key/key");

(new LoadClass(Base::class))
    ->setUrlPath($_GET['c'] ?: 'Index/Pushconfig')
    ->__invoke();
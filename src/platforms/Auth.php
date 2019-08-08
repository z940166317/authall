<?php
/**
 * Create by PhpStorm
 * Author Aaron z
 * Date: 2019-08-08
 * Time: 11:24
 */

namespace authall\platforms;


interface Auth
{
    function getOpenId();

    function getResponse();

}
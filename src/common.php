<?php
/**
 * Create by PhpStorm
 * Author Aaron z
 * Date: 2019-08-06
 * Time: 16:00
 */

/**
 * 获取当前时间的微妙时间戳
 */
if (!function_exists('getMillisecond')) {
    function getMillisecond()
    {
        list($t1, $t2) = explode(' ', microtime());
        return (float)sprintf('%.0f', (floatval($t1) + floatval($t2)) * 1000);
    }
}


<?php
/**
 * Create by PhpStorm
 * Author Aaron z
 * Date: 2019-08-06
 * Time: 16:01
 */

namespace authall;

use authall\platforms\baidu;
use authall\platforms\device;
use authall\platforms\meizu;
use authall\platforms\oppo;
use authall\platforms\qtt;
use authall\platforms\sqq;
use authall\platforms\wexin;

class AuthClient
{
    private $platform;

    public function __construct($platform = null)
    {
        $this->platform = $platform;
    }

    /**
     * @param $platform
     * @return mixed
     * @throws \Exception
     */
    public function getClient($platform = null)
    {
        if (empty($platform) && empty($this->platform)){
            throw new \Exception('platform not be empty');
        }

        $platform = strtolower($platform ? : $this->platform);

        switch ($platform){
            case 'baidu':
                $client = new baidu();
                break;
            case 'device':
                $client = new device();
                break;
            case 'meizu':
                $client = new meizu();
                break;
            case 'oppo':
                $client = new oppo();
                break;
            case 'qtt':
                $client = new qtt();
                break;
            case 'sqq':
                $client = new sqq();
                break;
            case 'weixin':
                $client = new wexin();
                break;
            default:
                throw new \Exception('platform not support');
                break;
        }

        return $client;
    }

}
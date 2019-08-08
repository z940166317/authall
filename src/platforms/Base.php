<?php
/**
 * Create by PhpStorm
 * Author Aaron z
 * Date: 2019-08-08
 * Time: 09:40
 */

namespace authall\platforms;

use GuzzleHttp\Client;

class Base implements Auth
{
    protected $authUrl;
    protected $appId;
    protected $appSecret;

    protected $client;
    protected $is_post = false;

    protected $params;
    protected $response;

    public function __construct($authUrl = null,$appId = null,$appSecret = null)
    {
        $this->authUrl = $authUrl;
        $this->appId = $appId;
        $this->appSecret = $appSecret;

        $this->setClient();
        $this->init();
    }

    public function init(){

    }

    private function setClient(){
        $this->client = new Client();
    }

    /**
     * @return null
     */
    public function getAuthUrl()
    {
        return $this->authUrl;
    }

    /**
     * @param $authUrl
     * @return $this
     * @throws \Exception
     */
    public function setAuthUrl($authUrl)
    {
        if (empty($authUrl)){
            throw new \Exception('url not be empty');
        }
        $this->authUrl = $authUrl;
        return $this;
    }

    /**
     * @return null
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @param $appId
     * @return $this
     */
    public function setAppId($appId)
    {
        $this->appId = $appId;
        return $this;
    }

    /**
     * @return null
     */
    public function getAppSecret()
    {
        return $this->appSecret;
    }

    /**
     * @param $appSecret
     * @return $this
     */
    public function setAppSecret($appSecret)
    {
        $this->appSecret = $appSecret;
        return $this;
    }


    public function getOpenId(){
        if ($this->getIsPost()){
            $options['form_params'] = $this->getParams();
            $method = "POST";
        }else{
            $options['query'] = $this->getParams();
            $method = 'GET';
        }

        try{
            $this->response = $this->client->request($method,$this->getAuthUrl(),$options);
        }catch (\Exception $e){
            throw $e;
        }

//        $ret = $this->client->getContent();
//        $ret = json_decode($ret,true);
//        return $ret;
        return $this->response;
    }

    public function getResponse(){
        return $this->response;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param array $params
     * @return base
     */
    public function setParams(array $params): base
    {
        foreach ($params as $k => $v){
            $this->params[$k] = $v;
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsPost()
    {
        return $this->is_post;
    }

    /**
     * @param mixed $is_post
     */
    public function setIsPost($is_post): void
    {
        $this->is_post = $is_post;
    }



}
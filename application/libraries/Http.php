<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @author Cheng,Chris(chrischeng03@qq.com)
 */
class Http {

    var $useProxy = false;
    var $proxyHost;
    var $proxyUserName;
    var $proxyPassword;
    var $useCookie = false;
    var $cookiePath;
    var $userAgent;

    public function __construct($config = array()) {
        $this->cookiePath = dirname(__FILE__) . "/cookie_" . md5(basename(__FILE__)) . ".txt";
        $this->userAgent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.2; .NET CLR 1.1.4322)";
        if (is_array($config)) {
            $this->_init($config);
        } elseif (is_object($config)) {
            $this->_init(get_object_vars($config));
        } else {
            $this->_init($config);
        }
    }

    private function _init($config) {
        settype($config, "array");
        if (!empty($config)) {
            $keys = array_keys(get_class_vars(__CLASS__));
            foreach ($keys as $key) {
                if (array_key_exists($key, $config)) {
                    $this->$key = $config[$key];
                }
            }
        }
    }

    public function login($url, $data) { // 模拟登录获取Cookie函数
        $curl = curl_init(); // 启动一个CURL会话
        $this->setProxy($curl);
        $tmpInfo = $this->_sendPost($curl, $url, $data);
        curl_close($curl); // 关闭CURL会话
        return $tmpInfo; // 返回数据
    }

    public function get($url) { // 模拟获取内容函数
        $curl = curl_init(); // 启动一个CURL会话
        $this->setProxy($curl);
        $tmpInfo = $this->_sendGet($curl, $url);
        curl_close($curl); // 关闭CURL会话
        return $tmpInfo; // 返回数据
    }

    function post($url, $data) { // 模拟提交数据函数
        $curl = curl_init(); // 启动一个CURL会话
        $this->setProxy($curl);
        $tmpInfo = $this->_sendPost($curl, $url, $data);
        curl_close($curl); // 关键CURL会话
        return $tmpInfo; // 返回数据
    }

    public function delcookie($cookie_file) { // 删除Cookie函数
        unlink($cookie_file); // 执行删除
    }
    
    public function setConfig($config){
        if (is_array($config)) {
            $this->_init($config);
        } elseif (is_object($config)) {
            $this->_init(get_object_vars($config));
        } else {
            $this->_init($config);
        }
    }

    private function setProxy($curl) {
        if ($this->useProxy == TRUE) {
            log_message("debug", "useProxy");
            //以下代码设置代理服务器
            //代理服务器地址
            curl_setopt($curl, CURLOPT_PROXY, $this->proxyHost);
            if (!empty($this->proxyUserName)) {
                log_message("debug", "proxyUserName " . $this->proxyUserName);
                curl_setopt($curl, CURLOPT_PROXYUSERPWD, $this->proxyUserName . ':' . $this->proxyPassword);
            }
        }
    }

    private function _setCommOpt($curl, $url) {
        curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2); // 从证书中检查SSL加密算法是否存在
        curl_setopt($curl, CURLOPT_USERAGENT, $this->userAgent); // 模拟用户使用的浏览器
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
        curl_setopt($curl, CURLOPT_COOKIEFILE, $this->cookiePath); // 读取上面所储存的Cookie信息
        curl_setopt($curl, CURLOPT_TIMEOUT, 120); // 设置超时限制防止死循环
        curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
    }
    
    private function _sendGet($curl,$url){
        $this->_setCommOpt($curl, $url);
        curl_setopt($curl, CURLOPT_HTTPGET, 1); // 发送一个常规的Post请求
        return $this->_execute($curl);
    }
    
    private function _sendPost($curl,$url,$data){
        $this->_setCommOpt($curl, $url);
        curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包
        return $this->_execute($curl);
    }
    
    private function _execute($curl){
         $tmpInfo = curl_exec($curl); // 执行操作
        if (curl_errno($curl)) {
            log_message('Error', curl_error($curl));
        }
        return $tmpInfo;
    }

}

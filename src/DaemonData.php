<?php

namespace BlockExplorer;
use Exception;

/**
 * Fetch data from altcoin/bitcoin deamon
 *
 * @author Lukas Mestan
 * @copyright MIT
 * @version 1.1.2
 */
class DaemonData  
{
    /**
     * Wallet IP
     *
     * @access protected
     * @var string
     */
    protected $ip = '';
    /**
     * Wallet port
     *
     * @access protected
     * @var integer|string
     */
    protected $port = '';
    /**
     * Wallet username
     *
     * @access protected
     * @var string
     */
    protected $username = '';
    /**
     * Wallet password
     *
     * @access protected
     * @var string
     */
    protected $password = '';


    /**
     * Class contructor
     *
     * @access public
     * @param string $ip
     * @param integer $port
     * @param string $username
     * @param string $password
     */
    public function __construct($ip, $port, $username, $password)
    {
        $this->ip = $ip;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Get data from JSON RPC by method & params
     *
     * @access public
     * @param string $method
     * @param array $params
     * @return array
     */
    public function getData($method, array $params = array(), $id = 1)
    {
        return $this->fetchData(array(
            'jsonrpc'=> "2.0",
            'method' => $method,
            'params' => $params,
            'id'     => $id
        ));
    }

    /**
     * Fetch JsonRPC request information from the deamon
     *
     * @access private
     * @param array $request
     * @return array
     * @see error codes https://github.com/bitcoin/bitcoin/blob/master/src/rpcprotocol.h#L34
     * @throws Exception
     */
    private function fetchData($request)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->ip);
        curl_setopt($ch, CURLOPT_PORT, $this->port);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);//设置超时时间，单位秒
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, $this->username . ":" . $this->password);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-type: application/json"
        ));
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        
        $response = curl_exec($ch);
        curl_close($ch);
        //var_dump($response);
        $info = json_decode($response, TRUE);
        if ( ! empty($info["error"]) )
        {
            //throw new Exception($info["error"]["message"] . " (Error Code: " . $info["error"]["code"] . ")");
            //return $info["error"];
        }

        return $info["result"];
    }

}

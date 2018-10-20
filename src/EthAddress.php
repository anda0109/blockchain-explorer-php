<?php
/**
 * Created by PhpStorm.
 * Description: ethereum JSON-RPC API
 * User: 98697
 * Date: 2018/5/3
 * Time: 14:47
 */

namespace BlockExplorer;


class EthAddress extends DaemonData
{
    //获取ETH地址余额
    public function getBanlance($address)
    {
        return $this->getData('eth_getBalance', array($address,'latest'),111);
    }

    //获取Erc20代币余额
    public function getTokenBalance($tokenAddress, $address)
    {
        $method = "0x70a08231000000000000000000000000";//getTokenBalance方法
        $data = $method.substr($address,2);

        $arr['to'] = $tokenAddress;
        $arr['data'] = $data;
        return $this->getData("eth_call", array($arr,'latest'));
    }
}

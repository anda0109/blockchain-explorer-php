<?php
/**
 * Created by PhpStorm.
 * User: 98697
 * Date: 2018/5/8
 * Time: 14:24
 * https://docs.mvs.org/zh-cn/api_v2/
 */

namespace BlockExplorer;


use think\Debug;

class MetaverseNetworkInfo extends DaemonData
{
    /**
     * 获取节点信息
     * @return array
     */
    public function getInfo()
    {
        return $this->getData("getinfo", array(), 1);
    }

    /**
     * 获取对等节点信息
     * @return array
     */
    public function getPeerInfo()
    {
        return $this->getData('getpeerinfo', array());
    }

    /**
     * 获取挖矿信息
     * @return array
     */
    public function getMiningInfo()
    {
        return $this->getData('getmininginfo', array());
    }

    /**
     * 启动挖矿
     * @param $accountName
     * @param $accountAuth
     * @return array
     */
    public function startMining($accountName, $accountAuth)
    {
        return $this->getData('startmining',array($accountName, $accountAuth));
    }

    /**
     * 停止挖矿
     * @param $accountName
     * @param $accountAuth
     * @return array
     */
    public function stopMining($accountName, $accountAuth)
    {
        return $this->getData('stopmining', array($accountName, $accountAuth));
    }

    /**
     * setmining account when pool mining.
     * @param $accountName
     * @param $accountAuth
     * @param $paymentAddress
     * @return array
     */
    public function setMiningAccount($accountName, $accountAuth, $paymentAddress)
    {
        return $this->getData('setminingaccount',array($accountName, $accountAuth, $paymentAddress));
    }

    /**
     * submit mining result.
     * @param $nonce
     * @param $headerHash
     * @param $mixHash
     * @return array
     */
    public function submitWork($nonce, $headerHash, $mixHash)
    {
        return $this->getData('submitwork', array($nonce, $headerHash, $mixHash));
    }

    /**
     * Returns all transactions in memory pool.
     * @return array
     */
    public function getMemorypool()
    {
        return $this->getData('getmemorypool', array());
    }


}
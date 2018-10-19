<?php
/**
 * Created by PhpStorm.
 * User: 98697
 * Date: 2018/5/7
 * Time: 11:30
 * https://docs.mvs.org/zh-cn/api_v2/
 */

namespace BlockExplorer;


class MetaverseTransaction extends DaemonData
{
    /**
     * 根据交易hash获取交易信息
     * @param $txHash
     * @return array
     */
    public function getTx($txHash)
    {
        return $this->getData('gettx', array($txHash));
    }

    /**
     * 获取某个账户下的交易列表
     * @param $accountName
     * @param $accountAuth
     * @return array
     */
    public function listTxs($accountName, $accountAuth)
    {
        return $this->getData('listtxs', array($accountName, $accountAuth));
    }

    /**
     * Deposit some etp, then get reward for frozen some etp.
     * @param $accountName
     * @param $accountAuth
     * @param $amount
     * @return array1
     */
    public function deposit($accountName, $accountAuth, $amount)
    {
        return $this->getData('deposit', array($accountName, $accountAuth, $amount));
    }

    /**
     * send etp to a targert address, mychange goes to another existed address of this account.
     * @param $accountName
     * @param $accountAuth
     * @param $toAddress
     * @param $amount
     * @return array
     */
    public function send($accountName, $accountAuth, $toAddress, $amount)
    {
        return $this->getData('send', array($accountName, $accountAuth, $toAddress, $amount));
    }

    /**
     * send etp from a specified address of this account to target address, mychange goes to from_address
     * @param $accountName
     * @param $accountAuth
     * @param $fromAddress
     * @param $toAddress
     * @param $amount
     * @return array
     */
    public function sendfrom($accountName, $accountAuth, $fromAddress, $toAddress, $amount)
    {
        return $this->getData('sendfrom', array($accountName, $accountAuth, $fromAddress, $toAddress, $amount));
    }
}
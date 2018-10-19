<?php
/**
 * Created by PhpStorm.
 * User: 98697
 * Date: 2018/5/7
 * Time: 10:52
 * https://docs.mvs.org/zh-cn/api_v2/
 */

namespace BlockExplorer;


class MetaverseAddress extends DaemonData
{
    /**
     * 创建一个新的账户
     * @param $accountName
     * @param $accountAuth
     * @return array
     */
    public function getNewAccount($accountName, $accountAuth)
    {
        return $this->getData('getnewaccount', array($accountName, $accountAuth));
    }

    /**
     * Show total balance details of this account.
     * @param $accountName
     * @param $accountAuth
     * @return array
     */
    public function getBalance($accountName, $accountAuth)
    {
        return $this->getData('getbalance', array($accountName, $accountAuth));
    }

    /**
     * List all balance details of each address of this account.
     * @param $accountName
     * @param $accountAuth
     * @return array
     */
    public function listBalances($accountName, $accountAuth)
    {
        return $this->getData('listbalances', array($accountName, $accountAuth));
    }


    /**
     * 删除一个账户
     * @param $accountName
     * @param $accountAuth
     * @param $lastWord
     * @return array
     */
    public function deleteAccount($accountName, $accountAuth, $lastWord)
    {
        return $this->getData('deleteaccount', array($accountName, $accountAuth, $lastWord));
    }

    /**
     * Show account details
     * @param $accountName
     * @param $accountAuth
     * @param $lastWord
     * @return array
     */
    public function getAccount($accountName, $accountAuth, $lastWord)
    {
        return $this->getData('getaccount', array($accountName, $accountAuth, $lastWord));
    }

    /**
     * Generate new address for this account.
     * @param $accountName
     * @param $accountAuth
     * @return array
     */
    public function getNewAddress($accountName, $accountAuth)
    {
        return $this->getData('getnewaddress', array($accountName, $accountAuth));
    }

    /**
     * List available addresses of this account.
     * @param $accountName
     * @param $accountAuth
     * @return array
     */
    public function listAddresses($accountName, $accountAuth)
    {
        return $this->getData('listaddresses', array($accountName, $accountAuth));
    }

    /**
     * validate address
     * @param $address
     * @return array
     */
    public function validateaddress($address)
    {
        return $this->getData('validateaddress', array($address));
    }

    /**
     * @param $address
     * @return array
     */
    public function getaddressetp($address)
    {
        return $this->getData('getaddressetp', array($address));
    }


    /**
     * @param $address
     * @return array
     */
    public function getaddressasset($address)
    {
        return $this->getData('getaddressasset', array($address));
    }

}
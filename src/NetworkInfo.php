<?php

namespace BlockExplorer;

/**
 * Fetch network/wallet information from ehtereum deamon
 *
 * @author Lukas Mestan
 * @copyright MIT
 * @see https://github.com/ethereum/wiki/blob/master/JSON-RPC.md
 * @version 1.1.2
 */
class NetworkInfo extends DaemonData
{
    /**
     * 获取网络版本
     * @return array
     */
    public function getNetVersion()
    {
        return $this->getData("net_version", array());
    }

    /**
     * 获取网络节点数目
     * @return array
     */
    public function getNetPeerCount()
    {
        return $this->getData("net_peerCount", array(), 74);
    }

    /**
     * 客户端是否是可连接状态（if client is actively listening for network connections）
     * @return array
     */
    public function isNetListening()
    {
        return $this->getData("net_listening", array());
    }

    /**
     * 节点是否开启了挖矿
     * @return array
     */
    public function isMining()
    {
        return $this->getData("eth_mining", array());
    }

    /**
     * 获取以太坊协议版本
     * @return array
     */
    public function getProtocolVersion()
    {
        return $this->getData("eth_protocolVersion", array());
    }

    /**
     * 获取区块同步状态
     * @return array
     */
    public function getSyncStatus()
    {
        return $this->getData("eth_syncing", array());
    }

    /**
     * 获取coinbase地址
     * @return array
     */
    public function getCoinbaseAddress()
    {
        return $this->getData("eth_coinbase", array());
    }

    /**
     * 当前节点的hash算力，Hash/second
     * @return array
     */
    public function getHashrate()
    {
        return $this->getData("eth_hashrate", array());
    }

    /**
     * 获取当前GAS价格（integer of the current gas price in wei.）
     * @return array
     */
    public function getGasPrice()
    {
        return $this->getData("eth_gasPrice", array());
    }
}

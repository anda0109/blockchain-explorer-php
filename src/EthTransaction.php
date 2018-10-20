<?php

namespace BlockExplorer;

/**
 * Fetch transactions information from ethereum deamon
 *
 * @author Lukas Mestan
 * @copyright MIT
 * @see https://github.com/ethereum/wiki/blob/master/JSON-RPC.md
 * @version 1.1.2
 */
class EthTransaction extends DaemonData
{
    /*
    eth_getTransactionByHash
    eth_getTransactionByBlockHashAndIndex
    eth_getTransactionByBlockNumberAndIndex
    eth_getTransactionReceipt
    */

    /**
     * 通过交易的哈稀值获取交易详情
     *
     * @access public
     * @param string $transHash：交易的哈稀值
     * @return array
     */
    public function getTransactionByHash($transHash)
    {
        return $this->getData("eth_getTransactionByHash", array($transHash));
    }

    /**
     * 根据区块的哈稀和交易序号获取交易信息
     * @access public
     * @param string $blockHash：交易所在区块的哈稀值
     * @param integer $transIndex：交易索引位置
     * @return array
     */
    public function getTransactionByBlockHashAndIndex($blockHash, $transIndex)
    {
        return $this->getData("eth_getTransactionByBlockHashAndIndex",array($blockHash, $transIndex));
    }

    /**
     * 根据区块号和交易序号获取交易信息
     * @param $blockNumber
     * @param $transIndex
     * @return array
     */
    public function getTransactionByBlockNumberAndIndex($blockNumber, $transIndex)
    {
        return $this->getData("eth_getTransactionByBlockNumberAndIndex",array($blockNumber, $transIndex));
    }

    /**
     * 根据交易哈稀值获取交易收据
     * @param $transHash
     * @return array
     */
    public function getTransactionReceipt($transHash)
    {
        return $this->getData("eth_getTransactionReceipt", array($transHash));
    }
}

<?php

namespace BlockExplorer;

/**
 * Fetch block information from ethereum deamon
 *
 * @author Lukas Mestan
 * @copyright MIT
 * @see https://github.com/ethereum/wiki/blob/master/JSON-RPC.md
 * @version 1.1.2
 */
class BlockChain extends DaemonData
{
    /**
     * 获取区块数目
     * @return array
     */
    public function getBlockNumber()
    {
        return $this->getData("eth_blockNumber",array(),83);
    }

    /**
     * 根据区区块号获取区块信息
     * @param $blockNumber
     * @return array
     */
    public function getBlockByNumber($blockNumber)
    {
        $hex = '0x'.dechex($blockNumber);
        return $this->getData("eth_getBlockByNumber", array($hex, true), 1);
    }

    /**
     * 根据区块哈稀获取区块信息
     * @param $blockHash
     * @return array
     */
    public function getBlockByHash($blockHash)
    {
        return $this->getData("eth_getBlockByHash",array($blockHash,true));
    }

    /**
     * 获取最新区块信息
     * @return array
     */
    public function getLatestBlock()
    {
        $count = $this->getBlockNumber();
        $latestblock = hexdec(substr($count,2))-1;
        return $this->getBlockByNumber($latestblock);
    }
}

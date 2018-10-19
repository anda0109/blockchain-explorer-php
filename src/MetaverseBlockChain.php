<?php

namespace BlockExplorer;

/**
 * Fetch block information from metaverse deamon
 *
 * @author Lukas Mestan
 * @copyright MIT
 * @see https://docs.mvs.org/zh-cn/api_v2/
 * @version 1.1.2
 */
class MetaverseBlockChain extends DaemonData
{
    /**
     * 获取区块数目
     * @return array
     */
    public function getBlockNumber()
    {
        return $this->getData("getheight",array(),83);
    }

    /**
     * 根据区区块号获取区块信息
     * @param $blockNumber
     * @return array
     */
    public function getBlock($blockNumberOrHash)
    {
        return $this->getData("getblock", array($blockNumberOrHash), 1);
    }

    /**
     * 获取区块头信息
     * @param $blockNumberOrHash
     * @return array
     */
    public function getBlockHeader()
    {
        return $this->getData('getblockheader', array(), 2);
    }

    /**
     * 获取最新区块信息
     * @return array
     */
    public function getLatestBlock()
    {
        $height = $this->getBlockNumber();
        return $this->getBlock($height);
    }
}

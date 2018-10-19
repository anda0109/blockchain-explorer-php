<?php

namespace BlockExplorer;

/**
 * Fetch transactions information from altcoin/bitcoin deamon
 *
 * @author Lukas Mestan
 * @copyright MIT
 * @see https://en.bitcoin.it/wiki/Original_Bitcoin_client/API_calls_list
 * @version 1.1.2
 */
class BtcTransaction extends DaemonData
{

    /**
     * Get an object about the given transaction
     *
     * @access public
     * @param string $txId
     * @return array
     */
    public function getTransaction($txId)
    {
        return $this->getData('gettransaction', array(
            $txId
        ));
    }

    /**
     * Get block hash value for the specified block in the chain
     *
     * @access public
     * @internal from bitcoin version 0.7
     * @param string $txId
     * @param integer|string $verbose
     * @return array
     */
    public function getRawTransaction($txId, $verbose = 1)
    {
        return $this->getData('getrawtransaction', array(
            $txId,
            $verbose
        ));
    }


    /**
     * 列出某个账户下最近多少条交易记录，指定从哪一条数据开始
     * listTransactions('test', 20, 100),从第100条开始，列出20条交易记录
     * @param $account 指定查询交易的账户
     * @param $count 查询交易的数量
     * @param $from 从某一条数据开始
     * @return array
     */
    public function listTransactions($account, $count, $from)
    {
        return $this->getData('listtransactions', array(
            $account,
            $count,
            $from
        ));
    }
}

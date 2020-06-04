<?php
namespace WeHelper\AliPay;

use WeHelper\Driver\AliPay;

/**
 * 支付宝扫码支付
 * Class Scan
 * @package AliPay
 */
class Scan extends AliPay
{
    /**
     * Scan constructor.
     * @param array $options
     */
    public function __construct(array $options)
    {
        parent::__construct($options);
        $this->options->set('method', 'alipay.trade.precreate');
    }

    /**
     * 创建数据操作
     * @param array $options
     * @return mixed
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function apply($options)
    {
        return $this->getResult($options);
    }
}
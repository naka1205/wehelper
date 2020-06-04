<?php
namespace WeHelper\AliPay;

use WeHelper\Driver\AliPay;

/**
 * 支付宝刷卡支付
 * Class Pos
 * @package AliPay
 */
class Pos extends AliPay
{
    /**
     * Pos constructor.
     * @param array $options
     */
    public function __construct(array $options)
    {
        parent::__construct($options);
        $this->options->set('method', 'alipay.trade.pay');
        $this->params->set('product_code', 'FACE_TO_FACE_PAYMENT');
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
<?php
namespace WeHelper\AliPay;

use WeHelper\Driver\AliPay;


/**
 * 支付宝电子面单下载
 * Class Bill
 * @package AliPay
 */
class Bill extends AliPay
{
    /**
     * Bill constructor.
     * @param array $options
     */
    public function __construct(array $options)
    {
        parent::__construct($options);
        $this->options->set('method', 'alipay.data.dataservice.bill.downloadurl.query');
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
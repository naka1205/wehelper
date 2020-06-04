<?php
namespace WeHelper\AliPay;

use WeHelper\Tools;
use WeHelper\Driver\AliPay;

/**
 * 支付宝App支付网关
 * Class App
 * @package AliPay
 */
class App extends AliPay
{

    /**
     * App constructor.
     * @param array $options
     */
    public function __construct(array $options)
    {
        parent::__construct($options);
        $this->options->set('method', 'alipay.trade.app.pay');
        $this->params->set('product_code', 'QUICK_MSECURITY_PAY');
    }

    /**
     * 创建数据操作
     * @param array $options
     * @return string
     */
    public function apply($options)
    {
        $this->applyData($options);
        return http_build_query($this->options->get());
    }
}
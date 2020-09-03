# wehelper

### 安装
```
composer require naka507/wehelper
```

### 微信

```php
require __DIR__ . '/vendor/autoload.php';
use WeHelper\WeChat\User;

$config = [
    'token'          => '',
    'appid'          => '',
    'appsecret'      => '',
    'encodingaeskey' => '',
    'mch_id'         => "", // 配置商户支付参数
    'mch_key'        => '',
    // 配置商户支付双向证书目录 （p12 | key,cert 二选一，两者都配置时p12优先）
    'ssl_key'        => 'XXX.pem',
    'ssl_cer'        => 'XXX.pem',
    // 配置缓存目录，需要拥有写权限
    'cache_path'     => '',
];

$wechat = new User($config);
// 获取用户列表
$result = $wechat->getUserList();

// 批量获取用户资料
foreach (array_chunk($result['data']['openid'], 100) as $value) {
    $info = $wechat->getBatchUserInfo($value);
    var_export($info);
}

```

## 微信网页

```php

//发起授权
$oauth = new Oauth($config);

$redirect_url = 'https://www.xxx.com/back';
// $scope = 'snsapi_base'; //静默授权 获取openid
$scope = 'snsapi_userinfo'; //主动授权 获取用户信息
$redirect = $oauth->getOauthRedirect($redirect_url,'debug',$scope);

header('Location: ' .$redirect);

```
```php

//授权回调
$oauth = new Oauth($config);
//获取 access_token openid
$data = $oauth->getOauthAccessToken();


//主动授权 获取用户信息信息
$access_token = isset($data['access_token']) ? $data['access_token'] : '';
$openid = isset($data['openid']) ? $data['openid'] : '';
$user_info = $oauth->getUserInfo($access_token,$openid);
```

### 微信小程序
```php

use WeHelper\WeMini\Crypt;

$iv = $_POST['iv'];
$code = $_POST['code'];
$encryptedData = $_POST['encryptedData'];

$config = [
    'appid'     => '',
    'appsecret' => '',
];

$mini = new Crypt($config);
$info = $mini->session($code);

$session_key = isset($info['session_key']) ? $info['session_key'] : '';
// 获取用户信息
$userinfo = $wechat->decode($iv, $session_key, $encryptedData);
```

### 微信支付

```php
use WeHelper\WeChat\Pay;

$wechat = new Pay($config);

// 参数
$options = [
    'body'             => '测试商品',
    'out_trade_no'     => time(),
    'total_fee'        => '1',
    'openid'           => '',
    'trade_type'       => 'JSAPI',
    'notify_url'       => 'http://www.xxx.com/text.html',
    'spbill_create_ip' => '127.0.0.1',
];

// 生成预支付码
$result = $wechat->createOrder($options);

// 创建JSAPI参数签名
$options = $wechat->createParamsForJsApi($result['prepay_id']);


```

### 支付宝支付

```php
use WeHelper\AliPay\Wap;

// 参数
$config = [
    'debug'       => true, // 沙箱模式
    'sign_type'   => "RSA2", // 签名类型（RSA|RSA2）
    'appid'       => '', // 应用ID
    'public_key'  => '', // 支付宝公钥 
    'private_key' => '', // 支付宝私钥 
    'app_cert'    => '', // 应用公钥证书（新版资金类接口转 app_cert_sn）
    'root_cert'   => '', // 支付宝根证书（新版资金类接口转 alipay_root_cert_sn）
    'notify_url'  => '', // 支付成功通知地址
    'return_url'  => '', // 网页支付回跳地址
];

// 参考公共参数  https://docs.open.alipay.com/203/107090/
$config['notify_url'] = 'http://www.xxxx.com/alipay-notify.php';
$config['return_url'] = 'http://www.xxxx.com/alipay-success.php';

$alipay = new Wap($config);

// 参考链接：https://docs.open.alipay.com/api_1/alipay.trade.wap.pay
$result = $alipay->apply([
    'out_trade_no' => time(), // 商户订单号
    'total_amount' => '1', // 支付金额
    'subject'      => '支付订单描述', // 支付订单描述
]);


```


### 企业微信

```php
require __DIR__ . '/vendor/autoload.php';
use WeHelper\WeQiye\Oauth;

$config = [
    'token'          => '',
    'appid'          => '',
    'appsecret'      => '',
    // 配置缓存目录，需要拥有写权限
    'cache_path'     => '',
];

$wx = new Oauth($config);
// 获取登录凭证
$result = $wx->session($code);

// 获取用户信息
$result = $wx->session($result['userid']);
```
<?php 
namespace Html\Controller;
use Think\Controller;
use Common\Helpers\StringHelper;
use Common\Helpers\NetworkHelper;

/**
 * BackController
 * 异步回调控制器
 * 
 * @author elf <360197197@qq.com>
 * @version 1.0
 */
class BackController extends Controller {
    
    public function recharNotify() {
        $params = I('post.');
        if($this->rechargeVerify($params)) {
            // 验签成功，处理订单 TODO
        } else {
            // 验签失败写入日志 TODO
        }

        echo 'SUCCESS';
    }

    /**
     * 充值验签
     * @param  array   $params 返回的所有参数
     * @return boolean         是否成功
     */
    private function rechargeVerify($params) {
        $sign = $params['sign'];
        unset($params['sign']);
        unset($params['sign_type']);

        $tempParams = StringHelper::paramsSort($params);
        $data = StringHelper::createLinkString($tempParams);

        $pubKey = ''; // 待获取

        return StringHelper::rsaVerify($data, $sign, $pubKey, OPENSSL_ALGO_MD5);
    }
}
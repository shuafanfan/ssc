<?php 
namespace Html\Controller;
use Think\Controller;
use Common\Helpers\StringHelper;
use Common\Helpers\NetworkHelper;

/**
 * ApiController
 * API接口
 * 
 * @author elf <360197197@qq.com>
 * @version 1.0
 */
class ApiController extends Controller {

    function __construct() {
        header('Access-Control-Allow-Origin: admzk.com');
    }

    /**
     * 公告列表接口
     */
    public function notices() {
        $page = I('get.page');
        $pageSize = I('get.pageSize');
        $articleModel = M('Article'); // 实例化User对象
        $count = $articleModel->where('type=0')->count("1");
        $list = $articleModel->field('id, title, addtime')->where('type=0')->page($page.','.$pageSize)->select();
        $data['status'] = 1;
        $data['msg'] = '获取公告列表成功！';
        $data['data']['count'] = $article;
        $data['data']['page'] = $page;
        $data['data']['pageSize'] = $pageSize;
        $data['data']['list'] = $list;
        $this->ajaxReturn($data);
    }

    /**
     * 文章接口
     */
    public function article() {
        $id = I('get.id');
        $articleModel = M('Article'); // 实例化User对象
        $article = $articleModel->where('id='.$id)->find();
        $data = [];
        $data['status'] = 1;
        $data['msg'] = '获取文章成功！';
        $data['data']['article'] = $article;
        $this->ajaxReturn($data);
    }

    /**
     * 充值接口
     */
    public function recharge() {
        $money = I('post.money');
        /** 金额待限制 **/

        $params = [];
        $params['merchant_code'] = ''; //待获取
        $params['service_type'] = 'b2b_pay';
        $params['interface_version'] = 'V3.0';
        $params['input_charset'] = 'UTF-8';
        $params['notify_url'] = ''; //待填入
        $snRand = rand(100000, 999999);
        $params['order_no'] = date('YmdHis') . $snRand;
        $params['order_time'] = date('Y-m-d H:i:s');
        $params['order_amount'] = $money;
        $params['return_url'] = ''; //待填入
        $params['pay_type'] = 'b2c';
        $params['product_name'] = '现金充值';

        $sign = $this->rechargeSign($params);

        $params['sign'] = $sign;
        $params['sign_type'] = 'RSA-S';

        $url = 'https://pay.dinpay.com/gateway?input_charset=UTF-8';
        
        $html = '<form name="dinpayForm" method="post" action="'.$url.'" target="_blank">';
        foreach ($params as $key => $value) {
            $html .= '<input type="hidden" name="'.$key.'" value="'.$value.'" />';
        }
        $html .= '</form>';
        $html .= '<script></script>';

        $data = [];
        $data['status'] = 1;
        $data['msg'] = '获取充值表单数据成功！';
        $data['data']['form'] = $html;
        $this->ajaxReturn($data);
    }

    /**
     * 获取充值SIGN
     */
    private function rechargeSign($params) {
        $tempParams = StringHelper::paramsSort($params);
        $data = StringHelper::createLinkString($tempParams);

        $priKey = ''; // 待获取

        $sign = StringHelper::rsaSign($data, $priKey, OPENSSL_ALGO_MD5);

        return $sign;
    }
}
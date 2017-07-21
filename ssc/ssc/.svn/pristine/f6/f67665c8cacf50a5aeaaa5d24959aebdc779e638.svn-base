<?php 
namespace Html\TagLib;
use Think\Template\TagLib;


	class TagLibMytags extends TagLib {  
	    protected $tags = array(  
	        'test' => array(  
	            'attr'  => 'id, name',//attr 标签支持的属性列表，用逗号分隔  
	            'close' => 0//close 标签是否为闭合方式(0闭合 1不闭合)，默认不闭合  
	        )  
	    );  
	  
	    public function _test ($tag, $content) {  
	        $id = $tag['id'];  
	        $sid = $tag['sid'];  

	        $str .= '<?php $res=M("setting")->where("id='.$sid.'")->find(); if('.$sid.'==5){ echo count(explode(",",$res["setting_value"])); }else{ echo $res["setting_value"]; }?>';  
	  
	        return $str;  
	  
	    }  
	}





 ?>
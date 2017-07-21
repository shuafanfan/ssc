<?php if (!defined('THINK_PATH')) exit();?>                 <div class="cont-set-password show">
                     <form id="form-set-password" method="POST" onsubmit="return false;">
                            <div class="row">
                                <div class="th">用户名:</div>
                                <div class="td" content="user-name"><?php echo ($userInfo["nickname"]); ?></div>
                            </div>
                            <div class="row">
                                <div class="th">当前登入密码:</div>
                                <label class="td"><input type="password" name="old_password"></label>
                            </div>
                            <div class="row30 clearfix">
                                <div class="th"></div>
                                <div class="tip tip1">
                                    <i class="zhuyi"></i>
                                    请输入当前登录密码
                                </div>
                            </div>
                            <div class="row">
                                <div class="th">新的登入密码:</div>
                                <label class="td"><input type="password" name="password"></label>
                            </div>
                            <div class="row30 clearfix">
                                <div class="th"></div>
                                <div class="tip tip2">
                                    <i class="zhuyi"></i>
                                    请输入新的登录密码
                                </div>
                            </div>
                            <div class="row">
                                <div class="th">确认新的登入密码:</div>
                                <label class="td"><input type="password" name="confirm_password"></label>
                            </div>
                            <div class="row30 clearfix">
                                <div class="th"></div>
                                <div class="tip tip3">
                                    <i class="zhuyi"></i>
                                    请重新输入新的登录密码
                                </div>
                            </div>
                            <div class="row">
                                <a id="submit-set-password" class="btn">确认提交</a>
                                <a id="cancel-set-password" class="btn">重新修改</a>
                            </div>
                        </form>
                    </div>
                    <div class="cont-set-password" id="cont-set-password">
                        <form id="form-set-money-password" method="POST"  onsubmit="return false;">
                            <div class="row">
                                <div class="th">用户名:</div>
                                <div class="td" content="user-name"><?php echo ($userInfo["nickname"]); ?></div>
                            </div>
                            <div class="row">
                                <div class="th">当前资金密码:</div>
                                <label class="td"><input type="password" name="old_password"></label>
                            </div>
                            <div class="row30 clearfix">
                                <div class="th"></div>
                                <div class="tip tip1">
                                    <i class="zhuyi"></i>
                                    请输入当前资金密码
                                </div>
                            </div>
                            <div class="row">
                                <div class="th">新的资金密码:</div>
                                <label class="td"><input type="password" name="password"></label>
                            </div>
                            <div class="row30 clearfix">
                                <div class="th"></div>
                                <div class="tip tip2">
                                    <i class="zhuyi"></i>
                                    请输入新资金密码
                                </div>
                            </div>
                            <div class="row">
                                <div class="th">确认新资金密码:</div>
                                <label class="td"><input type="password" name="confirm_password"></label>
                            </div>
                            <div class="row30 clearfix">
                                <div class="th"></div>
                                <div class="tip tip3">
                                    <i class="zhuyi"></i>
                                    默认资金密码:000000
                                </div>
                            </div>
                            <div class="row">
                                <a id="submit-set-money-password" class="btn" >确认提交</a>
                                <a id="cancel-set-money-password" class="btn" >重新修改</a>
                            </div>
                        </form>
                    </div>



<script>
	//登录密码
    $(document).ready(function(){
		  var  form_in1 = $('#form-set-password input[name="old_password"]');
		  var  form_in2 = $('#form-set-password input[name="password"]');
		  var  form_in3 = $('#form-set-password input[name="confirm_password"]');
		  var  form_in1_t = $('#form-set-password .tip1');
		  var  form_in2_t = $('#form-set-password .tip2');
		  var  form_in3_t = $('#form-set-password .tip3');
                  var  ret_2 = /^[a-zA-Z0-9]{6,12}$/;
          form_in1.blur(function(){
              var num=$(this).val().length;
              var pass=$(this).val();
			  if(num==0){
                   form_in1_t.html("<i class=\"zhuyi\"></i>请输入当前登录密码");                 
              }
              else if(ret_2.test(pass)){
                   form_in1_t.html(""); 
              }             
			  else {
				   form_in1_t.html("<i class=\"zhuyi\"></i>请输入6至12位的英文或数字");  
			  }
          });
          form_in2.blur(function(){
              var tmp=form_in1.val();
			  var tmp2=form_in2.val();
			  var tmp3=form_in3.val();
              var num=form_in2.val().length;
			  if(num==0){
                   form_in1_t.html("<i class=\"zhuyi\"></i>请输入新的登入密码");                 
              }
              else if(tmp2 ==tmp){
                   form_in2_t.html("<i class=\"zhuyi\"></i>不能和登录密码相同");                 
              }
              else{
                  if(ret_2.test(tmp2)){
					  if(tmp3.length!=0){
						  if(tmp2!=tmp3){
							form_in2_t.html("<i class=\"zhuyi\"></i>两次密码不一致"); 
						  }
						  else{
							form_in2_t.html(""); 
							form_in3_t.html(""); 
						  }
					  }else{
							form_in2_t.html("");  
						  }
                                         
                  }             
                  else{
                      form_in2_t.html("<i class=\"zhuyi\"></i>请输入6至12位的英文或数字");                           
                  }
              }
          });
		  form_in3.blur(function(){
              var tmp=form_in1.val();
			  var tmp2=form_in2.val();
			  var tmp3=form_in3.val();
              var num=form_in3.val().length;
			  if(num==0){
                   form_in1_t.html("<i class=\"zhuyi\"></i>请确认新的登录密码");                 
              }
              else if(tmp3==tmp){
                   form_in3_t.html("<i class=\"zhuyi\"></i>不能和登录密码相同");                 
              }
              else{
                  if(ret_2.test(tmp3)){
					  if(tmp2.length!=0){
						  if(tmp2!=tmp3){
							form_in3_t.html("<i class=\"zhuyi\"></i>两次密码不一致"); 
						  }
						  else{
							form_in3_t.html(""); 
							form_in2_t.html(""); 
						  }
					  }else{
							form_in3_t.html(""); 
						  }
                                         
                  }                 
                  else{
                      form_in3_t.html("<i class=\"zhuyi\"></i>请输入6至12位的英文或数字");                           
                  }
              }
          });
		  
          $("#submit-set-password").click(function(){
                  var flag=true;
                  var old=form_in1.val();
                  var pass=form_in2.val();
                  var pass2=form_in3.val();
                  if(old==pass||old==pass2||!ret_2.test(old)||!ret_2.test(pass)||!ret_2.test(pass2)||pass!=pass2){
                      flag=false;
                  }
                  else{
                      flag=true;
                  }
//		alert(flag)  	  
                  if(flag){
                     
                  $.ajax({
                    cache: true,
                    type: "POST",
                    url:"<?php echo U('Html/User/editLoginPassword');?>",
                    data:{oldpassword:old,password:pass,cashpassword:false},
                    async: false,
                    dataType: 'json',
                    success:function(e){
                        if (e.state == 1) {
                            alert('不是当前登录密码');
                        }
                        if (e.state == 2) {
                            alert('修改登录密码成功');
                            $("#cancel-set-password").click();
                        } 
                    }
                  });
              }
              });
		    $("#cancel-set-password").click(function(){
				$('#form-set-password').find('input').val('');
        });
    });
		//资金密码
    $(document).ready(function(){
		  var  form_in1 = $('#form-set-money-password input[name="old_password"]');
		  var  form_in2 = $('#form-set-money-password input[name="password"]');
		  var  form_in3 = $('#form-set-money-password input[name="confirm_password"]');
		  var  form_in1_t = $('#form-set-money-password .tip1');
		  var  form_in2_t = $('#form-set-money-password .tip2');
		  var  form_in3_t = $('#form-set-money-password .tip3');
                  var  ret_2 = /^[a-zA-Z0-9]{6,12}$/;
          form_in1.blur(function(){
              var num=$(this).val().length;
              var pass=$(this).val();
			  if(num==0){
                   form_in1_t.html("<i class=\"zhuyi\"></i>请输入当前资金密码");                 
              }
              else if(ret_2.test(pass)){
                   form_in1_t.html("");              
              }             
			  else {
				   form_in1_t.html("<i class=\"zhuyi\"></i>请输入6至12位的英文或数字");  
			  }
          });
          form_in2.blur(function(){
              var tmp=form_in1.val();
			  var tmp2=form_in2.val();
			  var tmp3=form_in3.val();
              var num=form_in2.val().length;
			  if(num==0){
                   form_in1_t.html("<i class=\"zhuyi\"></i>请输入新的资金密码");                 
              }
              else if(tmp2 ==tmp){
                   form_in2_t.html("<i class=\"zhuyi\"></i>不能和资金密码相同");                 
              }
              else{
                  if(ret_2.test(tmp2)){
					  if(tmp3.length!=0){
						  if(tmp2!=tmp3){
							form_in2_t.html("<i class=\"zhuyi\"></i>两次密码不一致"); 
						  }
						  else{
							form_in2_t.html(""); 
							form_in3_t.html(""); 
						  }
					  }else{
							form_in2_t.html("");  
						  }
                                         
                  }             
                  else{
                      form_in2_t.html("<i class=\"zhuyi\"></i>请输入6至12位的英文或数字");                           
                  }
              }
          });
		  form_in3.blur(function(){
              var tmp=form_in1.val();
			  var tmp2=form_in2.val();
			  var tmp3=form_in3.val();
              var num=form_in3.val().length;
			  if(num==0){
                   form_in1_t.html("<i class=\"zhuyi\"></i>请确认新的资金密码");                 
              }
              else if(tmp3==tmp){
                   form_in3_t.html("<i class=\"zhuyi\"></i>不能和资金密码相同");                 
              }
              else{
                  if(ret_2.test(tmp3)){
					  if(tmp2.length!=0){
						  if(tmp2!=tmp3){
							form_in3_t.html("<i class=\"zhuyi\"></i>两次密码不一致"); 
						  }
						  else{
							form_in3_t.html(""); 
							form_in2_t.html(""); 
						  }
					  }else{
							form_in3_t.html(""); 
						  }
                                         
                  }                 
                  else{
                      form_in3_t.html("<i class=\"zhuyi\"></i>请输入6至12位的英文或数字");                           
                  }
              }
          });
		  
          $("#submit-set-money-password").click(function(){
                  var flag=true;
                  var old=form_in1.val();
                  var pass=form_in2.val();
                  var pass2=form_in3.val();
                  if(old==pass||pass2==pass||!ret_2.test(old)||!ret_2.test(pass)||!ret_2.test(pass2)||pass!=pass2){
                      flag=false;
                  }
                  else{
                      flag=true;
                  }
			  
                  if(flag){
//					  alert(flag)   
                  $.ajax({
                    cache: true,
                    type: "POST",
                    url:"<?php echo U('Html/User/editLoginPassword');?>",
                    data:{oldpassword:old,password:pass,cashpassword:true},
                    async: false,
                    dataType: 'json',
                    success:function(e){   
                        if (e.state == 1) {
                            alert('不是当前资金密码');
                        }
                        if (e.state == 2) {
                            alert('修改资金密码成功');
                            $("#cancel-set-money-password").click();
                        } 
                                
                    }
                  });
              }
              });
		    $("#cancel-set-money-password").click(function(){
				$('#form-set-money-password').find('input').val('');
        });
    });
</script>
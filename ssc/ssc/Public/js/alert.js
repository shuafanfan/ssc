/**
 * Created by Administrator on 2017/2/12.
 */
/**
 * 提示
 * @param content
 * @param object
 * @param status
 */
function webTip(content,object,status){
    obj =  $(object);
    if(obj.length>1){
        obj= obj.eq(0);
    }
    var top = obj.offset().top;
    var left = obj.offset().left;
    var  width = $(window).width();
    var html =' <div class="alert_input_msg" id="alert_input_msg_tip">';
        html +='<div class="alert_input_content">';
        html += content;
        html +=' </div>';
        html +=' <s class="alert_input_msg_tips"><i></i></s>';
        html +='  </div>';
        $('body').append(html);
        $('.alert_input_content').addClass(status);
        var alert_tip_id = $('.alert_input_msg');
      // var  alert_input_width = alert_tip_id.width();
         alert_tip_id.width(alert_tip_id.width());
        if((width-left) > alert_tip_id.width()){
            $('.alert_input_msg_tips').css({
                'left':'30px'
            });
            alert_tip_id.css({
                'left':left+'px',
                'top':(parseInt(top)+parseInt(40))+'px'
            });

        }else{
            $('.alert_input_msg_tips').css({
                'right':'30px'
            })
            alert_tip_id.css({
                'top':(parseInt(top)+parseInt(45))+'px',
                'right':(parseInt(left)-alert_tip_id.width())+'px'
            })
        }
       // setTimeout(function () {
           // alert_tip_id.remove();
       // }, 2000);
}
/**
 * 提示
 * @param config
 * @param confirmInfo
 * @param confirmFuncion
 * @param cancelFuncion
 * @returns {boolean}
 */
function alertApp(config,confirmInfo,confirmFuncion,cancelFuncion) {
    var title =  config.title;
    var  type =  config.type;
    var  times =  config.times;
    var  href =  config.href;
    var  confirm =  config.confirm;
/*    var  confirmInfo =  config.confirmInfo;*/
    var html  = '<div class="sweet-overlay" tabindex="-1" style="opacity: 1.05; display: block;"></div>';
    if((title == undefined)|| (title== null) ||(title == '')){
        return false;
    }
    html +=' <div class="sweet-alert showSweetAlert" data-custom-class="" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="false" data-animation="pop" data-timer="null" style="display: block; margin-top: -176px;">';
    html +='   <div class="sweet-close" data-href="'+href+'">×</div>';
    var addHtml =  config.html;
    if((addHtml ==  undefined) || (addHtml == null) || (addHtml == '')){
        switch (type){
            case 'error':
                html +='<div class="sa-icon sa-error" style="display: block;">';
                html +='   <span class="sa-x-mark animateXMark">';
                html +='   <span class="sa-line sa-left"></span>';
                html +='   <span class="sa-line sa-right"></span>';
                html +='    </span>';
                html +='  </div>';
                break;
            case 'success':
                html +='<div class="sa-icon sa-success" style="display: block;">';
                html +='    <span class="sa-line sa-tip"></span>';
                html +='    <span class="sa-line sa-long"></span>';
                html +='   <div class="sa-placeholder"></div>';
                html +='   <div class="sa-fix"></div>';
                html +='   </div>';
                break;
            case 'info':
                html +='   <div class="sa-icon sa-info" style="display: block;"></div>';
                break;
            case 'warning':
                html +='  <div class="sa-icon sa-warning" style="display: block;">';
                html +='    <span class="sa-body"></span>';
                html +='   <span class="sa-dot"></span>';
                html +='   </div>';
                break;
        }
        html +='<h2>'+title+'</h2>';
    }else{
        html +='<h2>'+title+'</h2>';
        html +='<div class="sweet-html">';
        html += addHtml;
        html +='</fieldset>';
    }
    if(confirm == true){
        html +='    <div class="sa-button-container">';
        if(confirmInfo.cancelName){
            html +='   <button class="cancel"  tabindex="2" style="display: inline-block; box-shadow: none;">'+confirmInfo.cancelName+'</button>';
        }
        if(confirmInfo.confirmName){
            html +='   <div class="sa-confirm-button-container">';
            html +='   <button class="confirm" tabindex="1">';
            html +=confirmInfo.confirmName;
            html +='    </button>';
            html +='   </div>';
        }
        html +='   </div>';
        html +='    </div>';
        $('body').append(html);
        $(document).on('click','.cancel',function () {
            if(cancelFuncion == undefined || cancelFuncion == null || cancelFuncion == ''){
                sweetClose();
            }else{
                cancelFuncion.call();
            }
        });
        $(document).on('click','.confirm',function (){
            confirmFuncion.call();
        });
    }else{
        html +='<div style="height: 30px;"> 页面自动 <a  href="'+href+'">跳转</a>  等待时间<span id="times">'+times+'</span>秒</div>';
        html +='    </div>';
        $('body').append(html);
       var interval = setInterval(function () {
            var time = --times;
            if(time<0){
                location.href = href;
                clearInterval(interval);
            }
            $('#times').text(time);
        },1000);
       // setTimeout(function () {
          //  sweetClose();
        //}, 1000);
    }
}
/**
 * 点击关闭按钮
 */
$(document).on('click','.sweet-close',function () {
    location.href = $(this).attr('data-href');
    sweetClose();
});
/**
 * 关闭弹窗
 */
function sweetClose(){
    $('.sweet-overlay').remove();
    $('.sweet-alert').remove();
}
/**
 * 验证密码
 * @param pwd
 * @constructor
 */

function CheckIntensity(pwd){
    var Mcolor,Wcolor,Scolor,Color_Html;
    var m=0;
    var Modes=0;
    for(i=0; i<pwd.length; i++){
        var charType=0;
        var t=pwd.charCodeAt(i);
        if(t>=48 && t <=57){
            charType=1;
        }   else if(t>=65 && t <=90){
            charType=2;
        }   else if(t>=97 && t <=122){
            charType=4;
        }   else{
            charType=4;
        }
        Modes |= charType;
    }  for(i=0;i<4;i++){
        if(Modes & 1){
            m++;
        }
        Modes>>>=1;
    }  if(pwd.length<=4){
        m=1;
    }  if(pwd.length<=0){
        m=0;
    }  switch(m){
        case 1 :
            Wcolor="pwd pwd_Weak_c";
            Mcolor="pwd pwd_c";
            Scolor="pwd pwd_c pwd_c_r";
            Color_Html="弱";
            break;
        case 2 :
            Wcolor="pwd pwd_Medium_c";
            Mcolor="pwd pwd_Medium_c";
            Scolor="pwd pwd_c pwd_c_r";
            Color_Html="中";
            break;
        case 3 :
            Wcolor="pwd pwd_Strong_c";
            Mcolor="pwd pwd_Strong_c";
            Scolor="pwd pwd_Strong_c pwd_Strong_c_r";
            Color_Html="强";
            break;
        default :
            Wcolor="pwd pwd_c";
            Mcolor="pwd pwd_c pwd_f";
            Scolor="pwd pwd_c pwd_c_r";
            Color_Html="无";   break;
    }
    document.getElementById('pwd_Weak').className=Wcolor;
    document.getElementById('pwd_Medium').className=Mcolor;
    document.getElementById('pwd_Strong').className=Scolor;
    document.getElementById('pwd_Medium').innerHTML=Color_Html;
}



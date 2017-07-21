<?php if (!defined('THINK_PATH')) exit();?>				   <div class="search_date clearfix">
						<span class="red">注意：</span>如果链接返点配额不足或者已删除，新用户默认返点为 <span class="red">0</span>
						<div class="fr">
						<a id="btn_ad_openq" class="btn_search page_submit"><i></i> 查询</a>
						<a class="btn_search addNewUrl" id="btn_plus"><i></i> 添加新链接</a>
						</div>
					</div>
<div id="ad_open">
					<table class="state_tab state_tab_no safe-logta clearfix">
						<thead>
						<tr>
							<th>注册链接</th>
							<th>账户类型</th>
							<th>高频彩返点</th>
							<th>低频彩返点</th>
							<th>备注</th>
							<th>注册量</th>
							<th>操作</th>
						</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
                <div class="panging clearfix">
                    <div class="panging_info fl">
                        第<span><?php echo ($count["current"]); ?></span>页 ,共<span><?php echo ($count["count"]); ?></span>条 ,每页<span><?php echo ($count["number"]); ?></span>条
                    </div>
                    <div class="page_jump fr">
                        <?php if(($count["current"] == 1)): ?><span>上一页</span><?php endif; ?>
                        <?php if(($count["current"] != 1)): ?><span  class="active">上一页</span><?php endif; ?>
                        <span class="active"><?php echo ($count["current"]); ?></span>
                        <?php if(($count["lastPage"] == '')): ?><span class="active">下一页</span><?php endif; ?>
                        <?php if(($count["lastPage"] != '')): ?><span>下一页</span><?php endif; ?>
                        <lable><input type="text" value="" name="jump"></lable>
                        <span class="go" id="jump">跳转</span>
                    </div>
                </div>
</div>
<script>
$('#btn_ad_openq').click(function(){
        $.ajax({
        cache: true,
        type: "POST",
        url:'<?php echo U('Html/TeamManagement/query');?>',
        data:'1',
        async: false,
        success: function(data) {
            $("#ad_open").html(data);
        }
    });
})
</script>
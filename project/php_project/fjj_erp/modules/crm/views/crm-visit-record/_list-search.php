<?php
/**
 * User: F1677929
 * Date: 2017/3/29
 */
?>
<div class="mb-10">
    <label style="width:100px;">客户名称：</label>
    <input id="cust_sname" type="text" style="width:150px;">
    <label style="width:100px;">客户类型：</label>
    <select style="width:150px;" id="cust_type">
        <option value="">全部</option>
        <?php foreach($data['customerType'] as $key=>$val){?>
            <option value="<?=$key?>"><?=$val?></option>
        <?php }?>
    </select>
    <label style="width:100px;">拜访类型：</label>
    <select style="width:150px;" id="sil_type">
        <option value="">全部</option>
        <?php foreach($data['visitType'] as $key=>$val){?>
            <option value="<?=$key?>"><?=$val?></option>
        <?php }?>
    </select>
    <button id="query_btn" type="button" class="search-btn-blue" style="margin-left:10px;">查询</button>
    <button id="reset_btn" type="button" class="reset-btn-yellow" style="margin-left:10px;">重置</button>
</div>
<script>
    //加载数据
    function loadData(){
        $("#list_table").datagrid('load',{
            "cust_sname":$("#cust_sname").val(),
            "cust_type":$("#cust_type").val(),
            "sil_type":$("#sil_type").val()
        }).datagrid('clearSelections');
    }

    $(function(){
        //查询
        $("#query_btn").click(function(){
            loadData();
        });
        $(document).keydown(function(event){
            if(event.keyCode==13){
                loadData();
            }
        });

        //重置
        $("#reset_btn").click(function(){
            $("input,select").val('');
            loadData();
        });
    })
</script>
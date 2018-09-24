<?php
/**
 * Created by PhpStorm.
 * User: F1677978
 * Date: 2017/10/9
 * Time: 下午 05:06
 */
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\assets\JqueryUIAsset;

JqueryUIAsset::register($this);
?>
<style>
    .fancybox-wrap {
        top: 0px !important;
        left: 0px !important;
    }
</style
<div class="no-padding " style="width: 500px">
    <div class="create-plan">
        <h2 class="head-first">设置状态</h2>
    <div style="height: 20px"></div>
    <div class="mb-10">
        <label class="label-width qlabel-align " style="margin-left: 20px;width: 50px">销售点<label>：</label></label>
<!--        --><?php //if (!empty($saleinfo)) { ?>
<!--            --><?php //foreach ($saleinfo as $key => $val) { ?>
<!--                <label class="name" style="text-align: left;margin-left: 70px">--><?//=$val?><!--</label><label>;</label></br>-->
<!--            --><?php //} ?>
<!--        --><?php //} ?>
        <label class=" text-top name" style="text-align: left;width: 440px;line-height: 18px;display: inline"><?=$saleinfo?></label>
    </div>
    <div class="mb-10">
        <label class="label-width qlabel-align " style="margin-left: 20px;width: 50px;">状态<label>：</label></label>
        <select  type="text" name="sts_status" style="width: 150px" class="sts_status">
            <option value="10">营业中</option>
            <option value="11">筹备中</option>
            <option value="14">已暂停</option>
            <option value="13">已歇业</option>
            <option value="15">已关闭</option>
        </select>
        <input name="id" value="<?=$idarr?>" type="hidden"/>
    </div>
    <div class="mb-10 text-center" style="margin-top: 30px">
        <button class="button-blue" type="submit" id="submit">确定</button>
        <button class="button-white" type="button"  onclick="parent.$.fancybox.close()">取消</button>
    </div>
    </div>
    </div>
<script>
    $(function () {
        $("#submit").on('click',function () {
            $.ajax({
                type: "POST",
                data: {id: "<?=$idarr?>",sts_status:$(".sts_status").val()},
                dataType: "json",
                url: "<?=Url::to(['setstatus']) ?>",
                success: function (data) {
                    if (data.flag == 1) {
                        parent.layer.alert(data.msg, {icon: 1,end: function () {
                            parent.$("#edit").hide().prev().hide();
                            parent.$("#setstatus").hide().prev().hide();
                            parent.$("#data").datagrid('clearChecked');
                            parent.$("#data").datagrid('clearSelections');
                            if(parent.$("#data").length == 1){
                                parent.$("#data").datagrid("reload");
                            }else{
                                parent.location.reload();
                            }
                            parent.$.fancybox.close();
                        }});
                    } else {
                        parent.layer.alert(data.msg, {icon: 2});
                    }
                },
                error: function (xhr, type) {
                    alert("出现异常!");
                }
            })
        })
    })
</script>
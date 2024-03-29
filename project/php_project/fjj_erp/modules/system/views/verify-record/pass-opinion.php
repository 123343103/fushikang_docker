<?php
/**
 * Created by PhpStorm.
 * User: F3860965
 * Date: 2017/9/13
 * Time: 上午 08:43
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use \app\assets\MultiSelectAsset;


MultiSelectAsset::register($this);
?>
<style>
    .width-400 {
        width: 400px;
    }
</style>
<?php $form = ActiveForm::begin(['id' => 'check-form',
    'action' => ['/system/verify-record/audit-pass']]); ?>
<div>
    <input type="hidden" name="id" value="<?= $id ?>">
    <input type="hidden" name="hv_inv_type" value="<?= $type ?>">
    <?php if(!empty($limit)){ ?>
        <?php foreach ($limit as $key => $val){ ?>
            <div class="mb-10 display-none">
                <input type="hidden" name="LCrmCreditLimit[<?= $key ?>][l_limit_id]" value="<?= $val['l_limit_id'] ?>">
                <input type="hidden" name="LCrmCreditLimit[<?= $key ?>][approval_limit]" value="<?= empty($val['approval_limit'])?'0':$val['approval_limit']; ?>">
                <input type="hidden" name="LCrmCreditLimit[<?= $key ?>][validity_date]" value="<?= empty($val['validity_date'])?'':$val['validity_date'] ?>">
            </div>
        <?php } ?>
    <?php } ?>
    <?php if(!empty($apply)){ ?>
        <div class="mb-10 display-none">
            <input type="hidden" name="LCrmCreditApply[file_new]" value="<?= empty($apply['file_new'])?'':$apply['file_new'] ?>">
            <input type="hidden" name="LCrmCreditApply[file_old]" value="<?= empty($apply['file_old'])?'':$apply['file_old'] ?>">
        </div>
    <?php } ?>
    <div style="width:435px;height: 25px;font-size:16px;background-color: #099bff;color: #ffffff;line-height: 25px;">
        系统提示
    </div>
    <div style="margin-top: 30px;font-size:16px;font-weight: bolder;margin-left: 20px;">确定审核通过？</div>
    <div style="margin-top: 15px;margin-left: 20px;">
    <textarea rows="5" class="width-400 easyui-validatebox" data-options="validType:'maxLength[120]',tipPosition:'top'" placeholder="请输入审核意见(非必填)"
              name="vcoc_remark" id="vcoc_remark" maxlength="120"></textarea>
    </div>
    <div style="margin-left: 135px;margin-top: 10px;">
        <button class="button-blue-big" style="width: 80px;" type="submit" id="sure">确定</button>
        <button class="button-white-big" style="width: 80px;" type="button" onclick="close_select();">取消</button>
    </div>
</div>
<?php ActiveForm::end(); ?>
<script>
        $(document).ready(function() {
            ajaxSubmitForm($("#check-form")
                ,'',function (data) {
                    parent.layer.alert(data.msg,{
                        icon:1,
                        end:function () {
                            if(data.flag==1) {
                                parent.parent.window.location.href = '<?= Url::to(['index']) ?>';
                                parent.$.fancybox.close();
                                //parent.parent.$.fancybox.close();
                            }
                        }
                    })
                });
        });
</script>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\fileupload\FileUploadUI;
use kartik\file\FileInput;
use yii\captcha\Captcha;



/* @var $this yii\web\View */
/* @var $model app\models\Addetails */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
<div class="col-sm-3"></div>        
<div class="col-sm-6">
<div class="addetails-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seller_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seller_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seller_phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
<div id="file_div">
    <div class="box-body" >
            <div class="row" >
             <div class="col-xs-3">
                    <input type="file" name="gallery_url[]" class='changefile'>
                   
             </div>
              <input type="button" onclick="add_file();" value="ADD MORE" style="float: right">
             <div class="col-xs-3">
             </div>    
            </div>
        </div>
      </div>      
      <div class="form-group">
    <div class="box-body" >
            <div class="row" >
             <div class="col-xs-3">
                   <?php   echo Captcha::widget([
    'name' => 'captcha',
]); ?>
                   
             </div>
             <div class="col-xs-3">
             </div>    
            </div>
        </div>
      </div>      


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>
<div class="col-sm-3"></div>
 </div>
</div>
<script type="text/javascript">
function add_file()
{
 $("#file_div").append(" <div class='box-body' > <div class='row' ><div class='col-xs-3'><input type='file' name='gallery_url[]' onchange='loadFile(event)' class='changefile'></div><input type='button' value='REMOVE' style='float:right'  onclick=remove_file(this);></div>");
}
function remove_file(ele)
{
 $(ele).parent().remove();
}

</script>
<?php

$customScript = <<< SCRIPT
function readURL(input) {

if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function(e) {
  
  //$('#imageupload1').attr('src', e.target.result);
    $(input).closest('.box-body').find('.blah').attr('src', e.target.result);
}

reader.readAsDataURL(input.files[0]);
}
}
$(document).on('change', '.changefile', function(event) {
readURL(this);
});
SCRIPT;
$this->registerJs($customScript, \yii\web\View::POS_READY);
    ?>
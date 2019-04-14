<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Wallet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wallet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= 
        $form->field($model, 'currency')->dropDownList([
                                            'USD' => 'USD',
                                            'BTC' => 'BTC',
                                            'ETH' => 'ETH',
                                            'DOGE' => 'DOGE',
                                            'LTC' => 'LTC',
                                        ]) 
    ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

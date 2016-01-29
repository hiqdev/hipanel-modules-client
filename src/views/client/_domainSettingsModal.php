<?php

use hipanel\modules\client\widgets\combo\ContactCombo;
use hiqdev\combo\StaticCombo;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;


?>

<?php $form = ActiveForm::begin([
    'options' => [
        'id' => $model->scenario . '-form',
    ],
    'enableAjaxValidation' => true,
    'validationUrl' => Url::toRoute(['validate-form', 'scenario' => $model->scenario]),
]); ?>

<p><?= Yii::t('app', 'The settings will be automatically applied to all new registered domains.'); ?></p>

<div class="row">
    <div class="col-md-6"><?= $form->field($model, "[$model->id]autorenewal")->checkbox(); ?></div>
    <!-- /.col-md-6 -->
    <div class="col-md-6"><?= $form->field($model, "[$model->id]whois_protected")->checkbox(); ?></div>
    <!-- /.col-md-6 -->
</div>
<!-- /.row -->

<?= $form->field($model, "[$model->id]nss"); ?>

<fieldset>
    <legend><?= Yii::t('app', 'Default contacts') ?>:</legend>

    <div class="row">
        <?php foreach (['registrant', 'admin', 'tech', 'billing'] as $item) : ?>
            <div class="col-md-6">
            <?= $form->field($model, "[$model->id]$item")->widget(ContactCombo::classname(), ['hasId' => true]); ?>
            </div>
            <!-- /.col-md-6 -->
        <?php endforeach; ?>
    </div>
    <!-- /.row -->
</fieldset>
<hr>
<?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?> &nbsp;
<?= Html::button(Yii::t('app', 'Cancel'), ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) ?>
<?php $form->end(); ?>

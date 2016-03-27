<?php

/*
 * Client module for HiPanel
 *
 * @link      https://github.com/hiqdev/hipanel-module-client
 * @package   hipanel-module-client
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2016, HiQDev (http://hiqdev.com/)
 */

use yii\helpers\Html;

$this->title = Yii::t('app', 'Change {contactType} contact for {domainName}', ['contactType' => Html::encode($contactType), 'domainName' => Html::encode($domainName)]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contact'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', compact('model', 'domainName', 'domainId', 'contactType'));
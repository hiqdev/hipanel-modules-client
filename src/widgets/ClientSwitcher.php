<?php
/**
 * Client module for HiPanel
 *
 * @link      https://github.com/hiqdev/hipanel-module-client
 * @package   hipanel-module-client
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2019, HiQDev (http://hiqdev.com/)
 */

namespace hipanel\modules\client\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Url;

class ClientSwitcher extends Widget
{
    public $model;

    public function run()
    {
        if (!Yii::$app->user->can('access-subclients')) {
            return '';
        }

        $this->initClientScript();

        return $this->render('ClientSwitcher', ['model' => $this->model]);
    }

    protected function initClientScript()
    {
        $url = Url::to(['@client/view', 'id' => '']);
        $this->view->registerJs("
            $('.client-switcher select').on('select2:select', function (e) {
                var selectedClientId = this.value;
                window.location.href = '{$url}' + selectedClientId;
            });
        ");
    }
}

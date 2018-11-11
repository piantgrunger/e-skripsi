    <?php
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\helpers\Url;
use hscstudio\mimin\components\Mimin;

$menuItems =
        [
                      [
                        'visible' => !Yii::$app->user->isGuest,
                        'label' => 'User / Group',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                    ['label' => 'App. Route', 'icon' => 'fa fa-circle-o', 'url' => ['/mimin/route/'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Role', 'icon' => 'fa fa-circle-o', 'url' => ['/mimin/role/'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'User', 'icon' => ' fa fa-circle-o', 'url' => ['/mimin/user/'], 'visible' => !Yii::$app->user->isGuest],
                   ], ],

            ];

 if (!Yii::$app->user->isGuest) {
     if (Yii::$app->user->identity->username !== 'admin') {
         $menuItems = Mimin::filterMenu($menuItems);
     }
 }

?>


<?php
NavBar::begin([
        'brandLabel' => 'E-SURAT',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-inverse navbar-fixed-left',
        ],
        'innerContainerOptions' => [
            'class' => 'container',
        ],
    ]);

     echo Nav::widget([
         'options' => ['class' => 'navbar-nav navbar-left'],
         'items' => $menuItems,
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            [
                'label' => Yii::$app->user->isGuest ? 'Login' : 'Logout',
                'url' => [Yii::$app->user->isGuest ? 'site/login' : '/site/logout'],
                'linkOptions' => ['data-method' => 'post'],
            ],
        ],
    ]);

    NavBar::end();
    ?>

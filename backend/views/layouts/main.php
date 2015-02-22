<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'My Company',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?php
            if(!Yii::$app->user->isGuest){ ?>
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <?php foreach(Yii::$app->params['sideNav'] as $k=>$v){ ?>
                    <ul class="nav nav-sidebar">
                        <li><a href="<?php echo Url::to("@web".$v['href']); ?>"><?php echo $v['name']; ?></a></li>
                        <?php foreach($v['sub'] as $m=>$n){ ?>
                        <li class="sub">
                            <a href="<?php echo Url::to("@web".$n['href']); ?>"><?php echo $n['name']; ?></a>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </div>
                <div class="col-sm-9 col-sm-offset-31 col-md-10 col-md-offset-21 main">
            <?php } ?>
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                    <?= $content ?>
           <?php if(!Yii::$app->user->isGuest){ ?>
                </div><!--end main-->
            </div>
           <?php } ?>
        </div><!--container end-->
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

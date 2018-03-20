<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
$dictionary=$this->params['dictionary'];
$lang_url=$this->params['lang_url'];
$langs=$this->params['langs'];
$current=$this->params['current'];
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header>
    <nav>
        <div class="my_container">
            <div class="col-xs-6 col-sm-2 col-md-3 padding_0">
                <div class="logo_box">
                    <a href="/" class="logo">
                        <img src="../../../../../img/logo_long.png" class="img-responsive" alt="logo">
                    </a>

                    <a href="/" class="logo_2">
                        <img src="../../../../../img/awlogo_small.png" class="img-responsive" alt="logo">
                    </a>
                </div>
            </div>

            <div class="col-xs-0 col-sm-7 col-md-6 padding_0">
                <div class="menu_nav" id="top_menu">
                    <a href="" class="fa fa-envelope"> <?=$dictionary['header']['email'] ?></a>
                    <a href="tel:<?=$dictionary['header']['phone'] ?>" class="fa fa-phone"> <?=$dictionary['header']['phone'] ?></a>
                    <hr class="adapt_block hr_menu">
                    <a href="<?=$lang_url ?>/about/" class="adapt_none"><?=$dictionary['header']['top_menu#about_us'] ?></a>
                    <a href="<?=$lang_url ?>/contact/" class="adapt_none"><?=$dictionary['header']['top_menu#contact'] ?></a>
                    <a href="<?=$lang_url ?>/about/" class="adapt_block"><?=$dictionary['footer']['about'] ?></a>
                    <a href="<?=$lang_url ?>/delivery/" class="adapt_block"><?=$dictionary['footer']['delivery'] ?></a>
                    <a href="<?=$lang_url ?>/user-agreement/" class="adapt_block"><?=$dictionary['footer']['user-agreement'] ?></a>
                    <a href="<?=$lang_url ?>/contact/" class="adapt_block"><?=$dictionary['footer']['contact'] ?></a>
                    <a href="<?=$lang_url ?>/returns/" class="adapt_block"><?=$dictionary['footer']['returns'] ?></a>
                    <a href="<?=$lang_url ?>/privacy/" class="adapt_block"><?=$dictionary['footer']['privacy'] ?></a>
                    <a href="<?=$lang_url ?>/terms-and-conditions/" class="adapt_block"><?=$dictionary['footer']['terms-and-conditions'] ?></a>
                </div>
            </div>

            <div class="col-xs-6 col-sm-3 col-md-3 padding_0">
                <div class="button_box ">
                    <div class="dropdown lang">
                        <div class="dropdown-toggle-js curent_lang" data-toggle="dropdown">
	                        <?= $current->name;?>
                            <b class="caret"></b>
                        </div>

                        <ul class="dropdown-menu">
	                        <?php foreach ($langs as $lang)
                            {
                                ?>
                            <li><?php if ($lang->url == 'en')
	                            {
		                            $lang_u='';
	                            }
	                            else
	                            {
		                            $lang_u='/'.$lang->url;
	                            }
	                            ?>
	                            <?= Html::a($lang->name, $lang_u.Yii::$app->getRequest()->getLangUrl()) ?></li>
	                        <?php } ?>
                        </ul>
                    </div>

                    <div class="contact_us">
                        <a href="<?=$lang_url ?>/contact-us/"><button class="btn_contact_us"><?=$dictionary['header']['btn_contact_us'] ?></button></a>
                    </div >

                    <div class="soc_box_nav">
                        <ul>
                            <li><a href="<?=$dictionary['header']['vk'] ?>" class="fa fa-vk fa-2x soc"></a></li>
                            <li><a href="<?=$dictionary['header']['instagram'] ?>" class="fa fa-instagram fa-2x soc"></a></li>
                            <li><a href="<?=$dictionary['header']['facebook'] ?>" class="fa fa-facebook fa-2x soc"></a></li>
                            <li><a href="<?=$dictionary['header']['twitter'] ?>" class="fa fa-twitter fa-2x soc"></a></li>

                        </ul>
                    </div>
                    <div class="nav_butt_box">
                        <button class="nav_button">
                            <span class="fa fa-bars fa-3x"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

	<?= $content ?>

<section>
    <footer>
        <div class="my_container">
            <div class="row my_marg_footer">

                <div class="col-xs-12 col-md-4 float_position">
                    <div class="contact_us_footer">
                        <a href="<?=$lang_url ?>/contact-us/" class="btn_contact_us_footer"><?=$dictionary['footer']['btn_contact_us_footer'] ?></a>
                    </div>

                    <div class="soc_box_footer">
                        <ul class="soc_box">
                            <li><a href="<?=$dictionary['header']['vk'] ?>" class="fa fa-vk fa-2x soc"></a></li>
                            <li><a href="<?=$dictionary['header']['instagram'] ?>" class="fa fa-instagram fa-2x soc"></a></li>
                            <li><a href="<?=$dictionary['header']['facebook'] ?>" class="fa fa-facebook fa-2x soc"></a></li>
                            <li><a href="<?=$dictionary['header']['twitter'] ?>" class="fa fa-twitter fa-2x soc"></a></li>

                        </ul>
                    </div>
                </div>

                <div class="col-xs-12 col-md-8">
                    <div class="menu_footer">
                        <a href="<?=$lang_url ?>/about/"><?=$dictionary['footer']['about'] ?></a>
                        <span class="vertical_line">|</span>
                        <a href="<?=$lang_url ?>/delivery/"><?=$dictionary['footer']['delivery'] ?></a>
                        <span class="vertical_line">|</span>
                        <a href="<?=$lang_url ?>/user-agreement/"><?=$dictionary['footer']['user-agreement'] ?></a>
                        <span class="vertical_line">|</span>
                        <a href="<?=$lang_url ?>/contact/"><?=$dictionary['footer']['contact'] ?></a>
                        <span class="vertical_line">|</span>
                        <a href="<?=$lang_url ?>/returns/"><?=$dictionary['footer']['returns'] ?></a>
                        <span class="vertical_line">|</span>
                        <a href="<?=$lang_url ?>/privacy/"><?=$dictionary['footer']['privacy'] ?></a>
                        <span class="vertical_line">|</span>
                        <a href="<?=$lang_url ?>/terms-and-conditions/"><?=$dictionary['footer']['terms-and-conditions'] ?></a>
                    </div>
                    <div class="more_inf_footer">
	                    <?=$dictionary['footer']['more_inf_footer'] ?>
                    </div>
                </div>
            </div>
    </footer>
</section>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<?php
use yii\helpers\Html;

$dictionary=$this->params['dictionary'];
$lang_url=$this->params['lang_url'];
$langs=$this->params['langs'];
$current=$this->params['current'];
?>
<section class="small_head">
    <div class="container-fluid">
        <div class="row">
            <div class="txt_small_head">
                <a href="<?=$lang_url ?>/watches/">WATCHES</a>
            </div>
        </div>
    </div>
</section>

<section class="buner">
    <div class="container-fluid">
        <div class="row">

            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="text_bune"></div>
                <!-- Indicators -->
                <ol class="carousel-indicators">
                <?php
                $i=0;
                foreach ($content['banner'] as $model) { ?>

                    <?php if ($i==0) { ?>
                    <li data-target="#carousel-example-generic" data-slide-to="<?=$i ?>" class="active"></li>
                    <?php } else { ?>

                    <li data-target="#carousel-example-generic" data-slide-to="<?=$i ?>"></li>

                <?php  } $i+=1; } ?>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">

	                <?php
                    $i=0;
                    foreach ($content['banner'] as $model){ ?>
	                <?php if ($i==0) { ?>
                    <div class="item active" style="background-image: url('../../../../content_images/banner/<?=$model->id ?>.1.b.jpg');">

                    </div>
	                <?php } else { ?>
                    <div class="item" style="background-image: url('../../../../content_images/banner/<?=$model->id ?>.1.b.jpg');">

                    </div>
	                <?php } $i+=1; } ?>

                    </div>

                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </div>
</section>

<section class="watches">
    <div class="fone_black_top"></div>
    <div class="fone_black_bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">

	            <?php foreach ($content['item_index'] as $model){ ?>

                <div class="col-mini-12 col-mob-12 col-xs-12 col-md-6 item_watches">
                    <div class="col-mini-12 col-xs-6 center-block">
                        <a href=""> <img src="../../../../content_images/item_index/<?=$model->id ?>.1.b.jpg" class="img-responsive img_watch_item"></a>
                    </div>
                    <div class="col-mini-12 col-xs-6 center-block">
                        <div class="txt_watches">
                            <div class="name_watches"><?=$model->{'text1_'.$this->params['current']->url} ?></div>
                            <div class="size_watches"><?=$model->{'text2_'.$this->params['current']->url} ?></div>
	                        <?php $br=\app\models\Brand::find()->where(['id'=>$model->brand])->one();?>
                            <div class="all_watches"><a href="<?=$lang_url.'/watches/'.$br->alias.'/' ?>">ALL COLECTION +</a></div>

                        </div>
                    </div>
                </div>

	            <?php } ?>

            </div>
        </div>
    </div>
</section>

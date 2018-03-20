<?php
use yii\helpers\Html;

$dictionary=$this->params['dictionary'];
$lang_url=$this->params['lang_url'];
$langs=$this->params['langs'];
$current=$this->params['current'];
$background_img=$this->params['background_img'];
?>



<section class="small_head">
    <div class="container-fluid">
        <div class="row">
            <div class="txt_small_head">
                <a href="<?=$lang_url ?>/watches/"><?=$dictionary['small_head']['txt_small_head'] ?></a>
            </div>
        </div>
    </div>
</section>



<section class="buner">
    <div class="container-fluid">
        <div class="row">
            <div class="carousel_my">
                <?php foreach ($content['banner'] as $model){ ?>
                <div>
                    <?php if(!empty($model->brand)) {?>
                    <?php $br=\app\models\Brand::find()->where(['id'=>$model->brand])->one();?>
                    <?php if(!empty($model->model)) {$tmp=$model->model.'/';} else {$tmp='';} ?>
                    <a href="<?=$lang_url.'/watches/'.$br->alias.'/'.$tmp ?>">
	                    <?php } else {?>
                        <a>
		                    <?php } ?>
                        <img src="../../../../content_images/banner/<?=$model->id ?>.1.b.jpg" class="">
                    </a>
                </div>
                <?php } ?>
            </div>

        </div>
    </div>
</section>

<section class="watches" style= "background-image: linear-gradient(to bottom, #0d0d0e 10%, transparent 70%), linear-gradient(to top, #0d0d0e 10%, transparent 70%), url('../../../../content_images/back/<?=$background_img->id ?>.1.b.jpg');">
    <div class="fone_black_top"></div>
    <div class="fone_black_bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">

	            <?php foreach ($content['item_index'] as $model){ ?>
		            <?php $br=\app\models\Brand::find()->where(['id'=>$model->brand])->one();?>
                <div class="col-mini-12 col-mob-12 col-xs-12 col-md-6 item_watches">
                    <div class="col-mini-12 col-xs-6 center-block">
                        <a href="<?=$lang_url.'/watches/'.$br->alias.'/' ?>"> <img src="../../../../content_images/item_index/<?=$model->id ?>.1.b.jpg" class="img-responsive img_watch_item"></a>
                    </div>
                    <div class="col-mini-12 col-xs-6 center-block">
                        <div class="txt_watches">
                            <div class="name_watches"><?=$model->{'text1_'.$this->params['current']->url} ?></div>
                            <div class="size_watches"><?=$model->{'text2_'.$this->params['current']->url} ?></div>

                            <div class="all_watches"><a href="<?=$lang_url.'/watches/'.$br->alias.'/' ?>"><?=$dictionary['watches']['all_watches'] ?></a></div>

                        </div>
                    </div>
                </div>

	            <?php } ?>

            </div>
        </div>
    </div>
</section>






<?php
/**
 * Created by PhpStorm.
 * User: koval
 * Date: 13.09.2017
 * Time: 22:36
 */
$dictionary=$this->params['dictionary'];
$lang_url=$this->params['lang_url'];
$langs=$this->params['langs'];
$current=$this->params['current'];
$background_img=$this->params['background_img'];
?>
<section class="small_head">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-6 col-sm-5 pad_right_0_my">
                <div class="categories">
                    <span class="fa fa-chevron-circle-down"></span> <?=$dictionary['small_head']['categories'] ?>
                </div>
	            <?php if ($_GET['brand']!='') $br_url='/'.$_GET['brand'].'/'; else $br_url='/';?>
	            <?php if ($_GET['brand']=='all') $br_url='/';?>
<?php if ($content['get_gender']=='man') { ?>
                <div class="human_type man_woman">
					<a href="<?=$lang_url.'/'.$content['get_section'].$br_url.''?>" class="fa fa-transgender"> <span><?=$dictionary['gender']['all'] ?></span> </a>
				</div>
                <div class="human_type woman">
                    <a href="<?=$lang_url.'/'.$content['get_section'].$br_url.'women/'?>" class="fa fa-venus"><span><?=$dictionary['gender']['woman'] ?></span></a>
                </div>
<?php }elseif ($content['get_gender']=='women') { ?>
                <div class="human_type man_woman">
                    <a href="<?=$lang_url.'/'.$content['get_section'].$br_url.''?>" class="fa fa-transgender"> <span> <?=$dictionary['gender']['all'] ?></span> </a>
                </div>
                <div class="human_type man">
                    <a href="<?=$lang_url.'/'.$content['get_section'].$br_url.'man/'?>" class="fa fa-mars"><span><?=$dictionary['gender']['man'] ?></span></a>
                </div>
<?php } else { ?>
                <div class="human_type man">
                    <a href="<?=$lang_url.'/'.$content['get_section'].$br_url.'man/'?>" class="fa fa-mars"><span><?=$dictionary['gender']['man'] ?></span></a>
                </div>
                <div class="human_type woman">
                    <a href="<?=$lang_url.'/'.$content['get_section'].$br_url.'women/'?>" class="fa fa-venus"><span><?=$dictionary['gender']['woman'] ?></span></a>
                </div>
<?php } ?>
            </div>

            <div class="col-xs-0 col-sm-2">
                <?php if($br_url!='/') { ?>
                <div class="watches_all">
                    <a href="<?=$lang_url.'/'.$content['get_section'].'/' ?>"><?=$dictionary['small_head']['watches_all'] ?></a>
                </div>
                <?php } ?>
            </div>


            <div class="col-xs-6 col-sm-5 pad_left_0_my">
                <div class="float_right">
                    <div class="sort_by">
	                    <?=$dictionary['small_head']['sort_by'] ?><span id="sort_span"></span> <span class="fa fa-chevron-circle-down"> </span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="categories_list" >
        <div>
	        <?php
	        foreach ($content['brand'] as $model){ ?>
                <a href="<?=$lang_url.'/'.$content['get_section'].'/'.$model->alias.'/' ?>"><?=$model->name ?></a>
	        <?php }
	        ?>

        </div>

        <div class="all_categories">
            <a href="<?=$lang_url.'/'.$content['get_section'].'/' ?>"><?=$dictionary['small_head']['watches_all'] ?></a>
        </div>

    </div>

    <div class="sort_by_list">
        <a id="sort_me"> <?=$dictionary['small_head']['sort_me'] ?></a>
        <a id="sort_le"> <?=$dictionary['small_head']['sort_le'] ?></a>
    </div>
</section>


<section class="products" style= "background-image: linear-gradient(to bottom, #0d0d0e 10%, transparent 70%), linear-gradient(to top, #0d0d0e 10%, transparent 70%), url('../../../../content_images/back/<?=$background_img->id ?>.1.b.jpg');">
    <div class="container">
        <div class="row" id="product_items">
	        <?php foreach ($content['items'] as $model){ ?>
            <div class="col-mini-6 col-mob-6 col-xs-6 col-sm-4 col-md-3 product_item">
                <div class="product_item_img">
	                <?php $br=\app\models\Brand::find()->where(['id'=>$model->brand])->one();?>
	                <?php if ($content['get_section']=='watches') $fld='item'; ?>
                    <a href="<?=$lang_url.'/'.$content['get_section'].'/'.$br->alias.'/'.$model->product_code.'/' ?>"><img src="../../../../content_images/<?=$fld ?>/<?=$model->id ?>.1.b.jpg" class="img-responsive"></a>
                </div>
                <a href="<?=$lang_url.'/'.$content['get_section'].'/'.$br->alias.'/'.$model->product_code.'/' ?>" class="a_item_hover">
                <div class="txt_product_item">
                    <div class="brand_product_item"><?=$br->name ?></div>
                    <div class="name_product_item"><?=$br->name.' '.$model->mark ?></div>
                    <div class="price_product_item" id="price" value="<?=$model->price ?>">
	                    <?php if(!empty($model->price_old)) { ?>
                            <del class="price_old_1">$<?=$model->price_old ?></del>
	                    <?php } ?>
                       $<?=$model->price ?>
                    </div>
                </div>
                </a>
            </div>
	        <?php } ?>
        </div>
    </div>
</section>
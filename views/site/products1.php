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
?>

<section>
	<nav>
		<div class="col-xs-12">
			<select class="pop_up_1" id="sort_price_pop_up">
                <option>Most expensive</option>
                <option>Least expensive</option>
			</select>
            <?php if ($_GET['brand']!='') $br_url='/'.$_GET['brand'].'/'; else $br_url='/';?>
			<?php if ($_GET['brand']=='all') $br_url='/';?>
            <a href="<?=$lang_url.'/'.$content['get_section'].$br_url.''?>"><button>All</button></a>
            <a href="<?=$lang_url.'/'.$content['get_section'].$br_url.'man/'?>"><button>for Man</button></a>
            <a href="<?=$lang_url.'/'.$content['get_section'].$br_url.'women/'?>"><button>for Women</button></a>
		</div>
	</nav>
</section>

<section class="watches">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-2">
				<ul class="list_menu">
<!--					--><?php //if ($_GET['gender']!='') $gn_url=$content['get_gender'].'/'; else $gn_url='/';?>
                    <a href="<?=$lang_url.'/'.$content['get_section'].'/' ?>"><li class="list_item">All</li></a>
                    <?php
                    foreach ($content['brand'] as $model){ ?>
                    <a href="<?=$lang_url.'/'.$content['get_section'].'/'.$model->alias.'/' ?>"><li class="list_item"><?=$model->name ?></li></a>
					<?php }
                    ?>
				</ul>
			</div>

			<div class="col-xs-12 col-md-10" id="product_items">
                <?php foreach ($content['items'] as $model){ ?>
				<div class="col-mini-12 col-mob-12 col-xs-6 col-md-4">
					<div class="item_watches">
                        <?php if ($content['get_section']=='watches') $fld='item'; ?>
						<img src="../../../../content_images/<?=$fld ?>/<?=$model->id ?>.1.b.jpg" class="img-responsive">
                        <?php $br=\app\models\Brand::find()->where(['id'=>$model->brand])->one();?>
						<div class="txt_watches"><a href="<?=$lang_url.'/'.$content['get_section'].'/'.$br->alias.'/'.$model->product_code.'/' ?>"><?=$br->name ?></a></div>
                        <div class="txt_watches" id="price" value="<?=$model->price ?>">$<?=$model->price ?></div>
					</div>
				</div>

                <?php } ?>

			</div>


		</div>
	</div>
</section>

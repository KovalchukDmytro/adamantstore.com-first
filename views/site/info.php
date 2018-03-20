<?php
/**
 * Created by PhpStorm.
 * User: koval
 * Date: 07.10.2017
 * Time: 22:45
 */

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


			<div class="col-mini-12 col-mob-12 col-xs-12 col-sm-12">
				<div class="products_all_1">
					<a href="<?=$lang_url ?>/watches/"><?=$dictionary['small_head']['txt_small_head'] ?></a>
				</div>

			</div>




		</div>
	</div>
</section>


<section class="inform_page" style= "background-image: linear-gradient(to bottom, #0d0d0e 10%, transparent 70%), linear-gradient(to top, #0d0d0e 10%, transparent 70%), url('../../../../content_images/back/<?=$background_img->id ?>.1.b.jpg');">
	<div class="container">

		<div class="row">

			<div class="col-md-4 col-lg-3">
				<div class="list_page">

					<div class="list_page_item<?php if($content['info#action']=='about') echo ' active';?>"><a href="<?=$lang_url ?>/about/"><?=$dictionary['footer']['about'] ?></a></div>
					<div class="list_page_item<?php if($content['info#action']=='delivery') echo ' active';?>"><a href="<?=$lang_url ?>/delivery/"><?=$dictionary['footer']['delivery'] ?></a></div>
					<div class="list_page_item<?php if($content['info#action']=='user-agreement') echo ' active';?>"><a href="<?=$lang_url ?>/user-agreement/"><?=$dictionary['footer']['user-agreement'] ?></a></div>
					<div class="list_page_item<?php if($content['info#action']=='contact') echo ' active';?>"><a href="<?=$lang_url ?>/contact/"><?=$dictionary['footer']['contact'] ?></a></div>
					<div class="list_page_item<?php if($content['info#action']=='returns') echo ' active';?>"><a href="<?=$lang_url ?>/returns/"><?=$dictionary['footer']['returns'] ?></a></div>
					<div class="list_page_item<?php if($content['info#action']=='privacy') echo ' active';?>"><a href="<?=$lang_url ?>/privacy/"><?=$dictionary['footer']['privacy'] ?></a></div>
					<div class="list_page_item<?php if($content['info#action']=='terms-and-conditions') echo ' active';?>"><a href="<?=$lang_url ?>/terms-and-conditions/"><?=$dictionary['footer']['terms-and-conditions'] ?></a></div>
				</div>
			</div>
			<div class="col-md-8 col-lg-9 padding_0">
				<div class="page_item">
					<div class="head_page">
						<a><?=$dictionary['footer'][$content['info#action']] ?></a>
					</div>
					<div class="txt_page">
						<?=$dictionary['inform_page']['txt_page'] ?>
					</div>
				</div>

			</div>

		</div>
	</div>
</section>
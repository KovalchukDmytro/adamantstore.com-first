<?php
$dictionary=$this->params['dictionary'];
$lang_url=$this->params['lang_url'];
$langs=$this->params['langs'];
$current=$this->params['current'];
$background_img=$this->params['background_img'];
?>

<section class="small_head">
	<div class="container-fluid">
		<div class="row">
			<div class="col-mini-4 col-mob-6 col-xs-4 col-sm-4">
				<div class="categories">
					<span class="fa fa-chevron-circle-down"></span> <?=$dictionary['small_head']['categories'] ?>
				</div>
			</div>
			<div class="col-mini-8 col-mob-6 col-xs-4 col-sm-4">
				<div class="products_all_1">
					<?php $br=\app\models\Brand::find()->where(['id'=>$content['model']->brand])->one();?>
					<a href="<?=$lang_url ?>/watches/"><?=$dictionary['small_head']['txt_small_head'] ?></a><span class="karetka">|</span>
					<a href="<?=$lang_url.'/'.$content['get_section'].'/'.$content['brand'].'/' ?>"> <?=$br->name ?> </a>
				</div>
			</div>
			<div class="col-xs-4 col-sm-4">
			</div>
		</div>
	</div>
	<div class="categories_list">
		<div>
			<?php
			foreach ($content['brand_all'] as $model){ ?>
                <a href="<?=$lang_url.'/'.$content['get_section'].'/'.$model->alias.'/' ?>"><?=$model->name ?></a>
			<?php }
			?>
		</div>
	</div>
</section>
<?php if ($content['get_section']=='watches') $fld='item'; ?>
<?php $model=$content['model'] ?>
<section class="products" style= "background-attachment: inherit; background-image: linear-gradient(to bottom, #0d0d0e 10%, transparent 70%), linear-gradient(to top, #0d0d0e 10%, transparent 70%), url('../../../../content_images/back/<?=$background_img->id ?>.1.b.jpg');">
	<div class="container">
		<?php $br=\app\models\Brand::find()->where(['id'=>$model->brand])->one();?>

		<div class="row product_inf">
			<div class="col-md-6">
				<div class="flexslider">
					<ul class="slides">
                        <?php for($i=1; $i<=5; $i+=1) {?>
                            <?php $img_url="https://".$_SERVER['HTTP_HOST']."/content_images/".$fld."/".$model->id.".".$i .".b.jpg"; ?>
                            <?php
	                        $ch = curl_init($img_url);
	                        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	                        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	                        $response = curl_exec($ch);
	                        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	                        curl_close($ch);
                            ?>
                        <?php if ($httpCode=='200') { ?>
                            <li data-thumb="<?=$img_url ?>">
                                <img src="<?=$img_url ?>" />
                            </li>
                        <?php  } } ?>
					</ul>
				</div>
			</div>

			<div class="col-md-6 padding_20">
				<div class="full_name">
					<?=$br->name.' '.$model->mark ?>
				</div>
				<div class="short_txt">
					<?=$model->{'info_s_'.$current->url} ?>
				</div>
				<div class="price_watch">
                    <?php if(!empty($model->price_old)) { ?>
                   <del class="price_old">$<?=$model->price_old ?></del>
                    <?php } ?>
                    $<?=$model->price ?>
				</div>
				<div class="long_txt ">
					<?=$model->{'info_'.$current->url} ?>
				</div>
				<a class="text_decor_none" href="<?=$model->url ?>"> <button class="contact_us_item_btn"><?=$dictionary['products']['contact_us_item_btn'] ?></button></a>
				<ul class="sharer">
					<li class="sharer_label"><?=$dictionary['products']['sharer_label'] ?></li>

					<?php
					$url_share="https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
					$title_share=$content['seo']['title'];
					$img_share="https://".$_SERVER['HTTP_HOST']."/content_images/".$fld."/".$model->id.".1.b.jpg";
					$desc_share=$content['seo']['description'];
					?>
                    <li><a class="fa fa-facebook" style="position: relative"><div style="position: absolute!important; opacity: 0!important; left: 0!important; width: 40px!important; height: 40px!important; top: 0!important;">
                                <div style="width: inherit!important;" name="fb_share" type="button" class="fa fa-facebook" share_url="<?=$url_share ?>"></div></div> </a></li>

                	<li><a onclick="Share.twitter('<?= $url_share?>','<?= $title_share?>')" class="fa fa-twitter"></a></li>
					<li><a onclick="Share.vkontakte('<?= $url_share?>','<?= $title_share?>','<?= $img_share?>','<?= $desc_share?>')" class="fa fa-vk"></a></li>
				</ul>
			</div>
		</div>
		<div class="row product_inf_1">
			<div class="col-md-6">
				<div class="col-md-12">
					<div class="full_name_1">
						<?=$br->name.' '.$model->mark ?>
					</div>
				</div>
				<div class="col-md-12">
					<table class="table my_table">

						<tbody>
                        <tr>
                            <td><?=$dictionary['products']['product_code'] ?></td>
                            <td><?=$model->product_code ?></td>
                        </tr>
						<tr>
							<td><?=$dictionary['products']['brand'] ?></td>
							<td><?=$br->name ?></td>
						</tr>
						<tr>
                            <td><?=$dictionary['products']['mark'] ?></td>
							<td><?=$model->mark ?></td>
						</tr>
						<tr>
                            <td><?=$dictionary['products']['country'] ?></td>
							<td><?=$model->{'country_'.$current->url} ?></td>
						</tr>
						<tr>
                            <td><?=$dictionary['products']['gender'] ?></td>
                            <td><?=$model->{'gender_'.$current->url} ?></td>
						</tr>
						<tr>
                            <td><?=$dictionary['products']['mechanism'] ?></td>
                            <td><?=$model->{'mechanism_'.$current->url} ?></td>
						</tr>
						<tr>
                            <td><?=$dictionary['products']['watertightness'] ?></td>
                            <td><?=$model->{'watertightness_'.$current->url} ?></td>
						</tr>
						<tr>
                            <td><?=$dictionary['products']['dial_color'] ?></td>
                            <td><?=$model->{'dial_color_'.$current->url} ?></td>
						</tr>
						<tr>
                            <td><?=$dictionary['products']['function'] ?></td>
                            <td><?=$model->{'function_'.$current->url} ?></td>
						</tr>
						<tr>
                            <td><?=$dictionary['products']['fastening_type'] ?></td>
                            <td><?=$model->{'fastening_type_'.$current->url} ?></td>
						</tr>
						<tr>
                            <td><?=$dictionary['products']['bracelet_material'] ?></td>
                            <td><?=$model->{'bracelet_material_'.$current->url} ?></td>
						</tr>
						<tr>
                            <td><?=$dictionary['products']['body_material'] ?></td>
                            <td><?=$model->{'body_material_'.$current->url} ?></td>
						</tr>
						<tr>
                            <td><?=$dictionary['products']['glass'] ?></td>
                            <td><?=$model->{'glass_'.$current->url} ?></td>
						</tr>
                        <tr>
                            <td><?=$dictionary['products']['dimensions'] ?></td>
                            <td><?=$model->{'dimensions_'.$current->url} ?></td>
                        </tr>


						</tbody>
					</table>
				</div>

			</div>
			<div class="col-md-6">
				<div class="col-md-12">
					<div class="full_name_1"><?=$dictionary['products']['delivery_and_returns_title'] ?></div>
				</div>
				<div class="col-md-12">
					<div class="long_txt l_txt_center">
						<?=$dictionary['products']['delivery_and_returns_text'] ?>
					</div>
				</div>
				<div class="col-md-12">
					<div class="del_and_ret_btn_box">
						<a class="text_decor_none" href="<?=$lang_url ?>/returns/"> <button class="del_and_ret_btn"><?=$dictionary['products']['button_1'] ?></button></a>
						<a class="text_decor_none" href="<?=$lang_url ?>/delivery/"> <button class="del_and_ret_btn"><?=$dictionary['products']['button_2'] ?></button></a>
					</div>

				</div>

			</div>
		</div>
	</div>
</section>

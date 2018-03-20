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


<section class="contact_us_page" style= "background-image: linear-gradient(to bottom, #0d0d0e 10%, transparent 70%), linear-gradient(to top, #0d0d0e 10%, transparent 70%), url('../../../../content_images/back/<?=$background_img->id ?>.1.b.jpg');">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="main_head_contact">
					<?=$dictionary['contact_us_page']['title'] ?>
				</div>
				<hr class="head_hr_contact">
			</div>
		</div>
		<div class="row">

			<div class="col-md-5 col-lg-5">
				<div class="more_contact_inf">
					<div class="head_contact_more"><?=$dictionary['contact_us_page']['head_contact_more'] ?></div>
					<hr class="h_row_contact">
					<div class="phone_contact_more"><a href="tel:<?=$dictionary['contact_us_page']['phone_contact_more'] ?>"><?=$dictionary['contact_us_page']['phone_contact_more'] ?></a> <span class="soc_padding"><span class="fa fa-telegram"> </span><span class="fa fa-whatsapp soc_padding_1"> </span></span></div>
					<div class="email_contact_more"><?=$dictionary['contact_us_page']['email_contact_more'] ?><span class="fa fa-envelope soc_padding"></span></div>
					<div class="work_time"><span><?=$dictionary['contact_us_page']['work_time1'] ?></span> <span class="pull-right"><?=$dictionary['contact_us_page']['work_time2'] ?></span></div>
					<div class="work_time"><span><?=$dictionary['contact_us_page']['work_time3'] ?></span> <span class="pull-right"><?=$dictionary['contact_us_page']['work_time4'] ?></span></div>
				</div>

			</div>

			<div class="col-md-7 col-lg-7 padding_0">
				<form class ="contact_form" id="contact_form_id">

					<div class="col-xs-12">
						<label class="label"><?=$dictionary['contact_form']['f_name'] ?></label>
						<input type="" name="" required="">
					</div>
					<div class="col-xs-12">
						<label class="label"><?=$dictionary['contact_form']['l_name'] ?></label>
						<input type="" name="" required="">
					</div>
					<div class="col-xs-12">
						<label class="label"><?=$dictionary['contact_form']['country'] ?></label>
						<select class="turnintodropdown_demo2">
							<option></option>
                            <?php $c_list=explode(';',$dictionary['contact_form']['country_list']); ?>
                            <?php foreach ($c_list as $c_list_model) { ?>
                                <option><?=$c_list_model ?></option>
                            <?php } ?>
						</select>
					</div>

					<div class="col-xs-12">
						<label class="label"><?=$dictionary['contact_form']['email'] ?></label>
						<input type="" name="" required="">
					</div>


					<div class="col-xs-12">
						<label class="label"><?=$dictionary['contact_form']['message'] ?></label>
						<textarea class="message_box"  form ="contact_form_id" placeholder="<?=$dictionary['contact_form']['message_text'] ?>"></textarea>
					</div>

					<div class="col-xs-12">
						<input type="checkbox" id="checkbox_id" name="" />
						<label for="checkbox_id">
							<?=$dictionary['contact_form']['checkbox'] ?>
						</label>
					</div>

					<div class="col-xs-12">
						<div class="subm_box">
							<div class="col-mini-12 col-xs-6 padding_0">
								<div class="txt_bottom_form"><?=$dictionary['contact_form']['txt_bottom_form'] ?></div>
							</div>
							<div class="col-mini-12 col-xs-6 padding_0">
								<input type="submit" name="" class="btn_submit" value="<?=$dictionary['contact_form']['submit'] ?>">
							</div>

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

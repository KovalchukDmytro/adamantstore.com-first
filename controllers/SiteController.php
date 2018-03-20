<?php

namespace app\controllers;

use app\models\Back;
use app\models\Banner;
use app\models\Brand;
use app\models\Callback;
use app\models\Dictionary;
use app\models\Item;
use app\models\Item_index;
use app\models\Lang;
use app\models\Seo;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
	public function actionIndex()
	{
		$content['item_index']=Item_index::find()->where(['publish' => 1])->all();
		$content['banner']=Banner::find()->where(['publish' => 1])->all();

		$seo=$this->getSEO('index');
		$this->setMeta($seo['title'],'',$seo['description']);

		return $this->render('index',[
			'dictionary' => $this->getDictionary('index'),
			'content' => $content,
		]);
	}

	public function actionProducts()
	{
		$this->setAlias();

		if ($_GET['gender']!='man' && $_GET['gender']!='women' && !empty($_GET['gender']))
		{
			if ($_GET['section']=='watches')
			{
				return $this->getWatchItem();
			}

		}
		if ($_GET['brand']=='man'||$_GET['brand']=='women')
		{
			$_GET['gender']=$_GET['brand'];
			$_GET['brand']='all';
		}
		if ($_GET['section']=='watches')
		{
			return $this->getWatches();
		}
	}

	public function actionInfo()
	{
		$content['info#action']=$_GET['action'];

		$seo=$this->getSEO('info#'.$_GET['action']);
		$this->setMeta($seo['title'],'',$seo['description']);

		return $this->render('info',[
			'dictionary' => $this->getDictionary('info#'.$_GET['action']),
			'content' => $content,
		]);
	}

	public function actionForm()
	{
		//$content['item_index']=Item_index::find()->where(['publish' => 1])->all();
		//$content['banner']=Banner::find()->where(['publish' => 1])->all();

		$seo=$this->getSEO('form');
		$this->setMeta($seo['title'],'',$seo['description']);

		return $this->render('contact',[
			'dictionary' => $this->getDictionary('form'),
			//'content' => $content,
		]);
	}

	public function actionCallback()
	{
		$lang=Lang::getCurrent()->url;

		$method = $_SERVER['REQUEST_METHOD'];
		$model = new Callback();

		$from="form@adamantstore.com";
		$to="sales@adamantstore.com";
		$subject="Заявка с сайта adamantstore.com";

		if ( $method == 'GET' ) {
			$first_name = $_GET["first_name"];
			$last_name = $_GET["last_name"];
			$country=$_GET["country"];
			$email=$_GET["email"];
			$body=$_GET["message"];
		}
		if ( $method == 'POST' ) {
			$first_name = $_POST["first_name"];
			$last_name = $_POST["last_name"];
			$country=$_POST["country"];
			$email=$_POST["email"];
			$body=$_POST["message"];
		}
		$model->first_name=$first_name;
		$model->last_name=$last_name;
		$model->country=$country;
		$model->email=$email;
		$model->body=$body;
		$model->lang=$lang;
		$model->date=date('Y-m-d');
		$model->save();

		$message = "Имя: ".$first_name
		           ."<br/>Фамилия: ".$last_name
		           ."<br/>Страна: ".$country
		           ."<br/>E-mail: ".$email
		           ."<br/>Текст вопроса: ".$body
		           ."<br/>Дата заявки: ".date('Y-m-d')
		           ."<br/>Клиент просматривал сайт на языке: ".$lang;


		Yii::$app->mailer->compose()
		                 ->setFrom($from)
		                 ->setTo($to)
		                 ->setSubject($subject)
		                 ->setTextBody('Текст сообщения')
		                 ->setHtmlBody($message)
		                 ->send();
	}

	// + раздел Watches
	public function getWatches()
	{
		$content['get_section']=$_GET['section'];
		$content['get_brand']=$_GET['brand'];
		$content['get_gender']=$_GET['gender'];


		if ($_GET['brand']==''||$_GET['brand']=='all')
		{
			if ($content['get_gender']!='')
			{
				$content['items']=Item::find()->where(['gender_en'=>$content['get_gender']])->orderBy(['price'=>SORT_DESC])->all();
			}
			else
			{
				$content['items']=Item::find()->orderBy(['price'=>SORT_DESC])->all();
			}

			$seo=$this->getSEO('items#all');
			$this->setMeta($seo['title'],'',$seo['description']);

		}
		else
		{
			if ($content['get_gender']!='')
			{
				$content['items']=Item::find()
				                      ->where(['brand'=>Brand::find()
				                                             ->where(['alias'=>$_GET['brand']])
				                                             ->one()->id,
				                               'gender_en' => $content['get_gender']
				                      ])
				                      ->orderBy(['price'=>SORT_DESC])->all();
				$seo=$this->getSEO('items#'.$_GET['brand']);
				$this->setMeta($seo['title'],'',$seo['description']);
			}
			else
			{
				$content['items']=Item::find()
				                      ->where(['brand'=>Brand::find()
				                                             ->where(['alias'=>$_GET['brand']])
				                                             ->one()->id])
				                      ->orderBy(['price'=>SORT_DESC])->all();
				$seo=$this->getSEO('items#'.$_GET['brand']);
				$this->setMeta($seo['title'],'',$seo['description']);
			}

		}

		$content['brand']=Brand::find()->orderBy(['name'=>SORT_ASC])->all();

		return $this->render('products',[
			'dictionary' => $this->getDictionary('watch#items'),
			'content' => $content,
			'current' => Lang::getCurrent(),
		]);
	}

	public function getWatchItem()
	{
		$content['get_section']=$_GET['section'];
		$content['brand']=$_GET['brand'];
		$content['product_code']=$_GET['gender'];

		$content['brand_all']=Brand::find()->orderBy(['name'=>SORT_ASC])->all();
		$content['model']=Item::find()->where(['product_code'=>$content['product_code']])->one();


		$seo=$this->getSEO('item#'.$content['product_code']);
		$this->setMeta($seo['title'],'',$seo['description']);
		$content['seo']=$seo;

		return $this->render('item',[
			'dictionary' => $this->getDictionary('watch#item'),
			'content' => $content,
		]);

	}
	// - раздел Watches



	//
	protected function setMeta($title = null, $keywords = null, $description = null){
		$this->view->title = $title;
		$this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
		$this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
	}
	public function getSEO($alias)
	{
		$model=Seo::find()
		          ->where(['alias' => $alias])
		          ->one();
		$seo['title']=$model->{'title_'.Lang::getCurrent()->url};
		$seo['description']=$model->{'description_'.Lang::getCurrent()->url};
		$seo['h1']=$model->{'h1_'.Lang::getCurrent()->url};
		return $seo;
	}
	public function getDictionary($page)
	{
		$models_all=Dictionary::find()
		                      ->where(['page' => 'index'])
		                      ->all();
		$models_current=Dictionary::find()
		                          ->where(['page' => $page])
		                          ->all();
		$dictionary=[];
		foreach ($models_all as $model)
		{
			$dictionary[$model->section][$model->alias]=$model->{'text_'.Lang::getCurrent()->url};
		}
		foreach ($models_current as $model)
		{
			$dictionary[$model->section][$model->alias]=$model->{'text_'.Lang::getCurrent()->url};
		}

		$this->view->params['logo']=Back::find()->where(['alias'=>'logo'])->one();
		$this->view->params['logo_s']=Back::find()->where(['alias'=>'logo_s'])->one();

		$this->view->params['background_img']=Back::find()->where(['alias'=>$page])->one();
		$this->view->params['dictionary']=$dictionary;
		$this->view->params['page']=$page;
		$this->view->params['lang_url']=$this->getLangUrl();
		$this->view->params['langs']=Lang::find()->where('id != :current_id', [':current_id' => Lang::getCurrent()->id])->all();
		$this->view->params['current']=Lang::getCurrent();

		return $dictionary;
	}

	public function getLangUrl()
	{
		if(Lang::getCurrent()->url!=='en')
		{
			$lang_url=Lang::getCurrent()->url;
			return '/'.$lang_url;
		}
		else
		{
			return "";
		}
	}
	public function setAlias()
	{
		//проверяем наличие alias в посте
		if ($_GET['section']=='watches')
		{
			$models=Brand::find()->all();
			foreach ($models as $model){
				if($model->alias==NULL)
				{
					$model->alias=$this->getTranslit($model->name);
					$model->save();
				}
			}
		}
	}

	public function getTranslit($str)
	{
		// ГОСТ 7.79B
		$transliteration = array(
			'А' => 'A', 'а' => 'a',
			'Б' => 'B', 'б' => 'b',
			'В' => 'V', 'в' => 'v',
			'Г' => 'G', 'г' => 'g',
			'Д' => 'D', 'д' => 'd',
			'Е' => 'E', 'е' => 'e',
			'Ё' => 'Yo', 'ё' => 'yo',
			'Ж' => 'Zh', 'ж' => 'zh',
			'З' => 'Z', 'з' => 'z',
			'И' => 'I', 'и' => 'i',
			'Й' => 'J', 'й' => 'j',
			'К' => 'K', 'к' => 'k',
			'Л' => 'L', 'л' => 'l',
			'М' => 'M', 'м' => 'm',
			'Н' => "N", 'н' => 'n',
			'О' => 'O', 'о' => 'o',
			'П' => 'P', 'п' => 'p',
			'Р' => 'R', 'р' => 'r',
			'С' => 'S', 'с' => 's',
			'Т' => 'T', 'т' => 't',
			'У' => 'U', 'у' => 'u',
			'Ф' => 'F', 'ф' => 'f',
			'Х' => 'H', 'х' => 'h',
			'Ц' => 'Cz', 'ц' => 'cz',
			'Ч' => 'Ch', 'ч' => 'ch',
			'Ш' => 'Sh', 'ш' => 'sh',
			'Щ' => 'Shh', 'щ' => 'shh',
			'Ъ' => 'ʺ', 'ъ' => 'ʺ',
			'Ы' => 'Y`', 'ы' => 'y`',
			'Ь' => '', 'ь' => '',
			'Э' => 'E`', 'э' => 'e`',
			'Ю' => 'Yu', 'ю' => 'yu',
			'Я' => 'Ya', 'я' => 'ya',
			'№' => '#', 'Ӏ' => '‡',
			'’' => '`', 'ˮ' => '¨',
			' ' => '-',
		);

		$str = strtr($str, $transliteration);
		$str = mb_strtolower($str, 'UTF-8');
		$str = preg_replace('/[^0-9a-z\-]/', '', $str);
		$str = preg_replace('|([-]+)|s', '-', $str);
		$str = trim($str, '-');

		return $str;
	}

}

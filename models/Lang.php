<?php
/**
 * Created by PhpStorm.
 * User: koval
 * Date: 09.08.2017
 * Time: 17:58
 */

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Lang extends ActiveRecord
{
	public function behaviors()
	{
		return [
			'timestamp' => [
				'class' => 'yii\behaviors\TimestampBehavior',
				'attributes' => [
					\yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['date_create', 'date_update'],
					\yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['date_update'],
				],
			],
		];
	}

	//Переменная, для хранения текущего объекта языка
	static $current = null;

//Получение текущего объекта языка
	static function getCurrent()
	{
		if( self::$current === null ){
			self::$current = self::getDefaultLang();
		}
		return self::$current;
	}

//Установка текущего объекта языка и локаль пользователя
	static function setCurrent($url = null)
	{
		$language = self::getLangByUrl($url);
		self::$current = ($language === null) ? self::getDefaultLang() : $language;
		Yii::$app->language = self::$current->local;
	}

//Получения объекта языка по умолчанию
	static function getDefaultLang()
	{
		return Lang::find()->where('`default` = :default', [':default' => 1])->one();
	}

//Получения объекта языка по буквенному идентификатору
	static function getLangByUrl($url = null)
	{
		if ($url === null) {
			return null;
		} else {
			$language = Lang::find()->where('url = :url', [':url' => $url])->one();
			if ( $language === null ) {
				return null;
			}else{
				return $language;
			}
		}
	}
}


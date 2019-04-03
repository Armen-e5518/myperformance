<?php

namespace common\models;

use backend\behaviors\AdminAccess;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "behavioral".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $color
 * @property string $icon
 * @property string $date
 * @property string $icon_f
 * @property string $year
 */
class Behavioral extends \yii\db\ActiveRecord
{

   /**
    * @var UploadedFile
    */
   public $icon_f;

   /**
    * {@inheritdoc}
    */
   public static function tableName()
   {
      return 'behavioral';
   }

   /**
    * {@inheritdoc}
    */
   public function rules()
   {
      return [
         [['year'], 'integer'],
         [['description'], 'string'],
         [['icon_f'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, png'],
         [['date'], 'safe'],
         [['title', 'color', 'icon', 'sub_title'], 'string', 'max' => 255],
      ];
   }

   /**
    * {@inheritdoc}
    */
   public function attributeLabels()
   {
      return [
         'id' => 'ID',
         'title' => 'Title',
//            'sub_title' => 'Sub Title',
         'description' => 'Description',
         'color' => 'Color',
         'icon' => 'Icon',
         'date' => 'Date',
         'attachment' => 'Icon',
         'year' => 'Year',
         'sub_title' => 'Subtitle',
      ];
   }

   public function uploadIcon()
   {
      if (!empty($this->icon_f)) {
         $name = substr(md5(microtime(true)), 0, 5) . '_' . date('d-m-Y') . '.' . $this->icon_f->extension;
         $this->icon_f->saveAs('../../frontend/web/logos/' . $name);
         return $name;
      } else {
         return false;
      }
   }

   public static function GetAllIndex()
   {
      return self::find()->select(['title', 'id'])->indexBy('id')->column();
   }

   public static function GetAll($year)
   {
      return self::find()->asArray()->where(['year' => Years::GetYearIdByYear($year)])->all();
   }

   public static function GetAllCurrentUserByYear($year)
   {
      return (new \yii\db\Query())
         ->select(
            [
               'b.*',
               'ub.user_comment',
               'ub.manager_comment',
               'ub.id as user_beh_id',
            ])
         ->from(self::tableName() . ' as b')
         ->leftJoin(UserBehavioral::tableName() . ' ub', 'ub.behavioral_id = b.id AND ub.user_id =' . Yii::$app->user->getId())
         ->where(['b.year' => Years::GetYearIdByYear($year)])
         ->all();

   }

   public static function GetAllbyUserByYear($year, $id)
   {
      return (new \yii\db\Query())
         ->select(
            [
               'b.*',
               'ub.user_comment',
               'ub.manager_comment',
               'ub.id as user_beh_id',
            ])
         ->from(self::tableName() . ' as b')
         ->leftJoin(UserBehavioral::tableName() . ' ub', 'ub.behavioral_id = b.id AND ub.user_id =' . $id)
         ->where(['b.year' => Years::GetYearIdByYear($year)])
         ->all();

   }


   public static function GetOneById($id)
   {
      return self::findOne($id);
   }
}

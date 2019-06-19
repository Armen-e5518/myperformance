<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "feedbacks".
 *
 * @property int $id
 * @property int $user_id
 * @property int $status
 * @property int $type
 * @property string $user_name
 * @property string $user_position
 * @property string $user_email
 * @property int $feedback_type
 * @property string $project_name
 * @property string $job_title
 * @property string $critical_thinking
 * @property string $builds
 * @property string $results
 * @property int $collaboration
 * @property int $leadership
 * @property int $excellence
 * @property int $agility
 * @property int $respect
 * @property int $responsibility
 * @property string $date
 * @property string $owner_id
 * @property string $year
 * @property string $collaboration_text
 * @property string $leadership_text
 * @property string $excellence_text
 * @property string $agility_text
 * @property string $respect_text
 * @property string $responsibility_text
 * @property string $is_request
 */
class Feedbacks extends \yii\db\ActiveRecord
{
    const STATUS_PENDING = 0;
    const STATUS_RECEIVED = 1;

    const IS_REQUEST = 1;
    const IS_NOT_REQUEST = 0;

    const TYPE_INTERNAL = 0;
    const TYPE_EXTERNAL = 1;

    const FEEDBACK_TYPE = [
        'Daily interaction',
        'Project work',
        'Other',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedbacks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'status', 'type',
                'feedback_type',
                'collaboration',
                'leadership',
                'excellence',
                'agility',
                'respect',
                'responsibility',
                'owner_id',
                'year',
                'is_request',
            ], 'integer'],
            [['critical_thinking', 'builds', 'results',
                'collaboration_text',
                'leadership_text',
                'excellence_text',
                'agility_text',
                'respect_text',
                'responsibility_text',], 'string'],
            [['date'], 'safe'],
            [['user_name', 'user_position', 'user_email', 'project_name', 'job_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'status' => 'Status',
            'type' => 'Type',
            'user_name' => 'User Name',
            'user_position' => 'User Position',
            'user_email' => 'User Email',
            'feedback_type' => 'Feedback Type',
            'project_name' => 'Project Name',
            'job_title' => 'Job Title',
            'critical_thinking' => 'Critical Thinking',
            'builds' => 'Builds',
            'results' => 'Results',
            'collaboration' => 'Collaboration',
            'leadership' => 'Leadership',
            'excellence' => 'Excellence',
            'agility' => 'Agility',
            'respect' => 'Respect',
            'responsibility' => 'Responsibility',
            'date' => 'Date',
            'owner_id' => 'owner_id',
            'year' => 'year',
            'collaboration_text' => 'collaboration_text',
            'leadership_text' => 'leadership_text',
            'excellence_text' => 'excellence_text',
            'agility_text' => 'agility_text',
            'respect_text' => 'respect_text',
            'responsibility_text' => 'responsibility_text',
            'is_request' => 'is_request',
        ];
    }

    public static function GetPdfImage($model, $item, $value)
    {
        return $model[$item] == $value ? '<img src="/images/radio_selected.png" alt="">' : '<img src="/images/radio_empty.png" alt="">';
    }

    function saveNewInternal($year)
    {
        $this->type = self::TYPE_INTERNAL;
        $this->status = self::STATUS_PENDING;
        $this->is_request = self::IS_REQUEST;
        $this->owner_id = Yii::$app->user->getId();
        $this->year = Years::GetYearIdByYear($year);
        return $this->save($year);
    }

    function saveNewExternal($year)
    {
        $this->type = self::TYPE_EXTERNAL;
        $this->status = self::STATUS_PENDING;
        $this->is_request = self::IS_REQUEST;
        $this->owner_id = Yii::$app->user->getId();
        $this->year = Years::GetYearIdByYear($year);
        return $this->save();
    }

    function saveProvide($year)
    {
        $this->type = self::TYPE_INTERNAL;
        $this->status = self::STATUS_RECEIVED;
        $this->is_request = self::IS_NOT_REQUEST;
        $this->owner_id = Yii::$app->user->getId();
        $this->year = Years::GetYearIdByYear($year);
        return $this->save();
    }

    function GaveFeedback()
    {
        $this->status = self::STATUS_RECEIVED;
        return $this->save();
    }

    public static function GetProvided($owner_id, $year)
    {
        return (new \yii\db\Query())
            ->select(
                [
                    'f.*',
                    'u.first_name',
                    'u1.first_name as u_first_name',
                    'u.last_name',
                    'u1.last_name as u_last_name',
                    'u.avatar',
                    'u1.avatar as u_avatar',
                    'd.title as departments',
                    'd1.title as u_departments',
                ])
            ->from(self::tableName() . ' f')
            ->leftJoin(\backend\models\User::tableName() . ' u', 'u.id = f.owner_id')
            ->leftJoin(\backend\models\User::tableName() . ' u1', 'u1.id = f.user_id')
            ->leftJoin(Departments::tableName() . ' d', 'd.id = u.department_id')
            ->leftJoin(Departments::tableName() . ' d1', 'd1.id = u1.department_id')
            ->where([
                'f.owner_id' => $owner_id,
                'f.is_request' => self::IS_NOT_REQUEST,
                'f.year' => Years::GetYearIdByYear($year)
            ])
            ->orWhere([
                'f.user_id' => $owner_id,
                'f.is_request' => self::IS_REQUEST,
                'f.year' => Years::GetYearIdByYear($year)
            ])
            ->orderBy(['f.id' => SORT_ASC])
            ->all();
    }

    public static function GetReceived($user_id, $year)
    {
        return (new \yii\db\Query())
            ->select(
                [
                    'f.*',
                    'u.first_name',
                    'u1.first_name as u_first_name',
                    'u.last_name',
                    'u1.last_name as u_last_name',
                    'u.avatar',
                    'u1.avatar as u_avatar',
                    'd.title as departments',
                    'd1.title as u_departments',
                ])
            ->from(self::tableName() . ' f')
            ->leftJoin(\backend\models\User::tableName() . ' u', 'u.id = f.owner_id')
            ->leftJoin(\backend\models\User::tableName() . ' u1', 'u1.id = f.user_id')
            ->leftJoin(Departments::tableName() . ' d', 'd.id = u.department_id')
            ->leftJoin(Departments::tableName() . ' d1', 'd1.id = u1.department_id')
            ->where([
                'f.owner_id' => $user_id,
                'f.is_request' => self::IS_REQUEST,
                'f.year' => Years::GetYearIdByYear($year)
            ])
            ->orWhere([
                'f.user_id' => $user_id,
                'f.is_request' => self::IS_NOT_REQUEST,
                'f.year' => Years::GetYearIdByYear($year)
            ])
            ->orderBy(['f.id' => SORT_ASC])
            ->all();
    }

    public static function GetReceivedForReport($user_id, $year)
    {
        return (new \yii\db\Query())
            ->select(
                [
                    'f.*',
                    'u.first_name',
                    'u1.first_name as u_first_name',
                    'u.last_name',
                    'u1.last_name as u_last_name',
                    'u.avatar',
                    'u1.avatar as u_avatar',
                    'd.title as departments',
                    'd1.title as u_departments',
                ])
            ->from(self::tableName() . ' f')
            ->leftJoin(\backend\models\User::tableName() . ' u', 'u.id = f.owner_id')
            ->leftJoin(\backend\models\User::tableName() . ' u1', 'u1.id = f.user_id')
            ->leftJoin(Departments::tableName() . ' d', 'd.id = u.department_id')
            ->leftJoin(Departments::tableName() . ' d1', 'd1.id = u1.department_id')
            ->where([
                'f.owner_id' => $user_id,
                'f.is_request' => self::IS_REQUEST,
                'f.year' => Years::GetYearIdByYear($year),
                'f.status' => self::STATUS_RECEIVED,
            ])
            ->orWhere([
                'f.user_id' => $user_id,
                'f.is_request' => self::IS_NOT_REQUEST,
                'f.year' => Years::GetYearIdByYear($year),
                'f.status' => self::STATUS_RECEIVED,
            ])
            ->orderBy(['f.id' => SORT_ASC])
            ->all();
    }
}

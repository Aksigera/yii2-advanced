<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $date
 * @property string $title
 * @property string $body
 * @property string $author
 */
class Post extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'post';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['user_id', 'date', 'title', 'body'], 'required'],
			[['user_id'], 'integer'],
			[['date'], 'safe'],
			[['body'], 'string'],
			[['title'], 'string', 'max' => 255],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'user_id' => 'User ID',
			'date' => 'Date',
			'title' => 'Title',
			'body' => 'Body',
		];
	}

	public function getUser()
	{
		return $this->hasOne(User::className(), ['id' => 'user_id']);
	}

	public function getAuthor()
	{
		return $this->user->username;
	}
}

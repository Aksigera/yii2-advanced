<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\SignupForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
	/**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
	public function actionLogin()
	{
		if (!Yii::$app->getUser()->isGuest) {
			return $this->goHome();
		}

		$model = new LoginForm();
		if ($model->load(Yii::$app->getRequest()->post()) && $model->login()) {
			return $this->goBack();
		} else {
			return $this->render('login', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Signup new user
	 * @return string
	 */
	public function actionSignup()
	{
		$model = new SignupForm();
		if ($model->load(Yii::$app->getRequest()->post())) {
			if ($user = $model->signup()) {
				return $this->goHome();
			}
		}

		return $this->render('signup', [
			'model' => $model,
		]);
	}

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}

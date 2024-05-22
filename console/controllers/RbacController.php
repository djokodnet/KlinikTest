<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // Tambahkan roles
        $admin = $auth->createRole('admin');
        $auth->add($admin);

        $user = $auth->createRole('user');
        $auth->add($user);

        // Tambahkan permissions
        $manageUsers = $auth->createPermission('manageUsers');
        $manageUsers->description = 'Manage Users';
        $auth->add($manageUsers);

        $managePosts = $auth->createPermission('managePosts');
        $managePosts->description = 'Manage Posts';
        $auth->add($managePosts);

        // Assign permissions to roles
        $auth->addChild($admin, $manageUsers);
        $auth->addChild($admin, $managePosts);

        $auth->addChild($user, $managePosts);

        // Assign roles to users (user id 1 sebagai admin, user id 2 sebagai user biasa)
        $auth->assign($admin, 1);
        $auth->assign($user, 2);
    }
}

<?php

namespace app\modules\content\controllers;

use naffiq\bridge\controllers\BaseAdminController;

/**
 * PostsController implements the CRUD actions for [[app\models\Posts]] model.
 * @see app\models\Posts
 */
class PostsController extends BaseAdminController
{
    /**
     * @inheritdoc
     */
    public $modelClass = 'app\models\Posts';
    /**
     * @inheritdoc
     */
    public $searchModelClass = 'app\models\search\PostsSearch';


    /**
     * @inheritdoc
     */
    public $createScenario = 'create';

    /**
     * @inheritdoc
     */
    public $updateScenario = 'update';

}

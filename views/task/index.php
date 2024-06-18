<?php

use app\models\Task;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\caching\DbDependency;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php

    $sort = $dataProvider->getSort();
    $sortParams = $sort->getAttributeOrders();

    $cacheKey = 'task-gridview-' . md5(serialize($sortParams));

    $dependency = new DbDependency(['sql' => 'SELECT GREATEST(MAX(COALESCE(updated_at, created_at)), MAX(created_at)) FROM task;']);

    $gridView = GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'title',
            'description:text',
            'due_date',
            'status',
            'priority',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Task $model) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]);

    if ($this->beginCache($cacheKey, ['duration' => 3600, 'dependency' => $dependency])) {
        echo $gridView;
        $this->endCache();
    }
    ?>
</div>

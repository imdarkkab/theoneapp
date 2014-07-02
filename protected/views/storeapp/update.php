<?php
/* @var $this StoreappController */
/* @var $model StoreApplication */

$this->breadcrumbs=array(
	'Store Applications'=>array('index'),
	$model->app_id=>array('view','id'=>$model->app_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StoreApplication', 'url'=>array('index')),
	array('label'=>'Create StoreApplication', 'url'=>array('create')),
	array('label'=>'View StoreApplication', 'url'=>array('view', 'id'=>$model->app_id)),
	array('label'=>'Manage StoreApplication', 'url'=>array('admin')),
);
?>

<h1>Update StoreApplication <?php echo $model->app_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
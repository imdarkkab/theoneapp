<?php
/* @var $this StoreappController */
/* @var $model StoreApplication */

$this->breadcrumbs=array(
	'Store Applications'=>array('index'),
	$model->app_id,
);

$this->menu=array(
	array('label'=>'List StoreApplication', 'url'=>array('index')),
	array('label'=>'Create StoreApplication', 'url'=>array('create')),
	array('label'=>'Update StoreApplication', 'url'=>array('update', 'id'=>$model->app_id)),
	array('label'=>'Delete StoreApplication', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->app_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StoreApplication', 'url'=>array('admin')),
);
?>

<h1>View StoreApplication #<?php echo $model->app_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'app_id',
		'app_name',
		'description',
		'icon',
		'price',
		'publisher',
		'size',
		'last_updated',
		'version',
		'rating',
		'category_id',
	),
)); ?>

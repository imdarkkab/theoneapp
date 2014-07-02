<?php
/* @var $this StoreappController */
/* @var $model StoreApplication */

$this->breadcrumbs=array(
	'Store Applications'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StoreApplication', 'url'=>array('index')),
	array('label'=>'Manage StoreApplication', 'url'=>array('admin')),
);
?>

<h1>Create StoreApplication</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
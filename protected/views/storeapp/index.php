<?php
/* @var $this StoreappController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Store Applications',
);

$this->menu=array(
	array('label'=>'Create StoreApplication', 'url'=>array('create')),
	array('label'=>'Manage StoreApplication', 'url'=>array('admin')),
);
?>

<h1>Store Applications</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

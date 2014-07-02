<?php
/* @var $this StoreappController */
/* @var $model StoreApplication */

$this->breadcrumbs=array(
	'Store Applications'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List StoreApplication', 'url'=>array('index')),
	array('label'=>'Create StoreApplication', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#store-application-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Store Applications</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'store-application-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'app_id',
		'app_name',
		'description',
		'icon',
		'price',
		'publisher',
		/*
		'size',
		'last_updated',
		'version',
		'rating',
		'category_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<html>
<body>
<?= form_open("/codigofacilito/recibirdatos") ?>

<?
	$nombre = array(
		'name' => 'Nombre',
		'placeholder'=> 'Escribe tu nombre');
	$videos = array(
		'name' => 'Videos',
		'placeholder'=> 'Cantidad de videos');
?>
<label>
	Nombre:
	<?=form_input($Nombre) ?>
</label>

<label>
	Numero de videos:
	<?=form_input($Videos) ?>
</label>

<?= form_close() ?>
</body>
</html>
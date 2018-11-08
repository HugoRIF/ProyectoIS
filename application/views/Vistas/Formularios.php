<?php  echo form_open("/codigofacilito/recibirdatos") ?>
<?php
    $nombre = array(
            'name' => 'nombre',
            'placeholder' => 'Escribe tu nombre'
    );
    $videos = array(
        'name' =>'videos',
        'placeholder' =>'Cantidad de videos del curso'
    );
    $idCurso = array(
        'name' =>'idCurso',
        'placeholder' =>'idCurso'
    );
?>
<label>
    Nombre:
    <?= form_input($nombre) ?>
</label>
<br><br><br>
<?= form_label('Numero videos: ','videos')?>
<?= form_input($videos) ?>
<br>
<?= form_label('idCurso: ','idCurso')?>
<?= form_input($idCurso) ?>
<br>
<?= form_submit('','Subir Curso') ?>

<?php form_close() ?>

</body>
</html>

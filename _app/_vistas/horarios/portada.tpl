<section id="content" class="shortcode-item">

<div class="container">
<div class="row">

<div class="col-xs-12">
<h2>Horarios</h2> 
<div class="tab-wrap">
<div class="media">
<div class="parrent pull-left">
<ul class="nav nav-tabs nav-stacked">
<li class="active"><a href="#tabanaliticas" data-toggle="tab" class="analistic-01">Analíticas</a></li>
<li class=""><a href="#tabhorarios" data-toggle="tab" class="analistic-02">Horarios</a></li>
<li class=""><a href="#tabdepto" data-toggle="tab" class="analistic-02">Asociar a un departamento</a></li>
<li class=""><a href="#tabempleado" data-toggle="tab" class="tehnical">Asociar a un empleado</a></li>
</ul>
</div>

<div class="parrent media-body">
<div class="tab-content">
<div class="tab-pane active in" id="tabanaliticas">
<div class="media">
<div class="row">

<div class="progress-wrap col-xs-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
<h3>Metrica 1</h3>
<div class="progress">
<div class="progress-bar  color1" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 55%">
<span class="bar-width">55%</span>
</div>
</div>
</div>

<div class="progress-wrap col-xs-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
<h3>Metrica 2</h3>
<div class="progress">
<div class="progress-bar  color4" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 55%">
<span class="bar-width">55%</span>
</div>
</div>
</div>

<div class="progress-wrap col-xs-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
<h3>Metrica 3</h3>
<div class="progress">
<div class="progress-bar  color1" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 55%">
<span class="bar-width">55%</span>
</div>
</div>
</div>

</div>
</div>
</div>


<div class="tab-pane" id="tabhorarios">
<div class="media body">
  
<div class="wow fadeInDown">
<div class="accordion">
<div class="panel-group" id="accordion1">

<?php foreach ($horarios as $horario) { ?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#dias<?= $horario["id"] ?>">
        <?= $horario["descripcion"] ?>
        <i class="fa fa-angle-right pull-right"></i>
      </a>
    </h3>
</div>

<div id="dias<?= $horario["id"] ?>" class="panel-collapse collapse">
  <div class="panel-body">
    <div class="media accordion-inner">
      <div class="media-body">
        <table>
          <tr><th>&nbsp;</th><th>Día</th><th>Entrada</th><th>Salida</th><th>&nbsp;</th></tr>
        <?php foreach ($horario["dias"] as $dias) { ?>
          <tr>
            <td><a href="" tile="Editar" style="color:#3b97ff;font-size:18px;"><i class="fa fa-pencil-square-o"></i></a></td>
            <td><?= TYA::dia_horario_texto($dias["dia"]) ?></td><td><?= $dias["entrada"] ?></td><td><?= $dias["salida"] ?></td>
            <td><a href="" title="Borrar" style="color:#ff3b3b;font-size:18px;"><i class="fa fa-trash-o"></i></a></td>
          </tr>
        <?php } ?>
          <tr>
            <td colspan="5">
            <td><a href="" title="Agregar" style="color:#ffab30;font-size:18px;"><i class="fa fa-plus"></i></a></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>

</div>

<?php } ?>


</div>
</div>
</div>

</div>
</div>

<div class="tab-pane" id="tabdepto">
<div class="media body">
<p>Departamentos</p>
</div>
</div>

<div class="tab-pane" id="tabempleado">
<div class="media body">
<p>Empleados</p>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

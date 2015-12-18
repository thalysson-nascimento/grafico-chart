<!-- DEFININDO A HORA LOCAL  -->
<?php
date_default_timezone_set('America/Sao_Paulo');

$h = "+3";
$hm = $h * 60;
$ms = $hm * 60;

$dataCorrente = date("d/m/Y"); 
// echo "$data <br>";

$horaCorrente =  gmdate("g:i:s A", time()-($ms));
// echo "$hora";

$anoCorrente = date('Y');

// Esta data exibira o so dados da seguinte forma 'dd Jan 2015'. Será tuilizada para administrar 
// o grafico na dashboard
$dataCorrenteMesExtenso = date("d/M/Y");
?>

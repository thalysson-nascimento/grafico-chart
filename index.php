<?php
	include_once "conf-conexao.php";
	include_once "verificaMesGrafico.php";
	criarTabelaParaBanco();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/Chart.js"></script>
</head>
	<body>
	<br><br>
		<?php 
		/*Chamando a função e passando os meses por parâmetro*/
		/*OBS: esta é a função que gostaria de executar os valores obtidos para serem mostrados no gráfico Chart.js, 
		 *mas não estou entendendo como posso fazer para substituir esses randomScalingFactor()
		 */
		echo "Total de dados gerados no mes de outubro: <br>";
		verificaMesGrafico(10);
		echo "<br>";

		echo "Total de dados gerados no mes de novembro: <br>";
		verificaMesGrafico(11);
		echo "<br>";

		?>
		<div style="width:70%">
			<div>
				<canvas id="canvas" height="450" width="1300"></canvas>
			</div>
		</div>


		<?php /*Olá pessoal, é aqui que não consigo entender como passar os dados que se encontram no banco de dados para a tag 'data'
			   *para este gráfico, já olhei Ajax mas não entendi como posso implementalo.
			   *Para facilitar a consulta criei uma função no php 'verificaMesGrafico($string)', passando como parâmetro simplesmente os meses
			   *como demostrado acima em php
			   */ ?>
		<script type="text/javascript" charset="utf-8">
			var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
			var lineChartData = {
				labels : ["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
				datasets : [
				{
					label: "My First dataset",
					fillColor : "rgba(220,220,220,0.2)",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
				},
				{
					label: "My Second dataset",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
				}
				]

			}

			window.onload = function(){
				var ctx = document.getElementById("canvas").getContext("2d");
				window.myLine = new Chart(ctx).Line(lineChartData, {
					responsive: true
				});
			}
		</script>
	</body>
</html>
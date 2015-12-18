<?php

/*
 *Defindo esta função para facilitar a criação da tabela no banco definido
 */
function criarTabelaParaBanco(){
	include "conf-conexao.php";
	include "script-time.php";

	$queryCheckSelect = "SELECT *FROM TAB_DADOS_GRAFICO";
	$queryResult = $conexao->query($queryCheckSelect);

	if ($queryResult !== FALSE){
        echo "Existe a tabela";
    } else{
    	// echo "cria a tabela";
    	mysqli_query($conexao,"
    	CREATE TABLE IF NOT EXISTS `tab_dados_grafico` (
    		`ID` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
    		`ASSUNTO` varchar(245) NOT NULL,
    		`DIA` tinyint(2) NOT NULL,
    		`MES` tinyint(2) NOT NULL,
    		`ANO` smallint(4) NOT NULL,
    		PRIMARY KEY (`ID`)
    		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;"
    	);
    	mysqli_query($conexao,"
    		INSERT INTO `dados_grafico`.`tab_dados_grafico` (`ID`, `ASSUNTO`, `DIA`, `MES`, `ANO`) 
    		VALUES (NULL, 'Teste de dados 01', '01', '10', '2015'), 
    			   (NULL, 'Teste de dados 02', '10', '11', '2015'), 
    			   (NULL, 'Teste de dados 03', '11', '11', '2015'), 
    			   (NULL, 'Teste de dados 03', '11', '11', '2015'), 
    			   (NULL, 'Teste de dados 03', '11', '12', '2015'), 
    			   (NULL, 'Teste de dados 04', '12', '12', '2015');"
    	);
    }
}

function verificaMesGrafico($string){
	include "conf-conexao.php";
	include "script-time.php";

	// selecione o total de meses quando ano for igua a anoCorrente
	$consultaSqlVerificaMes = "SELECT MES FROM tab_dados_grafico WHERE MES LIKE  '%$string%' AND ANO = $anoCorrente";
	$stmt = mysqli_prepare($conexao, $consultaSqlVerificaMes);

	if ($stmt) {
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		echo mysqli_stmt_num_rows($stmt);
	}
}

?>
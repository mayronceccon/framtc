<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<!-- JS -->		
		<script src="<?php echo $this->asset('js'); ?>scripts.js"></script>		
		<script src="<?php echo $this->asset('js'); ?>bootstrap/bootstrap.js"></script>
		<script src="<?php echo $this->asset('js'); ?>jquery/jquery-2.0.3.js"></script>
    	<!-- CSS -->
    	<link href="<?php echo $this->asset('css'); ?>styles.css" rel="stylesheet">
    	<link href="<?php echo $this->asset('css'); ?>bootstrap/bootstrap.css" rel="stylesheet">
		<title>Modelo Framework MTC</title>
	</head>
	<body>
		<div id="cabecalho">
			<div class="wdl">
				<img src="<?php echo $this->asset('img'); ?>icons/glyphicons_043_group.png">
			</div>
			<div class="wdr">
				<h1 id="title">Modelo Framework MTC</h1>
			</div>
		</div>
		<div id="colEsq">
	        
	        <ul id="menubv">				
				<li><a href="<?php echo $this->url('index/index'); ?>">Início</a></li>
				<li><a href="<?php echo $this->url('index/produto'); ?>">Produto</a></li>
			</ul>
	    </div>
	    <div id="corpo">
	        <div id="sepEsqcolCentral">	            
	            <div id="colPrincipal" class="bordasArrend">
	            	<? require_once $this->view;?>
	            </div>
	        </div>  
	    </div>
	    <div id="rodape">
	    	Mayron Ceccon - 2015
	    </div>
	</body>
</html>
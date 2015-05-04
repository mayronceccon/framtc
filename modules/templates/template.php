<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Starter Template (3.0)</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">		
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<?php $this->assetCss(array('bootstrap/bootstrap.css', 'styles2.css'));?>
	<body>
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo $this->url('index/index'); ?>">Brand</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo $this->url('index/index'); ?>">Home</a></li>
        <li><a href="<?php echo $this->url('index/produto'); ?>">Produtos</a></li>
        <li><a href="<?php echo $this->url('index/contato'); ?>">Contato</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>

<div class="container">
  
  <div class="text-center">
    <h1>Bootstrap starter template</h1>
    <?php require_once $this->view;?>
  </div>
  
</div><!-- /.container -->
	<!-- script references -->
	<?php $this->assetJs(array('scripts.js', 'bootstrap/bootstrap.js', 'jquery/jquery-2.0.3.js'));?>
	</body>
</html>
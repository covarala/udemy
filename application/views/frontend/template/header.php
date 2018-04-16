<?php
	$sessionUsuario = $this->session->userdata('logged_in');
	$nomeUsuario = $sessionUsuario['nome'];
?>

<!-- start header -->
<div class="top_bg">
<div class="wrap">
	<div class="header">
		<div class="logo">
			<a href="<?php echo base_url('home') ?>"><img src="<?php echo base_url();?>assets/frontend/web/images/logo.png" alt=""/></a>
		</div>
		<div class="web_search">
		 	<form>
				<input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" placeholder="O que você procura?">
				<input type="submit" value=" " />
			</form>
	    </div>
		<div class="clear"></div>
	</div>
</div>
</div>

<!-- start header_btm -->
<div class="wrap">
<div class="header_btm">

	<?php
		// $sessionUsuario = $this->session->userdata('logged_in');
	  if ($sessionUsuario['idTipoUsuario'] == 1) {
	?>

	<div class="menu">
		<ul>
			<li><a href="<?php echo base_url('home_dashboard') ?>">Início</a></li>
			<li>
				<a href="<?php echo base_url('home_dashboard/products') ?>">Produtos</a>
			</li>
			<li><a href="<?php echo base_url('home_dashboard/packaging') ?>">Embalagens</a></li>
			<li><a href="<?php echo base_url('home_dashboard/clients') ?>">Clientes</a></li>
			<li><a href="<?php echo base_url('home_dashboard/reports') ?>">Emissão de Relatórios</a></li>
			<div class="clear"></div>
		</ul>
	</div>




	<?php	} else {?>



		<div class="menu">
			<ul>
				<li><a href="<?php echo base_url('home') ?>">Início</a></li>
				<li>
					<a href="<?php echo base_url('home/products') ?>">Produtos</a>
				</li>

				<li><a href="<?php echo base_url('home/about') ?>">Sobre</a></li>
				<li><a href="<?php echo base_url('home/contact') ?>">Contato</a></li>
				<li><a href="<?php echo base_url('home/simulador') ?>">Simular venda</a></li>
				<div class="clear"></div>
			</ul>
		</div>

	<?php } ?>
		<div id="smart_nav">
			<a class="navicon" href="#menu-left"> </a>
		</div>

	<div class="clear"></div>
</div>
</div>

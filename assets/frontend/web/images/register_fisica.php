<script>
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)

  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }

}
</script>

<!-- start top_bg -->
<div class="top_bg">
<div class="wrap">
<div class="main_top">
	<h4 class="style">login or create an account</h4>
</div>
</div>
</div>
<!-- start main -->
<div class="main_bg">
<div class="wrap">
<div class="main">
	<div class="login_left">
		<h3>register new customers</h3>
		<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping address, view and track your orders in your accoung and more.</p>
		<div class="registration_left">

		<?php
		echo form_open('Register/viewCadastro');
		?>

		<h3>identificação</h3>
		 <div class="registration_form">
		 <!-- Form -->
				<div class="sky_form">
					<ul>
						<li>
							<form id="registration_form" action="" method="post">
							<label onclick="this.form.submit();" class="radio left"><input type="radio" name="radio" value="1" checked=""><i>Pessoa Física</i></label>
							</form>
						</li>
						<li>
							<form id="registration_form" action="" method="post">
							<label onclick="this.form.submit();" class="radio"><input type="radio" name="radio" value="2"><i>Pessoa Jurídica</i></label>
							</form>
						</li>
					</ul>
				</div>


      <?php echo form_open('Register/cadastrarFisica') ?>

			<form id="registration_form" action="" method="post">
				<div>
					<label>
            Nome Completo
					</label>
          <input name="nome"  placeholder="Nome Completo" type="text" tabindex="1" required="" autofocus="">
				</div>
				<div>
					<label>
            E-mail
					</label>
          <input name="email" placeholder="E-mail" type="email" tabindex="2" required="" autofocus="">
				</div>
				<div>
					<label>
            Senha
					</label>
          <input name="senha" placeholder="senha" type="password" minlength="6" maxlength="16" tabindex="3" required="">
				</div>
				<div>
					<label>Confirmar a senha
					</label>
          <input name="confSenha" placeholder="confirmar a senha" type="password" minlength="6" maxlength="16" tabindex="4" required="">
				</div>
				<div>
					<label>Número do CPF
					</label>
          <input name="cpf" placeholder="Digite apenas números" type="text"  maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" tabindex="5" required="">
				</div>
				<div>
					<label>
            Data de Nascimento
					</label>
          <input name="nascimento" placeholder="Ex: 01/01/1999" type="text"  maxlength="10	" OnKeyPress="formatar('##/##/####', this)" tabindex="6" required="">
				</div>

				<div>
					<label>
						Telefone<em>*</em>
					</label>
					<input name="telefone" placeholder="Ex: 99-99999-999" type="text"  maxlength="13" OnKeyPress="formatar('##-#####-####', this)" tabindex="7" required="">
				</div>

				<div>
					<label>
						Celular
					</label>
					<input name="telefone1" placeholder="Ex: 99-99999-999" type="text"  maxlength="13" OnKeyPress="formatar('##-#####-####', this)" tabindex="8" >
				</div>
				<div>
					<label>
						Outro Telefone
					</label>
					<input name="telefone2" placeholder="Ex: 99-99999-999" type="text"  maxlength="13" OnKeyPress="formatar('##-#####-####', this)" tabindex="9" >
				</div>


				<h3>Endereço</h3>

				<div>
					<label>
						CEP
					</label>
					<input name="cep" placeholder="Digite apenas números" type="text"  maxlength="10" OnKeyPress="formatar('##-###-###', this)" tabindex="10" required="">
					<a href="http://www.buscacep.correios.com.br/servicos/dnec/index.do" target="_blank" class="cep-link">Não sei meu CEP</a>
				</div>

				<div>
					<label>
						Endereço
					</label><input name="endereco" placeholder="Ex: Rua Alameda das Araras" type="text" tabindex="11" required="">
				</div>
				<div>
					<label>
						Número
					</label><input name="numEndereco" placeholder="Ex: 487" type="text" tabindex="12" required="">
				</div>
				<div>
					<label>
						Complemento
					</label><input name="complemento" placeholder="Ex: Apto 306" type="text" tabindex="13" >
				</div>
				<div>
					<label>
						Bairro
					</label><input name="bairro" placeholder="Ex: Heliópolis" type="text" tabindex="14" required="">
				</div>
				<div>
					<label>
						Estado
					</label>
					<input name="estado" placeholder="Ex: MG" type="text" maxlength="2" tabindex="15" required="">
				</div>
				<div>
					<label>
						Cidade
					</label>
					<input name="cidade" placeholder="Ex: Montes Claros" type="text" tabindex="16" required="">
				</div>
				<div>
					<label>
						Ponto de Referência
					</label>
					<input name="referencia" placeholder="Ex: Ao lado da praça da matirz" type="text" tabindex="16">
				</div>


				<div>
					<input type="submit" value="create an account" id="register-submit">
				</div>
				<div class="sky_form">
					<label class="checkbox"><input type="checkbox" name="checkbox"><i>i agree to <a class="terms" href="#"> terms of service</a> </i></label>
				</div>
			</form>
			<!-- /Form -->
		</div>
	</div>
	</div>
	<div class="clear"></div>
</div>
</div>
</div>

<?php
	$sessionUsuario = $this->session->userdata('logged_in');
  if ($this->session->userdata('logged_in') && $sessionUsuario['idTipoUsuario'] == 1) {
?>




<?php
}else {
  redirect('home', 'refresh');
}
?>

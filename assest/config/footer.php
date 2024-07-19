<?php 
$api_url = 'https://mscode.cl/api/version.php?getVersionNumber'; 

// Realizar la solicitud GET a la API
$curl = curl_init($api_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$api_response = curl_exec($curl);
curl_close($curl);

// Decodificar la respuesta JSON
$api_data = json_decode($api_response, true);

$localVersion = "1.1.50";
$remoteVersion = $api_data['version'];


?>
<footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
		  <li class="nav-item">
			<a class="nav-link" href="javascript:void(0)">
				<?php 

if($remoteVersion === $localVersion){
	echo '<span class="badge bg-success">Actualizado</span>';
}else{
	echo '<span class="badge bg-danger">Tiene una actualizaciòn pendiente!</span>';
}
				
				?>
			</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#">Version <?php echo $localVersion; ?></a>
		  </li>
		</ul>
    </div>
	  &copy; 2021 <a href="#">Desarrollado: Volcan Foods Ltda</a>. Todos los derechos reservados.
  </footer>
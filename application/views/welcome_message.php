<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

<style type="text/css">

body {
 background-color: #fff;
 margin: 40px;
 font-family: Lucida Grande, Verdana, Sans-serif;
 font-size: 14px;
 color: #4F5155;
}

a {
 color: #003399;
 background-color: transparent;
 font-weight: normal;
}

h1 {
 color: #444;
 background-color: transparent;
 border-bottom: 1px solid #D0D0D0;
 font-size: 16px;
 font-weight: bold;
 margin: 24px 0 2px 0;
 padding: 5px 0 6px 0;
}

code {
 font-family: Monaco, Verdana, Sans-serif;
 font-size: 12px;
 background-color: #f9f9f9;
 border: 1px solid #D0D0D0;
 color: #002166;
 display: block;
 margin: 14px 0 14px 0;
 padding: 12px 10px 12px 10px;
}

</style>
</head>
<body>

<h1>Welcome to CodeIgniter!</h1>

<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

<ul>
	<li><a href="<?php echo base_url();?>cualidad/cualidades/anio/2014/format/json">Click </a>Lista de Cualidades</li>
	
	<li><a href="<?php echo base_url();?>cualidad_dia/cualidades_dia/fecha/01-01-2015/format/json">Click </a>Cualidad del Día 01/01/2015</li>

	<li><a href="<?php echo base_url();?>cualidad_dia/pensamiento/fecha/01-01-2015/format/json">Click </a>Pensamiento del día 01/01/2015</li>
	

	<li><a href="<?php echo base_url();?>puntaje_cualidad/puntaje/fecha/01-01-2015/usuario/1/puntaje/100/cualidad/9/format/json">Click </a>Puntaje Cualidad con procedimiento y vuelta de data</li>
	<li><a href="<?php echo base_url();?>multimedia/lista_multimedia_bycualidadtipo/cualidad/1/tipo/1/format/json">Click </a>Lista multimedia por cualidad y tipo</li>
	<li><a href="<?php echo base_url();?>multimedia/multimedia_byid/id/1/format/json">Click </a>Descripción de multimedia</li>
	<li><a href="<?php echo base_url();?>puntaje_cualidad/puntaje_all/usuario/1/anio/2014/format/json">Click </a>Puntaje promedio! por año</li>
	<li><a href="<?php echo base_url();?>reserva/reserva_libro/usuario/1/libro/5/format/json">Click </a>{No desarrollado} Reserva de Libro</li>
	
</ul>


</ul>
<p><br />Page rendered in {elapsed_time} seconds</p>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<div>
	<h2>Login POST</h2>
	<form action="<?php echo base_url();?>users/login/format/json" method='POST'>
		<label>Usuario</label>
		<input name="username" />
		<label>Password</label>
		<input name="password" />
		<input name="tipo" value="1" hidden/>
		<button type="submit">Aceptar</button>
	</form>

</div>
<div>
	<h2>Crear usuario POST</h2>
	<form action="<?php echo base_url();?>users/create_user/format/json" method='POST'>
		<label>Usuario</label>
		<input name="username" />
		<label>Password</label>
		<input name="password" />
		<label>Email</label>
		<input name="email" />
		<input name="tipo" value="1" hidden/>
		<button type="submit">Aceptar</button>
	</form>
</div>
<div>
	<h2>Crear usuario SOCIAL</h2>
	<form action="<?php echo base_url();?>users/create_user_social/format/json" method='POST'>
			<label>Usuario</label>
		<input name="username" />			
			<label>Email</label>
		<input name="email" />
			<label>First Name</label>
		<input name="firstname" />
			<label>Last Name</label>
		<input name="lastname" />			
		
		<input name="tipo" value="1" hidden/>
		<button type="submit">Aceptar</button>
	</form>
</div>
</body>
</html>
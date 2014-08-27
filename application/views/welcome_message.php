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

	<li><a href="<?php echo base_url();?>api/users/format/json">Users </a> - get it in JSON</li>
	<li><a href="<?php echo site_url('api/users');?>">Users</a> - defaulting to XML</li>

	<li><a href="<?php echo base_url();?>cualidad/cualidades/format/json">Click </a>Lista de Cualidades</li>
	
	<li><a href="<?php echo base_url();?>cualidad_dia/cualidades_dia/format/json">Click </a>Cualidad Dia</li>

	<li><a href="<?php echo base_url();?>cualidad_dia/pensamiento/format/json">Click </a>Cualidad Pensamiento</li>

	<li><a href="<?php echo base_url();?>cualidad_libro/librocualidad/format/json">Click </a>Cualidad Libro</li>
	
	<li><a href="<?php echo base_url();?>cualidad_libro/libro/format/json">Click </a>Libro</li>

</ul>

<p><br />Page rendered in {elapsed_time} seconds</p>

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

</body>
</html>
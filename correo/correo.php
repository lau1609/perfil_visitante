<?php 
// Incluir los estilos
include_once('myStyle.php');
	function mailContent($header,$contenido,$footer){	
		// NO MODIFICAR
		$html = ' 
			<!DOCTYPE HTML> 
			<html>
				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
					<link rel="stylesheet" type="text/css" href="https://celiderh.org.mx/emprende/correo/myStyle.php" media="screen" />
					<title>Celiderh</title>
				</head>
				'.$myStyle.'
				<body>
					<table id="base" width="100%" border="0" cellspacing="0" cellpadding="0">
						<tbody>
							<tr>
								<td>
									<table class="container" background-color:#F4EDF9g; width="60%" align="left" border="0" cellpadding="0" cellspacing="0">
										<tbody >
											'.$header.'
											'.$contenido.'
											'.$footer.'
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</body>
			</html>
		';
		// NO MODIFICAR [ end ]
		
		return $html;
	}
?>
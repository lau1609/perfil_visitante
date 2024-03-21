<?php 
	$rootPath="https://vhverificaciones.com.mx/";
	$mensaje_usuario = '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">
	<tbody style="text-align:center">
		<tr>
			<td>
				<table class="content" style="display: inline-table;" width="50%" border-radius="14px" bgcolor="#F3F8F9" padding="104px" align="center">
					<tbody style="text-align=center" padding="34px">
						<tr>
							<td style="padding:84px">
							<img width="200px" height="100px" src="'.$rootPath.'_images/logon.png"/>
								<h2>&iexcl;GRACIAS POR CONTACTARNOS!.</h2>
								<h4 style="text-align: center;">Nos comunicaremos contigo</h4>


							</td>
						</tr>
						<tr>
							<td>
								<p style="text-align: center;">  VH &reg; | 2023</p>
								
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
';
	
	$mensaje_admin = '
	<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">
	<tbody style="text-align:center">
		<tr>
			<td>
				<table class="content" style="display: inline-table;" width="50%" border-radius="14px" bgcolor="#F3F8F9" padding="104px" align="center">
					<tbody style="text-align=center" padding="34px">
						<tr>
							<td style="padding:84px">
							<img width="200px" height="150px" src="'.$rootPath.'_images/logon.png"/>
								<h2>El siguiente usuario ha hecho contacto desde el sitio VH.</h2>
								<h4 style="text-align: center;">Los datos del usuario son los siguientes:</h4>

								
								<p><strong>Nombre : </strong>'.$nombre.'</p>
								<p><strong>Correo electronico : </strong>'.$mail.'</p>
								<p><strong>Mensaje : </strong>'.$mensaje.'</p>
								
								<p><strong>Responder: </strong><a href="mailto:'.$mail.'" style="color:black;">'.$mail.'</a></p>


							</td>
						</tr>
						<tr>
							<td>
								<p style="text-align: center;">  VH &reg; | 2023</p>
								
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
';
?>

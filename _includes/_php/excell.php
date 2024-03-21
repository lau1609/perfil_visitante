<?php
/* Un id único, como: 4b3403665fea6 */
printf("uniqid(): %s\r\n", uniqid());

echo '<br>';
/* También podemos prefijar el id único, esto es lo mismo que
 * hacer:
 *
 * $uniqid = $prefijo . uniqid();
 * $uniqid = uniqid($prefijo);
 */
printf("uniqid('php_'): %s\r\n", uniqid('php_'));

echo '<br>';

/* También podemos activar el parámetro more_entropy, que es
 * necesario en algunos sistemas, como Cygwin. Esto hace que uniqid()
 * produzca un valor como: 4b340550242239.64159797
 */
printf("uniqid('', true): %s\r\n", uniqid('', true));
?>
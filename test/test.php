<?php
$fh = fopen('7a5ffa69c7625e5f686bf0bc22e2ebc63126d8bd.pdf', 'a');
fwrite($fh, '<h1>¡Hola mundo!</h1>');
fclose($fh);

unlink('7a5ffa69c7625e5f686bf0bc22e2ebc63126d8bd.pdf');

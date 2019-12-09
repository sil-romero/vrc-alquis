<!DOCTYPE>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Imágenes dinámicas de una carpeta en php</title>
</head>

<body>
<?php
    $directory="../imag_guardar";
    $dirint = dir($directory);
    while (($archivo = $dirint->read()) !== false)
    {
        echo '<img src="'.$directory."/".$archivo.'">'."\n";
    }
    $dirint->close();
?>
</body>
</html>
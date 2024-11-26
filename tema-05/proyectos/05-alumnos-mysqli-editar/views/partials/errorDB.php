
    <h2>ERROR BASE DE DATOS<h2>
    <HR>;
    <?= "Mensaje:       " . $e->getMessage() . "<br>" ?>
    <?= "Código:       " . $e->getCode() . "<br>" ?>
    <?= "Fichero:       " . $e->getFile() . "<br>" ?>
    <?= "Línea:       " . $e->getLine() . "<br>" ?>
    <?= "Trace:       " . $e->getTraceAsString(). "<br>" ?>
    
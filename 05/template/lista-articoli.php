<?php 
if (isset($templateParams["titolo_pagina"])):
?>
    <h2><?php echo($templateParams["titolo_pagina"]); ?></h2>
<?php
endif;
    foreach ($templateParams["articoli"] as $articolo): ?>
    <article>
        <header>
            <img src="<?php echo UPLOAD_DIR.$articolo["imgarticolo"]; ?>" />
            <h2><?php echo $articolo["titoloarticolo"]; ?></h2>
            <p><?php echo $articolo["dataarticolo"]; ?> - <?php echo $articolo["nome"]; ?> </p>
        </header>

        <section lang="zxx">
            <p><?php echo $articolo["anteprimaarticolo"]; ?></p>
        </section>

        <footer>
            <a href="articolo.php?id<?php echo($articolo["idarticolo"]); ?>">Leggi tutto</a>
        </footer>
    </article>

    <?php
    endforeach;
?>

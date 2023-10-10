<?php
function renderMenuToHTML($currentPageId)
{
    // un tableau qui d\'efinit la structure du site
    $mymenu = array(
        // idPage titre
        'index' => array('Accueil'),
        'cv' => array('Cv'),
        'projets' => array('Mes Projets')
    );
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Lilou PETITCOLAS</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">';
    foreach ($mymenu as $pageId => $pageParameters) {
        if ($pageId == $currentPageId) {
            echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" id="currentpage" href="' . $pageId . '.php">' . $pageParameters[0] . '</a></li>';
        } else {
            echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="' . $pageId . '.php">' . $pageParameters[0] . '</a></li>';
        }
    }
    echo '</ul>
    </div>
</nav>';
}

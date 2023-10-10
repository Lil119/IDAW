<?php
function renderMenuToHTML($currentPageId, $currentPageLang)
{
    function opposite_lang($currentLang)
    {
        if ($currentLang == "fr") {
            return ["en", "Anglais"];
        } else {
            return ["fr", "Français"];
        }
    }
    // un tableau qui d\'efinit la structure du site
    $mymenu = array(
        // idPage titre
        'accueil' => array('Accueil'),
        'cv' => array('Cv'),
        'projets' => array('Mes Projets'),
        'contact' => array('Mon Contact')
    );
    $taboppositelang = opposite_lang($currentPageLang);

    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Lilou PETITCOLAS</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">
        <li class="nav-item"><a class="langue" href="index.php?page=' . $currentPageId . '&lang=' . $taboppositelang[0] . '">' . $taboppositelang[1] . '</a></li>';
    foreach ($mymenu as $pageId => $pageParameters) {
        if ($pageId == $currentPageId) {
            echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" id="currentpage" href="index.php?page=' . $pageId . '&lang=' . $currentPageLang . '">' . $pageParameters[0] . '</a></li>';
        } else {
            echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=' . $pageId . '&lang=' . $currentPageLang . '">' . $pageParameters[0] . '</a></li>';
        }
    }
    echo '</ul>
    </div>
</nav>';
}
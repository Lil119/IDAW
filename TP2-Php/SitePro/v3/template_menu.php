<?php
function renderMenuToHTML($currentPageId, $currentPageLang)
{
    function opposite_lang($currentLang)
    {
        if ($currentLang == "fr") {
            return ["en", "Anglais", 0];
        } else {
            return ["fr", "Français", 1];
        }
    }
    // un tableau qui d\'efinit la structure du site
    $mymenu = array(
        // idPage titre
        'accueil' => array('Accueil', 'Home'),
        'cv' => array('Cv', 'Cv'),
        'projets' => array('Mes Projets', 'Projects'),
        'contact' => array('Mon Contact', 'Contacts')
    );
    $taboppositelang = opposite_lang($currentPageLang);

    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="langue" href="index.php?page=' . $currentPageId . '&lang=' . $taboppositelang[0] . '">' . $taboppositelang[1] . '</a>
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Lilou PETITCOLAS</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">';
    foreach ($mymenu as $pageId => $pageParameters) {
        if ($pageId == $currentPageId) {
            echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" id="currentpage" href="index.php?page=' . $pageId . '&lang=' . $currentPageLang . '">' . $pageParameters[$taboppositelang[2]] . '</a></li>';
        } else {
            echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=' . $pageId . '&lang=' . $currentPageLang . '">' . $pageParameters[$taboppositelang[2]] . '</a></li>';
        }
    }
    echo '</ul>
    </div>
</nav>';
}

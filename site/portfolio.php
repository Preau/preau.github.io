<?php
    //Setup Page
    require_once("configuration/config.php");
    $currentMenuitem = "portfolio";

    //Load header
    require_once("builders/header.php");
?>
    <div class="headertext">Portfolio</div>
    <?php
        foreach($portfolio as $portfolioitemname => $portfolioitemtitle) {
            //Build Portfolioitem div
            $div = '<div class="portfolioitem" id="portfolioitem_' . $portfolioitemname . '">';
            $div .= '<a href="/portfolio/' . $portfolioitemname . '/">';
            $div .= '<img class="portfolioitemimage" src="/portfolio/screenshots/' . $portfolioitemname . 'th.jpg" title="' . $portfolioitemtitle . '" alt="' . $portfolioitemtitle . '" />';
            $div .= '<div class="portfolioitemtooltip" id="portfolioitemtooltip_' . $portfolioitemname . '">';
            $div .= $portfolioitemtitle;
            $div .= '</div>';
            $div .= '</a>';
            $div .= '</div>';
            echo $div;
        }
        echo '<div class="portfolioseparator"></div>';
    ?>
<?php
    //Load footer
    require_once("builders/footer.php");
?>
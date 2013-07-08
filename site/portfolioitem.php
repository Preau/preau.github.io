<?php
    //Setup Page
    require_once("configuration/config.php");

    //Load header
    require_once("builders/header.php");
    
    //Portfolioitem vars
    $portfolioitemname = $_GET['item'];
    $portfolioitemtitle = "";
    $exists = false;
    if(array_key_exists($portfolioitemname, $portfolio)) {
        $exists = true;
        $portfolioitemtitle = $portfolio[$portfolioitemname];
    }
	$next = false;
	$previous = false;
	if($exists) {
            //Check for next and previous
            $keys = array_keys($portfolio);
            if((false !== ($p = array_search($portfolioitemname, $keys))) && ($p < count($keys) - 1)) {
                    $next = $keys[++$p];
            }
            if((false !== ($p = array_search($portfolioitemname, $keys))) && ($p > 0)) {
                    $previous = $keys[--$p];
            }
	}
?>
    <?php if(!$exists) {?>
        <h1>Niet gevonden</h1>
        <p>Het geselecteerde portfolio item kon niet worden gevonden.</p>
    <?php } else { ?>
        <script type="text/javascript">
            Shadowbox.init();
        </script>
        <div class="headertext">
			<div style="float:left;"><?php echo $portfolioitemtitle; ?></div>
			<?php if($next) { 
				echo '<div class="portfoliobutton"><a href="/portfolio/'.$next.'/"><span class="portfoliobuttontext">'.$portfolio[$next].'</span> <img src="/style/arrowright.png" alt="'.$portfolio[$next].'" /></a></div>'; 
			} ?>
			<?php if($previous) { 
				echo '<div class="portfoliobutton"><a href="/portfolio/'.$previous.'/"><img src="/style/arrowleft.png" alt="'.$portfolio[$previous].'" /> <span class="portfoliobuttontext">'.$portfolio[$previous].'</span></a></div>'; 
			} ?>
			<br style="clear:both" />
		</div>
        <?php
            //Create image
            $imagediv = '<div class="portfoliopageimage">';
            $imagediv .= '<a href="/portfolio/screenshots/' . $portfolioitemname . '.jpg" rel="shadowbox">';
            $imagediv .= '<img class="portfolioitemimage" src="/portfolio/screenshots/' . $portfolioitemname . 'th.jpg" title="' . $portfolioitemtitle . '" alt="' . $portfolioitemtitle . '" />';
            $imagediv .= '</a>';
            $imagediv .= '<br/>';
            $imagediv .= '<i>Klik op de afbeelding om te vergroten</i>';
            $imagediv .= '</div>';
            echo $imagediv;
            
            //Retrieve text
            echo '<div class="portfoliopagecontent">';
            require_once('portfolio/' . $portfolioitemname . '.php');
            echo '<br style="clear:both"/></div>';
        ?>
    <?php } ?>
<?php
    //Load footer
    require_once("builders/footer.php");
?>
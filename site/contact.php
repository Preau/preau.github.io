<?php
    session_start();
    
    //Setup Page
    require_once("configuration/config.php");
    $currentMenuitem = "contact";

    $errors = array();
    $success = false;
    if(!empty($_POST['submit'])) {
        //Check for errors
        if(empty($_POST['name'])) {
            $errors[] = "Vul een geldige naam in.";
        }
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || empty($_POST['email'])) {
            $errors[] = "Vul een geldig e-mailadres in.";
        }
        if(empty($_POST['message'])) {
            $errors[] = "Vul een geldig bericht in.";
        }
        require_once('plugins/securimage/securimage.php');
	$securimage = new Securimage();
        if ($securimage->check($_POST['captcha_code']) == false) {
            $errors[] = "De anti-spam code was incorrect.";
        }
        if(!count($errors)) {
            //Send mail
            $to = "mail@koenvanzuylen.com";
            $replyto = $_POST['email'];
            $headers = "From: contactform@koenvanzuylen.com" . "\r\n" . "Reply-To: $replyto";
            $subject = "Formulier Website";
            $body = "Naam: ".$_POST['name']."\n\n".$_POST['message'];
            if(mail($to, "Contactformulier Website", $body, $headers)) {
                $success = true;
            } else {
                $errors[] = "Er is iets misgegaan bij het verzenden van het bericht.";
            }
        }
    }
    
    //Load header
    require_once("builders/header.php");
?>   
    <h1>Contact</h1>
    <form method="post" action="">
        <div id="contact">
            <?php  
               if($success) {
                   echo '<p>';
                   echo "Bedankt voor je bericht!";
                   echo '</p>';
               } 
               if(count($errors)) {
                   echo '<p style="color:#CC0000">';
                   foreach($errors as $error) {
                       echo $error . '<br />';
                   }
                   echo '</p>';
               }
            ?>
            <p>
                <input class="contactinput" name="name" type="text" 
                       <?php if(count($errors)) echo 'value="'.$_POST['name'].'"'; ?>
                />
                &nbsp;Naam
                <br />
                <input class="contactinput" name="email" type="text" 
                       <?php if(count($errors)) echo 'value="'.$_POST['email'].'"'; ?>
                />
                &nbsp;E-Mailadres
                <br />
                <textarea class="contactinput" name="message" rows="10" cols="29"><?php if(count($errors)) echo $_POST['message']; ?></textarea>
                <span style="vertical-align:top">&nbsp;Bericht</span>
                <br />
                <img id="captcha" src="/plugins/securimage/securimage_show.php" alt="Antispam CAPTCHA Image" />
                <a href="#" onclick="document.getElementById('captcha').src = '/plugins/securimage/securimage_show.php?' + Math.random(); return false" style="vertical-align:top">Andere Afbeelding</a>
                <br />
                <input class="contactinput" type="text" name="captcha_code" size="10" maxlength="6" />
                &nbsp;Typ de tekst over
            </p>
            <p>
                <input id="contactsubmitbutton" type="submit" name="submit" value="Verzenden"/>
            </p>
        </div>
    </form>
<?php
    //Load footer
    require_once("builders/footer.php");
?>

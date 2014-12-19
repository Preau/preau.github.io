<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta content="True" name="HandheldFriendly">
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
        <meta name="viewport" content="width=device-width">
        
        <title>Koen van Zuijlen</title>
        <link rel="shortcut icon" type="image/x-icon" href="/style/favicon.ico" />
		
        <script type="text/javascript" src="/plugins/google-analytics.js"></script>
		
        <script type="text/javascript" src="/plugins/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="/plugins/jqueryui/jquery-ui-1.8.21.custom.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/plugins/jqueryui/jquery-ui-1.8.21.custom.css" />
    
        <script type="text/javascript" src="/plugins/shadowbox/shadowbox.js"></script>
        <link rel="stylesheet" type="text/css" href="/plugins/shadowbox/shadowbox.css" />
        
        <link rel="stylesheet" type="text/css" href="/style/style.css" />
        <script type="text/javascript" src="/script/script.js"></script>
    </head>
    <body>
        <div id="pagewrapper">
			<div id="thepixel">
			</div>
            <div id="logo">
                Koen van Zuijlen
            </div>
            <div id="menu">
                <?php
                    //Create menuitems
                    foreach($menuitems as $menuitemLink => $menuitemTitle) {
                        $class = "menuitem";
                        if($currentMenuitem == $menuitemLink) {
                            $class .= "selected menuitem";
                        }
                        
                        $menuitemHtml = '<div class="'.$class.'"><a href="/'.$menuitemLink.'/">'.$menuitemTitle.'</a></div>';
                        echo $menuitemHtml;
                    }
                    echo '<br style="clear:both" />'
                ?>
            </div>
            <div id="content">
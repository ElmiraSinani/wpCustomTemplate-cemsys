<?php

add_action( 'init', 'default_gl_titles' );

function default_gl_titles() {
    
    $deprecated = null;
    $autoload = 'no';
    add_option( 'socialIcons', '', $deprecated, $autoload );
    add_option( 'upcoming_trips', 'EXPLORE OUR UPCOMING TRIPS', $deprecated, $autoload );
    add_option( 'custom_trips', 'CUSTOM TRIPS - CONTACT FOR MORE INFORMATION', $deprecated, $autoload );
    
    add_option( 'frontBlock1', 'Мы предлагаем', $deprecated, $autoload );
    add_option( 'frontBlock2', 'Лидеры продаж', $deprecated, $autoload );
    add_option( 'frontBlock3', 'Наши партнеры', $deprecated, $autoload );
    
    
}


add_action('admin_menu' , 'gl_titles_settings');

function gl_titles_settings() {
    add_menu_page('Global Settings', 'Global Settings', 'manage_options', 'global-settings', 'gl_settings_callback', '', '25');
}

function  gl_settings_callback(){
    
    $socialIcons = $_POST['socialIcons'] ? $_POST['socialIcons'] : get_option('socialIcons'); 
    $headerContacts = $_POST['headerContacts'] ? $_POST['headerContacts'] : get_option('headerContacts'); 
    $standardLogo = $_POST['standardLogo'] ? $_POST['standardLogo'] : get_option('standardLogo'); 
    $retinaLogo = $_POST['retinaLogo'] ? $_POST['retinaLogo'] : get_option('retinaLogo'); 
    $breadcrumbBg = $_POST['breadcrumbBg'] ? $_POST['breadcrumbBg'] : get_option('breadcrumbBg'); 
    $frontBlock1 = $_POST['frontBlock1'] ? $_POST['frontBlock1'] : get_option('frontBlock1'); 
    $frontBlock2 = $_POST['frontBlock2'] ? $_POST['frontBlock2'] : get_option('frontBlock2'); 
    $frontBlock3 = $_POST['frontBlock3'] ? $_POST['frontBlock3'] : get_option('frontBlock3'); 
    
    $footerContacts = $_POST['footerContacts'] ? $_POST['footerContacts'] : get_option('footerContacts'); 
    $footerLogo = $_POST['footerLogo'] ? $_POST['footerLogo'] : get_option('footerLogo'); 
    
    
    
  
        
    if( isset($_POST['saveSettings'])){
       saveTitlesOptions($_POST);
    }
    
    
    ?>
            <style type="text/css">
                .cptItem label{font-weight:bold;display: block;}
                .cptItem input[type='text'],.cptItem input[type='email'], textarea {width: 60%;}
                 h1{ font-size: 17px; margin: 20px 0; color: #215988;}             
            </style>
            <form action="" method="post">
            <div class="form_container">
                <hr/>
                
                <h1>Social Icon Block</h1>
                <p class="cptItem">
                    <label for="socialIcons">Social Icons: </label>
                    <textarea id="socialIcons" name="socialIcons"><?php echo stripslashes($socialIcons); ?></textarea>
                </p>
                
                <hr/>
                <h1>Front Page Titles</h1>                
                <p class="cptItem">
                    <label for="frontBlock1">Block 1: </label>
                    <input id="frontBlock1" name="frontBlock1" type="text" value="<?php echo $frontBlock1; ?>" />
                </p>
                <p class="cptItem">
                    <label for="frontBlock2">Block 2: </label>
                    <input name="frontBlock2" type="text" value="<?php echo $frontBlock2; ?>" />
                </p>
                <p class="cptItem">
                    <label for="frontBlock3">Block 3: </label>
                    <input name="frontBlock3" type="text" value="<?php echo $frontBlock3; ?>" />
                </p>
                
                <hr/>
                <h1>Header Block</h1>
                <p class="cptItem">
                    <label for="header_contacts">Header Contacts: </label>
                    <textarea id="headerContacts" name="headerContacts"><?php echo stripslashes($headerContacts); ?></textarea>
                </p>
                <p class="cptItem">
                    <label for="standardLogo">Header Standard Logo: </label>
                    <input name="standardLogo" type="text" value="<?php echo $standardLogo; ?>" />
                </p>
                <p class="cptItem">
                    <label for="retinaLogo">Header Retina Logo: </label>
                    <input name="retinaLogo" type="text" value="<?php echo $retinaLogo; ?>" />
                </p>
                <p class="cptItem">
                    <label for="breadcrumbBg">Header Breadcrumb Background Image: </label>
                    <input name="breadcrumbBg" type="text" value="<?php echo $breadcrumbBg; ?>" />
                </p>
                
                
                <hr/>
                <h1>Footer Block</h1>
                <p class="cptItem">
                    <label for="footerLogo">Footer Logo: </label>
                    <input name="footerLogo" type="text" value="<?php echo $footerLogo; ?>" />
                </p>
                <p class="cptItem">
                    <label for="footerContacts">Footer Contacts: </label>
                    <textarea id="footerContacts" name="footerContacts"><?php echo stripslashes($footerContacts); ?></textarea>
                </p>
                
               
                <hr/>                
                <p class="cptItem">                   
                    <input name="saveSettings" type="submit" value="Save Settings" />
                </p>
            </div>
            </form>
    <?php
}
function saveTitlesOptions($data){
    
    extract($_POST);
    
    update_option( 'socialIcons', $socialIcons );
    
    update_option( 'headerContacts', $headerContacts );    
    update_option( 'standardLogo', $standardLogo );    
    update_option( 'retinaLogo', $retinaLogo );
    update_option( 'breadcrumbBg', $breadcrumbBg );
    
    update_option( 'frontBlock1', $frontBlock1 );
    update_option( 'frontBlock2', $frontBlock2 );
    update_option( 'frontBlock3', $frontBlock3 );
    
    update_option( 'footerContacts', $footerContacts );
    update_option( 'footerLogo', $footerLogo );
    
    
        
    return false;
}





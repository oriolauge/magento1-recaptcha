# OAG - Magento 1 Recaptcha module
This module adds the option to add a recaptcha v2 invisible in your magento 1

## Technologies
* Name: OAG_Recaptcha
* Version: 1.0.0
* Tested On: Magento CE 1.9.4.2

## Instalation guide

### With FTP
1. Clear the store cache under var/cache and all cookies for your store domain. Disable compilation if enabled. This step eliminates almost all potential problems. It’s necessary since Magento uses cache heavily.
2. Backup your store database and web directory.
3. Download and unzip extension contents on your computer and navigate inside the extracted folder.
4. Using your FTP client upload content of "app", "design" & "skin" directories to "app", "design" "skin" directories inside your store root.
5. Find your register.phtml file in your theme and add the next line at the end of form ```<?php echo $this->getChildHtml('oag-recaptcha-register'); ?>```

### With modman
1. Install modman script (https://github.com/colinmollenhour/modman)
2. Execute command modman clone with the repository url
3. Find your register.phtml file in your theme and add the next line at the end of form ```<?php echo $this->getChildHtml('oag-recaptcha-register'); ?>```

## Key Features
This module uses observers in create customers accounts to check if recaptcha v2 (invisible) detects if user comes from a bot or not.
To configure recaptcha values, you can do it in System -> Config section. If you don't configure Site Key/Secret Key, this module doesn't work and won't check if user is created from a bot or not
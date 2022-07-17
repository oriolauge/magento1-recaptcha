<?php
/**
 * OAG Recaptcha Block
 *
 * @category   OAG
 * @package    OAG_Recaptcha
 * @package    OAG_Recaptcha_Block_Recaptcha
 */
class OAG_Recaptcha_Block_Script extends OAG_Recaptcha_Block_Recaptcha
{
    /**
     * Get Recaptch library include script
     * @param  string $lang
     * @return string
     */
    public function getRecaptchaLibInclScript($lang = null, $onloadCallback = 'oagRecaptchaOnloadCallback')
    {

        // Add language code
        $params  = $lang ? 'hl=' . $lang : '';

        // Add onload callback function
        if ($onloadCallback) {
            $params .= ($lang ? '&' : '') . 'onload=' . $onloadCallback . '&render=explicit';
        }

        // Add ? if there are parameters
        if ($params) {
            $params = '?' . $params;
        }

        return sprintf('<script src="https://www.google.com/recaptcha/api.js%s" async defer></script>', $params);
    }
}

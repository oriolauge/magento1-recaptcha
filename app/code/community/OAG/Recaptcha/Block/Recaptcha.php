<?php
/**
 * OAG Recaptcha Block
 *
 * @category   OAG
 * @package    OAG_Recaptcha
 * @package    Mage_Checkout_Block
 */
class OAG_Recaptcha_Block_Recaptcha extends Mage_Core_Block_Template
{
    /**
     * The recaptcha site key.
     * @return string
     */
    public function getSiteKey()
    {
        return Mage::helper('oag_recaptcha')->getSiteKey();
    }

    /**
     * Return the language code to print the recaptcha.
     * @see  https://developers.google.com/recaptcha/docs/language
     * @return string
     */
    public function getRecaptchaLanguage()
    {
        $languageCode = Mage::app()->getLocale()->getLocaleCode();
        return substr($languageCode, 0, 2);
    }

    /**
     * Check if module is enabled
     * @return boolean
     */
    public function isEnabled()
    {
        return Mage::helper('oag_recaptcha')->isEnabled();
    }

    /**
     * Render block HTML if module is enabled
     *
     * @return string
     */
    protected function _toHtml()
    {
        if (!$this->isEnabled()) {
            return '';
        }
        return parent::_toHtml();
    }
}

<?php
/**
 * OAG Recaptcha Helper
 *
 * @category   OAG
 * @package    OAG_Recaptcha
 */
class OAG_Recaptcha_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Configuration paths
     * @var string
     */
    const MODULE_ENABLED = 'oag_recaptcha/general/enabled';
    const MODULE_KEY_SITE = 'oag_recaptcha/general/site_key';
    const MODULE_KEY_SECRET = 'oag_recaptcha/general/secret_key';

    /**
     * Is recaptacha library already included
     * @var boolean
     */
    protected $hasRecaptchaLib = false;

    /**
     * Is the module enabled in configuration.
     * @return bool
     */
    public function isEnabled()
    {
        if (Mage::getStoreConfigFlag(self::MODULE_ENABLED)
            && $this->getSiteKey()
            && $this->getSecretKey()) {
            return true;
        }
        return false;
    }

    /**
     * The recaptcha site key.
     * @return string
     */
    public function getSiteKey()
    {
        return Mage::getStoreConfig(self::MODULE_KEY_SITE);
    }

    /**
     * The recaptcha secret key.
     * @return string
     */
    public function getSecretKey()
    {
        return Mage::getStoreConfig(self::MODULE_KEY_SECRET);
    }
}

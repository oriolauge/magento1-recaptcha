<?php
/**
* Function that validate the recaptcha before the customer account creation
*/
class OAG_Recaptcha_Model_Observer
{
    /**
     * Google reCaptcha constants
     */
    const REQUEST_URL = 'https://www.google.com/recaptcha/api/siteverify';
    const REQUEST_RESPONSE = 'g-recaptcha-response';

    /**
     * Holds the client object to make all request to google
     * @var Varien_Http_Client $_client
     */
    protected $_client = null;

    /**
     * This function validate the recaptcha before we launch the createPostAction in AccountController
     * @see  Mage_Customer_AccountController
     * @param  Varien_Event_Observer $observer
     * @return void
     */
    public function preDispatchCreateCustomerPostRecaptchaValidation($observer)
    {
        if ($this->_getHelper()->isEnabled() && !$this->verifyReCaptcha()) {
            Mage::getSingleton('customer/session')->addError($this->_getHelper()->__('There was an error with the recaptcha code, please try again.'));
            $controllerAction = $observer->getEvent()->getControllerAction();
            $controllerAction->getResponse()->setRedirect(Mage::getUrl('customer/account/create'))->sendResponse();
            exit;
        }
    }

    /**
     * Verify the details of the recaptcha request.
     *
     * @return boolean
     */
    protected function verifyReCaptcha()
    {
        $client = $this->getHttpClient();
        $client->setParameterPost(array(
            'secret'   => $this->_getHelper()->getSecretKey(),
            'response' => Mage::app()->getRequest()->getPost(self::REQUEST_RESPONSE)
        ));

        try {
            $response = $client->request('POST');
            $body = $response->getBody();
            $data = Mage::helper('core')->jsonDecode($body);
            if (isset($data['success']) && $data['success']) {
                return true;
            }
        } catch (Exception $e) {
            Mage::logException($e);
        }

        return false;
    }

    /**
     * Returns helper module
     * @return OAG_Recaptcha_Helper_Data
     */
    protected function _getHelper()
    {
        return Mage::helper('oag_recaptcha');
    }

    /**
     * Get the Http Client to use for the request to reCAPTCHA
     *
     * @return Zend_Http_Client
     */
    public function getHttpClient()
    {
        if (!isset($this->_client)) {
            $this->_client = new Zend_Http_Client();
            $this->_client->setUri(self::REQUEST_URL);
        }
        return $this->_client;
    }
}

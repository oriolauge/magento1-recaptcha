/**
 * Fire on captcha lib load event
 * @return void
 */
function oagRecaptchaOnloadCallback()
{
    $(document).fire("recaptcha:loaded");
}

/**
 * Submit registration form callback
 * @return void
 */
function oagSubmitCustomerRegisterForm()
{
    dataForm.submit();
}
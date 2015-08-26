<?php
/**
 * @author      Tsvetan Stoychev <t.stoychev@extendix.com>
 * @website     http://www.extendix.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class Extendix_ValidateCartMultipleQty_Helper_Data
    extends Mage_Core_Helper_Abstract
{

    const XML_PATH_EXTENSION_ENABLE = 'sales/extendix_validatecartmultipleqty/enabled';
    const XML_PATH_MULTIPLIER       = 'sales/extendix_validatecartmultipleqty/multiplier';
    const XML_PATH_MESSAGE_TEMPLATE = 'sales/extendix_validatecartmultipleqty/message_template';

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return (bool) Mage::getStoreConfig(self::XML_PATH_EXTENSION_ENABLE);
    }

    /**
     * @return mixed
     */
    public function getMultiplier()
    {
        return Mage::getStoreConfig(self::XML_PATH_MULTIPLIER);
    }

    /**
     * @return mixed
     */
    public function getMessageTemplate()
    {
        return Mage::getStoreConfig(self::XML_PATH_MESSAGE_TEMPLATE);
    }

    /**
     * @return bool
     */
    public function canApply()
    {
        $multiplier = $this->getMultiplier();
        $message    = $this->getMessageTemplate();

        return ($this->isEnabled() && !empty($multiplier) && !empty($message));
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return sprintf($this->getMessageTemplate(), $this->getMultiplier());
    }

}
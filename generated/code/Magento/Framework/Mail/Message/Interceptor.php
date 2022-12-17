<?php
namespace Magento\Framework\Mail\Message;

/**
 * Interceptor class for @see \Magento\Framework\Mail\Message
 */
class Interceptor extends \Magento\Framework\Mail\Message implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct($charset = 'utf-8')
    {
        $this->___init();
        parent::__construct($charset);
    }

    /**
     * {@inheritdoc}
     */
    public function setMessageType($type)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setMessageType');
        return $pluginInfo ? $this->___callPlugins('setMessageType', func_get_args(), $pluginInfo) : parent::setMessageType($type);
    }

    /**
     * {@inheritdoc}
     */
    public function setBody($body)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBody');
        return $pluginInfo ? $this->___callPlugins('setBody', func_get_args(), $pluginInfo) : parent::setBody($body);
    }

    /**
     * {@inheritdoc}
     */
    public function setSubject($subject)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setSubject');
        return $pluginInfo ? $this->___callPlugins('setSubject', func_get_args(), $pluginInfo) : parent::setSubject($subject);
    }

    /**
     * {@inheritdoc}
     */
    public function getSubject()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getSubject');
        return $pluginInfo ? $this->___callPlugins('getSubject', func_get_args(), $pluginInfo) : parent::getSubject();
    }

    /**
     * {@inheritdoc}
     */
    public function getBody()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBody');
        return $pluginInfo ? $this->___callPlugins('getBody', func_get_args(), $pluginInfo) : parent::getBody();
    }

    /**
     * {@inheritdoc}
     */
    public function setFrom($fromAddress)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setFrom');
        return $pluginInfo ? $this->___callPlugins('setFrom', func_get_args(), $pluginInfo) : parent::setFrom($fromAddress);
    }

    /**
     * {@inheritdoc}
     */
    public function setFromAddress($fromAddress, $fromName = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setFromAddress');
        return $pluginInfo ? $this->___callPlugins('setFromAddress', func_get_args(), $pluginInfo) : parent::setFromAddress($fromAddress, $fromName);
    }

    /**
     * {@inheritdoc}
     */
    public function addTo($toAddress)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addTo');
        return $pluginInfo ? $this->___callPlugins('addTo', func_get_args(), $pluginInfo) : parent::addTo($toAddress);
    }

    /**
     * {@inheritdoc}
     */
    public function addCc($ccAddress)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addCc');
        return $pluginInfo ? $this->___callPlugins('addCc', func_get_args(), $pluginInfo) : parent::addCc($ccAddress);
    }

    /**
     * {@inheritdoc}
     */
    public function addBcc($bccAddress)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addBcc');
        return $pluginInfo ? $this->___callPlugins('addBcc', func_get_args(), $pluginInfo) : parent::addBcc($bccAddress);
    }

    /**
     * {@inheritdoc}
     */
    public function setReplyTo($replyToAddress)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setReplyTo');
        return $pluginInfo ? $this->___callPlugins('setReplyTo', func_get_args(), $pluginInfo) : parent::setReplyTo($replyToAddress);
    }

    /**
     * {@inheritdoc}
     */
    public function getRawMessage()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getRawMessage');
        return $pluginInfo ? $this->___callPlugins('getRawMessage', func_get_args(), $pluginInfo) : parent::getRawMessage();
    }

    /**
     * {@inheritdoc}
     */
    public function setBodyHtml($html)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBodyHtml');
        return $pluginInfo ? $this->___callPlugins('setBodyHtml', func_get_args(), $pluginInfo) : parent::setBodyHtml($html);
    }

    /**
     * {@inheritdoc}
     */
    public function setBodyText($text)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBodyText');
        return $pluginInfo ? $this->___callPlugins('setBodyText', func_get_args(), $pluginInfo) : parent::setBodyText($text);
    }
}

<?php

use SendGrid\Mail\Mail;

class YiiSendGrid extends CApplicationComponent
{
    /**
     * SendGrid apiKey
     * @var string
     */
    private $_apiKey;

    /**
     * @var SendGrid SendGrid instance
     */
    private $_sg;

    public function init()
    {
        require_once __DIR__ . '/vendor/autoload.php';

        return parent::init();
    }

    /**
     * get SendGrid apiKey
     * @return string
     * @throws Exception if apiKey is not defined
     */
    public function getApiKey()
    {
        if ($this->_apiKey === null) {
            throw new Exception('Api key must be defined');
        }

        return $this->_apiKey;
    }

    /**
     * SendGrid apiKey
     * @param string $value
     */
    public function setApiKey($value)
    {
        $this->_apiKey = $value;
    }

    public function createEmail()
    {
        return $email = new Mail();
    }

    /**
     * Gets the SendGrid instance
     * @return SendGrid
     * @throws Exception
     */
    public function getSg()
    {
        if ($this->_sg === null) {
            $this->_sg = new SendGrid($this->getApiKey());
        }

        return $this->_sg;
    }

    public function send(Mail $mail)
    {
        try {
            $sg = $this->getSg();
            $result = $sg->send($mail);

            var_dump($result);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}

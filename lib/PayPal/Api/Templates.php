<?php

namespace PayPal\Api;

use PayPal\Common\PayPalResourceModel;
use PayPal\Transport\PayPalRestCall;
use PayPal\Validation\ArgumentValidator;
use PayPal\Api\Template;
use PayPal\Rest\ApiContext;

/**
 * Class Templates
 *
 * List of templates belonging to merchant.
 *
 * @package PayPal\Api
 *
 * @property \PayPal\Api\Address[] addresses
 * @property string[] emails
 * @property \PayPal\Api\Phone[] phones
 * @property \PayPal\Api\Template[] templates
 * @property \PayPal\Api\Links[] links
 */
class Templates extends PayPalResourceModel
{
    /**
     * List of addresses in merchant's profile.
     *
     * @param \PayPal\Api\Address[] $addresses
     * 
     * @return $this
     */
    public function setAddresses($addresses): static
    {
        $this->addresses = $addresses;
        return $this;
    }

    /**
     * List of addresses in merchant's profile.
     *
     * @return \PayPal\Api\Address[]
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * Append Addresses to the list.
     *
     * @param \PayPal\Api\Address $address
     * @return $this
     */
    public function addAddress($address): static
    {
        if (!$this->getAddresses()) {
            return $this->setAddresses([$address]);
        } else {
            return $this->setAddresses(
                array_merge($this->getAddresses(), [$address])
            );
        }
    }

    /**
     * Remove Addresses from the list.
     *
     * @param \PayPal\Api\Address $address
     * @return $this
     */
    public function removeAddress($address): static
    {
        return $this->setAddresses(
            array_diff($this->getAddresses(), [$address])
        );
    }

    /**
     * List of emails in merchant's profile.
     *
     * @param string[] $emails
     * 
     * @return $this
     */
    public function setEmails($emails): static
    {
        $this->emails = $emails;
        return $this;
    }

    /**
     * List of emails in merchant's profile.
     *
     * @return string[]
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * Append Emails to the list.
     *
     * @param string $string
     * @return $this
     */
    public function addEmail($string): static
    {
        if (!$this->getEmails()) {
            return $this->setEmails([$string]);
        } else {
            return $this->setEmails(
                array_merge($this->getEmails(), [$string])
            );
        }
    }

    /**
     * Remove Emails from the list.
     *
     * @param string $string
     * @return $this
     */
    public function removeEmail($string): static
    {
        return $this->setEmails(
            array_diff($this->getEmails(), [$string])
        );
    }

    /**
     * List of phone numbers in merchant's profile.
     *
     * @param \PayPal\Api\Phone[] $phones
     * 
     * @return $this
     */
    public function setPhones($phones): static
    {
        $this->phones = $phones;
        return $this;
    }

    /**
     * List of phone numbers in merchant's profile.
     *
     * @return \PayPal\Api\Phone[]
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * Append Phones to the list.
     *
     * @param \PayPal\Api\Phone $phone
     * @return $this
     */
    public function addPhone($phone): static
    {
        if (!$this->getPhones()) {
            return $this->setPhones([$phone]);
        } else {
            return $this->setPhones(
                array_merge($this->getPhones(), [$phone])
            );
        }
    }

    /**
     * Remove Phones from the list.
     *
     * @param \PayPal\Api\Phone $phone
     * @return $this
     */
    public function removePhone($phone): static
    {
        return $this->setPhones(
            array_diff($this->getPhones(), [$phone])
        );
    }

    /**
     * Array of templates.
     *
     * @param \PayPal\Api\Template[] $templates
     * 
     * @return $this
     */
    public function setTemplates($templates): static
    {
        $this->templates = $templates;
        return $this;
    }

    /**
     * Array of templates.
     *
     * @return \PayPal\Api\Template[]
     */
    public function getTemplates()
    {
        return $this->templates;
    }

    /**
     * Append Templates to the list.
     *
     * @param \PayPal\Api\Template $template
     * @return $this
     */
    public function addTemplate($template): static
    {
        if (!$this->getTemplates()) {
            return $this->setTemplates([$template]);
        } else {
            return $this->setTemplates(
                array_merge($this->getTemplates(), [$template])
            );
        }
    }

    /**
     * Remove Templates from the list.
     *
     * @param \PayPal\Api\Template $template
     * @return $this
     */
    public function removeTemplate($template): static
    {
        return $this->setTemplates(
            array_diff($this->getTemplates(), [$template])
        );
    }

    /**
     * Retrieve the details for a particular template by passing the template ID to the request URI.
     *
     * @deprecated Please use `Template::get()` instead.
     * @see Template::get
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     */
    public static function get(string $templateId, $apiContext = null, $restCall = null): \PayPal\Api\Template
    {
        ArgumentValidator::validate($templateId, 'templateId');
        $payLoad = "";
        $json = self::executeCall(
            '/v1/invoicing/templates/' . $templateId,
            "GET",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new Template();
        $ret->fromJson($json);
        return $ret;
    }

    /**
     * Retrieves the template information of the merchant.
     *
     * @param array $params
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     */
    public static function getAll($params = [], $apiContext = null, $restCall = null): \PayPal\Api\Templates
    {
        ArgumentValidator::validate($params, 'params');
        $payLoad = "";
        $allowedParams = [
          'fields' => 1,
      ];
        $json = self::executeCall(
            '/v1/invoicing/templates/?' . http_build_query(array_intersect_key($params, $allowedParams)),
            "GET",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new Templates();
        $ret->fromJson($json);
        return $ret;
    }
}

<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class Participant
 *
 * Participant information.
 *
 * @package PayPal\Api
 *
 * @property string email
 * @property string first_name
 * @property string last_name
 * @property string business_name
 * @property \PayPal\Api\Phone phone
 * @property \PayPal\Api\Phone fax
 * @property string website
 * @property string additional_info
 * @property \PayPal\Api\Address address
 */
class Participant extends PayPalModel
{
    /**
     * The participant email address.
     *
     * @param string $email
     * 
     * @return $this
     */
    public function setEmail($email): static
    {
        $this->email = $email;
        return $this;
    }

    /**
     * The participant email address.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * The participant first name.
     *
     * @param string $first_name
     * 
     * @return $this
     */
    public function setFirstName($first_name): static
    {
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * The participant first name.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * The participant last name.
     *
     * @param string $last_name
     * 
     * @return $this
     */
    public function setLastName($last_name): static
    {
        $this->last_name = $last_name;
        return $this;
    }

    /**
     * The participant last name.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * The participant company business name.
     *
     * @param string $business_name
     * 
     * @return $this
     */
    public function setBusinessName($business_name): static
    {
        $this->business_name = $business_name;
        return $this;
    }

    /**
     * The participant company business name.
     *
     * @return string
     */
    public function getBusinessName()
    {
        return $this->business_name;
    }

    /**
     * The participant phone number.
     *
     * @param \PayPal\Api\Phone $phone
     * 
     * @return $this
     */
    public function setPhone($phone): static
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * The participant phone number.
     *
     * @return \PayPal\Api\Phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * The participant fax number.
     *
     * @param \PayPal\Api\Phone $fax
     * 
     * @return $this
     */
    public function setFax($fax): static
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * The participant fax number.
     *
     * @return \PayPal\Api\Phone
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * The participant website.
     *
     * @param string $website
     * 
     * @return $this
     */
    public function setWebsite($website): static
    {
        $this->website = $website;
        return $this;
    }

    /**
     * The participant website.
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Additional information, such as business hours.
     *
     * @param string $additional_info
     * 
     * @return $this
     */
    public function setAdditionalInfo($additional_info): static
    {
        $this->additional_info = $additional_info;
        return $this;
    }

    /**
     * Additional information, such as business hours.
     *
     * @return string
     */
    public function getAdditionalInfo()
    {
        return $this->additional_info;
    }

    /**
     * The participant address.
     *
     * @param \PayPal\Api\Address $address
     * 
     * @return $this
     */
    public function setAddress($address): static
    {
        $this->address = $address;
        return $this;
    }

    /**
     * The participant address.
     *
     * @return \PayPal\Api\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

}

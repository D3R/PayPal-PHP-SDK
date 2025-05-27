<?php
namespace PayPal\Api;

use PayPal\Common\PayPalResourceModel;
use PayPal\Rest\ApiContext;

/**
 * Class OpenIdUserinfo
 *
 * OpenIdConnect UserInfo Resource
 *
 * @property string user_id
 * @property string sub
 * @property mixed name
 * @property string given_name
 * @property string family_name
 * @property string middle_name
 * @property string picture
 * @property string email
 * @property bool email_verified
 * @property string gender
 * @property string birthday
 * @property string zoneinfo
 * @property string locale
 * @property string language
 * @property bool verified
 * @property string phone_number
 * @property OpenIdAddress address
 * @property mixed verified_account
 * @property mixed account_type
 * @property string age_range
 * @property string payer_id
 */
class OpenIdUserinfo extends PayPalResourceModel
{

    /**
     * Subject - Identifier for the End-User at the Issuer.
     *
     * @param string $user_id
     */
    public function setUserId($user_id): static
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * Subject - Identifier for the End-User at the Issuer.
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Subject - Identifier for the End-User at the Issuer.
     *
     * @param string $sub
     */
    public function setSub($sub): static
    {
        $this->sub = $sub;
        return $this;
    }

    /**
     * Subject - Identifier for the End-User at the Issuer.
     *
     * @return string
     */
    public function getSub()
    {
        return $this->sub;
    }

    /**
     * End-User's full name in displayable form including all name parts, possibly including titles and suffixes, ordered according to the End-User's locale and preferences.
     *
     * @param string $name
     */
    public function setName($name): static
    {
        $this->name = $name;
        return $this;
    }

    /**
     * End-User's full name in displayable form including all name parts, possibly including titles and suffixes, ordered according to the End-User's locale and preferences.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Given name(s) or first name(s) of the End-User
     *
     * @param string $given_name
     */
    public function setGivenName($given_name): static
    {
        $this->given_name = $given_name;
        return $this;
    }

    /**
     * Given name(s) or first name(s) of the End-User
     *
     * @return string
     */
    public function getGivenName()
    {
        return $this->given_name;
    }

    /**
     * Surname(s) or last name(s) of the End-User.
     *
     * @param string $family_name
     */
    public function setFamilyName($family_name): static
    {
        $this->family_name = $family_name;
        return $this;
    }

    /**
     * Surname(s) or last name(s) of the End-User.
     *
     * @return string
     */
    public function getFamilyName()
    {
        return $this->family_name;
    }

    /**
     * Middle name(s) of the End-User.
     *
     * @param string $middle_name
     */
    public function setMiddleName($middle_name): static
    {
        $this->middle_name = $middle_name;
        return $this;
    }

    /**
     * Middle name(s) of the End-User.
     *
     * @return string
     */
    public function getMiddleName()
    {
        return $this->middle_name;
    }

    /**
     * URL of the End-User's profile picture.
     *
     * @param string $picture
     */
    public function setPicture($picture): static
    {
        $this->picture = $picture;
        return $this;
    }

    /**
     * URL of the End-User's profile picture.
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * End-User's preferred e-mail address.
     *
     * @param string $email
     */
    public function setEmail($email): static
    {
        $this->email = $email;
        return $this;
    }

    /**
     * End-User's preferred e-mail address.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * True if the End-User's e-mail address has been verified; otherwise false.
     *
     * @param boolean $email_verified
     */
    public function setEmailVerified($email_verified): static
    {
        $this->email_verified = $email_verified;
        return $this;
    }

    /**
     * True if the End-User's e-mail address has been verified; otherwise false.
     *
     * @return boolean
     */
    public function getEmailVerified()
    {
        return $this->email_verified;
    }

    /**
     * End-User's gender.
     *
     * @param string $gender
     */
    public function setGender($gender): static
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * End-User's gender.
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * End-User's birthday, represented as an YYYY-MM-DD format. They year MAY be 0000, indicating it is omited. To represent only the year, YYYY format would be used.
     *
     * @param string $birthday
     */
    public function setBirthday($birthday): static
    {
        $this->birthday = $birthday;
        return $this;
    }

    /**
     * End-User's birthday, represented as an YYYY-MM-DD format. They year MAY be 0000, indicating it is omited. To represent only the year, YYYY format would be used.
     *
     * @return string
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Time zone database representing the End-User's time zone
     *
     * @param string $zoneinfo
     */
    public function setZoneinfo($zoneinfo): static
    {
        $this->zoneinfo = $zoneinfo;
        return $this;
    }

    /**
     * Time zone database representing the End-User's time zone
     *
     * @return string
     */
    public function getZoneinfo()
    {
        return $this->zoneinfo;
    }

    /**
     * End-User's locale.
     *
     * @param string $locale
     */
    public function setLocale($locale): static
    {
        $this->locale = $locale;
        return $this;
    }

    /**
     * End-User's locale.
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * End-User's language.
     *
     * @param string $language
     */
    public function setLanguage($language): static
    {
        $this->language = $language;
        return $this;
    }

    /**
     * End-User's language.
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * End-User's verified status.
     *
     * @param boolean $verified
     */
    public function setVerified($verified): static
    {
        $this->verified = $verified;
        return $this;
    }

    /**
     * End-User's verified status.
     *
     * @return boolean
     */
    public function getVerified()
    {
        return $this->verified;
    }

    /**
     * End-User's preferred telephone number.
     *
     * @param string $phone_number
     */
    public function setPhoneNumber($phone_number): static
    {
        $this->phone_number = $phone_number;
        return $this;
    }

    /**
     * End-User's preferred telephone number.
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * End-User's preferred address.
     *
     * @param \PayPal\Api\OpenIdAddress $address
     */
    public function setAddress($address): static
    {
        $this->address = $address;
        return $this;
    }

    /**
     * End-User's preferred address.
     *
     * @return \PayPal\Api\OpenIdAddress
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Verified account status.
     *
     * @param boolean $verified_account
     */
    public function setVerifiedAccount($verified_account): static
    {
        $this->verified_account = $verified_account;
        return $this;
    }

    /**
     * Verified account status.
     *
     * @return boolean
     */
    public function getVerifiedAccount()
    {
        return $this->verified_account;
    }

    /**
     * Account type.
     *
     * @param string $account_type
     */
    public function setAccountType($account_type): static
    {
        $this->account_type = $account_type;
        return $this;
    }

    /**
     * Account type.
     *
     * @return string
     */
    public function getAccountType()
    {
        return $this->account_type;
    }

    /**
     * Account holder age range.
     *
     * @param string $age_range
     */
    public function setAgeRange($age_range): static
    {
        $this->age_range = $age_range;
        return $this;
    }

    /**
     * Account holder age range.
     *
     * @return string
     */
    public function getAgeRange()
    {
        return $this->age_range;
    }

    /**
     * Account payer identifier.
     *
     * @param string $payer_id
     */
    public function setPayerId($payer_id): static
    {
        $this->payer_id = $payer_id;
        return $this;
    }

    /**
     * Account payer identifier.
     *
     * @return string
     */
    public function getPayerId()
    {
        return $this->payer_id;
    }


    /**
     * returns user details
     *
     * @path /v1/identity/openidconnect/userinfo
     * @method GET
     * @param array        $params     (allowed values are access_token)
     *                                 access_token - access token from the createFromAuthorizationCode / createFromRefreshToken calls
     * @param ApiContext $apiContext Optional API Context
     * @param PayPalRestCall $restCall
     */
    public static function getUserinfo($params, $apiContext = null, $restCall = null): \PayPal\Api\OpenIdUserinfo
    {
        static $allowedParams = ['schema' => 1];

        $params = is_array($params)  ? $params : [];

        if (!array_key_exists('schema', $params)) {
            $params['schema'] = 'openid';
        }

        $requestUrl = "/v1/identity/openidconnect/userinfo?"
            . http_build_query(array_intersect_key($params, $allowedParams));

        $json = self::executeCall(
            $requestUrl,
            "GET",
            "",
            [
                'Authorization' => "Bearer " . $params['access_token'],
                'Content-Type' => 'x-www-form-urlencoded'
            ],
            $apiContext,
            $restCall
        );

        $ret = new OpenIdUserinfo();
        $ret->fromJson($json);

        return $ret;
    }
}

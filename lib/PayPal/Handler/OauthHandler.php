<?php
/**
 * API handler for OAuth Token Request REST API calls
 */

namespace PayPal\Handler;

use PayPal\Common\PayPalUserAgent;
use PayPal\Core\PayPalConstants;
use PayPal\Core\PayPalHttpConfig;
use PayPal\Exception\PayPalConfigurationException;
use PayPal\Exception\PayPalInvalidCredentialException;
use PayPal\Exception\PayPalMissingCredentialException;

/**
 * Class OauthHandler
 */
class OauthHandler implements IPayPalHandler
{
    /**
     * Construct
     *
     * @param \Paypal\Rest\ApiContext $apiContext
     */
    public function __construct(
        /**
         * Private Variable
         */
        private $apiContext
    )
    {
    }

    /**
     * @param PayPalHttpConfig $httpConfig
     * @param string                    $request
     * @param mixed                     $options
     * @throws PayPalConfigurationException
     * @throws PayPalInvalidCredentialException
     * @throws PayPalMissingCredentialException
     */
    public function handle($httpConfig, $request, $options): void
    {
        $config = $this->apiContext->getConfig();

        $httpConfig->setUrl(
            rtrim(trim($this->_getEndpoint($config)), '/') .
            ($options['path'] ?? '')
        );

        $headers = [
            "User-Agent"    => PayPalUserAgent::getValue(PayPalConstants::SDK_NAME, PayPalConstants::SDK_VERSION),
            "Authorization" => "Basic " . base64_encode($options['clientId'] . ":" . $options['clientSecret']),
            "Accept"        => "*/*"
        ];
        $httpConfig->setHeaders($headers);

        // Add any additional Headers that they may have provided
        $headers = $this->apiContext->getRequestHeaders();
        foreach ($headers as $key => $value) {
            $httpConfig->addHeader($key, $value);
        }
    }

    /**
     * Get HttpConfiguration object for OAuth API
     *
     * @param array $config
     *
     * @return PayPalHttpConfig
     * @throws \PayPal\Exception\PayPalConfigurationException
     */
    private function _getEndpoint($config): string
    {
        if (isset($config['oauth.EndPoint'])) {
            $baseEndpoint = $config['oauth.EndPoint'];
        } elseif (isset($config['service.EndPoint'])) {
            $baseEndpoint = $config['service.EndPoint'];
        } elseif (isset($config['mode'])) {
            $baseEndpoint = match (strtoupper($config['mode'])) {
                'SANDBOX' => PayPalConstants::REST_SANDBOX_ENDPOINT,
                'LIVE' => PayPalConstants::REST_LIVE_ENDPOINT,
                default => throw new PayPalConfigurationException('The mode config parameter must be set to either sandbox/live'),
            };
        } else {
            // Defaulting to Sandbox
            $baseEndpoint = PayPalConstants::REST_SANDBOX_ENDPOINT;
        }

        return rtrim(trim($baseEndpoint), '/') . "/v1/oauth2/token";
    }
}

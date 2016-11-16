<?php
/**
 * Created by PhpStorm.
 * User: daniil
 * Date: 16.11.16
 * Time: 10:36
 */

namespace OkSdk\Base;

use OkSdk\Base\Includes\Token;
use OkSdk\Includes\Request;

/**
 * Class UpdateToken
 *
 * @package OkSdk\Base
 */
class UpdateToken extends Request
{
    /** @var string $refresh_token */
    private $refresh_token = '';
    /** @var integer $application_id */
    private $application_id;
    /** @var string $application_secret_key */
    private $application_secret_key;

    /** @var Token $token */
    private $token = null;

    /**
     * @return Token
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $application_secret_key
     */
    public function setApplicationSecretKey($application_secret_key)
    {
        $this->application_secret_key = $application_secret_key;

        return $this;
    }

    /**
     * @param int $application_id
     */
    public function setApplicationId($application_id)
    {
        $this->application_id = $application_id;

        return $this;
    }

    /**
     * @param string $refresh_token
     */
    public function setRefreshToken($refresh_token)
    {
        $this->refresh_token = $refresh_token;

        return $this;
    }

    /** @inheritdoc */
    public function getResultApiUrl()
    {
        return self::TOKEN_SERVICE_ADDRESS;
    }

    /** @inheritdoc */
    public function doRequest()
    {
        $this->setParameter('refresh_token', $this->refresh_token);
        $this->setParameter('grant_type', 'refresh_token');
        $this->setParameter('client_id', $this->application_id);
        $this->setParameter('client_secret', $this->application_secret_key);

        $result = $this->execApi();
        if ($result && ($json = $this->getJsonResponse())) {
            $this->token = new Token();
            $this->token->fillByJson($json);

            return true;
        }

        return false;
    }

    /** @inheritdoc */
    public function prepareHeaders()
    {
        return [];
    }

    /** @inheritdoc */
    public function getMethod()
    {
    }
}

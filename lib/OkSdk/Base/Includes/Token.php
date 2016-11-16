<?php
/**
 * Created by PhpStorm.
 * User: daniil
 * Date: 16.11.16
 * Time: 12:10
 */

namespace OkSdk\Base\Includes;
use lib\AutoFillObject;

/**
 * Class Token
 *
 * @package OkSdk\Base\Includes
 */
class Token
{
    use AutoFillObject;

    /** @var string $access_token */
    private $access_token;
    /** @var string $token_type */
    private $token_type;
    /** @var integer $expires_in */
    private $expires_in;

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->access_token;
    }

    /**
     * @param string $access_token
     */
    public function setAccessToken($access_token)
    {
        $this->access_token = $access_token;

        return $this;
    }

    /**
     * @return string
     */
    public function getTokenType()
    {
        return $this->token_type;
    }

    /**
     * @param string $token_type
     */
    public function setTokenType($token_type)
    {
        $this->token_type = $token_type;

        return $this;
    }

    /**
     * @return int
     */
    public function getExpiresIn()
    {
        return $this->expires_in;
    }

    /**
     * @param int $expires_in
     */
    public function setExpiresIn($expires_in)
    {
        $this->expires_in = $expires_in;

        return $this;
    }
}

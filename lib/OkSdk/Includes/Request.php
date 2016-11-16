<?php
/**
 * Created by PhpStorm.
 * User: daniil
 * Date: 11.11.16
 * Time: 13:34
 */

namespace OkSdk\Includes;

use logger\Logger;
use OkSdk\Base\Errors;
use Psr\Log\LoggerInterface;

/**
 * Class Request
 *
 * @package OkSdk\Includes
 */
abstract class Request extends \ApiRator\Includes\Request implements OkInterface
{
    /** @var string $access_token */
    private static $access_token;
    /** @var string $application_key */
    private static $application_key;
    /** @var string $application_secret_key */
    private static $application_secret_key;
    /** @var int $error_code */
    private $error_code;
    /** @var string $error_msg */
    private $error_msg;
    private $json_response;

    /**
     * Request constructor.
     *
     * @param string          $access_token
     * @param LoggerInterface $logger
     */
    public function __construct(
        $application_key = null,
        $application_secret_key = null,
        $access_token = null,
        $logger = null
    )
    {
        if (!$logger && !self::$logger) {
            $logger = new Logger();
        }
        if ($access_token) {
            $this->setAccessToken($access_token);
        }
        if ($application_key) {
            $this->setApplicationKey($application_key);
        }
        if ($application_secret_key) {
            $this->setApplicationSecretKey($application_secret_key);
        }

        parent::__construct(self::MAGIC_PREFIX, $logger);
    }

    /**
     * возвращает код ошибки
     *
     * @return int
     */
    public function getErrorCode()
    {
        return $this->error_code;
    }

    /**
     * возвращает сообщение из ошибки
     *
     * @return string
     */
    public function getErrorMsg()
    {
        return $this->error_msg;
    }

    /**
     * @return string
     */
    public function getApplicationSecretKey()
    {
        return self::$application_secret_key;
    }

    /**
     * @param string $application_secret_key
     */
    public function setApplicationSecretKey($application_secret_key)
    {
        self::$application_secret_key = $application_secret_key;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getJsonResponse()
    {
        return $this->json_response;
    }

    /**
     * @param string $application_key
     */
    public function setApplicationKey($application_key)
    {
        self::$application_key = $application_key;

        return $this;
    }

    /** @inheritdoc */
    public function getResultApiUrl()
    {
        $url = self::API_URL . $this->getMethod();
        $this->setParameter("access_token", $this->getAccessToken());
        $this->setParameter("application_key", $this->getApplicationKey());

        return $url;
    }

    /**
     * @return string
     */
    public function getApplicationKey()
    {
        return self::$application_key;
    }

    /** @inheritdoc */
    public function answerProcessing($content)
    {
        $json = json_decode($content);

        if (!$json) {
            return false;
        }
        $this->json_response = $json;
        if (isset($json->error_code) || isset($json->error_msg)) {
            if (isset($json->error_code) && $json->error_code) {
                $this->error_code = $json->error_code;
            }
            if (isset($json->error_msg) && $json->error_msg) {
                $this->error_msg = $json->error_msg;
                if (self::$logger) {
                    self::$logger->error("#" . $this->error_code . " " . $this->error_msg);
                }
            }

            return false;
        }

        return true;
    }

    /**
     * @param string $access_token
     *
     * @return Request
     */
    public function setAccessToken($access_token)
    {
        self::$access_token = $access_token;

        return $this;
    }

    /** @inheritdoc */
    public function handleParameters($parameters)
    {
        $r_params = [];
        $o_params = [];
        foreach ($parameters as $key => $parameter) {
            if (is_array($parameter)) {
                $r_params[$key] = implode(',', $parameter);
            } else {
                $r_params[$key] = $parameter;
            }
            if (is_bool($r_params[$key])) {
                $r_params[$key] = $r_params[$key] ? 'true' : 'false';
            }
            if ($key == 'access_token') {
                continue;
            }
            $o_params[$key] = $r_params[$key];
        }
        $s_params           = '';
        $o_params['method'] = $this->getMethod();
        ksort($o_params);
        foreach ($o_params as $key => $o_param) {
            $s_params .= $key . '=' . $o_param;
        }
        $r_params['sig'] = md5($s_params . md5($this->getAccessToken() . $this->getApplicationSecretKey()));

        return $r_params;
    }

    /** @inheritdoc */
    public function getAccessToken()
    {
        return self::$access_token;
    }

    /** @inheritdoc */
    public function getApiVersion()
    {
        return '';
    }

    /**
     * @return bool
     */
    abstract public function doRequest();
}

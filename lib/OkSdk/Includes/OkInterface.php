<?php
/**
 * Created by PhpStorm.
 * User: daniil
 * Date: 11.11.16
 * Time: 13:36
 */

namespace OkSdk\Includes;

/**
 * Interface OkInterface
 *
 * @package OkSdk\Includes
 */
interface OkInterface
{
    const API_URL = "https://api.ok.ru/fb.do?method=";
    const TOKEN_SERVICE_ADDRESS = "https://api.ok.ru/oauth/token.do";
    const MAGIC_PREFIX = 'okarg';
}

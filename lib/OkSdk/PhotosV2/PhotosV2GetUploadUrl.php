<?php
/**
 * Created by PhpStorm.
 * User: alfred
 * Date: 12.11.16
 * Time: 14:47
 */

namespace OkSdk\PhotosV2;

use lib\AutoFillObject;
use OkSdk\Includes\Request;

/**
 * Метод запускает процесс добавления и возвращает URL,
 * который должен использоваться для фактической загрузки фотографий
 *
 * Class PhotosV2GetUploadUrl
 * @package OkSdk\PhotosV2
 */
class PhotosV2GetUploadUrl extends Request
{
    use AutoFillObject;

    /** @var int $expires_ms */
    private $expires_ms;
    /** @var array $photo_ids */
    private $photo_ids;
    /** @var string $upload_url */
    private $upload_url;
    /** @var string $expires */
    private $expires;

    /**
     * @return int
     */
    public function getExpiresMs()
    {
        return $this->expires_ms;
    }

    /**
     * @return array
     */
    public function getPhotoIds()
    {
        return $this->photo_ids;
    }

    /**
     * @return string
     */
    public function getUploadUrl()
    {
        return $this->upload_url;
    }

    /**
     * @return string
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * result in $this->getExpiresMs();
     * and $this->getPhotoIds();
     * and $this->getUploadUrl();
     * and $this->getExpires();
     *
     * {@inheritdoc}
     */
    public function doRequest()
    {
        $result = $this->execApi();
        if ($result && ($json = $this->getJsonResponse())) {
            $this->fillByJson($json);

            return true;
        }

        return false;
    }

    /** @inheritdoc */
    public function getMethod()
    {
        return 'photosV2.getUploadUrl';
    }

    /**
     * Идентификатор пользователя, фотографии которого требуется добавить.
     * Укажите uid при вызове этого метода без ключа сессии.
     *
     * @param string $uid
     *
     * @return $this
     */
    public function setUid($uid)
    {
        $this->okarg_uid = $uid;

        return $this;
    }

    /**
     * Идентификатор альбома. Если не указан, фотографии будут добавлены
     * в личный фотоальбом пользователя.
     *
     * @param string $aid
     *
     * @return $this
     */
    public function setAid($aid)
    {
        $this->okarg_aid = $aid;

        return $this;
    }

    /**
     * Идентификатор группы. Укажите его для загрузки в групповой альбом
     * (для этого требуется параметр aid) либо для создания медиатопика в группе.
     *
     * @param string $gid
     *
     * @return $this
     */
    public function setGid($gid)
    {
        $this->okarg_gid = $gid;

        return $this;
    }

    /**
     * Количество фотографий для добавления. Значение по умолчанию: 1.
     *
     * @param int $count
     *
     * @return $this
     */
    public function setCount($count)
    {
        $this->okarg_count = $count;

        return $this;
    }

    /**
     * Возвращает URL для добавления с заполнителями вместо точных значений.
     * Позволяет добавлять изображения небольшими партиями на второй стадии,
     * указав подмножество идентификаторов фотографий. Значение по умолчанию: false.
     *
     * @param boolean $placeholders
     *
     * @return $this
     */
    public function setPlaceholders($placeholders)
    {
        $this->okarg_placeholders = $placeholders;

        return $this;
    }
}

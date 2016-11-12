<?php
/**
 * Created by PhpStorm.
 * User: alfred
 * Date: 12.11.16
 * Time: 20:08
 */

namespace OkSdk\Photos;

use OkSdk\Includes\Request;


/**
 * Изменить описание к фотографии
 *
 * Class PhotosEditPhoto
 * @package OkSdk\Photos
 */
class PhotosEditPhoto extends Request
{
    /**
     * Идентификатор фотографии
     *
     * @param string $photo_id
     *
     * @return $this
     */
    public function setPhotoId($photo_id)
    {
        $this->okarg_photo_id = $photo_id;

        return $this;
    }

    /**
     * Идентификатор группы, для фотографии
     * которой требуется изменить описание
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
     * Новое описание фотографии.
     * Если не указано - удаляет существующее описание.
     *
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->okarg_description = $description;

        return $this;
    }

    /**
     * return boolean
     *
     * {@inheritdoc}
     */
    public function doRequest()
    {
        $this->setRequiredParams(['photo_id']);

        $result = $this->execApi();
        if ($result && ($json = $this->getJsonResponse())) {
            return true;
        }

        return false;
    }

    /** @inheritdoc */
    public function getMethod()
    {
        return 'photos.editPhoto';
    }
}
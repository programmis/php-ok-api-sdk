<?php
/**
 * Created by PhpStorm.
 * User: alfred
 * Date: 12.11.16
 * Time: 21:14
 */

namespace OkSdk\Photos;

use OkSdk\Includes\Request;

/**
 * Удалить фотографию
 *
 * Class PhotosDeletePhoto
 * @package OkSdk\Photos
 */
class PhotosDeletePhoto extends Request
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
     * Идентификатор группы, фотографию которой необходимо удалить
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
        return 'photos.deletePhoto';
    }
}

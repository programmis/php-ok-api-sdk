<?php
/**
 * Created by PhpStorm.
 * User: alfred
 * Date: 12.11.16
 * Time: 16:03
 */

namespace OkSdk\PhotosV2;

use lib\AutoFillObject;
use OkSdk\Includes\Request;
use OkSdk\PhotosV2\Includes\V2CommitResult;

/**
 * Этот метод завершает процесс добавления фотографий,
 * предоставляя дополнительную meta-информацию, относящуюся к добавленным
 * фотографиям. Его нужно вызвать после успешного добавления фотографий.
 * Не вызывайте этот метод для фотографий, публикуемых в групповых медиатопиках.
 *
 * Class PhotosV2Commit
 * @package OkSdk\PhotosV2
 */
class PhotosV2Commit extends Request
{
    use AutoFillObject;

    /** @var string $aid */
    private $aid;
    /** @var V2CommitResult[] $photos */
    private $photos;

    /**
     * result in $this->getAid();
     * and $this->getPhotos();
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
        return 'photosV2.commit';
    }

    /**
     * @param V2CommitResult $photo
     *
     * @return $this
     */
    public function addPhoto($photo)
    {
        $this->photos[] = $photo;

        return $this;
    }

    public function objectFields()
    {
        return [
            'photos' => [
                'class'  => 'OkSdk\PhotosV2\Includes\V2CommitResult',
                'method' => 'addPhoto'
            ]
        ];
    }

    /**
     * @return string
     */
    public function getAid()
    {
        return $this->aid;
    }

    /**
     * @return V2CommitResult[]
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * Идентификатор добавленной фотографии
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
     * Маркер, полученный от непосредственной загрузки
     *
     * @param string $token
     *
     * @return $this
     */
    public function setToken($token)
    {
        $this->okarg_token = $token;

        return $this;
    }

    /**
     * Комментарий к добавленной фотографии
     *
     * @param string $comment
     *
     * @return $this
     */
    public function setComment($comment)
    {
        $this->okarg_comment = $comment;

        return $this;
    }

    /**
     * JSON с информацией о сразу нескольких фотографиях
     *
     * @param object $photos
     *
     * @return $this
     */
    public function setPhotos($photos)
    {
        $u_photos = [];
        foreach ($photos as $key => $photo) {
            $a_photo = [];
            $a_photo['photo_id'] = $key;
            $a_photo['token'] = $photo->token;
            $u_photos[] = $a_photo;
        }
        $this->okarg_photos = json_encode($u_photos);

        return $this;
    }
}

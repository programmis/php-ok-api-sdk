<?php
/**
 * Created by PhpStorm.
 * User: alfred
 * Date: 12.11.16
 * Time: 16:08
 */

namespace OkSdk\PhotosV2\Includes;

use lib\AutoFillObject;

/**
 * Class V2CommitResult
 * @package OkSdk\PhotosV2\Includes
 */
class V2CommitResult
{
    use AutoFillObject;

    /** @var string $assigned_photo_id */
    private $assigned_photo_id;
    /** @var string $photo_id */
    private $photo_id;
    /** @var string $status */
    private $status;

    /**
     * @return string
     */
    public function getAssignedPhotoId()
    {
        return $this->assigned_photo_id;
    }

    /**
     * @param string $assigned_photo_id
     *
     * @return V2CommitResult
     */
    public function setAssignedPhotoId($assigned_photo_id)
    {
        $this->assigned_photo_id = $assigned_photo_id;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhotoId()
    {
        return $this->photo_id;
    }

    /**
     * @param string $photo_id
     *
     * @return V2CommitResult
     */
    public function setPhotoId($photo_id)
    {
        $this->photo_id = $photo_id;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return V2CommitResult
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}

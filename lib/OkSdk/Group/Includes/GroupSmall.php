<?php
/**
 * Created by PhpStorm.
 * User: daniil
 * Date: 01.02.17
 * Time: 15:20
 */

namespace OkSdk\Group\Includes;

use lib\AutoFillObject;

/**
 * Class GroupSmall
 *
 * @package OkSdk\Group\Includes
 */
class GroupSmall
{
    use AutoFillObject;

    /** @var integer $groupId */
    private $groupId;
    /** @var integer $userId */
    private $userId;
    /** @var string $role */
    private $role;
    /** @var string $status */
    private $status;

    /**
     * @return int
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @param int $groupId
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;

        return $this;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: daniil
 * Date: 01.02.17
 * Time: 16:35
 */

namespace OkSdk\Group;

use OkSdk\Group\Includes\GroupSmall;
use OkSdk\Includes\Request;

/**
 * Получение информации о принадлежности пользователей конкретной группе
 * Class GroupGetUserGroupsByIds
 *
 * @package OkSdk\Group
 */
class GroupGetUserGroupsByIds extends Request
{
    /** @var GroupSmall[] $groups */
    private $groups = [];

    /** @var array $uids */
    private $uids = [];

    /**
     * Идентификатор пользователя, список групп которого необходимо получить
     *
     * @param array $uid
     *
     * @return $this
     */
    public function setUids($uids)
    {
        $this->uids = $uids;

        return $this;
    }

    /**
     * @param integer $uid
     *
     * @return $this
     */
    public function addUid($uid)
    {
        $this->uids[] = $uid;

        return $this;
    }

    /**
     * Идентификатор группы
     *
     * @param string $group_id
     *
     * @return $this
     */
    public function setGroupId($group_id)
    {
        $this->okarg_group_id = $group_id;

        return $this;
    }

    /**
     * @return GroupSmall[]
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * result in $this->getGroups();
     * {@inheritdoc}
     */
    public function doRequest()
    {
        $this->setRequiredParams(['uids', 'group_id']);
        if ($this->uids) {
            $this->setParameter('uids', $this->uids);
        }

        $result = $this->execApi();
        if ($result && ($json = $this->getJsonResponse())) {
            foreach ($json as $item) {
                $group = new GroupSmall();
                $group->fillByJson($item);
                $this->groups[] = $group;
            }

            return true;
        }

        return false;
    }

    /** @inheritdoc */
    public function getMethod()
    {
        return 'group.getUserGroupsByIds';
    }
}
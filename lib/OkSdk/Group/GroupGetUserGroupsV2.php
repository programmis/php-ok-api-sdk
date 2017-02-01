<?php
/**
 * Created by PhpStorm.
 * User: daniil
 * Date: 01.02.17
 * Time: 15:10
 */

namespace OkSdk\Group;

use OkSdk\Group\Includes\GroupSmall;
use OkSdk\Includes\Request;

/**
 * Получение списка групп пользователя
 * Class GroupGetUserGroupsV2
 *
 * @package OkSdk\Group
 */
class GroupGetUserGroupsV2 extends Request
{
    /** @var GroupSmall[] $groups */
    private $groups = [];
    /** @var string $anchor */
    private $anchor = '';

    /**
     * @return GroupSmall[]
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @return string
     */
    public function getAnchor()
    {
        return $this->anchor;
    }

    /**
     * Идентификатор пользователя, список групп которого необходимо получить
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
     * Идентификатор постраничного вывода
     *
     * @param string $anchor
     *
     * @return $this
     */
    public function setAnchor($anchor)
    {
        $this->okarg_anchor = $anchor;

        return $this;
    }

    /**
     * Направление постраничного вывода
     *
     * @param $direction
     *
     * @return $this
     */
    public function setDirection($direction)
    {
        $this->okarg_direction = $direction;

        return $this;
    }

    /**
     * Количество возвращаемых результатов
     *
     * @param integer $count
     *
     * @return $this
     */
    public function setCount($count)
    {
        $this->okarg_count = $count;

        return $this;
    }

    /**
     * result in $this->getGroups();
     * {@inheritdoc}
     */
    public function doRequest()
    {
        $result = $this->execApi();
        if ($result && ($json = $this->getJsonResponse())) {
            foreach ($json->groups as $item) {
                $group = new GroupSmall();
                $group->fillByJson($item);
                $this->groups[] = $group;
            }
            $this->anchor = $json->anchor;

            return true;
        }

        return false;
    }

    /** @inheritdoc */
    public function getMethod()
    {
        return 'group.getUserGroupsV2';
    }
}
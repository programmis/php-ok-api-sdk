<?php
/**
 * Created by PhpStorm.
 * User: daniil
 * Date: 11.11.16
 * Time: 14:53
 */

namespace OkSdk\Group;

use OkSdk\Group\Includes\Group;
use OkSdk\Includes\Request;

/**
 * Получение информации о группах
 * Class GroupGetInfo
 *
 * @package OkSdk\Group
 */
class GroupGetInfo extends Request
{
    /** @var array $uids */
    private $uids = [];
    /** @var array $fields */
    private $fields = [];
    /** @var Group[] $groups */
    private $groups = [];

    /**
     * @return Group[]
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * Если вызов происходит от имени пользователя, а пользователь состоит в запрашиваемой группе,
     * то данная группа перемещается на верх в списке групп пользователя. Имеет смысл,
     * только если запрашиваемая группа единственная. По умолчанию false.
     *
     * @param boolean $move_to_top
     *
     * @return $this
     */
    public function setMoveToTop($move_to_top)
    {
        $this->okarg_move_to_top = $move_to_top;

        return $this;
    }

    /**
     * Список идентификаторов групп, разделённых запятой, о которых нужно запросить информацию
     *
     * @param string $uid
     *
     * @return $this
     */
    public function addUid($uid)
    {
        $this->uids[] = $uid;

        return $this;
    }

    /**
     * Список запрашиваемых полей
     *
     * @param string $field
     *
     * @return $this
     */
    public function addField($field)
    {
        $this->fields[] = $field;

        return $this;
    }

    /**
     * Список идентификаторов групп, разделённых запятой, о которых нужно запросить информацию
     *
     * @param array $uids
     */
    public function setUids($uids)
    {
        $this->uids = $uids;

        return $this;
    }

    /**
     * Список запрашиваемых полей
     *
     * @param array $fields
     */
    public function setFields($fields)
    {
        $this->fields = $fields;

        return $this;
    }

    /**
     * result in $this->getGroups();
     * {@inheritdoc}
     */
    public function doRequest()
    {
        $this->setRequiredParams(['uids', 'fields']);
        if ($this->uids) {
            $this->setParameter('uids', $this->uids);
        }
        if ($this->fields) {
            $this->setParameter('fields', $this->fields);
        }

        $result = $this->execApi();
        if ($result && ($json = $this->getJsonResponse())) {
            foreach ($json as $item) {
                $group = new Group();
                $group->fillByJson($item);
                $this->groups[] = $group;
            }
            return true;
        }
    }

    /** @inheritdoc */
    public function getMethod()
    {
        return 'group.getInfo';
    }
}

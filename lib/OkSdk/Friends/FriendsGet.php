<?php
/**
 * Created by PhpStorm.
 * User: daniil
 * Date: 11.11.16
 * Time: 16:36
 */

namespace OkSdk\Friends;

use OkSdk\Includes\Request;

/**
 * Возвращает идентификаторы пользователей, являющихся друзьями текущего пользователя.
 * Class FriendsGet
 *
 * @package OkSdk\Friends
 */
class FriendsGet extends Request
{
    /** @var integer $count */
    private $count;
    /** @var array $uids */
    private $uids = [];

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return array
     */
    public function getUids()
    {
        return $this->uids;
    }

    /**
     * Идентификатор пользователя, от имени которого нужно запросить список друзей.
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
     * Идентификатор пользователя, список друзей которого нужно получить.
     * Если не указано возвращается список друзей текущего пользователя.
     *
     * @param string $fid
     *
     * @return $this
     */
    public function setFid($fid)
    {
        $this->okarg_fid = $fid;

        return $this;
    }

    /**
     * Тип сортировки. На данный момент доступны следующие типы:
     * PRESENT — сортирует друзей на основании того, как часто uid дарит другу подарки на портале.
     * Наиболее часто одариваемые подарками друзья будут впереди.
     *
     * @param string $sort_type
     *
     * @return $this
     */
    public function setSortType($sort_type)
    {
        $this->okarg_sort_type = $sort_type;

        return $this;
    }

    /** @inheritdoc */
    public function getMethod()
    {
        return 'friends.get';
    }

    /**
     * result in $this->getCount(); and $this->getUids();
     * {@inheritdoc}
     */
    public function doRequest()
    {
        $result = $this->execApi();
        if ($result && ($json = $this->getJsonResponse())) {
            foreach ($json as $item) {
                $this->uids[] = $item;
            }
            $this->count = count($json);

            return true;
        }

        return false;
    }
}

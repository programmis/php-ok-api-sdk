<?php
/**
 * Created by PhpStorm.
 * User: daniil
 * Date: 11.11.16
 * Time: 16:02
 */

namespace OkSdk\Group\Includes;
use lib\AutoFillObject;

/**
 * Class Group
 *
 * @package OkSdk\Group\Includes
 */
class Group
{
    use AutoFillObject;

    /** @var string $abbreviation */
    private $abbreviation;
    /** @var string $address */
    private $address;
    /** @var string $admin */
    private $admin;
    /** @var array $attrs */
    private $attrs = [];
    /** @var boolean $business */
    private $business;
    /** @var string $category */
    private $category;
    /** @var string $city */
    private $city;
    /** @var boolean $community */
    private $community;
    /** @var string $country */
    private $country;
    /** @var integer $created_ms */
    private $created_ms;
    /** @var string $description */
    private $description;
    /** @var integer $end_date */
    private $end_date;
    /** @var boolean $feed_subscription */
    private $feed_subscription;
    /** @var string $homepage_name */
    private $homepage_name;
    /** @var string $homepage_url */
    private $homepage_url;
    /** @var integer $location_id */
    private $location_id;
    /** @var double $location_latitude */
    private $location_latitude;
    /** @var double $location_longitude */
    private $location_longitude;
    /** @var integer $location_zoom */
    private $location_zoom;
    /** @var integer $main_photo */
    private $main_photo;
    /** @var integer $members_count */
    private $members_count;
    /** @var string $name */
    private $name;
    /** @var boolean $notifications_subscription */
    private $notifications_subscription;
    /** @var string $phone */
    private $phone;
    /** @var string $photo_id */
    private $photo_id;
    /** @var string $picAvatar */
    private $picAvatar;
    /** @var integer $possible_members_count */
    private $possible_members_count;
    /** @var boolean $premium */
    private $premium;
    /** @var boolean $private */
    private $private;
    /** @var string $ref */
    private $ref;
    /** @var string $scope_id */
    private $scope_id;
    /** @var boolean $shop_visible_admin */
    private $shop_visible_admin;
    /** @var boolean $shop_visible_public */
    private $shop_visible_public;
    /** @var string $shortname */
    private $shortname;
    /** @var integer $start_date */
    private $start_date;
    /** @var string $status */
    private $status;
    /** @var string $subcategory_id */
    private $subcategory_id;
    /** @var string $uid */
    private $uid;
    /** @var boolean $video_tab_hidden */
    private $video_tab_hidden;
    /** @var integer $year_from */
    private $year_from;
    /** @var integer $year_to */
    private $year_to;

    /**
     * @return string
     */
    public function getAbbreviation()
    {
        return $this->abbreviation;
    }

    /**
     * @param string $abbreviation
     */
    public function setAbbreviation($abbreviation)
    {
        $this->abbreviation = $abbreviation;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * @param string $admin
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;

        return $this;
    }

    /**
     * @return array
     */
    public function getAttrs()
    {
        return $this->attrs;
    }

    /**
     * @param array $attrs
     */
    public function setAttrs($attrs)
    {
        $this->attrs = $attrs;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isBusiness()
    {
        return $this->business;
    }

    /**
     * @param boolean $business
     */
    public function setBusiness($business)
    {
        $this->business = $business;

        return $this;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isCommunity()
    {
        return $this->community;
    }

    /**
     * @param boolean $community
     */
    public function setCommunity($community)
    {
        $this->community = $community;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedMs()
    {
        return $this->created_ms;
    }

    /**
     * @param int $created_ms
     */
    public function setCreatedMs($created_ms)
    {
        $this->created_ms = $created_ms;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return int
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * @param int $end_date
     */
    public function setEndDate($end_date)
    {
        $this->end_date = $end_date;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isFeedSubscription()
    {
        return $this->feed_subscription;
    }

    /**
     * @param boolean $feed_subscription
     */
    public function setFeedSubscription($feed_subscription)
    {
        $this->feed_subscription = $feed_subscription;

        return $this;
    }

    /**
     * @return string
     */
    public function getHomepageName()
    {
        return $this->homepage_name;
    }

    /**
     * @param string $homepage_name
     */
    public function setHomepageName($homepage_name)
    {
        $this->homepage_name = $homepage_name;

        return $this;
    }

    /**
     * @return string
     */
    public function getHomepageUrl()
    {
        return $this->homepage_url;
    }

    /**
     * @param string $homepage_url
     */
    public function setHomepageUrl($homepage_url)
    {
        $this->homepage_url = $homepage_url;

        return $this;
    }

    /**
     * @return int
     */
    public function getLocationId()
    {
        return $this->location_id;
    }

    /**
     * @param int $location_id
     */
    public function setLocationId($location_id)
    {
        $this->location_id = $location_id;

        return $this;
    }

    /**
     * @return float
     */
    public function getLocationLatitude()
    {
        return $this->location_latitude;
    }

    /**
     * @param float $location_latitude
     */
    public function setLocationLatitude($location_latitude)
    {
        $this->location_latitude = $location_latitude;

        return $this;
    }

    /**
     * @return float
     */
    public function getLocationLongitude()
    {
        return $this->location_longitude;
    }

    /**
     * @param float $location_longitude
     */
    public function setLocationLongitude($location_longitude)
    {
        $this->location_longitude = $location_longitude;

        return $this;
    }

    /**
     * @return int
     */
    public function getLocationZoom()
    {
        return $this->location_zoom;
    }

    /**
     * @param int $location_zoom
     */
    public function setLocationZoom($location_zoom)
    {
        $this->location_zoom = $location_zoom;

        return $this;
    }

    /**
     * @return int
     */
    public function getMainPhoto()
    {
        return $this->main_photo;
    }

    /**
     * @param int $main_photo
     */
    public function setMainPhoto($main_photo)
    {
        $this->main_photo = $main_photo;

        return $this;
    }

    /**
     * @return int
     */
    public function getMembersCount()
    {
        return $this->members_count;
    }

    /**
     * @param int $members_count
     */
    public function setMembersCount($members_count)
    {
        $this->members_count = $members_count;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isNotificationsSubscription()
    {
        return $this->notifications_subscription;
    }

    /**
     * @param boolean $notifications_subscription
     */
    public function setNotificationsSubscription($notifications_subscription)
    {
        $this->notifications_subscription = $notifications_subscription;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

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
     */
    public function setPhotoId($photo_id)
    {
        $this->photo_id = $photo_id;

        return $this;
    }

    /**
     * @return string
     */
    public function getPicAvatar()
    {
        return $this->picAvatar;
    }

    /**
     * @param string $picAvatar
     */
    public function setPicAvatar($picAvatar)
    {
        $this->picAvatar = $picAvatar;

        return $this;
    }

    /**
     * @return int
     */
    public function getPossibleMembersCount()
    {
        return $this->possible_members_count;
    }

    /**
     * @param int $possible_members_count
     */
    public function setPossibleMembersCount($possible_members_count)
    {
        $this->possible_members_count = $possible_members_count;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isPremium()
    {
        return $this->premium;
    }

    /**
     * @param boolean $premium
     */
    public function setPremium($premium)
    {
        $this->premium = $premium;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isPrivate()
    {
        return $this->private;
    }

    /**
     * @param boolean $private
     */
    public function setPrivate($private)
    {
        $this->private = $private;

        return $this;
    }

    /**
     * @return string
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param string $ref
     */
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * @return string
     */
    public function getScopeId()
    {
        return $this->scope_id;
    }

    /**
     * @param string $scope_id
     */
    public function setScopeId($scope_id)
    {
        $this->scope_id = $scope_id;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isShopVisibleAdmin()
    {
        return $this->shop_visible_admin;
    }

    /**
     * @param boolean $shop_visible_admin
     */
    public function setShopVisibleAdmin($shop_visible_admin)
    {
        $this->shop_visible_admin = $shop_visible_admin;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isShopVisiblePublic()
    {
        return $this->shop_visible_public;
    }

    /**
     * @param boolean $shop_visible_public
     */
    public function setShopVisiblePublic($shop_visible_public)
    {
        $this->shop_visible_public = $shop_visible_public;

        return $this;
    }

    /**
     * @return string
     */
    public function getShortname()
    {
        return $this->shortname;
    }

    /**
     * @param string $shortname
     */
    public function setShortname($shortname)
    {
        $this->shortname = $shortname;

        return $this;
    }

    /**
     * @return int
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * @param int $start_date
     */
    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;

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
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubcategoryId()
    {
        return $this->subcategory_id;
    }

    /**
     * @param string $subcategory_id
     */
    public function setSubcategoryId($subcategory_id)
    {
        $this->subcategory_id = $subcategory_id;

        return $this;
    }

    /**
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param string $uid
     */
    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isVideoTabHidden()
    {
        return $this->video_tab_hidden;
    }

    /**
     * @param boolean $video_tab_hidden
     */
    public function setVideoTabHidden($video_tab_hidden)
    {
        $this->video_tab_hidden = $video_tab_hidden;

        return $this;
    }

    /**
     * @return int
     */
    public function getYearFrom()
    {
        return $this->year_from;
    }

    /**
     * @param int $year_from
     */
    public function setYearFrom($year_from)
    {
        $this->year_from = $year_from;

        return $this;
    }

    /**
     * @return int
     */
    public function getYearTo()
    {
        return $this->year_to;
    }

    /**
     * @param int $year_to
     */
    public function setYearTo($year_to)
    {
        $this->year_to = $year_to;

        return $this;
    }
}
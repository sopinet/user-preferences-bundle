<?php
namespace Sopinet\UserPreferencesBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Created by PhpStorm.
 * User: hud
 * Date: 5/05/15
 * Time: 12:54
 */
trait HasSettingsTrait
{
    /**
     * @var ArrayCollection
     */
    protected $uservalues;

    public function addUserValue(\Sopinet\UserPreferencesBundle\Entity\UserValue $userValue)
    {
        $this->uservalues->add($userValue);

        return $this;
    }

    public function removeUserValue(\Sopinet\UserPreferencesBundle\Entity\UserValue $userValue)
    {
        $this->uservalues->removeElement($userValue);
    }

    public function getUserValues()
    {
        return $this->uservalues;
    }

    public function setUserValues(ArrayCollection $userValues)
    {
        $this->uservalues = $userValues;

        return $this;
    }
}
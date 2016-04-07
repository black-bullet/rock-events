<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * RatingGroup class
 *
 * @author Yevgeniy Zholkevskiy <blackbullet@i.ua>
 *
 * @ORM\Table(name="ratings_to_groups")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RatingGroupRepository")
 *
 * @Gedmo\Loggable
 */
class RatingGroup
{
    use TimestampableEntity, BlameableEntityTrait;

    /**
     * @var int $id ID
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var User $user User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="ratingGroups")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     *
     * @Assert\NotBlank()
     *
     * @Gedmo\Versioned
     */
    private $user;

    /**
     * @var RatingCategory $category RatingCategory
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\RatingCategory", inversedBy="ratingGroups")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     *
     * @Assert\NotBlank()
     *
     * @Gedmo\Versioned
     */
    private $category;

    /**
     * @var Group $group Group
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Group", inversedBy="ratingGroups")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     *
     * @Assert\NotBlank()
     *
     * @Gedmo\Versioned
     */
    private $group;

    /**
     * @var int $mark Mark
     *
     * @ORM\Column(type="integer", nullable=false)
     *
     * @Assert\Type(type="integer")
     *
     * @Gedmo\Versioned
     */
    private $mark;

    /**
     * Get ID
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set user
     *
     * @param User $user User
     *
     * @return $this
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Set mark
     *
     * @param int $mark Mark
     *
     * @return $this
     */
    public function setMark($mark)
    {
        $this->mark = $mark;

        return $this;
    }

    /**
     * Get mark
     *
     * @return int
     */
    public function getMark()
    {
        return $this->mark;
    }

    /**
     * Set category
     *
     * @param RatingCategory $category Category of rating
     *
     * @return $this
     */
    public function setCategory(RatingCategory $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return RatingCategory Category of rating
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set group
     *
     * @param Group $group Group
     *
     * @return $this
     */
    public function setGroup(Group $group)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return Group Group
     */
    public function getGroup()
    {
        return $this->group;
    }
}

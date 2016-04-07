<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * RatingCategory Entity
 *
 * @author Yevgeniy Zholkevskiy <blackbullet@i.ua>
 *
 * @ORM\Table(name="ratings_to_categories")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RatingCategoryRepository")
 *
 * @Gedmo\Loggable
 */
class RatingCategory
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
     * @var ArrayCollection|RatingGroup[] $ratingGroups Rating Group
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\RatingGroup", mappedBy="category", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $ratingGroups;

    /**
     * @var string $name Name
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     *
     * @Assert\NotBlank()
     * @Assert\Length(min="5", max="255")
     * @Assert\Type(type="string")
     *
     * @Gedmo\Versioned
     */
    private $name;

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
     * Set name
     *
     * @param string $name Name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add ratingGroup
     *
     * @param RatingGroup $ratingGroup Rating Group
     *
     * @return $this
     */
    public function addRatingGroup(RatingGroup $ratingGroup)
    {
        $this->ratingGroups[] = $ratingGroup;

        return $this;
    }

    /**
     * Remove ratingGroup
     *
     * @param RatingGroup $ratingGroup Rating Group
     */
    public function removeRatingGroup(RatingGroup $ratingGroup)
    {
        $this->ratingGroups->removeElement($ratingGroup);
    }

    /**
     * Set rating group
     *
     * @param ArrayCollection|RatingGroup[] $ratingGroups Rating Group
     *
     * @return $this
     */
    public function setRatingGroups(ArrayCollection $ratingGroups)
    {
        foreach ($ratingGroups as $ratingGroup) {
            $ratingGroup->setCategory($this);
        }
        $this->ratingGroups = $ratingGroups;

        return $this;
    }

    /**
     * Get ratingGroups
     *
     * @return ArrayCollection|RatingGroup[] Rating Group
     */
    public function getRatingGroups()
    {
        return $this->ratingGroups;
    }
}

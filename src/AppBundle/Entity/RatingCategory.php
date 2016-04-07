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
     * @var Genre $subCategoryGenre Sub category genre
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Genre", inversedBy="ratingCategories")
     * @ORM\JoinColumn(nullable=true, onDelete="CASCADE")
     *
     * @Gedmo\Versioned
     */
    private $subCategoryGenre;

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
     * @var string $subCategoryCountry Sub category country
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     *
     * @Assert\NotBlank()
     * @Assert\Length(min="2", max="100")
     * @Assert\Type(type="string")
     */
    private $subCategoryCountry;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ratingGroups = new ArrayCollection();
    }

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

    /**
     * Set subCategoryCountry
     *
     * @param string $subCategoryCountry Sub category country
     *
     * @return $this
     */
    public function setSubCategoryCountry($subCategoryCountry)
    {
        $this->subCategoryCountry = $subCategoryCountry;

        return $this;
    }

    /**
     * Get subCategoryCountry
     *
     * @return string
     */
    public function getSubCategoryCountry()
    {
        return $this->subCategoryCountry;
    }

    /**
     * Set subCategoryGenre
     *
     * @param Genre $subCategoryGenre Sub Category Genre
     *
     * @return $this
     */
    public function setSubCategoryGenre(Genre $subCategoryGenre = null)
    {
        $this->subCategoryGenre = $subCategoryGenre;

        return $this;
    }

    /**
     * Get subCategoryGenre
     *
     * @return Genre Genre
     */
    public function getSubCategoryGenre()
    {
        return $this->subCategoryGenre;
    }
}

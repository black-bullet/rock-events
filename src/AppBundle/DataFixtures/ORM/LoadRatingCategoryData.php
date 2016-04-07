<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Genre;
use AppBundle\Entity\RatingCategory;
use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * LoadRatingCategoryData class
 *
 * @author Yevgeniy Zholkevskiy <blackbullet@i.ua>
 */
class LoadRatingCategoryData extends AbstractFixture implements DependentFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function getDependencies()
    {
        return [
            'AppBundle\DataFixtures\ORM\LoadUserData',
            'AppBundle\DataFixtures\ORM\LoadGenreData',
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        /**
         * @var User $user
         */
        $user = $this->getReference('user-manager');

        /** @var Genre $alternative */
        /** @var Genre $indi */
        /** @var Genre $punk */
        $alternative = $this->getReference('genre-alternative');
        $indi        = $this->getReference('genre-indi');
        $punk        = $this->getReference('genre-punk');

        $category1 = (new RatingCategory())
            ->setName('Усі гурти')
            ->setSubCategoryCountry('Україна')
            ->setCreatedBy($user)
            ->setUpdatedBy($user);
        $this->setReference('rating-category-ukraine', $category1);
        $manager->persist($category1);

        $category2 = (new RatingCategory())
            ->setName('Країна')
            ->setSubCategoryCountry('США')
            ->setCreatedBy($user)
            ->setUpdatedBy($user);
        $this->setReference('rating-category-usa', $category2);
        $manager->persist($category2);

        $category3 = (new RatingCategory())
            ->setName('Стиль')
            ->setSubCategoryGenre($alternative)
            ->setCreatedBy($user)
            ->setUpdatedBy($user);
        $this->setReference('rating-category-alternative', $category3);
        $manager->persist($category3);

        $category4 = (new RatingCategory())
            ->setName('Стиль')
            ->setSubCategoryGenre($indi)
            ->setCreatedBy($user)
            ->setUpdatedBy($user);
        $this->setReference('rating-category-indi', $category4);
        $manager->persist($category4);

        $category5 = (new RatingCategory())
            ->setName('Стиль')
            ->setSubCategoryGenre($punk)
            ->setCreatedBy($user)
            ->setUpdatedBy($user);
        $this->setReference('rating-category-punk', $category5);
        $manager->persist($category5);

        $manager->flush();
    }
}

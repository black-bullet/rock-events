<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Group;
use AppBundle\Entity\RatingCategory;
use AppBundle\Entity\RatingGroup;
use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * LoadRatingGroupData class
 *
 * @author Yevgeniy Zholkevskiy <blackbullet@i.ua>
 */
class LoadRatingGroupData extends AbstractFixture implements DependentFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function getDependencies()
    {
        return [
            'AppBundle\DataFixtures\ORM\LoadUserData',
            'AppBundle\DataFixtures\ORM\LoadGroupData',
            'AppBundle\DataFixtures\ORM\LoadRatingCategoryData',
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        /** @var RatingCategory $categoryUkraine */
        /** @var RatingCategory $categoryUSA */
        /** @var RatingCategory $categoryAlternative */
        /** @var RatingCategory $categoryIndi */
        /** @var RatingCategory $categoryPunk */
        $categoryUkraine     = $this->getReference('rating-category-ukraine');
        $categoryUSA         = $this->getReference('rating-category-usa');
        $categoryAlternative = $this->getReference('rating-category-alternative');
        $categoryIndi        = $this->getReference('rating-category-indi');

        /** @var Group $groupBMTH */
        /** @var Group $groupJinjer */
        /** @var Group $groupAntiFlag */
        /** @var Group $groupRHCP */
        /** @var Group $groupFFDP */
        /** @var Group $groupColdplay */
        /** @var Group $groupOneRepublic */
        /** @var Group $groupDragon */
        /** @var Group $groupTorvald */
        /** @var Group $groupSomali */
        $groupBMTH        = $this->getReference('group-bmth');
        $groupJinjer      = $this->getReference('group-jinjer');
        $groupAntiFlag    = $this->getReference('group-anti-flag');
        $groupRHCP        = $this->getReference('group-rhcp');
        $groupFFDP        = $this->getReference('group-ffdp');
        $groupColdplay    = $this->getReference('group-coldplay');
        $groupOneRepublic = $this->getReference('group-onerepublic');
        $groupDragon      = $this->getReference('group-gragon');
        $groupTorvald     = $this->getReference('group-torvald');
        $groupSomali      = $this->getReference('group-somali');

        /** @var User $user1 */
        /** @var User $user2 */
        /** @var User $user3 */
        $user1 = $this->getReference('user-manager');
        $user2 = $this->getReference('user-admin');
        $user3 = $this->getReference('user-user');

        $rating1 = (new RatingGroup())
            ->setCategory($categoryUkraine)
            ->setGroup($groupJinjer)
            ->setMark(5)
            ->setUser($user1)
            ->setCreatedBy($user1)
            ->setUpdatedBy($user1);
        $manager->persist($rating1);

        $rating2 = (new RatingGroup())
            ->setCategory($categoryUkraine)
            ->setGroup($groupSomali)
            ->setMark(4)
            ->setUser($user1)
            ->setCreatedBy($user1)
            ->setUpdatedBy($user1);
        $manager->persist($rating2);

        $rating3 = (new RatingGroup())
            ->setCategory($categoryUkraine)
            ->setGroup($groupTorvald)
            ->setMark(3)
            ->setUser($user1)
            ->setCreatedBy($user1)
            ->setUpdatedBy($user1);
        $manager->persist($rating3);

        $rating4 = (new RatingGroup())
            ->setCategory($categoryUkraine)
            ->setGroup($groupTorvald)
            ->setMark(5)
            ->setUser($user2)
            ->setCreatedBy($user2)
            ->setUpdatedBy($user2);
        $manager->persist($rating4);

        $rating5 = (new RatingGroup())
            ->setCategory($categoryUkraine)
            ->setGroup($groupJinjer)
            ->setMark(4)
            ->setUser($user2)
            ->setCreatedBy($user2)
            ->setUpdatedBy($user2);
        $manager->persist($rating5);

        $rating6 = (new RatingGroup())
            ->setCategory($categoryUkraine)
            ->setGroup($groupSomali)
            ->setMark(3)
            ->setUser($user2)
            ->setCreatedBy($user2)
            ->setUpdatedBy($user2);
        $manager->persist($rating6);

        $rating7 = (new RatingGroup())
            ->setCategory($categoryUkraine)
            ->setGroup($groupTorvald)
            ->setMark(5)
            ->setUser($user3)
            ->setCreatedBy($user3)
            ->setUpdatedBy($user3);
        $manager->persist($rating7);

        $rating8 = (new RatingGroup())
            ->setCategory($categoryUkraine)
            ->setGroup($groupJinjer)
            ->setMark(4)
            ->setUser($user3)
            ->setCreatedBy($user3)
            ->setUpdatedBy($user3);
        $manager->persist($rating8);

        $rating9 = (new RatingGroup())
            ->setCategory($categoryUkraine)
            ->setGroup($groupSomali)
            ->setMark(3)
            ->setUser($user3)
            ->setCreatedBy($user3)
            ->setUpdatedBy($user3);
        $manager->persist($rating9);

        $rating10 = (new RatingGroup())
            ->setCategory($categoryUSA)
            ->setGroup($groupAntiFlag)
            ->setMark(5)
            ->setUser($user1)
            ->setCreatedBy($user1)
            ->setUpdatedBy($user1);
        $manager->persist($rating10);

        $rating11 = (new RatingGroup())
            ->setCategory($categoryUSA)
            ->setGroup($groupRHCP)
            ->setMark(4)
            ->setUser($user1)
            ->setCreatedBy($user1)
            ->setUpdatedBy($user1);
        $manager->persist($rating11);

        $rating12 = (new RatingGroup())
            ->setCategory($categoryUSA)
            ->setGroup($groupFFDP)
            ->setMark(3)
            ->setUser($user1)
            ->setCreatedBy($user1)
            ->setUpdatedBy($user1);
        $manager->persist($rating12);

        $rating13 = (new RatingGroup())
            ->setCategory($categoryUSA)
            ->setGroup($groupRHCP)
            ->setMark(5)
            ->setUser($user2)
            ->setCreatedBy($user2)
            ->setUpdatedBy($user2);
        $manager->persist($rating13);

        $rating14 = (new RatingGroup())
            ->setCategory($categoryUSA)
            ->setGroup($groupDragon)
            ->setMark(4)
            ->setUser($user2)
            ->setCreatedBy($user2)
            ->setUpdatedBy($user2);
        $manager->persist($rating14);

        $rating15 = (new RatingGroup())
            ->setCategory($categoryUSA)
            ->setGroup($groupOneRepublic)
            ->setMark(3)
            ->setUser($user2)
            ->setCreatedBy($user2)
            ->setUpdatedBy($user2);
        $manager->persist($rating15);

        $rating16 = (new RatingGroup())
            ->setCategory($categoryUSA)
            ->setGroup($groupRHCP)
            ->setMark(5)
            ->setUser($user3)
            ->setCreatedBy($user3)
            ->setUpdatedBy($user3);
        $manager->persist($rating16);

        $rating17 = (new RatingGroup())
            ->setCategory($categoryUSA)
            ->setGroup($groupOneRepublic)
            ->setMark(4)
            ->setUser($user3)
            ->setCreatedBy($user3)
            ->setUpdatedBy($user3);
        $manager->persist($rating17);

        $rating18 = (new RatingGroup())
            ->setCategory($categoryUSA)
            ->setGroup($groupFFDP)
            ->setMark(3)
            ->setUser($user3)
            ->setCreatedBy($user3)
            ->setUpdatedBy($user3);
        $manager->persist($rating18);

        $rating19 = (new RatingGroup())
            ->setCategory($categoryAlternative)
            ->setGroup($groupTorvald)
            ->setMark(5)
            ->setUser($user1)
            ->setCreatedBy($user1)
            ->setUpdatedBy($user1);
        $manager->persist($rating19);

        $rating20 = (new RatingGroup())
            ->setCategory($categoryAlternative)
            ->setGroup($groupBMTH)
            ->setMark(4)
            ->setUser($user1)
            ->setCreatedBy($user1)
            ->setUpdatedBy($user1);
        $manager->persist($rating20);

        $rating21 = (new RatingGroup())
            ->setCategory($categoryAlternative)
            ->setGroup($groupColdplay)
            ->setMark(3)
            ->setUser($user1)
            ->setCreatedBy($user1)
            ->setUpdatedBy($user1);
        $manager->persist($rating21);

        $rating22 = (new RatingGroup())
            ->setCategory($categoryAlternative)
            ->setGroup($groupRHCP)
            ->setMark(5)
            ->setUser($user1)
            ->setCreatedBy($user1)
            ->setUpdatedBy($user1);
        $manager->persist($rating22);

        $rating23 = (new RatingGroup())
            ->setCategory($categoryAlternative)
            ->setGroup($groupBMTH)
            ->setMark(4)
            ->setUser($user1)
            ->setCreatedBy($user1)
            ->setUpdatedBy($user1);
        $manager->persist($rating23);

        $rating24 = (new RatingGroup())
            ->setCategory($categoryAlternative)
            ->setGroup($groupAntiFlag)
            ->setMark(3)
            ->setUser($user1)
            ->setCreatedBy($user1)
            ->setUpdatedBy($user1);
        $manager->persist($rating24);

        $rating25 = (new RatingGroup())
            ->setCategory($categoryAlternative)
            ->setGroup($groupRHCP)
            ->setMark(5)
            ->setUser($user1)
            ->setCreatedBy($user1)
            ->setUpdatedBy($user1);
        $manager->persist($rating25);

        $rating26 = (new RatingGroup())
            ->setCategory($categoryAlternative)
            ->setGroup($groupColdplay)
            ->setMark(4)
            ->setUser($user1)
            ->setCreatedBy($user1)
            ->setUpdatedBy($user1);
        $manager->persist($rating26);

        $rating27 = (new RatingGroup())
            ->setCategory($categoryAlternative)
            ->setGroup($groupBMTH)
            ->setMark(3)
            ->setUser($user1)
            ->setCreatedBy($user1)
            ->setUpdatedBy($user1);
        $manager->persist($rating27);

        $rating28 = (new RatingGroup())
            ->setCategory($categoryIndi)
            ->setGroup($groupDragon)
            ->setMark(5)
            ->setUser($user1)
            ->setCreatedBy($user1)
            ->setUpdatedBy($user1);
        $manager->persist($rating28);

        $rating29 = (new RatingGroup())
            ->setCategory($categoryIndi)
            ->setGroup($groupOneRepublic)
            ->setMark(4)
            ->setUser($user1)
            ->setCreatedBy($user1)
            ->setUpdatedBy($user1);
        $manager->persist($rating29);

        $rating30 = (new RatingGroup())
            ->setCategory($categoryIndi)
            ->setGroup($groupColdplay)
            ->setMark(3)
            ->setUser($user1)
            ->setCreatedBy($user1)
            ->setUpdatedBy($user1);
        $manager->persist($rating30);

        $rating31 = (new RatingGroup())
            ->setCategory($categoryIndi)
            ->setGroup($groupColdplay)
            ->setMark(5)
            ->setUser($user2)
            ->setCreatedBy($user2)
            ->setUpdatedBy($user2);
        $manager->persist($rating31);

        $rating32 = (new RatingGroup())
            ->setCategory($categoryIndi)
            ->setGroup($groupDragon)
            ->setMark(4)
            ->setUser($user2)
            ->setCreatedBy($user2)
            ->setUpdatedBy($user2);
        $manager->persist($rating32);

        $rating33 = (new RatingGroup())
            ->setCategory($categoryIndi)
            ->setGroup($groupOneRepublic)
            ->setMark(3)
            ->setUser($user2)
            ->setCreatedBy($user2)
            ->setUpdatedBy($user2);
        $manager->persist($rating33);

        $manager->flush();
    }
}

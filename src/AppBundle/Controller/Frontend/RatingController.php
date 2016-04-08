<?php

namespace AppBundle\Controller\Frontend;

use AppBundle\Entity\Group;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Frontend RatingController
 *
 * @author Yevgeniy Zholkevskiy <blackbullet@i.ua>
 */
class RatingController extends Controller
{
    /**
     * Rating list
     *
     * @return Response
     *
     * @Route("/ratings", name="rating_list")
     */
    public function listAction()
    {
        $groupRepository = $this->getDoctrine()->getRepository('AppBundle:Group');

        $groups           = $groupRepository->findGroupsWithRatingCategoryStars();
        $groupCountries   = $groupRepository->findAllCountriesByGroups();
        $groupGenres      = $this->getDoctrine()->getRepository('AppBundle:Genre')->findAllActiveGenres();
        $ratingCategories = $this->getDoctrine()->getRepository('AppBundle:RatingCategory')->findAll();
        $ratingGroups     = $this->getDoctrine()->getRepository('AppBundle:RatingGroup')->findAll();

        return $this->render('AppBundle:frontend/rating:list.html.twig', [
            'groups'           => $groups,
            'groupCountries'   => $groupCountries,
            'groupGenres'      => $groupGenres,
            'ratingCategories' => $ratingCategories,
            'ratingGroups'     => $ratingGroups,
        ]);
    }
}

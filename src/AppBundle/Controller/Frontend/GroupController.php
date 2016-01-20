<?php

namespace AppBundle\Controller\Frontend;

use AppBundle\Entity\Genre;
use AppBundle\Entity\Group;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * Frontend GroupController
 *
 * @author Yevgeniy Zholkevskiy <blackbullet@i.ua>
 */
class GroupController extends Controller
{
    /**
     * Group list
     *
     * @return Response
     *
     * @Method("GET")
     * @Route("/groups", name="group_list")
     */
    public function listAction()
    {
        $groups = $this->getDoctrine()->getRepository('AppBundle:Group')->findAll();

        return $this->render('AppBundle:frontend\group:list.html.twig', [
            'groups' => $groups,
        ]);
    }

    /**
     * Group show
     *
     * @param Group $slug Group
     *
     * @return Response
     *
     * @Method("GET")
     * @Route("/group/{slug}", name="group_show")
     * @ParamConverter("group", class="AppBundle:Group")
     */
    public function showAction(Group $group)
    {
        $genres = $this->getDoctrine()->getRepository('AppBundle:Group')->getGenres($group);

        return $this->render('AppBundle:frontend\group:show.html.twig', [
            'group'  => $group,
            'genres' => $genres
        ]);
    }

    /**
     * Groups by genre
     *
     * @param Genre $slug Genre
     *
     * @return Response
     *
     * @Method("GET")
     * @Route("/groups/genre/{slug}", name="group_genre")
     * @ParamConverter("genre", class="AppBundle:Genre")
     */
    public function genreAction(Genre $genre)
    {
        $groups = $this->getDoctrine()->getRepository('AppBundle:Group')->getGroupsByGenre($genre);

        return $this->render('AppBundle:frontend/group:genre.html.twig', [
            'groups' => $groups,
            'genre'  => $genre
        ]);
    }

    /**
     * Events by group
     *
     * @param Group $slug Group
     *
     * @return Response
     *
     * @Method("GET")
     * @Route("/group/{slug}/events", name="group_event")
     * @ParamConverter("group", class="AppBundle:Group")
     */
    public function eventAction(Group $group)
    {
        $events = $this->getDoctrine()->getRepository('AppBundle:Group')->getEventsByGroup($group);

        return $this->render('AppBundle:frontend/group:event.html.twig', [
            'events' => $events,
            'group'  => $group
        ]);
    }
}
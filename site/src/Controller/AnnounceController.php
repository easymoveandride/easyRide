<?php
/**
 * Created by PhpStorm.
 * User: nasri
 * Date: 17/06/2019
 * Time: 11:12
 */

namespace App\Controller;


use App\Entity\Announce;
use App\Repository\AnnounceRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Request\ParamFetcher;
use Symfony\Component\HttpFoundation\Response;

class AnnounceController extends AbstractFOSRestController
{
    /**
     * @var AnnounceRepository
     */
    private $announceRepository;

    private $entityManager;

    public function __construct(AnnounceRepository $announceRepository, EntityManagerInterface $entityManager)
    {
        $this->announceRepository = $announceRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Rest\Get("/api/announces", name="api.get.announces")
     */
    public function getAnnouncesAction()
    {
        $data = $this->announceRepository->findAll();
        return $this->view($data, Response::HTTP_OK);
    }

    /**
     * @Rest\Get("/api/announce/{id}", name="api.get.announce")
     * @param Announce $announce The announce your want to get
     * @return \FOS\RestBundle\View\View
     * @internal param int $id The id of announce your want to get
     */
    public function getAnnounce(Announce $announce)
    {
        if ($announce) {
            return $this->view($announce, Response::HTTP_OK);
        }
        return $this->view(['error' => 'Announce not found'], Response::HTTP_NOT_FOUND);
    }

    /**
     * @Rest\Post("/api/announce", name="api.post.announce")
     * @Rest\RequestParam(name="title", description="Title of the announce", nullable=false)
     * @Rest\RequestParam(name="description", description="Description of the announce", nullable=false)
     * @Rest\RequestParam(name="number_of_seats", description="number of places for this announce", nullable=false)
     * @Rest\RequestParam(name="starting_point", description="starting point of the announce", nullable=false)
     * @Rest\RequestParam(name="ending_point", description="ending point of the announce", nullable=false)
     * @param ParamFetcher $paramFetcher
     * @return \FOS\RestBundle\View\View
     */
    public function postAnnounceAction(ParamFetcher $paramFetcher)
    {
        $title = $paramFetcher->get('title');
        $description = $paramFetcher->get('description');
        $numberOfSeats = $paramFetcher->get('number_of_seats');
        $startingPoint = $paramFetcher->get('starting_point');
        $endingPoint = $paramFetcher->get('ending_point');

        if ($title && $description && $numberOfSeats && $startingPoint && $endingPoint) {
            $announce = new Announce();
            $announce->setTitle($title);
            $announce->setDescription($description);
            $announce->setNombreOfSeats(intval($numberOfSeats));
            $announce->setStartingPoint($startingPoint);
            $announce->setEndingPoint($endingPoint);

            $this->entityManager->persist($announce);
            $this->entityManager->flush();

            return $this->view($announce, Response::HTTP_CREATED);
        }

        return $this->view(['error' => 'one of the argument to announce it is missing'], Response::HTTP_BAD_REQUEST);
    }

    /**
     * @Rest\Delete("/api/announce/{id}", name="api.delete.announce")
     * @param Announce $announce The announce you want to deleted.
     * @return \FOS\RestBundle\View\View
     * @internal param int $id The id of announce you want to deleted.
     */
    public function deleteAnnounceAction(Announce $announce)
    {
        $this->entityManager->remove($$announce);
        $this->entityManager->flush();

        return $this->view(null, Response::HTTP_NO_CONTENT);
    }
}

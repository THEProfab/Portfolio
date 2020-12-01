<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Information;

class PortfolioController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $repoInfo = $this->getDoctrine()->getRepository(Information::class);

        $infos = $repoInfo->findAll();

        return $this->render('portfolio/home.html.twig', ['infos' => $infos]);
    }
}

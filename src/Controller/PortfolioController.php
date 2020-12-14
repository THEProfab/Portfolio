<?php

namespace App\Controller;

use App\Entity\Background;
use App\Entity\Experiences;
use App\Entity\Hobby;
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
        $repoForm = $this->getDoctrine()->getRepository(Background::class);
        $repoExp = $this->getDoctrine()->getRepository(Experiences::class);
        $repoLoisirs = $this->getDoctrine()->getRepository(Hobby::class);

        $infos = $repoInfo->findAll();
        $formations = $repoForm->findAll();
        $experiences = $repoExp->findAll();
        $loisirs = $repoLoisirs->findAll();

        return $this->render('portfolio/home.html.twig', ['infos' => $infos, 'formations' => $formations, 'experiences' => $experiences, 'loisirs' => $loisirs]);
    }
}

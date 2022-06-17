<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Image;
use App\Repository\ImageRepository;


class IndexController extends AbstractController
{
    public function index(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $images = $entityManager->getRepository(Image::class)->findAll();
        //dump($image);die;

        return $this->render('index.html.twig', [
            'images' => $images,
        ]);
    }
}
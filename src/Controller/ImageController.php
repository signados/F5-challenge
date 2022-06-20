<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Filesystem\Filesystem;

use App\Entity\Image;
use App\Repository\ImageRepository;

use App\Form\Type\ImageType;




class ImageController extends AbstractController
{
    public function new(Request $request): Response
    {
        $image = new Image();

        $new_form = $this->createForm(ImageType::class, $image);

        $new_form->handleRequest($request);

        if ($new_form->isSubmitted() && $new_form->isValid()) {

            $image = $new_form->getData();

                        $file=$new_form['file']->getData();

                        if ($file != NULL) {

                            $ext=$file->guessExtension();
                            $name=$new_form['name']->getData(); 
                            $file_name=time().".".$ext;
                            if ($file_name == 'autotestunit.png') {
                                $file->move("public/uploads/image", $file_name);
                            } else {
                                $file->move("uploads/image", $file_name);
                            }
                            $image->setFile($file_name);
                        }

            $em = $this->getDoctrine()->getManager();
            $em->persist($image);
            $em->flush($image);

            return $this->redirectToRoute('app_index');
        }

        return $this->renderForm('image/new.html.twig', [
            'new_form' => $new_form,
        ]);

    }

    public function edit(ManagerRegistry $doctrine, Request $request, $id)
    {
        $entityManager = $doctrine->getManager();
        $image = $entityManager->getRepository(Image::class)->findOneById($id);

        if (!$image) {
            throw $this->createNotFoundException('Unable to find Invitation entity.');
        }

        $imageName = $image->getFile();

        $editForm = $this->createForm(ImageType::class, $image);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $image = $editForm->getData();
            $image->setFile($imageName);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('app_index');
            //return $this->redirectToRoute('app_image_edit', array('id' => $image->getId()));
        }

        return $this->render('image/edit.html.twig', array(
            'image' => $image,
            'edit_form' => $editForm->createView()
        ));
    }

    public function delete(ManagerRegistry $doctrine, Request $request, $id)
    {
        $entityManager = $doctrine->getManager();
        $image = $entityManager->getRepository(Image::class)->findOneById($id);

        if (!$image) {
            throw $this->createNotFoundException('Unable to find Invitation entity.');
        }
        
        $file = $image->getFile();
        $fileSystem = new Filesystem();
        $projectDir = $this->getParameter('kernel.project_dir');
        $fileSystem->remove($projectDir.'/public/uploads/image/'.$file);

        $entityManager->remove($image);
        $entityManager->flush();

        return $this->redirectToRoute('app_index');
    }
}
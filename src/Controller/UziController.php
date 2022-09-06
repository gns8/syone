<?php
// Controller/UziController.php
namespace App\Controller;

use App\Entity\Uzi;
use App\Form\Type\UziType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;

class UziController extends AbstractController
{    
    public function new(Request $request, ManagerRegistry $doctrine): Response
    {
        
        //Uzi
        $uzi = new Uzi();
        $form = $this->createForm(UziType::class, $uzi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $uzi = $form->getData();

            //check name
            if (! preg_match('/^[a-zA-ZáíűőüöúóéÁÍŰŐÜÖÚÓÉ ]+$/',$uzi->getNeved()) ) 
                return new Response("A teljes név kell magyar karakterekkel, kérlek javítsd."); 
            
            //check email
            if (! preg_match('/^\w+@[A-Za-z0-9\w\.]+[A-Za-z]{2,}$/', $uzi->getEmailcimed()) ) 
                return new Response("Az emailcím hibás, kérlek javítsd.");

            //try to save in db
            try {
                $entityManager = $doctrine->getManager();
                
                $entityManager->getConnection()->beginTransaction(); //no auto commit
                $entityManager->persist($uzi);
                $entityManager->flush();
                $entityManager->getConnection()->commit();

                return new Response('Köszönjük szépen a kérdésedet. Válaszunkkal hamarosan keresünk a megadott e-mail címen.');
                //return $this->redirectToRoute('task_success');
                }
                catch ( Exception $e ) {
                    $entityManager->getConnection()->rollBack();
                    return new Response('Adatbázis hiba. Próbáld később.');
                    throw $e;
                    }

           
            } else {
                //normal operation
                return $this->renderForm('uzi.html.twig', ['form' => $form ]);
                }

        echo '</body></html>';

    }

}

?>

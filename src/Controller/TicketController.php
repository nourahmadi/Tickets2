<?php

namespace App\Controller;
use App\Entity\TicketManagement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class TicketController extends AbstractController
{
    /**
     * @Route("/ticket", name ="ticket")
     */

    public function index(): Response
    {
        return $this->render('Ticket/index.html.twig', [
            'controller_name' => 'TicketController',
        ]);
    }

    #[Route('/add/{titre}/{nompersonne}/{description}/{statut}/{creationDate}', 'ticket.add')]
    public function addTicket($titre, $nompersonne, $description, $statut, $date, $faker): Response
    {
        $manager = $this->getDoctrine()->getManager();
        $ticket = new TicketManagement();
        $ticket->setTitre($titre);
        $ticket->setNompersonne($nompersonne);
        $ticket->setDescription($description);
        $ticket->setStatut($statut);
        $date = new \DateTime();
        $date->setTime($faker->numberBetween(1990,2023),$faker->numberBetween(1,12),$faker->numberBetween(1990,2023));
        $ticket->setCreationDate($date);

        $manager->persist($ticket);
        $manager->flush();
        return $this->render('ticket/ticket-details.html.twig', [
            'ticket' => $ticket
        ]);
    }

    #[Route('/dupdate/{id}', 'ticket.update')]
    public function update($id): RedirectResponse
    {
        $manager = $this->getDoctrine()->getManager();
        $ticket = $manager->getRepository(TicketManagement::class)->find($id);

        if (!$ticket) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $ticket->setTitre('New ticket!');
        $manager->flush();

        return $this->redirectToRoute('ticket', ['id' => $ticket->getId()]);
    }


    #[Route('/delete/{id}', 'ticket.delete')]
        public function deleteTicket(TicketManagement $ticket = null): Response
    {
        if($ticket) {

            $manager = $this->getDoctrine()->getManager();

            $manager->remove($ticket);
            $manager->flush();
            $this->addFlash('success', "Le ticket a été supprimé avec succès");
        } else {
            $this->addFlash('error', "Erreur veuillez vérifier votre requete");
        }
        return $this->render('ticket/index.html.twig');
    }


    public function getTicket($date)
    {
        $manager = $this->getDoctrine()->getManager()
                        ->createQueryBuilder()
                        ->select('t')
                        ->orderBy('t.date', 'DESC')
                        ->getQuery();


    }

    public function getTicket1($statut)
    {
        $manager = $this->getDoctrine()->getManager()
            ->createQueryBuilder()
            ->select('t')
            ->orderBy('t.statut', 'DESC')
            ->getQuery();

    }

    public function getTicket2($statut)
    {
        $manager = $this->getDoctrine()->getManager()
            ->createQueryBuilder()
            ->select('t')
            ->orderBy('t.id', 'DESC')
            ->getQuery();

    }
}









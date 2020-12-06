<?php

/**
 * This file is part of the DevsCast project
 *
 * (c) bernard-ng <ngandubernard@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Data\ContactData;
use App\Form\ContactType;
use App\Notification\ContactNotification;
use App\Repository\BlogRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PageController
 * @Route(schemes={"HTTP", "HTTPS"})
 * @package App\Controller
 * @author bernard-ng <ngandubernard@gmail.com>
 */
class PageController extends AbstractController
{
    /**
     * @param BlogRepository $blogRepository
     */
    private BlogRepository $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function index(): Response
    {
        $blogs = $this->blogRepository->findBy([], null, 5);
        $projectDir = $this->getParameter('kernel.project_dir');
        $services = json_decode(file_get_contents($projectDir . "/resources/services.json"));
        $team = json_decode(file_get_contents($projectDir . "/resources/team.json"));
        $projects = json_decode(file_get_contents($projectDir . "/resources/projects.json"));
        return $this->render('index.html.twig', compact("services", "team", "projects", "blogs"));
    }

    /**
     * @Route("/contact", name="contact", methods={"GET", "POST"})
     * @param Request $request
     * @param ContactNotification $contactNotification
     * @return Response
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function contact(Request $request, ContactNotification $contactNotification): Response
    {
        $contact = new ContactData();
        $contactForm = $this->createForm(ContactType::class, $contact);
        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $this->addFlash(
                'success',
                'Nous avons bien reçu votre mail, nous tâcherons de vous répondre dans le plus bref délais  😉 😌'
            );
            $contactNotification->notify($contact);
            return $this->redirectToRoute('home');
        }

        return $this->render("app/statics/contact.html.twig", [
            'contactForm' => $contactForm->createView()
        ]);
    }

    /**
     * @Route("/contributing", name="contributing", methods={"GET"})
     * @return Response
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function contributing(): Response
    {
        return $this->render("app/statics/contributing.html.twig");
    }

    /**
     * @Route("/code-of-conduct", name="conduct", methods={"GET"})
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function conduct(): Response
    {
        return $this->render("app/statics/conduct.html.twig");
    }
}

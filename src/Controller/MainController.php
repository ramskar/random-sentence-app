<?php

namespace App\Controller;

use App\Entity\Sentence;
use App\Services\WordsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;

/**
 * Class MainController
 * @package App\Controller
 */
class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     * @param WordsService $wordsService
     * @return RedirectResponse
     */
    public function index(WordsService $wordsService): RedirectResponse
    {
        $sentence = $wordsService->getSentence();
        $entityManager = $this->getDoctrine()->getManager();

        $sentenceObj = new Sentence();
        $sentenceObj->setLink(Uuid::v6());
        $sentenceObj->setSentence($sentence);

        $entityManager->persist($sentenceObj);
        $entityManager->flush();

        $link = $sentenceObj->getLink();

        return $this->redirect('/' . $link);


    }

    /**
     * @Route("/{link}")
     * @param $link
     * @return Response
     */
    public function show($link): Response
    {
        /** @var Sentence $sentence */
        $sentence = $this->getDoctrine()
            ->getRepository(Sentence::class)
            ->findByLink($link);


        if (!$sentence) {
            return $this->redirect('/');
        }


        return $this->render('main/index.html.twig', [
            'sentence' => $sentence->getSentence(),
            'link' => $sentence->getLink(),
        ]);
    }
}

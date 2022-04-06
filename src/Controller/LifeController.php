<?php

namespace App\Controller;

use App\Life\Module;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/life")
 */
class LifeController extends AbstractController
{
    /**
     * @Route("/", name="app_index", methods={"GET", "POST"})
     * @param Module $life
     * @param Request $request
     * @return Response
     */
    public function index(Module $life, Request $request): Response
    {
        return $this->render(
            'life/index.html.twig',
            $life->handle(
                $request->request->get('world') ?? '',
                32,
                32,
                (int) $request->request->get('step') ?? 0,
                [
                    'loop' => (int) $request->request->get('loop') ?? 0,
                ]
            )
        );
    }
}
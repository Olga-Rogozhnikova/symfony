<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SongAPIController extends AbstractController
{
    #[Route('/api/songs/{id<\d+>}', methods: ['GET'])] //id - database id of the song
    public function getSong(int $id = null, LoggerInterface $logger): Response {
//        dd($id);
        // TODO query the database
        $song = [
            'id' => $id,
            'name' => 'Waterfalls',
            'url' => 'https://symfonycasts.s3.amazonaws.com/sample.mp3',
        ];

        return new JsonResponse($song);
    }
}
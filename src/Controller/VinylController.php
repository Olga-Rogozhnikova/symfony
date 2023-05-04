<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;  //symfony is a set of libraries that gives us tons of tools
                                                //for logging, making database queries, sending emails, rendering templates, making API calls etc.
                                                //~100 separate libraries
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController//controller or action
{

    #[Route('/', name: 'app_homepage')]   //php attribute
                    // linked to controller below
                    // points to a link
    public function homepage(): Response //controller return type
    {
        $tracks = [
            ['song' => 'Gangsta\'s Paradise', 'artist' => 'Coolio'],
            ['song' => 'Waterfalls', 'artist' => 'TLC'],
            ['song' => 'Creep', 'artist' => 'Radiohead'],
            ['song' => 'Kiss from a Rose', 'artist' => 'Seal'],
            ['song' => 'On Bended Knee', 'artist' => 'Boyz II Men'],
            ['song' => 'Fantasy', 'artist' => 'Mariah Carey'],
        ];

//        dd($tracks); dump die

        return $this->render('Vinyl/homepage.html.twig', [
            'title' => 'PB & Jams',
            'tracks' => $tracks,
        ]);
//        return new Response('Title: Pb and Jams'); //controllers must return Response objects (might be worked around)
    }
    #[Route('/browse/{slug}', name: 'app_browse')]  //wild card {wildcard}
                                //each wild card is matched to a controller by name not by position
                                //can be anything
                                //when inserted we are allowed to have a function attribute of a same name $slug
                                //if we go to /browse/death-metal it will match $slug route and pass this string to the {slug} argument
                                //matching is done by name
    public function browse(string $slug = null): Response   //null make /browse page work
                                                            //you can have argument with name $slug but is not required
    {
//        if($slug)
//        {
//            $title = 'Genre: ' .u(str_replace('-', ' ', $slug))->title(true); //u() is a symfony function
//            //from symfony/string library/component
//        }
//        else {
//            $title = 'All genres';
//        }
        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;

        return $this->render('Vinyl/browse.html.twig', [
            'genre' => $genre,
        ]);
    }
}
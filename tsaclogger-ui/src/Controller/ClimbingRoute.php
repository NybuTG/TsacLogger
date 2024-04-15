<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpClient\HttpClient;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClimbingRoute extends AbstractController
{
    protected function shouldWhiteText($color): bool
    {
        $white = 94;
        $black = 11;

        $rgb = array_map("hexdec", str_split(trim($color, '#'), 2));
        $reflectance = round((0.2125 * $rgb[0]/255 + 0.7154 * $rgb[1]/255 + 0.0721 * $rgb[2]/255)*100);
        $kw = array($white, $reflectance); rsort($kw);
        $kb = array($black, $reflectance); rsort($kb);
        

        $hw = round(($kw[0] - $kw[1])/$kw[0]);
        $hb = round(($kb[0] - $kb[1])/$kb[0]);



        if ($hw > $hb)
        {
            return true;
        } else {
            return false;
        }
    }

    protected function numericToGrade($numeric): string
    {
        $lut = ['2', '3', '4', '5a', '5b', '5c', '6a', '6b', '6c', '7a', '7b', '7c', '8a', '8b', '9a'];
        
        return $lut[$numeric];
    }


    #[Route('/route/{id}')]
    public function index(int $id): Response
    {
        $client = HttpClient::create();
        $response = $client->request(
            'GET',
            'http://localhost:8005/route/' . $id,
        );
        
        $content = $response->toArray();

        $route_name = $content["name"];
        $route_color = $content["color"];
        $setter = $content["setter"];
        $text_color = $this->shouldWhiteText($route_color) ? "white" : "black";
        return $this->render('route.html.twig', [
            'route_name' => $route_name,
            'route_color' => $route_color,
            'text_color' => $text_color,
            'setter' => $setter,
            'grades' => [
                [
                    'grade' => '5c',
                    'ratings' => '1'
                ],
                [
                    'grade' => '6a',
                    'ratings' => '2'
                ],
                [
                    'grade' => '6b',
                    'ratings' => '3'
                ],
                [
                    'grade' => '6c',
                    'ratings' => '2'
                ],
            ]
        ]);
    }
}
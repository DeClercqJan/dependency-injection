<?php

namespace App\Controller;

use App\Entity\Capitalize;
use App\Entity\Logger;
use App\Entity\Master;
use App\Entity\SpacesToDashes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TransformerController extends AbstractController
{
    /**
     * @Route("/transformer", name="transformer")
     */
    public function index()
    {
        $transform = new SpacesToDashes();
        // $transform = new Capitalize();
        $logger = new Logger();
        $master = new Master($logger, $transform);
        dump($master);
        $input = "test je input";
        $output = $master->transform($input);
        dump($output);
        $output2 = $master->log($output);
        dump($output2);

        return $this->render('transformer/index.html.twig', [
            'controller_name' => 'TransformerController',
        ]);
    }
}

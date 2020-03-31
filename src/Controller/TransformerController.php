<?php

namespace App\Controller;

use App\Entity\Capitalize;
use App\Entity\Data;
use App\Entity\Logger;
use App\Entity\Master;
use App\Entity\SpacesToDashes;
use App\Form\DataType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TransformerController extends AbstractController
{
    /**
     * @Route("/transformer", name="transformer")
     */
    public function index(Request $request)
    {
        dump($request);

        // to check: do i need to create service container to instantie objects that master needs? Is master a service container? or just a service ...?
        // also, I need to change the method of the Masterclass, without creating a new master instance(is this done automatically or not;
        // or is this maybe a specific functionaltiy of service container?)
        // Also, should I create a void object in order not to have default choice which tranformation is needed
        $transform = new SpacesToDashes();
        // $transform = new Capitalize();
        $logger = new Logger();
        // mss beter leeg opstarten?? dan ook die check in de controller hieronder leegmaken.
        // void objects in plaats van die transofmr en logger?
        $master = new Master($logger, $transform);
        dump($master);

        // at first, I tried to store the input in the Masterclass, but that's a service container, I believe.
        // therefore, I created the data-class as a 'model' to store dataT
        // also important to note, that I had to use the $data class in the form
        // setting options, however proves difficult
        $data = new Data();
        dump($data);

        $form = $this->createForm(DataType::class, $data);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $input = $data->getData();

            $transformOption = $data->getTransformOption();
            dump($transformOption);

            // need to improve this, because I like it. But does not work right now as the code below uses string as arguments instead of the typehinted transformInterface objects
//            if ($transformOption !== $master->getTransform()) {
//                $master->setTransform($transformOption);
//            }

            // simpeler (need to change in favour of previous suggestionS (MULTPPLE) above
            if ("SpacesToDashes" === $transformOption) {
                $SpacesToDashes = new SpacesToDashes();
                $master->setTransform($SpacesToDashes);
            }
            if ("Capitalize" === $transformOption) {
                $Capitalize = new Capitalize();
                $master->setTransform($Capitalize);
            }

            $output = $master->transform($input);
            dump($output);
        }

        return $this->render('transformer/index.html.twig', [
            'controller_name' => 'TransformerController',
            'form' => $form->createView(),
        ]);
    }
}

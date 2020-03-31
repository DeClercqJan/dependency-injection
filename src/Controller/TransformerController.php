<?php

namespace App\Controller;

use App\Entity\Capitalize;
use App\Entity\Data;
use App\Entity\Logger;
use App\Entity\Master;
use App\Entity\SpacesToDashes;
use App\Entity\TransformOptionsList;
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
        $master = new Master($logger, $transform);
        dump($master);


        // $TransformOptionsList = new TransformOptionsList('a');

        // at first, I tried to store the input in the Masterclass, but that's a service container, I believe.
        // therefore, I created the data-class as a 'model' to store dataT
        // also important to note, that I had to use the $data class in the form
        // setting options, however proves difficult
        // $option_array = ["1","2","4"];
        $data = new Data("placeholdertext", ["1", "2", '3'], "testString");
        dump($data);
        // $data = new Data($option_array);
//        $data->setDataTransformOptionsList("optie1");
//        dump($data);
        // $data->setDataTransformOptionsList($option_array);
        // dump($data->getDataTransformOptionsList());
//        $data->setDataTransformOptionsList("optie3");

        $form = $this->createForm(DataType::class, $data);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            dump($data);
            $input = $data->getData();
            dump($input);
            $output = $master->transform($input);
            dump($output);

            // just to test

        } else {
            dump("form has not been submitted");
        }

        return $this->render('transformer/index.html.twig', [
            'controller_name' => 'TransformerController',
            'form' => $form->createView(),
        ]);
    }
}

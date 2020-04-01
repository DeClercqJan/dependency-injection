<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Capitalize;
use App\Entity\Data;
use App\Entity\BasicLogger;
use App\Entity\Master;
use App\Entity\SpacesToDashes;
use App\Form\DataType;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
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

        $result = "";
        // at first, I tried to store the input in the Masterclass, but that's a service container, I believe.
        $data = new Data();
        $form = $this->createForm(DataType::class, $data);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $input = $data->getData();
            $transformOption = $data->getTransformOption();
            if ("SpacesToDashes" === $transformOption) {
                $SpacesToDashes = new SpacesToDashes();
                $transform = $SpacesToDashes;
            }
            if ("Capitalize" === $transformOption) {
                $Capitalize = new Capitalize();
                $transform = $Capitalize;
            }
            // monolog logger
            // opgelet: je moet, om gebruik te maken van een log-functie, het JUISTE type (bv.warning) in je streamhandler zetten
            // en dan kan je gebruik maken van die specfieke ->warning bv. methodes
            // om gebruik te maken van de (meer generische) ->log methode, moet je het echter ook nog eens meegeven
            $monologLogger = new Logger('monologLogger');
            $monologLogger->pushHandler(new StreamHandler('monologLog.info', Logger::INFO));

            // mulled a bit about what to do with this external service; how can I make it conform to my own interface without butchering it?
            // Or is an abstract class better because more bottom up?
            // But then again, I would need to butcher this external service
            // Aha, this external Monolog Logger already implements an interface class. Maybe I should adapt mine to this 'standard'
            // ... and a standard it is, because I see it's in the folder psr

            // Even though my and this monolog logger implement the same interface, in order to be able to switch between them, I need to follow it's instructions.
            // edit: then I started thinking: why not extend it and keep the interface typehint? This way I don't have to declare methods I won't use.
            // or should I use the parent class Monolog as typehint? it's a chocie between strictness and flexility. Here, flexibiltiy is advisable as other loggers may come to my shores
            // + NEED TO CHECK: can I create methods that are counter to Monolog's parent method? If not, it's an extra security, no? I'm getting an error for my original method so I'm guessing more secure and I need to follow the ways of the parent
            $basicLogger = new BasicLogger('basicLogger');

            // choose your logger wisely!
            $master = new Master($basicLogger, $transform);
            // $master = new Master($monologLogger, $transform);

            // to check: do i need to create service container to instantie objects that master needs? Is master a service container? or just a service ...?
            // also, I need to change the method of the Masterclass, without creating a new master instance(is this done automatically or not;
            // edit: opted to created the Master object AFTER the form has been submitted;
            // or is this maybe a specific functionaltiy of service container?)
            // Also, should I create a void object in order not to have default choice which tranformation is needed

            // preferered to pass input by variabele instead of using constructor as I believe this to be more clear
            $output = $master->transform($input);
            $result = $output;
        }

        return $this->render('transformer/index.html.twig', [
            'h1_text' => 'Text Transformer',
            'form' => $form->createView(),
            'result' => $result,
        ]);
    }
}

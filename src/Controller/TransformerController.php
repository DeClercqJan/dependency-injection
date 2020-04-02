<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Capitalize;
use App\Entity\Data;
use App\Entity\BasicLogger;
use App\Entity\Mailer;
use App\Service\Master;
use App\Entity\NewsletterManager;
use App\Entity\SpacesToDashes;
use App\Form\DataType;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TransformerController extends AbstractController
{

    /**
     * @Route("/transformer", name="transformer")
     */
    public function index(Request $request, Master $master)
    {
        $output = "";
        // at first, I tried to store the input in the Masterclass, but that's a service container, I believe.
        $data = new Data();
        $form = $this->createForm(DataType::class, $data);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $input = $data->getData();
            $transformOption = $data->getTransformOption();

            // to check: do i need to create service container to instantie objects that master needs? Is master a service container? or just a service ...?
            // also, I need to change the method of the Masterclass, without creating a new master instance(is this done automatically or not;
            // No, added checks for this in getters that create these objects
            // or is this maybe a specific functionaltiy of service container?)
            // Also, should I create a void object in order not to have default choice which tranformation is needed

            // pushed everyhing inside master (service cntainer), even though THIS FEELS LIKE THE OPPOSITE OF DEPENDENCY INJECTION.
            // So why do it? because I onyl want to instantiate  classes when needed instead of creating them and passing them in + need to force myself to try something new
            // going pretty ok, better than expected
            // however, I was typehinting my properties (php 7.4), but my checks to make sure only one object is instantiated of each type uses if null,
            // while this typehinting means that for example "private string $property" never can be null because of the typehint
            // so I need to find something to fix this
            // also, clearly, I constructed this object in an unelegant way

            // nu met Symfony Dependency Injection component proberen
            // $containerBuilder = new ContainerBuilder();
            // $containerBuilder
            // ->register('MasterDependencyInjectionExerciseBecode', 'Master')
            // ->addArgument('nietszeggend, straks oplossen');
            // $master = $containerBuilder->get('MasterDependencyInjectionExerciseBecode');

            //DIDN'T DO IT
//            $containerBuilder = new ContainerBuilder();
//            $loader = new PhpFileLoader($containerBuilder, new FileLocator(__DIR__));
//            $loader->load('services.php');
//
//            $mailer = new Mailer();
//            dump($mailer);
//            // voorbeeld van docs proberen reproduceren
//            $containerBuilder = new ContainerBuilder();
//            $containerBuilder
//                ->register('mailer', 'Mailer');
//                // ->addArgument('sendmail');
//            $containerBuilder
//                ->register('newsletter_manager', 'NewsletterManager')
//                ->addArgument(new Reference('mailer'));
//            $newsletterManager = $containerBuilder->get('newsletter_manager');
//            dump($newsletterManager);
            // $containerBuilder->setParameter('mailer.transport', 'sendmail');
            // $containerBuilder
            //    ->register('mailer', 'Mailer')
            //    ->addArgument('%mailer.transport%');

            // $master = new Master("nietszeggend, straks oplossen");

            if ("SpacesToDashes" === $transformOption) {
                $master->getTransFormSpacesToDashes();
            }
            if ("Capitalize" === $transformOption) {
                $master->getTransFormCapitalize();
            }
            // CHOOSE YOUR LOGGER
            // $master->getBasicLogger();
            $master->getMonologLogger();

            dump($master);

            // preferered to pass input by variabele instead of using constructor as I believe this to be more clear
            $output = $master->transform($input);

            // monolog logger
            // opgelet: je moet, om gebruik te maken van een log-functie, het JUISTE type (bv.warning) in je streamhandler zetten
            // en dan kan je gebruik maken van die specfieke ->warning bv. methodes
            // om gebruik te maken van de (meer generische) ->log methode, moet je het echter ook nog eens meegeven

            // mulled a bit about what to do with this external service; how can I make it conform to my own interface without butchering it?
            // Or is an abstract class better because more bottom up?
            // But then again, I would need to butcher this external service
            // Aha, this external Monolog Logger already implements an interface class. Maybe I should adapt mine to this 'standard'
            // ... and a standard it is, because I see it's in the folder psr
            // Even though my and this monolog logger implement the same interface, in order to be able to switch between them, I need to follow it's (monolog) instructions as well
            // edit: then I started thinking: why not extend it and keep the interface typehint? This way I don't have to declare methods I won't use.
            // or should I use the parent class Monolog as typehint? it's a chocie between strictness and flexility.
            // Here, flexibiltiy is advisable as other loggers may come to my shores
            // + NEED TO CHECK: can I create methods that are counter to Monolog's parent method? If not, it's an extra security, no?
            // I'm getting an error for my original method so I'm guessing more secure and I need to follow the ways of the parent
            // edit: now I'm thinking, whether interface may be better after all
            // because: f you someone would like to use another method than the log method and use the BasicLogger(my own), they may think it will work (because it extends the Monolog logger).
        }

        return $this->render('transformer/index.html.twig', [
            'h1_text' => 'Text Transformer',
            'form' => $form->createView(),
            'output' => $output,
        ]);
    }
}

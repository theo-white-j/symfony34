<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace WT\GalerieBundle\Controller;

use WT\GalerieBundle\Entity\Galerie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
#use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GalerieController extends Controller
{

	 public function menuAction($limit)
	{
		// On fixe en dur une liste ici, bien entendu par la suite
		// on la récupérera depuis la BDD !
		$listAdverts = array(
			array('id' => 2, 'title' => 'Recherche développeur Symfony'),
			array('id' => 5, 'title' => 'Mission de webmaster'),
			array('id' => 9, 'title' => 'Offre de stage webdesigner')
		);

		return $this->render('WTGalerieBundle:Galerie:menu.html.twig', array(
			// Tout l'intérêt est ici : le contrôleur passe
			// les variables nécessaires au template !
			'listAdverts' => $listAdverts
		));
	}


    public function indexAction($page)
    {
        
        #return new Response("Notre propre Hello World !");
    	/*$content = $this->get('templating')->render('WTGalerieBundle:Galerie:index.html.twig', array('nom' => 'winzou') );
    	return new Response($content);*/

    	// On ne sait pas combien de pages il y a
    	// Mais on sait qu'une page doit être supérieure ou égale à 1
		if ($page < 1) {
			// On déclenche une exception NotFoundHttpException, cela va afficher
			// une page d'erreur 404 (qu'on pourra personnaliser plus tard d'ailleurs)
			throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
		}

		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('WTGalerieBundle:Galerie');
		$galeries = $repository->findAll();

		// Et modifiez le 2nd argument pour injecter notre liste
		return $this->render('WTGalerieBundle:Galerie:index.html.twig', array(
			'galeries' => $galeries,
			'page'=> $page
		));
    }

    public function viewAction($id)
  	{
		
		// On récupère le repository
		$repository = $this->getDoctrine()->getManager()->getRepository('WTGalerieBundle:Galerie');

   		// On récupère l'entité correspondante à l'id $id
    	$galerie = $repository->find($id);
    	//same $galerie = $this->getDoctrine()->getManager()->find('WTgalerieBundle:Galerie', $id);

    	// $advert est donc une instance de OC\PlatformBundle\Entity\Advert
    	// ou null si l'id $id  n'existe pas, d'où ce if :
    	if (null === $galerie) {
    		throw new NotFoundHttpException("La galerie avec l'id ".$id." n'existe pas.");
    	}
    	/*$GalItemRepository = $this->getDoctrine()->getManager()->getRepository('WTGalerieBundle:GalerieItem');
    	$galerieItems = $GalItemRepository->findBy(
			array('galerie' 		=> $galerie), // Critere
			array('creationdate' 	=> 'desc'),   // Tri
			6,                              	  // Limite
			0                               	  // Offset
    	);*/
    	$galerieItems=$galerie->getGalerieitems();
//var_dump($galerieItems);

    	// Le render ne change pas, on passait avant un tableau, maintenant un objet
    	return $this->render('WTGalerieBundle:Galerie:view.html.twig', array(
      		'galerie' 	=> $galerie,
      		'galItems' 	=> $galerieItems
    	));

  	}


  	public function addAction(Request $request)
	{
		/*$session = $request->getSession();

		// Bien sûr, cette méthode devra réellement ajouter l'annonce

		// Mais faisons comme si c'était le cas
		$session->getFlashBag()->add('info', 'Annonce bien enregistrée');

		// Le « flashBag » est ce qui contient les messages flash dans la session
		// Il peut bien sûr contenir plusieurs messages :
		$session->getFlashBag()->add('info', 'Oui oui, elle est bien enregistrée !');

		// Puis on redirige vers la page de visualisation de cette annonce
		return $this->redirectToRoute('wt_galerie_view', array('id' => 5));*/


    	// La gestion d'un formulaire est particulière, mais l'idée est la suivante :


    	// Si la requête est en POST, c'est que le visiteur a soumis le formulaire

    	/*if ($request->isMethod('POST')) {
      		// Ici, on s'occupera de la création et de la gestion du formulaire
      		$request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
      		// Puis on redirige vers la page de visualisation de cettte annonce
      		return $this->redirectToRoute('wt_galerie_view', array('id' => 5));
    	}

		// On récupère le service
		$antispam = $this->container->get('wt_galerie.antispam');

		// Je pars du principe que $text contient le texte d'un message 	quelconque
		$text = '...';
		if ($antispam->isSpam($text)) {
			throw new \Exception('Votre message a été détecté comme spam !');
		}

		// Ici le message n'est pas un spam

    	// Si on n'est pas en POST, alors on affiche le formulaire
    	return $this->render('WTGalerieBundle:Galerie:add.html.twig');*/




    	// Création de l'entité
	    $gal = new Galerie();
	    $gal->setName('Recherche développeur Symfony.');
	    $gal->SetOwner('Alexandre');
	   // $gal->setDesc("Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…");
	    // On peut ne pas définir ni la date ni la publication,
	    // car ces attributs sont définis automatiquement dans le constructeur

	    // On récupère l'EntityManager
	    $em = $this->getDoctrine()->getManager();

	    // Étape 1 : On « persiste » l'entité
	    $em->persist($gal);
//var_dump($gal);
	    // Étape 2 : On « flush » tout ce qui a été persisté avant
	    $em->flush();

	    // Reste de la méthode qu'on avait déjà écrit
	    if ($request->isMethod('POST')) {
	      $request->getSession()->getFlashBag()->add('notice', 'galerie bien enregistrée.');

	      // Puis on redirige vers la page de visualisation de cettte annonce
	      return $this->redirectToRoute('wt_galerie_view', array('id' => $gal->getId()));
	    }

	    // Si on n'est pas en POST, alors on affiche le formulaire
	    return $this->render('WTGalerieBundle:Galerie:add.html.twig', array('Galerie' => $gal));

	}

	public function editAction($id, Request $request)
	{

		$advert = array(
			'title'   => 'Recherche développpeur Symfony',
			'id'      => $id,
			'author'  => 'Alexandre',
			'content' => 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…',
			'date'    => new \Datetime()
		);

    	return $this->render('WTGalerieBundle:Galerie:edit.html.twig', array(
      		'advert' => $advert
    	));
  	}

  	public function deleteAction($id)
  	{
    	// Ici, on récupérera l'annonce correspondant à $id
    	// Ici, on gérera la suppression de l'annonce en question
    	return $this->render('WTGalerieBundle:Galerie:delete.html.twig');
  	}





  	public function adminfooAction($page)
  	{
    	if ($page < 1) {
			// On déclenche une exception NotFoundHttpException, cela va afficher
			// une page d'erreur 404 (qu'on pourra personnaliser plus tard d'ailleurs)
			throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
		}

		// Ici, on récupérera la liste des annonces, puis on la passera au template


		$listAdverts = array(
			array(
				'title'   => 'Recherche développpeur Symfony',
				'id'      => 1,
				'author'  => 'Alexandre',
				'content' => 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…',
				'date'    => new \Datetime()),
			
		);

		// Et modifiez le 2nd argument pour injecter notre liste
		return $this->render('WTGalerieBundle:Admin:prive.html.twig', array(
			'listAdverts' => $listAdverts,
			'page'=> $page
		));
  	}





public function testAction(Request $request)
    {
       $value="1234value";

        return $this->renderTest(array(
            'value' => $value,
            'nomber' =>12,
        ));
    }


    protected function rendertest(array $data)
    {
        return $this->render('WTGalerieBundle:Galerie:test.html.twig', $data);
    }




}
<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace WT\GalerieBundle\Controller;

use WT\GalerieBundle\Entity\Galerie;
use WT\GalerieBundle\Form\GalerieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;//only use by testAction funcion
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
//use Doctrine\Common\Collections\Selectable 


class GalerieController extends Controller
{

	 public function menuAction($limit)
	{
		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('WTGalerieBundle:Galerie');
		$listgals2 = $repository->findAll();
		/*rename and view for galerie*/
		$listgals = $repository->findBy(
			//array('author' => 'Alexandre'), // Critere
			array(),
			array('editiondate' => 'desc'),        // Tri  'asc' or 'desc'
			$limit,                              // Limite
			0                               // Offset
		);
		
		return $this->render('WTGalerieBundle:Galerie:menu.html.twig', array(
			// Tout l'intérêt est ici : le contrôleur passe
			// les variables nécessaires au template !
			'listgals' => $listgals,
			'listgals2'=>$listgals2
		));
	}


    public function indexAction($page)
    {
       
    	// On ne sait pas combien de pages il y a
    	// Mais on sait qu'une page doit être supérieure ou égale à 1
		if ($page < 1) {
			// On déclenche une exception NotFoundHttpException, cela va afficher
			// une page d'erreur 404 (qu'on pourra personnaliser plus tard d'ailleurs)
			throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
		}
		// Ici je fixe le nombre d'annonces par page à 3

		// Mais bien sûr il faudrait utiliser un paramètre, et y accéder via $this->container->getParameter('nb_per_page')
		$nbPerPage = 3;

		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('WTGalerieBundle:Galerie');
		//$galeries = $repository->findAll();
		$galeries = $repository->getGaleries($page, $nbPerPage);

		 // On calcule le nombre total de pages grâce au count($listAdverts) qui retourne le nombre total d'annonces
    	$nbPages = ceil(count($galeries)/$nbPerPage);

    	// Si la page n'existe pas, on retourne une 404
    	if ($page > $nbPages) {
      		throw $this->createNotFoundException("La page ".$page." n'existe pas.");
    	}

		// Et modifiez le 2nd argument pour injecter notre liste
		return $this->render('WTGalerieBundle:Galerie:index.html.twig', array(
			'galeries' => $galeries,
			'nbPages'     => $nbPages,
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

    	// Le render ne change pas, on passait avant un tableau, maintenant un objet
    	return $this->render('WTGalerieBundle:Galerie:view.html.twig', array(
      		'galerie' 	=> $galerie,
      		'galItems' 	=> $galerieItems
    	));

  	}


  	public function addAction(Request $request)
	{
	
    	// Création de l'entité
	    $galerie = new Galerie();
	    $form = $this->get('form.factory')->create(GalerieType::class, $galerie);
	    // <=====> $form = $this->createForm(AdvertType::class, $advert)
	    //$form =  $this->createForm(GalerieType::class, $galerie);

	    // Si la requête est en POST
		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($galerie);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'galerie bien ajouté.');

			// On redirige vers la page de visualisation de l'annonce nouvellement créée
			return $this->redirect($this->generateUrl('wt_galerie_view', array('id' => $galerie->getId())));
		}
	    // À ce stade, le formulaire n'est pas valide car :
	    // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
	    // - Soit la requête est de type POST, mais le formulaire contient des valeurs invalides, donc on l'affiche de nouveau
	    return $this->render('WTGalerieBundle:Galerie:add.html.twig', array(
	    	'form' => $form->createView(),
	    ));

	}


	public function editAction($id, Request $request)
	{

		$em = $this->getDoctrine()->getManager();
		// On récupère l'entité correspondant à l'id $id
		$galerie = $em->getRepository('WTGalerieBundle:Galerie')->find($id);
		// Si l'annonce n'existe pas, on affiche une erreur 404
		if ($galerie == null) {
			throw $this->createNotFoundException("La galerie avec l'id ".$id." n'existe pas.");
		}

		$form =  $this->createForm(GalerieType::class, $galerie);
		$form->handleRequest($request);

		////if ($form->isSubmitted() && $form->isValid()) {
		if ($request->isMethod('POST') && $form->isValid()){
			/*// On l'enregistre notre objet $advert dans la base de données, par exemple
			$galerie= $form->getData();
			$em = $this->getDoctrine()->getManager();
			$em->persist($galerie);*/
			// Inutile de persister ici, Doctrine connait déjà notre annonce
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Galerie bien modifiée.');

			// On redirige vers la page de visualisation de l'annonce nouvellement créée
			return $this->redirect($this->generateUrl('wt_galerie_view', array('id' => $galerie->getId())));
		}

		return $this->render('WTGalerieBundle:Galerie:edit.html.twig', array(
	    	'form' => $form->createView(),
	    	'galerie' => $galerie
	    ));
  	}


  	public function deleteAction($id, Request $request)
  	{   
		// On récupère l'EntityManager
		$em = $this->getDoctrine()->getManager();

		// On récupère l'entité correspondant à l'id $id
		$gal = $em->getRepository('WTGalerieBundle:Galerie')->find($id);
		
		// Si l'annonce n'existe pas, on affiche une erreur 404
		if ($gal === null) {
			throw $this->createNotFoundException("La galerie avec l'id ".$id." n'existe pas.");
		}

		// On crée un formulaire vide, qui ne contiendra que le champ CSRF
    	// Cela permet de protéger la suppression d'annonce contre cette faille
    	$form = $this->get('form.factory')->create();

		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

			$em->remove($gal);
      		$em->flush();
		 	// Si la requête est en POST, on deletea l'article
		  	$request->getSession()->getFlashBag()->add('notice', 'Galerie bien supprimée.');
		  	// Puis on redirige vers l'accueil
		 	return $this->redirect($this->generateUrl('wt_galerie_home', array('page' =>1 )));
		}
		// Si la requête est en GET, on affiche une page de confirmation avant de delete
		return $this->render('WTGalerieBundle:Galerie:delete.html.twig',array(
		  'gal' => $gal,
		  'form' => $form->createView(),
		));
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
       /*$value="1234value";

        return $this->renderTest(array(
            'value' => $value,
            'nomber' =>12,
        ));*/

        $gal = new Galerie;
        $gal->setCreationdate(new \Datetime());  // Champ « date » OK
		$gal->setName('abc');           // Champ « title » incorrect : moins de 10 caractères
    	//$advert->setContent('blabla');    // Champ « content » incorrect : on ne le définit pas
    	#$gal->setOwner('User');            // Champ « author » incorrect : moins de 2 caractères
    	
    	// On récupère le service validator
    	$validator = $this->get('validator');
    	// On déclenche la validation sur notre object
    	$listErrors = $validator->validate($gal);

    	// Si $listErrors n'est pas vide, on affiche les erreurs
    	if(count($listErrors) > 0) {
      		// $listErrors est un objet, sa méthode __toString permet de lister joliement les erreurs
      		return new Response((string) $listErrors);
    	} else {
      		return new Response("La galerie est valide !");
    	}
    }


    protected function rendertest(array $data)
    {
        return $this->render('WTGalerieBundle:Galerie:test.html.twig', $data);
    }




}
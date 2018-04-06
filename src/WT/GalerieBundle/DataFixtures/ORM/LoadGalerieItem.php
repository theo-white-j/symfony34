<?php
namespace WT\GalerieBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use WT\GalerieBundle\Entity\GalerieItem;
use WT\GalerieBundle\Entity\Galerie;
#use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
#use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;



class LoadGalerieItem extends Fixture implements OrderedFixtureInterface, ContainerAwareInterface
#class LoadGalerieItem extends Fixture implements DependentFixtureInterface , ContainerAwareInterface
{
    // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // Liste des noms de catégorie à ajouter
        $names = array(
          '1ere galerieITEM',
          '2GAlITEM',
        );
        $gal=$this->getReference(LoadGalerie::GALERIE_REFERENCE);

        foreach ($names as $name) {
            // On crée la catégorie
            $galerieItem = new GalerieItem();
            $galerieItem->setName($name);
            $galerieItem->setType("Mytype");

            $galerieItem->setGalerie($gal);
            // On la persiste
            $manager->persist($galerieItem);
        }

        // On déclenche l'enregistrement de toutes les catégories
        $manager->flush();
    }



    /**
     * Sets the container.
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
      $this->container = $container;
    }

    
    /**
     * Get the order of this fixture
     * @return integer
     */
    public function getOrder()
    {
      return 3;
    }

    /*public function getDependencies()
    {
        return array(
            LoadGalerie::class,
        );
    }*/
}
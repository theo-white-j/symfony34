<?php
namespace WT\GalerieBundle\DataFixtures\ORM;

#use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
#use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use WT\GalerieBundle\Entity\Galerie;
#use WT\UserBundle\Entity\User;
use WT\UserBundle\DataFixtures\ORM\LoadUser;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


class LoadGalerie extends Fixture implements DependentFixtureInterface, ContainerAwareInterface
{
    public const GALERIE_REFERENCE = 'galref';


    // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
    /**
     * Load data fixtures with the passed EntityManager
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // Liste des noms de catégorie à ajouter
        $names = array(
          '1ere galerie',
          '2',
          'test 3',
          'test4'
        );

        $registerdAdmin=$this->getReference(LoadUser::ADMIN_USER_REFERENCE);
//echo " regadmin  :  ";var_dump($registerdAdmin);
        foreach ($names as $index=>$name) {
          // On crée la catégorie
          $galerie = new Galerie();
          $galerie->setName($name);
          $galerie->setOwner($registerdAdmin);

          // On la persiste
          $manager->persist($galerie);
          $manager->flush();
          //si on est dans la 1ere galerie on cree une reference pour la donner a LoadGalerieItem
          if ($index == 0) {
             $this->addReference(self::GALERIE_REFERENCE, $galerie);
             echo "1er gal id:     ";var_dump($galerie->getId());
             echo "1er gal name:     ";var_dump($galerie->getName());
          }
          
        }
        // On déclenche l'enregistrement de toutes les catégories
        echo "const          "; var_dump(self::GALERIE_REFERENCE);
        
        echo "end galid:     ";var_dump($galerie->getId());
        echo "end gal name:     "; var_dump($galerie->getName());
    }

    public function getDependencies()
    {
        return array(
            LoadUser::class,
        );
    }


    /**
     * Sets the container.
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
      $this->container = $container;
    }
}
<?php
namespace WT\UserBundle\DataFixtures\ORM;

#use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use WT\UserBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
#use Doctrine\Common\DataFixtures\AbstractFixture;
#use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

#class LoadUser extends Fixture implements OrderedFixtureInterface, ContainerAwareInterface
class LoadUser extends Fixture implements ContainerAwareInterface
{

  /**
   * @var ContainerInterface
   */
  private $container;

  public const ADMIN_USER_REFERENCE = 'admin-user';

  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  /**
   * Load data fixtures with the passed EntityManager
   * @param ObjectManager $manager
   */
  public function load(ObjectManager $manager)
  {
    #echo "here!";
    
    
    $userManager = $this->container->get('fos_user.user_manager');
    $user = $userManager->createUser();
    $user->setUsername('admin');
    $user->setEmail('admin@admin.com');
    $user->setPlainPassword('admin');
#$password = $this->encoder->encodePassword($user, 'pass_1234');
 #   $user->setPassword($password);

    $user->setEnabled(true);
    $user->setRoles(array('ROLE_ADMIN'));
    $userManager->updateUser($user);


    $user2 = $userManager->createUser();
    $user2->setUsername('User');
    $user2->setEmail('user@User.com');
    $user2->setPlainPassword('Qwertz');
    $user2->setEnabled(true);
    $user2->setRoles(array('ROLE_ADMIN'));
    $userManager->updateUser($user2);

    // other fixtures can get this object using the UserFixtures::ADMIN_USER_REFERENCE constant
    $this->addReference(self::ADMIN_USER_REFERENCE, $user);

    /*// Liste des noms de catégorie à ajouter
    $names = array(
      '1ere galerie',
      '2',
      'test 3',
      'test4'
    );

    foreach ($names as $name) {
      // On crée la catégorie
      $galerie = new Galerie();
      $galerie->setName($name);
      $galerie->setOwner("paulHandWritting");

      // On la persiste
      $manager->persist($galerie);
    }

    // On déclenche l'enregistrement de toutes les catégories
    $manager->flush();*/
  }


  /**
   * Sets the container.
   * @param ContainerInterface|null $container A ContainerInterface instance or null
   */
  public function setContainer(ContainerInterface $container = null)
  {
    $this->container = $container;
  }

  /* *
   * Get the order of this fixture
   * @return integer
   * /
  public function getOrder()
  {
    return 1;
  }*/

}
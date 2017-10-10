<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use \AppBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData implements FixtureInterface, ContainerAwareInterface{
    private $container;
    
    public function load(ObjectManager $manager) {
      
        
    }

    public function setContainer(ContainerInterface $container = null) {
        $this->container=$container;
    }

}

?>

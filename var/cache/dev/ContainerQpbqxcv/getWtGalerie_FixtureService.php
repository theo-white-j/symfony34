<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'wt_galerie.fixture' shared service.

include_once $this->targetDirs[3].'/vendor/doctrine/data-fixtures/lib/Doctrine/Common/DataFixtures/FixtureInterface.php';
include_once $this->targetDirs[3].'/vendor/doctrine/data-fixtures/lib/Doctrine/Common/DataFixtures/SharedFixtureInterface.php';
include_once $this->targetDirs[3].'/vendor/doctrine/data-fixtures/lib/Doctrine/Common/DataFixtures/AbstractFixture.php';
include_once $this->targetDirs[3].'/vendor/doctrine/doctrine-fixtures-bundle/ORMFixtureInterface.php';
include_once $this->targetDirs[3].'/vendor/doctrine/doctrine-fixtures-bundle/Fixture.php';
include_once $this->targetDirs[3].'/vendor/doctrine/data-fixtures/lib/Doctrine/Common/DataFixtures/OrderedFixtureInterface.php';
include_once $this->targetDirs[3].'/src/WT/GalerieBundle/DataFixtures/ORM/LoadGalerie.php';

return $this->services['wt_galerie.fixture'] = new \WT\GalerieBundle\DataFixtures\ORM\LoadGalerie();

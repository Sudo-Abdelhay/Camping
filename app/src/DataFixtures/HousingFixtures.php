<?php

namespace App\DataFixtures;

use App\Entity\Housing;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Nelmio\Alice\Loader\NativeLoader;
use Doctrine\Persistence\ObjectManager;

class HousingFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $loader = new NativeLoader();
        $entities = $loader->loadFile(__DIR__ . '/fixtures/housing.yaml')->getObjects();
        foreach ($entities as $entity) {
            $manager->persist($entity);
        }

        $manager->flush();
    }
}

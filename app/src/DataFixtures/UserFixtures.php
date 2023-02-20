<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Nelmio\Alice\Loader\NativeLoader;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $loader = new NativeLoader();
        $entities = $loader->loadFile(__DIR__ . '/fixtures/housing.yaml')->getObjects();
        foreach ($entities as $entity) {
            $manager->persist($entity);
        }
        $manager->flush();
    }
}

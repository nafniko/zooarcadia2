<?php

use PHPUnit\Framework\TestCase;
use Models\Animal;

class AnimalTest extends TestCase
{
    public function testHydrate()
    {
        $data = [
            'id' => 1,
            'prenom' => 'Simba',
            'images' => 'simba.jpg',
            'race' => 'Lion',
            'habitat' => 'Savane',
            'chemin' => '/images/simba.jpg',
            'infos' => 'Roi de la savane',
            'commentaire' => 'Aucun',
        ];

        $animal = new Animal();
        $animal->hydrate($data);

        $this->assertEquals(1, $animal->getId());
        $this->assertEquals('Simba', $animal->getPrenom());
        $this->assertEquals('simba.jpg', $animal->getImages());
        $this->assertEquals('Lion', $animal->getRace());
        $this->assertEquals('Savane', $animal->getHabitat());
        $this->assertEquals('/images/simba.jpg', $animal->getChemin());
        $this->assertEquals('Roi de la savane', $animal->getInfos());
        $this->assertEquals('Aucun', $animal->getCommentaire());
    }

    public function testSettersAndGetters()
    {
        $animal = new Animal();

        $animal->setId(2);
        $this->assertEquals(2, $animal->getId());

        $animal->setPrenom('Nala');
        $this->assertEquals('Nala', $animal->getPrenom());

        $animal->setImages('nala.jpg');
        $this->assertEquals('nala.jpg', $animal->getImages());

        $animal->setRace('Lionne');
        $this->assertEquals('Lionne', $animal->getRace());

        $animal->setHabitat('Savane');
        $this->assertEquals('Savane', $animal->getHabitat());

        $animal->setChemin('/images/nala.jpg');
        $this->assertEquals('/images/nala.jpg', $animal->getChemin());

        $animal->setInfos('Reine de la savane');
        $this->assertEquals('Reine de la savane', $animal->getInfos());

        $animal->setCommentaire('Aucun');
        $this->assertEquals('Aucun', $animal->getCommentaire());
    }
}

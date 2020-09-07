<?php

namespace App\DataFixtures;

use App\Entity\Word;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * Class AppFixtures
 * @package App\DataFixtures
 */
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $words = [
            [
                'word' => 'Ah tu',
                'type' => 'reference',
                'gender' => 'none'
            ],
            [
                'word' => 'Och tu',
                'type' => 'reference',
                'gender' => 'none'
            ],
            [
                'word' => 'Nu tu',
                'type' => 'reference',
                'gender' => 'none'
            ],
            [
                'word' => 'Ai tu',
                'type' => 'reference',
                'gender' => 'none'
            ],
            [
                'word' => 'Ak tu',
                'type' => 'reference',
                'gender' => 'none'
            ],
            [
                'word' => 'Oi tu',
                'type' => 'reference',
                'gender' => 'none'
            ],
            [
                'word' => 'nevalyva',
                'type' => 'adjective',
                'gender' => 'female'
            ],
            [
                'word' => 'susitraukus',
                'type' => 'adjective',
                'gender' => 'female'
            ],
            [
                'word' => 'neraliuota',
                'type' => 'adjective',
                'gender' => 'female'
            ],
            [
                'word' => 'gleivėta',
                'type' => 'adjective',
                'gender' => 'female'
            ],
            [
                'word' => 'susmirdus',
                'type' => 'adjective',
                'gender' => 'female'
            ],
            [
                'word' => 'netašyta',
                'type' => 'adjective',
                'gender' => 'female'
            ],
            [
                'word' => 'raupsuota',
                'type' => 'adjective',
                'gender' => 'female'
            ],
            [
                'word' => 'klibanti',
                'type' => 'adjective',
                'gender' => 'female'
            ],
            [
                'word' => 'limpanti',
                'type' => 'adjective',
                'gender' => 'female'
            ],
            [
                'word' => 'kreiva',
                'type' => 'adjective',
                'gender' => 'female'
            ],
            [
                'word' => 'juokinga',
                'type' => 'adjective',
                'gender' => 'female'
            ],
            [
                'word' => 'žiopla',
                'type' => 'adjective',
                'gender' => 'female'
            ],
            [
                'word' => 'nevalyvas',
                'type' => 'adjective',
                'gender' => 'male'
            ],
            [
                'word' => 'susitraukęs',
                'type' => 'adjective',
                'gender' => 'male'
            ],
            [
                'word' => 'neraliuotas',
                'type' => 'adjective',
                'gender' => 'male'
            ],
            [
                'word' => 'gleivėtas',
                'type' => 'adjective',
                'gender' => 'male'
            ],
            [
                'word' => 'susmirdęs',
                'type' => 'adjective',
                'gender' => 'male'
            ],
            [
                'word' => 'netašytas',
                'type' => 'adjective',
                'gender' => 'male'
            ],
            [
                'word' => 'raupsuotas',
                'type' => 'adjective',
                'gender' => 'male'
            ],
            [
                'word' => 'klibantis',
                'type' => 'adjective',
                'gender' => 'male'
            ],
            [
                'word' => 'limpantis',
                'type' => 'adjective',
                'gender' => 'male'
            ],
            [
                'word' => 'kreivas',
                'type' => 'adjective',
                'gender' => 'male'
            ],
            [
                'word' => 'juokingas',
                'type' => 'adjective',
                'gender' => 'male'
            ],
            [
                'word' => 'medūza',
                'type' => 'noun',
                'gender' => 'female'
            ],
            [
                'word' => 'žąsis',
                'type' => 'noun',
                'gender' => 'female'
            ],
            [
                'word' => 'antis',
                'type' => 'noun',
                'gender' => 'female'
            ],
            [
                'word' => 'žiurkė',
                'type' => 'noun',
                'gender' => 'female'
            ],
            [
                'word' => 'gyvatė',
                'type' => 'noun',
                'gender' => 'female'
            ],
            [
                'word' => 'kupranugaris',
                'type' => 'noun',
                'gender' => 'male'
            ],
            [
                'word' => 'ąsilas',
                'type' => 'noun',
                'gender' => 'male'
            ],
            [
                'word' => 'bebras',
                'type' => 'noun',
                'gender' => 'male'
            ],
            [
                'word' => 'krokodilas',
                'type' => 'noun',
                'gender' => 'male'
            ],
            [
                'word' => 'tarakonas',
                'type' => 'noun',
                'gender' => 'male'
            ],


        ];


        foreach($words as $key) {
            $word = new Word();
            $word->setWord($key['word']);
            $word->setType($key['type']);
            $word->setGender($key['gender']);
            $manager->persist($word);
        }

        $manager->flush();

    }
}

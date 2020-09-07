<?php


namespace App\Services;


use App\Entity\Word;
use App\Repository\WordRepository;

/**
 * Class WordsService
 * @package App\Services
 */
class WordsService
{

    /**
     * @var WordRepository
     */
    private $wordRepository;

    /**
     * WordsService constructor.
     * @param WordRepository $wordRepository
     */
    public function __construct(WordRepository $wordRepository) {
        $this->wordRepository = $wordRepository;
    }


    /**
     * @return string
     */
    public function getReferenceWord(): string
    {
        $referenceWords = $this->wordRepository->getReferenceWords();

        shuffle($referenceWords);

        return $referenceWords[0]->getWord();
    }

    /**
     * @return Word
     */
    public function getAdjectiveWord(): Word
    {
        $adjectiveWords = $this->wordRepository->getAdjectiveWords();

        shuffle($adjectiveWords);

        return $adjectiveWords[0];
    }

    /**
     * @param string $gender
     * @return string
     */
    public function getNounWord(string $gender): string
    {
        $nounWords = $this->wordRepository->getNounWords($gender);

        shuffle($nounWords);

        return $nounWords[0]->getWord();
    }

    /**
     * @return string
     */
    public function getSentence(): string
    {
        $referenceWord = $this->getReferenceWord();

        /** @var Word $adjectiveWords */
        $adjectiveWord = $this->getAdjectiveWord();

        /** @var Word $nounWord */
        if ($adjectiveWord->getGender() === 'male') {
            $nounWord = $this->getNounWord('male');
        } else {
            $nounWord = $this->getNounWord('female');
        }

        return $referenceWord . ' ' . $adjectiveWord->getWord() . ' ' . $nounWord;
    }
}
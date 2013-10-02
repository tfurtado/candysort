<?php

namespace TestData;

use \Meritt\CandySort\Domain\Candidate;
use \Meritt\CandySort\Domain\CandidateAnswers;

/**
 * Description of CreateCandidateData
 *
 * @author Tiago Furtado <contato at tiagofurtado.com>
 */
class CreateCandidateData
{
    /**
     *
     * @return \Meritt\CandySort\Domain\CandidateAnswers[]
     */
    public static function create() {
        $creator = new self();
        return $creator->buildAllCandidateAnswers();
    }

    private function buildAllCandidateAnswers() {
        $allCandidateAnswers = array();

        $candidate1 = $this->buildCandidate(1, 'Kent Beck', 'beck.kent@meritt.com.br', 'SC');
        $candidate2 = $this->buildCandidate(2, 'Eric Evans', 'evans.eric@meritt.com.br', 'DF');
        $candidate3 = $this->buildCandidate(3, 'Martin Fowler', 'fowler.martin@meritt.com.br', 'SP');
        $candidate4 = $this->buildCandidate(4, 'Alan Kay', 'kay.alan@meritt.com.br', 'SC');
        $candidate5 = $this->buildCandidate(5, 'Robert C. Martin', 'martin.robert@meritt.com.br', 'RS');

        $candidateAnswers1 = $this->buildCandidateAnswers(1, array(0,2,3,1));
        $candidateAnswers1->setCandidate($candidate1);
        $allCandidateAnswers[] = $candidateAnswers1;

        $candidateAnswers2 = $this->buildCandidateAnswers(2, array(1,2,0,4));
        $candidateAnswers2->setCandidate($candidate2);
        $allCandidateAnswers[] = $candidateAnswers2;

        $candidateAnswers3 = $this->buildCandidateAnswers(3, array(4,0,1,4));
        $candidateAnswers3->setCandidate($candidate3);
        $allCandidateAnswers[] = $candidateAnswers3;

        $candidateAnswers4 = $this->buildCandidateAnswers(4, array(0,2,4,4));
        $candidateAnswers4->setCandidate($candidate4);
        $allCandidateAnswers[] = $candidateAnswers4;

        $candidateAnswers5 = $this->buildCandidateAnswers(5, array(4,1,3,1));
        $candidateAnswers5->setCandidate($candidate5);
        $allCandidateAnswers[] = $candidateAnswers5;

        return $allCandidateAnswers;
    }

    /**
     *
     * @param integer $id
     * @param string $name
     * @param string $email
     * @param string $state
     * @return \Meritt\CandySort\Domain\Candidate
     */
    private function buildCandidate($id, $name, $email, $state) {
        $candidate = new Candidate();
        $candidate->setId($id);
        $candidate->setName($name);
        $candidate->setEmail($email);
        $candidate->setState($state);

        return $candidate;
    }

    /**
     *
     * @param integer $id
     * @param integer[] $answers
     * @return \Meritt\CandySort\Domain\CandidateAnswers
     */
    private function buildCandidateAnswers($id, array $answers) {
        $candidateAnswers = new CandidateAnswers();
        $candidateAnswers->setId($id);
        $candidateAnswers->setAnswers($answers);

        return $candidateAnswers;
    }
}

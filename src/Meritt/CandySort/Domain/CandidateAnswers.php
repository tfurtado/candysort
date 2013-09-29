<?php

namespace Meritt\CandySort\Domain;

/**
 * Representa um gabarito
 *
 * Armazena todas as respostas de um candidato para uma determinada prova.
 *
 * @author Tiago Furtado <contato at tiagofurtado.com>
 */
class CandidateAnswers
{
    /**
     * Código do gabarito
     * @var integer
     */
    private $id;

    /**
     * Lista de respostas do candidato, na mesma ordem das questões da prova
     * @var integer[]
     */
    private $answers;

    /**
     * Candidato ao qual se refere este gabarito
     * @var \Meritt\CandySort\Domain\Candidate
     */
    private $candidate;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getAnswers()
    {
        return $this->answers;
    }

    public function setAnswers($answers)
    {
        $this->answers = $answers;
    }

    public function getCandidate()
    {
        return $this->candidate;
    }

    public function setCandidate(\Meritt\CandySort\Domain\Candidate $candidate)
    {
        $this->candidate = $candidate;
    }

}

<?php

namespace Meritt\CandySort\Business;

use \Meritt\CandySort\Domain\Exam;
use \Meritt\CandySort\Domain\CandidateAnswers;

/**
 * Calcula a nota de um determinado gabarito
 *
 * Calcula a nota total de um determinado gabarito baseado nas respostas do
 * candidato e na pontuação atribuída a cada questão.
 *
 * @author Tiago Furtado <contato at tiagofurtado.com>
 */
class ExamGrader
{
    /**
     * Calcula a nota de um determinado candidato
     *
     * @param \Meritt\CandySort\Domain\CandidateAnswers $candidateAnswers
     */
    public function grade(CandidateAnswers $candidateAnswers) {
        throw new \LogicException("Not implemented");
    }
}

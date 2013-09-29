<?php

namespace Meritt\CandySort\Business;

use \Meritt\CandySort\Domain\Exam;

/**
 * Ordenador de resultados
 *
 * Provê recursos para ordenar a lista de gabaritos de uma prova em ordem
 * ascendente.
 *
 * @author Tiago Furtado <contato at tiagofurtado.com>
 */
class ExamSorter
{
    /**
     * Ordena uma lista de candidatos ascendentemente de acordo com a nota
     * obtida na prova.
     *
     * @param \Meritt\CandySort\Domain\CandidateAnswers[] $candidateAnswers
     *        Lista dos gabaritos dos candidatos a ser ordenada
     * @return \Meritt\CandySort\Domain\CandidateAnswers[]
     *         Lista de gabaritos de candidatos ordenada ascendentemente por
     *         nota na prova
     */
    public function sort(array $allCandidateAnswers)
    {
        throw new \LogicException("Not implemented");
    }

}

<?php

namespace Meritt\CandySort\Business;

use \Meritt\CandySort\Domain\Exam;

/**
 * Ordenador de resultados
 *
 * Provê recursos para ordenar a lista de gabaritos de uma prova em ordem
 * descendente, de acordo com a nota obtida.
 *
 * @author Tiago Furtado <contato at tiagofurtado.com>
 */
class ExamSorter extends Sorter
{
    /**
     * Avaliador de notas
     *
     * Avaliador que será usado para calcular a nota dos gabaritos.
     *
     * @var ExamGrader
     */
    private $grader;

    /**
     * Inicializa o ordenador
     *
     * Inicializa o ordenador com uma instância do avaliador de notas para
     * a prova em questão.
     *
     * @param \Meritt\CandySort\Domain\Exam $exam
     */
    public function __construct(Exam $exam)
    {
        $this->grader = new ExamGrader($exam);
    }

    /**
     * Ordena uma lista de candidatos descendentemente de acordo com a nota
     * obtida na prova.
     *
     * @param \Meritt\CandySort\Domain\CandidateAnswers[] $candidateAnswers
     *        Lista dos gabaritos dos candidatos a ser ordenada
     * @return \Meritt\CandySort\Domain\CandidateAnswers[]
     *         Lista de gabaritos de candidatos ordenada descendentemente por
     *         nota na prova
     */
    public function sort(array $items)
    {
        $gradedList = array();
        foreach ($items as $candidateAnswers) {
            $grade = $this->grader->grade($candidateAnswers);
            if (! isset($gradedList[$grade])) {
                $gradedList[$grade] = array();
            }
            $gradedList[$grade][] = $candidateAnswers;
        }
        krsort($gradedList);

        $sortedList = array();
        foreach ($gradedList as $gradedCandidates) {
            $sortedList = array_merge($sortedList, $gradedCandidates);
        }

        return $sortedList;
    }

}

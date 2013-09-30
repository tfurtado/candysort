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
     * Prova a ser avaliada
     * @var \Meritt\CandySort\Domain\Exam
     */
    private $exam;

    /**
     * Inicializa o avaliador
     *
     * Inicializa o avaliador de notas com os dados da prova a ser avaliada.
     *
     * @param \Meritt\CandySort\Domain\Exam $exam
     */
    public function __construct(Exam $exam)
    {
        $this->exam = $exam;
    }

    /**
     * Calcula a nota de um determinado candidato
     *
     * @param \Meritt\CandySort\Domain\CandidateAnswers $candidateAnswers
     */
    public function grade(CandidateAnswers $candidateAnswers) {
        $grade = 0;

        $answers = $candidateAnswers->getAnswers();
        foreach ($this->exam->getQuestions() as $i => $question) {
            if ($answers[$i] == $question->getCorrectOption()) {
                $grade += $question->getPoints();
            }
        }

        return $grade;
    }
}

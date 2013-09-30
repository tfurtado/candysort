<?php

namespace Meritt\CandySort;

use \Meritt\CandySort\Domain\Exam;
use \Meritt\CandySort\Business\ExamSorter;
use \Meritt\CandySort\Business\CandidateFilterer;

/**
 * Description of OrderingService
 *
 * @author Tiago Furtado <contato at tiagofurtado.com>
 */
class SortingService
{

    /**
     * @param \Meritt\CandySort\Domain\Exam $exam
     * @param \Meritt\CandySort\Domain\CandidateAnswers[] $allCandidateAnswers
     * @param \Meritt\CandySort\Business\AttributeFilter[] $filters
     * @return \Meritt\CandySort\Domain\Candidate[]
     *         Lista de candidatos ordenada e filtrada
     */
    public static function getSortedCandidates($exam, $allCandidateAnswers,
        $filters = array())
    {
        if (!$exam instanceof Exam) {
            throw new \InvalidArgumentException('$exam must be an instance of \\Meritt\\CandySort\\Domain\\Exam');
        }

        if (!is_array($allCandidateAnswers)) {
            throw new \InvalidArgumentException('$allCandidateAnswers must be an array');
        }

        if (!is_array($filters)) {
            throw new \InvalidArgumentException('$filters must be an array');
        }

        $filterer = new CandidateFilterer($allCandidateAnswers);
        $sorter = new ExamSorter($exam);

        foreach ($filters as $filter) {
            $filterer->applyFilter($filter);
        }

        $sortedCandidateAnswers = $sorter->sort($filterer->getCandidateAnswers());
        $sortedCandidates = array();
        foreach ($sortedCandidateAnswers as $candidateAnswers) {
            $sortedCandidates[] = $candidateAnswers->getCandidate();
        }

        return $sortedCandidates;
    }

}

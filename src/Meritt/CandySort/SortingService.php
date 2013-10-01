<?php

namespace Meritt\CandySort;

use \Meritt\CandySort\Domain\Exam;
use \Meritt\CandySort\Business\Sorter;
use \Meritt\CandySort\Business\Filterer;

/**
 * Description of OrderingService
 *
 * @author Tiago Furtado <contato at tiagofurtado.com>
 */
class SortingService
{
    /**
     * @var \Meritt\CandySort\Business\Sorter
     */
    private $sorter;

    /**
     *
     * @var \Meritt\CandySort\Business\Filterer
     */
    private $filterer;

    public function __construct(Sorter $sorter, Filterer $filterer)
    {
        $this->sorter = $sorter;
        $this->filterer = $filterer;
    }

    /**
     * @param \Meritt\CandySort\Domain\Exam $exam
     * @param \Meritt\CandySort\Domain\CandidateAnswers[] $allCandidateAnswers
     * @param \Meritt\CandySort\Business\AttributeFilter[] $filters
     * @return \Meritt\CandySort\Domain\Candidate[]
     *         Lista de candidatos ordenada e filtrada
     */
    public function getSortedCandidates($exam, $allCandidateAnswers,
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

        foreach ($filters as $filter) {
            $this->filterer->applyFilter($filter);
        }

        $sortedCandidateAnswers = $this->sorter->sort(
            $this->filterer->getFilteredItems()
        );
        $sortedCandidates = array();
        foreach ($sortedCandidateAnswers as $candidateAnswers) {
            $sortedCandidates[] = $candidateAnswers->getCandidate();
        }

        return $sortedCandidates;
    }

}

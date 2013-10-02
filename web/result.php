<?php

require_once '../vendor/autoload.php';

use \TestData\CreateCandidateData;
use \TestData\CreateExamData;
use \Meritt\CandySort\Business\ExamSorter;
use \Meritt\CandySort\Business\CandidateFilterer;
use \Meritt\CandySort\SortingService;
use \Meritt\CandySort\Business\AttributeFilterEquals;
use \Meritt\CandySort\Business\AttributeFilterContains;

if (empty($_POST)) {
    header('Location: index.php');
    die;
}

$exam = CreateExamData::create();

$allCandidateAnswersRaw = $_POST['candidateAnswer'];
$allCandidateAnswers = CreateCandidateData::create();
foreach ($allCandidateAnswers as $i => $candidateAnswers) {
    $allCandidateAnswers[$i]->setAnswers($allCandidateAnswersRaw[$i]);
}

$filtersRaw = $_POST['filter'];
$filterValuesRaw = $_POST['filter_value'];
$filters = array();
foreach ($filtersRaw as $attribute => $filterRaw) {
    $filter = null;
    $value = trim($filterValuesRaw[$attribute]);
    if (! empty($filterRaw) && ! empty($value)) {
        switch ($filterRaw) {
            case 'equals':
                $filter = new AttributeFilterEquals($attribute, $value);
                break;

            case 'contains':
                $filter = new AttributeFilterContains($attribute, $value);
                break;
        }
    }

    if ($filter !== null) {
        $filters[] = $filter;
    }
}

$sorter = new ExamSorter($exam);
$filterer = new CandidateFilterer($allCandidateAnswers);
$sortingService = new SortingService($sorter, $filterer);
$sorted = $sortingService->getSortedCandidates($exam, $allCandidateAnswers, $filters);

$candidates = array();
foreach($sorted as $candidate) {
    $candidates[] = $candidate->getId();
}

echo json_encode($candidates);
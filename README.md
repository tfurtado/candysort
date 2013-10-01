# CandySort
CandySort is a service written as the answer to Meritt's Full Stack Developer
Technical Challenge. It aims at sort a list of candidates that took an exam by
their grades.

From the briefing (in portuguese):

> Sua tarefa consiste na modelagem e desenvolvimento de um serviço de ordenação
> e filtragem de candidatos de uma prova.

It is named upon an intended pun on the sweet qualities that some candidates
exhibit, specially [this one](http://github.com/tfurtado). In portuguese one
could say candidates are "uns doces" ;-)

## Dependencies
- [PHP](http://php.net/) version >= 5.4.0
- [Composer](http://getcomposer.org/)

## Configuration
Download composer.phar and run from the project directory:

    $ php composer.phar install

To run the automated test, including all 7 test cases from the briefing
document, run:

    $ php vendor/phpunit/phpunit/phpunit.php --bootstrap vendor/autoload.php tests

## Usage

The CandySort Sorting Service can be used instancing the class
\Meritt\CandySort\SortingService. There must be given two parameters:

1. An instance of a \Meritt\CandySort\Sorter, such as
   \Meritt\CandySort\ExamSorter
2. An instance of a \Meritt\CandySort\Filterer, such as
   \Meritt\CandySort\CandidateFilterer

Example usage:

```php
use \Meritt\CandySort\SortingService
use \Meritt\CandySort\Business\ExamSorter;
use \Meritt\CandySort\Business\CandidateFilterer;
use \Meritt\CandySort\Business\AttributeFilterContains;

...

// $exam contains an instance of \Meritt\CandySort\Domain\Exam
$sorter = new ExamSorter($exam);

// $allCandidateAnswers is an array of instances of
// \Meritt\CandySort\Domain\CandidateAnswers
$filterer = new CandidateFilterer($allCandidateAnswers);
$sortingService = new SortingService($sorter, $filterer);

$filters = array(
    new AttributeFilterContains('name', 'A')
);

// $sorted will contain a list of the candidates whose name contains 'A'
// ordered from the highest grade to the lowest
$sorted = $sortingService->getSortedCandidates(
    $exam, $allCandidateAnswers, $filters
);
```

## Details

All implemented classes can be found in the class diagram included in this
project.
<?php
namespace Meritt\CandySort;

use \Meritt\CandySort\SortingService;
use \TestData\CreateCandidateData;
use \TestData\CreateExamData;
use \Meritt\CandySort\Business\ExamSorter;
use \Meritt\CandySort\Business\CandidateFilterer;
use \Meritt\CandySort\Business\AttributeFilterEquals;
use \Meritt\CandySort\Business\AttributeFilterContains;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2013-09-30 at 10:45:45.
 */
class SortingServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Meritt\CandySort\Domain\Exam
     */
    protected $exam;

    /**
     * @var \Meritt\CandySort\Domain\CandidateAnswers[]
     */
    protected $allCandidateAnswers;

    /**
     * @var \Meritt\CandySort\SortingService
     */
    protected $sortingService;

    /**
     * Inicializa dados base para os testes: prova e gabaritos dos candidatos
     */
    protected function setUp()
    {
        $this->exam = CreateExamData::create();
        $this->allCandidateAnswers = CreateCandidateData::create();

        $sorter = new ExamSorter($this->exam);
        $filterer = new CandidateFilterer( $this->allCandidateAnswers);
        $this->sortingService = new SortingService($sorter, $filterer);
    }

    /**
     * Executa o caso de teste 1 do briefing
     *
     * Executa o caso de teste 1, com os seguintes dados:
     * - Prova: null
     * - Lista de candidatos: null
     * - Regras de filtragem: null
     *
     * Retorno esperado: InvalidArgumentException
     *
     * @covers Meritt\CandySort\OrderingService::getSortedCandidates
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage $exam must be an instance of \Meritt\CandySort\Domain\Exam
     */
    public function testCase1()
    {
        $this->sortingService->getSortedCandidates(
            null, null, null
        );
    }

    /**
     * Executa o caso de teste 2 do briefing
     *
     * Executa o caso de teste 2, com os seguintes dados:
     * - Prova: Prova 1
     * - Lista de candidatos: null
     * - Regras de filtragem: null
     *
     * Retorno esperado: InvalidArgumentException
     *
     * @covers Meritt\CandySort\OrderingService::getSortedCandidates
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage $allCandidateAnswers must be an array
     */
    public function testCase2()
    {
        $this->sortingService->getSortedCandidates(
            $this->exam, null, null
        );
    }

    /**
     * Executa o caso de teste 3 do briefing
     *
     * Executa o caso de teste 3, com os seguintes dados:
     * - Prova: Prova 1
     * - Lista de candidatos: Lista padrão
     * - Regras de filtragem: null
     *
     * Retorno esperado: InvalidArgumentException
     *
     * @covers Meritt\CandySort\OrderingService::getSortedCandidates
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage $filters must be an array
     */
    public function testCase3()
    {
        $this->sortingService->getSortedCandidates(
            $this->exam, $this->allCandidateAnswers, null
        );
    }

    /**
     * Executa o caso de teste 4 do briefing
     *
     * Executa o caso de teste 4, com os seguintes dados:
     * - Prova: Prova 1
     * - Lista de candidatos: Lista padrão
     * - Regras de filtragem: Lista vazia
     *
     * Retorno esperado: Candidatos [1, 5, 4, 2, 3]
     *
     * @covers Meritt\CandySort\OrderingService::getSortedCandidates
     */
    public function testCase4()
    {
        $filters = array();

        $sorted = $this->sortingService->getSortedCandidates(
            $this->exam, $this->allCandidateAnswers, $filters
        );

        $this->assertEquals(array(
            $this->allCandidateAnswers[0]->getCandidate(),
            $this->allCandidateAnswers[4]->getCandidate(),
            $this->allCandidateAnswers[3]->getCandidate(),
            $this->allCandidateAnswers[1]->getCandidate(),
            $this->allCandidateAnswers[2]->getCandidate()
        ), $sorted);
    }

    /**
     * Executa o caso de teste 5 do briefing
     *
     * Executa o caso de teste 5, com os seguintes dados:
     * - Prova: Prova 1
     * - Lista de candidatos: Lista padrão
     * - Regras de filtragem: Filtro por estado (SC)
     *
     * Retorno esperado: Candidatos [1, 4]
     *
     * @covers Meritt\CandySort\OrderingService::getSortedCandidates
     */
    public function testCase5()
    {
        $filters = array(
            new AttributeFilterEquals('state', 'SC')
        );

        $sorted = $this->sortingService->getSortedCandidates(
            $this->exam, $this->allCandidateAnswers, $filters
        );

        $this->assertEquals(array(
            $this->allCandidateAnswers[0]->getCandidate(),
            $this->allCandidateAnswers[3]->getCandidate()
        ), $sorted);
    }

    /**
     * Executa o caso de teste 6 do briefing
     *
     * Executa o caso de teste 6, com os seguintes dados:
     * - Prova: Prova 1
     * - Lista de candidatos: Lista padrão
     * - Regras de filtragem: Filtro por nome (contendo "A")
     *
     * Retorno esperado: Candidatos [5, 4, 2, 3]
     *
     * @covers Meritt\CandySort\OrderingService::getSortedCandidates
     */
    public function testCase6()
    {
        $filters = array(
            new AttributeFilterContains('name', 'A')
        );

        $sorted = $this->sortingService->getSortedCandidates(
            $this->exam, $this->allCandidateAnswers, $filters
        );

        $this->assertEquals(array(
            $this->allCandidateAnswers[4]->getCandidate(),
            $this->allCandidateAnswers[3]->getCandidate(),
            $this->allCandidateAnswers[1]->getCandidate(),
            $this->allCandidateAnswers[2]->getCandidate()
        ), $sorted);
    }

    /**
     * Executa o caso de teste 7 do briefing
     *
     * Executa o caso de teste 7, com os seguintes dados:
     * - Prova: Prova 1
     * - Lista de candidatos: Lista padrão
     * - Regras de filtragem: Filtro por nome (contendo "A")
     *                        e email(contendo "L")
     *
     * Retorno esperado: Candidatos [4, 3]
     *
     * @covers Meritt\CandySort\OrderingService::getSortedCandidates
     */
    public function testCase7()
    {
        $filters = array(
            new AttributeFilterContains('name', 'A'),
            new AttributeFilterContains('email', 'L')
        );

        $sorted = $this->sortingService->getSortedCandidates(
            $this->exam, $this->allCandidateAnswers, $filters
        );

        $this->assertEquals(array(
            $this->allCandidateAnswers[3]->getCandidate(),
            $this->allCandidateAnswers[2]->getCandidate()
        ), $sorted);
    }
}

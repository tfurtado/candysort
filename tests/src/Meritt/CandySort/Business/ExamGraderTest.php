<?php

namespace Meritt\CandySort\Business;

use \TestData\CreateCandidateData;
use \TestData\CreateExamData;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2013-09-29 at 23:22:29.
 */
class ExamGraderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Meritt\CandySort\Domain\Exam
     */
    protected $exam;

    /**
     * @var \Meritt\CandySort\Domain\CandidateAnswers
     */
    protected $allCandidateAnswers;

    /**
     * @var \Meritt\CandySort\Business\ExamGrader
     */
    protected $grader;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->exam = CreateExamData::create();
        $this->allCandidateAnswers = CreateCandidateData::create();
        $this->grader = new ExamGrader($this->exam);
    }

    /**
     * @covers Meritt\CandySort\Business\ExamGrader::grade
     */
    public function testGradeCandidate1()
    {
        $grade = $this->grader->grade($this->allCandidateAnswers[0]);
        $this->assertEquals(750, $grade);
    }

    /**
     * @covers Meritt\CandySort\Business\ExamGrader::grade
     */
    public function testGradeCandidate3()
    {
        $grade = $this->grader->grade($this->allCandidateAnswers[2]);
        $this->assertEquals(0, $grade);
    }

    /**
     * @covers Meritt\CandySort\Business\ExamGrader::grade
     */
    public function testGradeCandidate5()
    {
        $grade = $this->grader->grade($this->allCandidateAnswers[4]);
        $this->assertEquals(450, $grade);
    }

}

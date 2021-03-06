<?php

namespace Meritt\CandySort\Business;

use \TestData\CreateCandidateData;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2013-09-30 at 15:07:37.
 */
class CandidateFiltererTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Meritt\CandySort\Domain\CandidateAnswers[]
     */
    protected $allCandidateAnswers;

    /**
     * @var CandidateFilterer
     */
    protected $filterer;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->allCandidateAnswers = CreateCandidateData::create();
        $this->filterer = new CandidateFilterer($this->allCandidateAnswers);
    }

    /**
     * @covers Meritt\CandySort\Business\CandidateFilterer::applyFilter
     * @covers Meritt\CandySort\Business\CandidateFilterer::getCandidateAnswers
     */
    public function testNoFilterApplied()
    {
        $list = $this->filterer->getFilteredItems();
        $this->assertEquals($this->allCandidateAnswers, $list);
    }

    /**
     * @covers Meritt\CandySort\Business\CandidateFilterer::applyFilter
     * @covers Meritt\CandySort\Business\CandidateFilterer::getCandidateAnswers
     */
    public function testUnfiltered()
    {
        $filter = new AttributeFilterContains('email', 'meritt');
        $this->filterer->applyFilter($filter);

        $list = $this->filterer->getFilteredItems();
        $this->assertEquals($this->allCandidateAnswers, $list);
    }

    /**
     * @covers Meritt\CandySort\Business\CandidateFilterer::applyFilter
     * @covers Meritt\CandySort\Business\CandidateFilterer::getCandidateAnswers
     */
    public function testFiltered()
    {
        $filter = new AttributeFilterContains('name', 'A');
        $this->filterer->applyFilter($filter);

        $list = $this->filterer->getFilteredItems();
        $this->assertEquals(array(
            $this->allCandidateAnswers[1],
            $this->allCandidateAnswers[2],
            $this->allCandidateAnswers[3],
            $this->allCandidateAnswers[4]
        ), $list);
    }

    /**
     * @covers Meritt\CandySort\Business\CandidateFilterer::applyFilter
     * @covers Meritt\CandySort\Business\CandidateFilterer::getCandidateAnswers
     */
    public function testFilteredAll()
    {
        $filter = new AttributeFilterEquals('name', 'John Doe');
        $this->filterer->applyFilter($filter);

        $list = $this->filterer->getFilteredItems();
        $this->assertEquals(array(), $list);
    }
}

<?php

namespace Meritt\CandySort\Domain;

/**
 * Item de prova
 *
 * Armazena o texto da questão, a lista de alternativas, a alternativa correta
 * e o número de pontos atribuídos ao acerto do item.
 *
 * @author Tiago Furtado <contato at tiagofurtado.com>
 */
class Question
{
    /**
     * Código do item
     * @var integer
     */
    private $id;

    /**
     * Texto da questão
     * @var string
     */
    private $stem;

    /**
     * Pontuação atribuída ao item
     * @var integer
     */
    private $points;

    /**
     * Prova à qual está vinculado o item
     * @var \Meritt\CandySort\Domain\Exam
     */
    private $exam;

    /**
     * Lista de alternativas do item
     * @var \Meritt\CandySort\Domain\Option[]
     */
    private $options;

    /**
     * Identifica a alternativa correta
     * @var integer
     */
    private $correctOption;

    function __construct()
    {
        $this->options = array();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getStem()
    {
        return $this->stem;
    }

    public function setStem($stem)
    {
        $this->stem = $stem;
    }

    public function getPoints()
    {
        return $this->points;
    }

    public function setPoints($points)
    {
        $this->points = $points;
    }

    public function getExam()
    {
        return $this->exam;
    }

    public function setExam(Exam $exam)
    {
        $this->exam = $exam;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function addOption(Option $option)
    {
        $this->options[] = $option;
        $option->setQuestion($this);
    }

    public function getCorrectOption()
    {
        return $this->correctOption;
    }

    public function setCorrectOption($correctOption)
    {
        $this->correctOption = $correctOption;
    }

}

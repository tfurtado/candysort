<?php

namespace Meritt\CandySort\Domain;

/**
 * Representa uma prova
 *
 * Armazena a data de realização da prova e a lista de itens que a compõem.
 * 
 * @author Tiago Furtado <contato at tiagofurtado.com>
 */
class Exam
{
    /**
     * Código da prova
     * @var integer
     */
    private $id;

    /**
     * Data de realização da prova
     * @var \DateTime
     */
    private $date;

    /**
     * Lista de itens da prova
     * @var \Meritt\CandySort\Domain\Question[]
     */
    private $questions;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    public function getQuestions()
    {
        return $this->questions;
    }

    public function setQuestions($questions)
    {
        $this->questions = $questions;
    }


}

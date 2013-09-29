<?php

namespace Meritt\CandySort\Domain;

/**
 * Representa uma alternativa
 *
 * Armazena a descrição de uma alternativa de um determinado item de uma prova.
 *
 * @author Tiago Furtado <contato at tiagofurtado.com>
 */
class Option
{
    /**
     * Código da alternativa
     * @var integer
     */
    private $id;

    /**
     * Descrição da alternativa
     * @var string
     */
    private $description;

    /**
     * Item ao qual está associada a alternativa
     * @var \Meritt\CandySort\Domain\Question
     */
    private $question;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getQuestion()
    {
        return $this->question;
    }

    public function setQuestion(\Meritt\CandySort\Domain\Question $question)
    {
        $this->question = $question;
    }

}

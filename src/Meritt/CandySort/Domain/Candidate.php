<?php

namespace Meritt\CandySort\Domain;

/**
 * Representa um candidato
 *
 * Armazena os dados cadastrais do candidato.
 
 * @author Tiago Furtado <contato at tiagofurtado.com>
 */
class Candidate
{
    /**
     * Código do candidato
     * @var integer
     */
    private $id;

    /**
     * Nome do candidato
     * @var string
     */
    private $name;

    /**
     * E-mail do candidato
     * @var string
     */
    private $email;

    /**
     * Estado (UF) do candidato
     * @var string
     */
    private $state;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }



}

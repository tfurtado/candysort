<?php

namespace Meritt\CandySort\Business;

use \Meritt\CandySort\Domain\Candidate;

/**
 * Filtro para um atributo
 *
 * Definição básica de um filtro para um atributo da classe
 * \Meritt\CandySort\Domain\Candidate.
 *
 * As classes que a estendem darão os comportamentos adequados para os filtros.
 *
 * @author Tiago Furtado <contato at tiagofurtado.com>
 */
abstract class AttributeFilter extends Filter
{
    /**
     * Nome do atributo a ser filtrado
     * @var string
     */
    protected $attribute;

    /**
     * Valor a ser utilizado no filtro
     * @var string
     */
    protected $value;

    /**
     * Inicializa o filtro
     *
     * Define os valores para nome do atributo e valor a ser utilizado no filtro
     *
     * @param string $attribute Nome do atributo a ser filtrado
     * @param string $value Valor a ser utilizado no filtro
     */
    public function __construct($attribute, $value)
    {
        $this->attribute = $attribute;
        $this->value = $value;
    }

    public function isFiltered($object)
    {
        if ($object instanceof Candidate) {
            $attributeValue = null;
            switch ($this->attribute) {
                case 'name':
                    $attributeValue = $object->getName();
                    break;

                case 'email':
                    $attributeValue = $object->getEmail();
                    break;

                case 'state':
                    $attributeValue = $object->getState();
                    break;
            }

            if ($attributeValue !== null) {
                return $this->checkFilter($attributeValue);
            }
        }

        throw new \InvalidArgumentException();
    }

    /**
     * Verifica se um determinado valor de atributo atende ao filtro.
     *
     * Aplica a definição do tipo de filtro, verificando se o valor passado
     * como parâmetro atende aos critérios de filtragem.
     *
     * @param string $attributeValue Valor a ser verificado
     * @return bool <b>true</b> caso o valor atenda ao filtro.
     *              <b>false</b> caso contrário.
     */
    abstract protected function checkFilter($attributeValue);
}

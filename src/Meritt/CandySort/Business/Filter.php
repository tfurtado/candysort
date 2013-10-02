<?php

namespace Meritt\CandySort\Business;

/**
 * Filtro para um objeto
 *
 * Definição básica de um filtro para um objeto qualquer. Regras podem ser
 * aplicadas para que o objeto atenda ou não às condições de filtragem.
 *
 * As classes que a estendem darão os comportamentos adequados para os filtros.
 *
 * @author Tiago Furtado <contato at tiagofurtado.com>
 */
abstract class Filter
{
    /**
     * Verifica se um determinado objeto atende aos critérios do filtro
     *
     * O filtro verifica se o valor do atributo a ser filtrado atende aos
     * critérios estabelecidos no filtro.
     *
     * @param \Meritt\CandySort\Domain\Candidate $object
     *        Objeto a ser verificado
     * @throws \InvalidArgumentException Caso seja fornecido um nome de atributo
     *                                   inválido para o filtro.
     * @return bool <b>true</b> caso o objeto atenda ao filtro.
     *              <b>false</b> caso contrário.
     */
    abstract public function isFiltered($object);
}

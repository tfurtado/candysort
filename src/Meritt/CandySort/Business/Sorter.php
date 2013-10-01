<?php

namespace Meritt\CandySort\Business;

/**
 * Fornece recursos para ordenar uma lista de itens
 *
 * @author Tiago Furtado <contato at tiagofurtado.com>
 */
abstract class Sorter
{
    /**
     * Ordena uma lista de itens
     *
     * @param object[] $items Lista de itens a serem ordenados
     * @return object[] Lista de itens após ordenação
     */
    abstract public function sort(array $items);
}

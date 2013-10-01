<?php

namespace Meritt\CandySort\Business;

/**
 * Fornece recursos para filtrar uma lista de itens
 *
 * @author Tiago Furtado <contato at tiagofurtado.com>
 */
abstract class Filterer
{
    /**
     * Aplica um filtro à lista de itens
     *
     * Aplica o filtro passado como parâmetro a cada um dos itens da lista
     * e retira todos os quais não atendam aos critérios do filtro.
     *
     * @param \Meritt\CandySort\Business\Filter $filter
     *        Filtro que será aplicado à lista de itens.
     */
    abstract public function applyFilter(Filter $filter);

    /**
     * Obtém a lista de itens filtrados
     *
     * Obtém a lista de itens no estado atual.
     *
     * @return object[] Lista de itens
     */
    abstract public function getFilteredItems();
}

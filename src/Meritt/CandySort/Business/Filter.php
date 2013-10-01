<?php

namespace Meritt\CandySort\Business;

/**
 * Description of Filter
 *
 * @author Tiago Furtado <contato at tiagofurtado.com>
 */
abstract class Filter
{
    abstract public function isFiltered($object);
}

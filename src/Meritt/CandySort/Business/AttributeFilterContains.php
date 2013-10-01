<?php

namespace Meritt\CandySort\Business;

/**
 * Filtro do tipo: atributo <b>contém</b> <i>valor</i>
 *
 * @author Tiago Furtado <contato at tiagofurtado.com>
 */
class AttributeFilterContains extends AttributeFilter
{

    protected function checkFilter($attributeValue)
    {
        return preg_match("/{$this->value}/i", $attributeValue) > 0;
    }

}

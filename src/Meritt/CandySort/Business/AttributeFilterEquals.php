<?php

namespace Meritt\CandySort\Business;

/**
 * Description of AttributeEqualsFilter
 *
 * @author Tiago Furtado <contato at tiagofurtado.com>
 */
class AttributeFilterEquals extends AttributeFilter
{

    protected function checkFilter($attributeValue)
    {
        return preg_match("/^{$this->value}$/i", $attributeValue) > 0;
    }

}

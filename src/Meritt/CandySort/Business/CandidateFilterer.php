<?php

namespace Meritt\CandySort\Business;

/**
 * Filtrador de resultados
 *
 * Provê recursos para filtrar a lista de gabaritos de uma prova, de acordo com
 * filtros para os atributos dos candidatos.
 *
 * @author Tiago Furtado <contato at tiagofurtado.com>
 */
class CandidateFilterer extends Filterer
{
    /**
     * Lista de candidatos
     *
     * Quando da construção do objeto, armazena a lista original.
     * A aplicação de filtros pode alterar esta lista.
     *
     * @var \Meritt\CandySort\Domain\CandidateAnswers[]
     */
    private $candidateAnswers;

    /**
     * Inicializa o filtrador
     *
     * O filtrador recebe uma lista de candidatos a ser filtrada e a armazena.
     *
     * @param \Meritt\CandySort\Domain\CandidateAnswers[] $candidateAnswers
     *        Lista de candidatos a ser filtrada
     */
    public function __construct(array $candidateAnswers)
    {
        $this->candidateAnswers = $candidateAnswers;
    }

    public function applyFilter(Filter $filter)
    {
        if ($filter instanceof AttributeFilter) {
            $newCandidateAnswers = array();
            foreach ($this->candidateAnswers as $candidateAnswers) {
                if ($filter->isFiltered($candidateAnswers->getCandidate())) {
                    $newCandidateAnswers[] = $candidateAnswers;
                }
            }
            $this->candidateAnswers = $newCandidateAnswers;
        } else {
            throw new \InvalidArgumentException(
                "Only AttributeFilter filters can be applied within CandidateFilterer"
            );
        }
    }

    public function getFilteredItems()
    {
        return $this->candidateAnswers;
    }
}

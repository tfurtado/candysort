<?php

namespace Meritt\CandySort\Business;

use Meritt\CandySort\Domain\CandidateAnswers;

/**
 * Filtrador de resultados
 *
 * Provê recursos para filtrar a lista de gabaritos de uma prova, de acordo com
 * filtros para os atributos dos candidatos.
 *
 * @author Tiago Furtado <contato at tiagofurtado.com>
 */
class CandidateFilterer
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

    /**
     * Aplica um filtro à lista de candidatos
     *
     * Aplica o filtro passado como parâmetro a cada um dos gabaritos da lista
     * e retira todos os gabaritos cujos candidatos não atendam aos critérios do
     * filtro.
     *
     * @param \Meritt\CandySort\Business\AttributeFilter $filter
     *        Filtro que será aplicado à lista de candidatos.
     */
    public function applyFilter(AttributeFilter $filter)
    {
        $newCandidateAnswers = array();
        foreach ($this->candidateAnswers as $candidateAnswers) {
            if ($filter->isFiltered($candidateAnswers->getCandidate())) {
                $newCandidateAnswers[] = $candidateAnswers;
            }
        }
        $this->candidateAnswers = $newCandidateAnswers;
    }

    /**
     * Obtém a lista de gabaritos
     *
     * @return \Meritt\CandySort\Domain\CandidateAnswers[]
     */
    public function getCandidateAnswers()
    {
        return $this->candidateAnswers;
    }
}

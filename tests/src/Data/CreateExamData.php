<?php

namespace Data;

use \Meritt\CandySort\Domain\Exam;
use \Meritt\CandySort\Domain\Question;
use \Meritt\CandySort\Domain\Option;

/**
 * Description of LoadExamData
 *
 * @author Tiago Furtado <contato at tiagofurtado.com>
 */
class CreateExamData
{
    public static function create() {
        $creator = new self();
        return $creator->buildExam();
    }

    /**
     * Constrói uma prova de testes
     *
     * @return \Meritt\CandySort\Domain\Exam
     */
    private function buildExam() {
        $exam = new Exam();
        $exam->setDate(new \DateTime('2013-10-25'));

        $question1 = $this->buildQuestion(1, 'Em PHP, qual o resultado da execução do código "echo 1 + 012;"?', 0, 100);
        $option1 = $this->buildOption(1, '11.');
        $option2 = $this->buildOption(2, '13.');
        $option3 = $this->buildOption(3, '10.');
        $option4 = $this->buildOption(4, '12.');
        $option5 = $this->buildOption(5, 'NDA.');
        $question1->addOption($option1);
        $question1->addOption($option2);
        $question1->addOption($option3);
        $question1->addOption($option4);
        $question1->addOption($option5);
        $exam->addQuestion($question1);

        $question2 = $this->buildQuestion(2, 'Como é possível realizar alterações de diretivas do PHP?', 2, 200);
        $option6 = $this->buildOption(6, 'Somente através do arquivo php.ini.');
        $option7 = $this->buildOption(7, 'Nunca pela configuração do web server.');
        $option8 = $this->buildOption(8, 'Através do arquivo php.ini, função ini_set() ou nos arquivos de configuração do web server.');
        $option9 = $this->buildOption(9, 'Apenas com a função ini_set().');
        $option10 = $this->buildOption(10, 'NDA.');
        $question2->addOption($option6);
        $question2->addOption($option7);
        $question2->addOption($option8);
        $question2->addOption($option9);
        $question2->addOption($option10);
        $exam->addQuestion($question2);

        $question3 = $this->buildQuestion(3, 'Em PHP, qual o resultado da execução do código "echo \'10 bananas\' + \'20 laranjas\';', 3, 150);
        $option11 = $this->buildOption(11, "'10bananas20laranjas'");
        $option12 = $this->buildOption(12, "''");
        $option13 = $this->buildOption(13, '0');
        $option14 = $this->buildOption(14, '30');
        $option15 = $this->buildOption(15, 'NDA.');
        $question3->addOption($option11);
        $question3->addOption($option12);
        $question3->addOption($option13);
        $question3->addOption($option14);
        $question3->addOption($option15);
        $exam->addQuestion($question3);

        $question4 = $this->buildQuestion(4, 'Quais são os 5 princípios S.O.L.I.D.?', 1, 300);
        $option16 = $this->buildOption(16, 'Single Responsability principle, Open/closed principle, Liskov substitution principle, Interface segregation principle e Data Fixture Principle.');
        $option17 = $this->buildOption(17, 'Single Responsability principle, Open/closed principle, Liskov substitution principle, Interface segregation principle e Dependency Inversion Principle.');
        $option18 = $this->buildOption(18, 'Single Responsability principle, Open/closed principle, Lean principle, Interface segregation principle e Dependency Inversion Principle.');
        $option19 = $this->buildOption(19, 'Singleton principle, Open/closed principle, Liskov substitution principle, Interface segregation principle e Dependency Inversion Principle.');
        $option20 = $this->buildOption(20, 'NDA.');
        $question4->addOption($option16);
        $question4->addOption($option17);
        $question4->addOption($option18);
        $question4->addOption($option19);
        $question4->addOption($option20);
        $exam->addQuestion($question4);

        return $exam;
    }

    /**
     * Constrói um item da prova
     *
     * @param integer $id
     * @param string $stem
     * @param integer $correctOption
     * @param integer $points
     * @return \Meritt\CandySort\Domain\Question
     */
    private function buildQuestion($id, $stem, $correctOption, $points) {
        $question = new Question();
        $question->setId($id);
        $question->setStem($stem);
        $question->setCorrectOption($correctOption);
        $question->setPoints($points);

        return $question;
    }

    /**
     * Constrói uma alternativa da prova
     *
     * @param integer $id
     * @param string $description
     * @return \Meritt\CandySort\Domain\Option
     */
    private function buildOption($id, $description) {
        $option = new Option();
        $option->setId($id);
        $option->setDescription($description);

        return $option;
    }
}

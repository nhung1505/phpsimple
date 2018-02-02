<?php
class Calculator {
    private $operator;
    function __construct(IOperator $operator){
        $this->operator = $operator;
    }

    function execute($firstOperand, $secondOperand){
        if(isset($this->operator)){
            return $this->operator->execute($firstOperand, $secondOperand);
        }
        throw new Exception("Operator is not setted");
    }
}
?>

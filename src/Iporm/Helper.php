<?php

namespace Iporm;

class Helper
{
    /**
     * @var array
     */
    private $validQueryTypes;

    /**
     * @var array
     */
    private $validOperands;

    /**
     * Helper constructor.
     */
    public function __construct() 
    {
        $this->validQueryTypes = ['delete','insert_into','select','update'];
        $this->validOperands = ['=', '!=', '<', '>', 'in', 'not in', 'or'];
    }

    /**
     * getValidQueryTypes
     *
     * @return array
     */
    public function getValidQueryTypes()
    {
        return $this->validQueryTypes;
    }

    /**
     * getValidOperands
     *
     * @return array
     */
    public function getValidOperands()
    {
        return $this->validOperands;
    }

    /**
     * validateOperand
     *
     * @param $operand
     * @return string
     */
    public function validateOperand($operand)
    {
        $return = $operand;
        if(!in_array($operand, $this->validOperands))
        {
            $return = '=';
        }

        return $return;
    }

    /**
     * isIterable
     *
     * @param $value
     * @return bool
     */
    public function isIterable($value)
    {
        return (is_array($value) && !empty($value));
    }
}
<?php
  class ContratoValidate {
    public static function testarDtInicial($paramDtInicial) {
      if (trim(strlen($paramDtInicial)) >= 2)
        return true;
      else
        return false;
    }	
    public static function testarDtFinal($paramDtFinal) {
      if (trim(strlen($paramDtFinal)) >= 3)
        return true;
      else
        return false;
    }	
    public static function testarValor($paramValor) {
      if (trim(strlen($paramValor)) >= 4)
        return true;
      else
        return false;
    }	
  }
?>

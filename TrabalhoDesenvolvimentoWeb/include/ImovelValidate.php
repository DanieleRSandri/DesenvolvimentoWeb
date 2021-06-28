<?php
  class ImovelValidate {
    public static function testarSituacao($paramSituacao) {
      if (trim(strlen($paramSituacao)) >= 2)
        return true;
      else
        return false;
    }
    public static function testarTipoimovel($paramTipoimovel) {
      if (trim(strlen($paramTipoimovel)) >= 3)
        return true;
      else
        return false;
    }	
    public static function testarDescricao($paramDescricao) {
      if (trim(strlen($paramDescricao)) >= 4)
        return true;
      else
        return false;
    }	
    public static function testarAluguel($paramAluguel) {
      if (trim(strlen($paramAluguel)) >= 5)
        return true;
      else
        return false;
    }	
  }
?>

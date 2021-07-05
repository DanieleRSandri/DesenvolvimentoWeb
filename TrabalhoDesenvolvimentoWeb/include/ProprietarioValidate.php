<?php
  class ProprietarioValidate {
    public static function testarNome($paramNome) {
      if (trim(strlen($paramNome)) >= 3)
        return true;
      else
        return false;
    }
  }
?>

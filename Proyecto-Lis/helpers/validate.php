<?php

function validateCreditCard($cardNumber, &$validate, &$errors)
{
      $cardNumber = str_replace(' ', '', $cardNumber);

      if (!is_numeric($cardNumber)) {
            $validate = 0;
            $errors['numTarjeta'] = 'Solo puede ingresar números';
            break;
      }
      if (strlen($cardNumber) != 16) {
            $validate = 0;
            $errors['numTarjeta'] = 'La tarjeta debe tener 16 dígitos';
            break;
      }

      $sum = 0;
      $array = str_split($cardNumber);

      for ($i = 0; $i < 18; $i++) {
            if ($i % 2) {
                  $sum += $array[$i];
            } else {
                  $val = $array[$i] * 2;
                  $sum += $val < 9 ? $val : str_split($val)[0] + str_split($val)[1];
            }
      }
      if ($sum % 10 || $sum == 0) {
            $validate = 0;
            $errors['numTarjeta'] = 'El número de tarjeta no es válido';
            break;
      }

      $validate = 1;
      $errors['numTarjeta'] =  '';
}


if (isset($_POST['pagar'])) {
}

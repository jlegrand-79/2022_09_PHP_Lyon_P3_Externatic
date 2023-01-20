<?php

namespace App\Service;

class PasswordChecker
{
    private array $errors = [];

    public function checkPassword(string $input, string $input2): array
    {
        $upperCase = preg_match('/[A-Z]/', $input);
        $lowerCase = preg_match('/[a-z]/', $input);
        $number = preg_match('/[0-9]/', $input);
        $specialCharacter = preg_match('/[^\w\s]|_/', $input);

        if (strlen($input) < 8) {
            $this->errors[] = "- au moins 8 caractères";
        }

        if (!$upperCase) {
            $this->errors[] = "- au moins une majuscule";
        }

        if (!$lowerCase) {
            $this->errors[] = "- au moins une minuscule";
        }

        if (!$number) {
            $this->errors[] = "- au moins un chiffre";
        }

        if (!$specialCharacter) {
            $this->errors[] = "- au moins un caractère spécial";
        }

        if (empty($input)) {
            $this->errors[] = "- Le mot de passe est obligatoire";
        }

        if ($input != $input2) {
            $this->errors[] = "- les mots de passe doivent être identiques";
        }

        return $this->errors;
    }
}

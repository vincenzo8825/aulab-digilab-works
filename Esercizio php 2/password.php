<?php
function validaPassword() {
    $caratteriSpeciali = ['!', '?', '#', '$'];
    
    do {
        echo "Inserisci una password: ";
        $password = readline();

        // Verifica lunghezza della password
        if (strlen($password) < 8) {
            echo "Password troppo corta. Minimo 8 caratteri.\n";
            $passwordValida = false;
        } else {
            $passwordValida = true;
        }

        // Verifica presenza di almeno una lettera maiuscola
        if ($passwordValida) {
            $maiuscolaValida = false;
            for ($i = 0; $i < strlen($password); $i++) {
                if (ctype_upper($password[$i])) {
                    $maiuscolaValida = true;
                    break;
                }
            }
            if (!$maiuscolaValida) {
                echo "La password deve contenere almeno una lettera maiuscola.\n";
                $passwordValida = false;
            }
        }

        // Verifica presenza di almeno un numero
        if ($passwordValida) {
            $numeroValido = false;
            for ($i = 0; $i < strlen($password); $i++) {
                if (is_numeric($password[$i])) {
                    $numeroValido = true;
                    break;
                }
            }
            if (!$numeroValido) {
                echo "La password deve contenere almeno un numero.\n";
                $passwordValida = false;
            }
        }

        // Verifica presenza di almeno un carattere speciale
        if ($passwordValida) {
            $carattereSpecialeValido = false;
            for ($i = 0; $i < strlen($password); $i++) {
                if (in_array($password[$i], $caratteriSpeciali)) {
                    $carattereSpecialeValido = true;
                    break;
                }
            }
            if (!$carattereSpecialeValido) {
                echo "La password deve contenere almeno un carattere speciale (!, ?, #, $).\n";
                $passwordValida = false;
            }
        }

        if ($passwordValida) {
            echo "Password accettata\n";
            return;
        }

    } while (true);
}

validaPassword();

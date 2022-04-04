<?php

class ErrorHandling {
    private static string $dir;

    public static function throwErrors(array $errors) : void {
        if(!empty($errors)) {
            self::$dir = ($_POST['page'] === 'home') ? '.' : '..';
            echo "<div class='errorHandling' id='errorHandling'>
                    <link rel='stylesheet' href='".self::$dir."/assets/styles/error/style.css'>
                    <div class='removeErrors' onclick='removeErrors();'>
                        <div class='line'></div>
                        <div class='line'></div>
                    </div>";

            // Loop through all errors
            foreach($errors as $error) {
                echo "<ul class='errorMessage'>
                        <li>
                         <p>";

                // Check if the next value is not an array, otherwise
                // the function will break due to array to string conversion.
                if(!is_array($error)) {
                    echo $error;
                } else {
                    echo "<span class='bold'>Error Code 1.01:</span> Er is onverwachts een fout opgetreden. Neem contact op met de eigenaar of de developer.";
                }
                echo "</p>
                     </li>
                    </ul>";
            }
            echo "<script src='".self::$dir."/assets/js/remove-errors.js'></script>
                </div>";
        }
    }
}
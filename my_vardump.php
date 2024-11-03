<?php

function my_vardump($variable) {
    echo formatOfTheVariable($variable);
}

function formatOfTheVariable($variable, $indent = 0) {
    $indentation = str_repeat('    ', $indent);

    if (is_null($variable)) {
        return $indentation . "NULL\n";
    }

    if (is_bool($variable)) {
        if ($variable) {
            return $indentation . "bool(true)\n";
        } else {
            return $indentation . "bool(false)\n";
        }
    }

    if (is_int($variable)) {
        return $indentation . "int($variable)\n";
    }

    if (is_float($variable)) {
        return $indentation . "float($variable)\n";
    }

    if (is_string($variable)) {
        return $indentation . "string(" . strlen($variable) . ") \"$variable\"\n";
    }

    if (is_array($variable)) {
        $output = $indentation . "array(" . count($variable) . ") {\n";

        foreach ($variable as $key => $value) {
            $output .= $indentation . "  [$key] => " . formatOfTheVariable($value, $indent + 1);
        }

        $output .= $indentation . "}\n";

        return $output;
    }

    return $indentation . "UNKNOWN TYPE\n";
}
// my_vardump(7.5);
// my_vardump("Hello, World!"); 
// my_vardump(42); 

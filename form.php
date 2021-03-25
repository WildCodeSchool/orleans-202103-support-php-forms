<?php

define('OPERATORS', ['+', '-', '*', '/']);

$errors = [];

if (isset($_POST["firstValue"]) && isset($_POST["secondValue"]) && isset($_POST["operator"])) {
    $data = array_map('trim', $_POST);
    $data['firstValue'] = str_replace(',', '.', $data['firstValue']);
    $data['secondValue'] = str_replace(',', '.', $data['secondValue']);
    if (!is_numeric($data['firstValue'])) {
        $errors[] = 'Please enter a valid number as first value';
    }
    if (!is_numeric($data['secondValue'])) {
        $errors[] = 'Please enter a valid number as second value';
    }
    if (!in_array($data['operator'], OPERATORS)) {
        $errors[] = 'Please select a valid operator in the list';
    }
    if ($data['operator'] === '/' && $data['secondValue'] == 0) {
        $errors[] = 'Please don\'t try to divide by zero';
    }
    if (empty($errors)) {
        switch ($data['operator']) {
            case '+':
                $result = $data['firstValue'] + $data['secondValue'];
                break;
            case '-':
                $result = $data['firstValue'] - $data['secondValue'];
                break;
            case '*':
                $result = $data['firstValue'] * $data['secondValue'];
                break;
            case '/':
                $result = $data['firstValue'] / $data['secondValue'];
                break;
        }
    }
}

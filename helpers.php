<?php

/**
 * Get the Base Path
 * 
 * @param string path
 * @return string
 */

function basePath($path = '')
{
    return __DIR__ . '/' . $path;
}


/**
 * load a view
 * 
 * @param string $name
 * @return void
 */
function loadView($name, $data = [])
{
    $viewpath = basePath("App/views/{$name}.view.php");

    if (file_exists($viewpath)) {
        extract($data);
        require $viewpath;
    } else {
        echo "View'{$name} not found!'";
    }
}
/**
 * load a partial
 * 
 * @param string $name
 * @return void
 */
function loadPartials($name)
{
    $partialPath = basePath("App/views/partials/{$name}.php");

    if (file_exists($partialPath)) {
        require $partialPath;
    } else {
        echo "Partial'{$name} not found!'";
    }
}

/**
 * Inspect a value(s)
 * 
 * @param mixed $value
 * @return void
 */

function inspect($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

/**
 * Inspect a value(s) and die
 * 
 * @param mixed $value
 * @return void
 */

function inspectAndDie($value)
{
    echo '<pre>';
    die(var_dump($value));
    echo '</pre>';
}


/**
 * Format Salary
 * 
 * @param string $salary
 * @return string Formated Salary
 */

function formatSalary($salary)
{
    return '$' . number_format(floatval($salary));
}

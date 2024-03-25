<?php
echo "*************************************************************\n";
echo "*   Fill in the information about the book you want to add  *\n";
echo "*      Enter this information in the appropriate fields     *\n";
echo "*            Do not leave input fields blank!               *\n";
echo "*************************************************************\n\n";

function prompt($message) {
    echo $message;
    $input = trim(fgets(STDIN));
    while (empty($input)) {
        echo "This field cannot be empty. Please, enter again:\n";
        $input = trim(fgets(STDIN));
    }
    return $input;
}

function validateYear($year) {
    return is_numeric($year) && intval($year) > 0;
}

$title = prompt("Title: ");
$author = prompt("Author: ");
$genre = prompt("Genre: ");
$year = prompt("Year of publication: ");
while (!validateYear($year)) {
    echo "Please enter a valid year (a positive integer): ";
    $year = trim(fgets(STDIN));
}
$commentary = prompt("Commentary to the book: ");

$currentDirectory = getcwd();
$outputDirectory = isset($argv[1]) ? $argv[1] : $currentDirectory;

if (empty($fileNameInput)) {
    $timestamp = date('YmdHis');
    $fileName = sprintf(
        "%s-%s-%s.md",
        str_replace(' ', '-', strtolower($title)),
        strtolower($author),
        $year
    );
} else {
    $fileName = $fileNameInput . ".md";
}

$filePath = $outputDirectory . DIRECTORY_SEPARATOR . $fileName;

$content = <<<MD
---
Title: "$title"
Author: "$author"
Genre: "$genre"
Year of publication: "$year"
Commentary to the book: "$commentary"
---

Your entered information is displayed...

MD;

file_put_contents($filePath, $content);

echo "Information has been updated: $filePath\n";
?>

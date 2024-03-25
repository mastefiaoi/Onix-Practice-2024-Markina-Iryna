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

function validateGenres($genres) {
    $genreArray = explode(',', $genres);
    foreach ($genreArray as $genre) {
        if (empty(trim($genre))) {
            return false;
        }
    }
    return true;
}

$title = prompt("Title: ");
$author = prompt("Author: ");
$genres = prompt("Genres (separate multiple genres with commas): ");
while (!validateGenres($genres)) {
    echo "Please enter at least one genre, separated by commas: ";
    $genres = trim(fgets(STDIN));
}
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
Genre: "$genres"
Year of publication: "$year"
Commentary to the book: "$commentary"
---

Your entered information is displayed...

MD;

file_put_contents($filePath, $content);

echo "Information has been updated: $filePath\n";
?>

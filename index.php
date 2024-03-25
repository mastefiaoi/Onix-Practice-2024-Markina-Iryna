<?php
echo "*************************************************************\n";
echo "*   Fill in the information about the book you want to add  *\n";
echo "*      Enter this information in the appropriate fields     *\n";
echo "*            Do not leave input fields blank!               *\n";
echo "*************************************************************\n\n";

echo "Title:";
$title = trim(fgets(STDIN));

echo "Author: ";
$author = trim(fgets(STDIN));

echo "Year of publication: ";
$year = trim(fgets(STDIN));

echo "Commentary to the book: ";
$commentary = trim(fgets(STDIN));

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
Year of publication: "$year"
Commentary to the book: "$commentary"
---

Your entered information is displayed...

MD;

file_put_contents($filePath, $content);

echo "Information has been updated: $filePath\n";
?>

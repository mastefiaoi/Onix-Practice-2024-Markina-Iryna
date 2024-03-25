<?php
echo "*************************************************************\n";
echo "*   Fill in the information about the book you want to add  *\n";
echo "*      Enter this information in the appropriate fields     *\n";
echo "*            Do not leave input fields blank!               *\n";
echo "*************************************************************\n\n";
echo "Title:";
$title = trim(fgets(STDIN));
echo "Author: ";
$autor = trim(fgets(STDIN));
echo "Year of publication: ";
$year = trim(fgets(STDIN));
echo "Сommentary to the book: ";
$commentary = trim(fgets(STDIN));
?>
<?php

if (isset($_POST['limit'])) {
    generate($_POST['limit']);
}
function generate($limitInput)
{
    set_time_limit(100200); //Restarts the timeout counter from zero
    ini_set('memory_limit', '2048M'); //Set memory limit in MB
    ini_set('max_execution_time', 100200 ) ; //Set max execution time in seconds

    $nameCollection = array(
        "Harry","Ross",
        "Bruce","Cook",
        "Carolyn","Morgan",
        "Albert","Walker",
        "Randy","Reed",
        "Larry","Barnes",
        "Lois","Wilson",
        "Jesse","Campbell",
        "Ernest","Rogers",
        "Theresa","Patterson"
    );

    $surnameCollection = array(
        "Rachel","Edwards",
        "Christopher","Perez",
        "Thomas","Baker",
        "Sara","Moore",
        "Chris","Bailey",
        "Roger","Johnson",
        "Marilyn","Thompson",
        "Anthony","Evans",
        "Julie","Hall",
        "Paula","Phillips"
    );

    $fullNameCollection = array();
    while(count($fullNameCollection) <= $limitInput-1) {
        $idNumber = rand();
        $newName = $nameCollection[rand(0, count($nameCollection)-1)];
        $newSurname = $surnameCollection[rand(0, count($surnameCollection)-1)];
        $birthDate = randBirthDate('1/1/1970','1/1/2000');
        $today = date("Y-m-d");
        $diff = date_diff(date_create($birthDate), date_create($today));
        $age = $diff->format('%y');
        $nameConcatenated = $newName." ".$newSurname;
        $initials = generateInitials($nameConcatenated);

        $arrayConcatenate = array();
        array_push($arrayConcatenate, $idNumber, $newName, $newSurname, $initials, $age, $birthDate);

        if(!in_array(array_chunk($arrayConcatenate, 500), $fullNameCollection)) {
            $fullNameCollection[] = $arrayConcatenate;
        }
    }
    $csvHeaders = ['Id','Name','Surname','Initials','Age','Date Of Birth'];

    populateToCsv($fullNameCollection, $csvHeaders);

    $populatedRecords = count($fullNameCollection);
    $baseUrl = '/generate_success.php?generatedCount='. $populatedRecords;

    return header("Location:".$baseUrl, true, 301);

}

function randBirthDate($minBirthDate, $maxBirthDate)
{
    set_time_limit(100200); //Restarts the timeout counter from zero
    ini_set('memory_limit', '2048M'); //Set memory limit in MB
    ini_set('max_execution_time', 100200 ) ; //Set max execution time in seconds

    $min_epoch = strtotime($minBirthDate);
    $max_epoch = strtotime($maxBirthDate);

    $rand_epoch = rand($min_epoch, $max_epoch);

    return date('Y-m-d', $rand_epoch);
}

/**
 * Generate initials from a name
 *
 * @param string $name
 * @return string
 */
function generateInitials(string $name) : string
{
    set_time_limit(100200); //Restarts the timeout counter from zero
    ini_set('memory_limit', '2048M'); //Set memory limit in MB
    ini_set('max_execution_time', 100200 ) ; //Set max execution time in seconds

    $words = explode(' ', $name);
    if (count($words) >= 2) {
        return mb_strtoupper(
            mb_substr($words[0], 0, 1, 'UTF-8') .
            mb_substr(end($words), 0, 1, 'UTF-8'),
            'UTF-8');
    }
    return makeInitialsFromSingleWord($name);
}

/**
 * Make initials from a word with no spaces
 *
 * @param string $name
 * @return string
 */
function makeInitialsFromSingleWord(string $name) : string
{
    set_time_limit(100200); //Restarts the timeout counter from zero
    ini_set('memory_limit', '2048M'); //Set memory limit in MB
    ini_set('max_execution_time', 100200 ) ; //Set max execution time in seconds

    preg_match_all('#([A-Z]+)#', $name, $capitals);
    if (count($capitals[1]) >= 2) {
        return mb_substr(implode('', $capitals[1]), 0, 2, 'UTF-8');
    }
    return mb_strtoupper(mb_substr($name, 0, 2, 'UTF-8'), 'UTF-8');
}

function populateToCsv($arrayList, $csvHeaders)
{
    set_time_limit(100200); //Restarts the timeout counter from zero
    ini_set('memory_limit', '2048M'); //Set memory limit in MB
    ini_set('max_execution_time', 100200 ) ; //Set max execution time in seconds

    $fp = fopen('output.csv', 'w');

    fputcsv($fp, $csvHeaders);

    // it will chunk the dataset in smaller collections containing 500 values each.
    // Play with the value to get best result
    $chunks = array_chunk($arrayList, 10000);

    // Loop through file pointer and a line
    foreach ($chunks as $fields) {
        foreach ($fields as $chunk)
        {
            fputcsv($fp, $chunk);
        }
    }

    fclose($fp);
}
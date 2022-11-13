<?php
require_once "Row.php";
require_once "RowCollection.php";
require_once "Filter.php";
$table=[];
$csv=array_map('str_getcsv', file('mirsana.csv'));

foreach ($csv as $row){
    $rows=[];
    for ($c = 0; $c < count($row); $c++) {
        if ($c >= 3 && $row[$c] != null) {
            $rows[] = (array_unique(explode(";", $row[$c])));
        } elseif ($c >= 3 && $row[$c] = null) {
            $rows[] = null;
        } else {
            $rows[] = $row[$c];
        }
    }
    $table[]=new Row($rows[0], $rows[1], $rows[2], $rows[3], $rows[4], $rows[5]);
}
$collection=new  RowCollection($table);

$criteria=[];
while (true) {
    echo "Choose the criteria you want to see/do.\n";
    echo "Choose 0 for EXIT\n";
    echo "Choose 1 to choose data.\n";
    echo "Choose 2 to choose death reason.\n";
    echo "Choose 3 to choose nonviolent death reason.\n";
    echo "Choose 4 to choose violent death reason.\n";
    echo "Choose 5 to choose violent death reason type.\n";
    echo "Choose 6 to see filtered result.\n";

    $command = (int)readline();
    switch ($command){
        case 0:
            echo "Bye!\n";
            exit;
        case 1:
            $data=readline("Choose data from 2021-02 to 2022-10   ");
            $criteria[$command-1]=$data;
            break;
        case 2:
            $elements=["Vardarbīga nāve", "Nevardarbīga nāve", "Nāves cēlonis nav noteikts"];
            echo "Choose death reason:\n";
            echo "1. Vardarbīga nāve.\n";
            echo "2. Nevardarbīga nāve.\n";
            echo "3. Nāves cēlonis nav noteikts.\n";
            $deathReason=(int)readline();
            $criteria[$command-1]=$elements[$deathReason-1];
            break;
        case 3:
            echo "Choose nonviolent death reason:\n";
            echo "1. Pēkšņa nāve.\n";
            echo "2. Citas slimības, kas beidzas ar pēkšņu nāvi.\n";
            echo "3. Sirds asinsvadu slimības, kas beidzas ar pēkšņu nāvi.\n";
            echo "4. Hroniska koronāra sirds slimība.\n";
            echo "5. Kardiomiopātija.\n";
            echo "6. Citas slimības, kas beidzas ar pēkšņu nāvi.\n";
            echo "7. Pneimonija.\n";
            echo "8. Akūtas un subakūtas koronārās sirds slimības formas.\n";
            echo "9. Akūts miokarda infarkts.\n";
            echo "10. Asinsizplūdums smadzenēs un zem smadzeņu apvalkiem.\n";
            echo "11. Išēmiskie galvas smadzeņu infarkti.\n";
            echo "12. Hipertoniskā slimība (sirds forma).\n";
            echo "13. Akūtas abdominālas (ķirurģiskas) saslimšanas.\n";
            echo "14. Nāve no citām (hroniskām) slimībām.\n";
            echo "15. Citas.\n";
            $elements=["Pēkšņa nāve", "Citas slimības, kas beidzas ar pēkšņu nāvi", "Sirds asinsvadu slimības, kas beidzas ar pēkšņu nāvi",
               "Hroniska koronāra sirds slimība", "Kardiomiopātija", "Citas slimības, kas beidzas ar pēkšņu nāvi",
                "Pneimonija", "Akūtas un subakūtas koronārās sirds slimības formas", "Akūts miokarda infarkts",
                "Asinsizplūdums smadzenēs un zem smadzeņu apvalkiem", "Išēmiskie galvas smadzeņu infarkti",
                "Hipertoniskā slimība (sirds forma)", "Akūtas abdominālas (ķirurģiskas) saslimšanas",
                "Nāve no citām (hroniskām) slimībām", "Citas"];
            $nonviolentDeathCriteria=(int)readline();
            $criteria[$command-1]=$elements[$nonviolentDeathCriteria-1];
            break;
        case 4:
            echo "Choose violent death reason:\n";
            echo "1. Pašnāvības.\n";
            echo "2. Slepkavības.\n";
            echo "3. Nelaimes gadījumi darbā.\n";
            $elements=["Pašnāvības", "Slepkavības", "Nelaimes gadījumi darbā"];
            $violentDeathReason=(int)readline();
            $criteria[$command-1]=$elements[$violentDeathReason-1];
            break;
        case 5:
            echo "Choose violent death reason type:\n";
            echo "1. Saindēšanās.\n";
            echo "2. Etilspirts.\n";
            echo "3. Mehāniskie bojājumi.\n";
            echo "4. Durti-griezti ievainojumi.\n";
            echo "5. Mehāniskā asfiksija.\n";
            echo "6. Noslīkšana ūdenī.\n";
            echo "7. Transporta traumas.\n";
            echo "8. Dzelzceļa trauma.\n";
            echo "9. Augstas temperatūras iedarbība.\n";
            echo "10. Autotraumas.\n";
            echo "11. Moto traumas.\n";
            echo "12. šautu ievainojumu rezultātā (t.sk. sprādzieni).\n";
            echo "13. Elpošanas ceļu nosprostošana ar svešķermeni.\n";
            echo "14. Oglekļa monoksīds (tvana gāze).\n";
            echo "15. Klasiskās narkotiskās vielas (NKK 1. un 2. saraksts).\n";
            $elements=["Saindēšanās", "Etilspirts", "Mehāniskie bojājumi",
                "Durti-griezti ievainojumi", "Mehāniskā asfiksija", "Noslīkšana ūdenī",
                "Transporta traumas", "Dzelzceļa trauma", "Augstas temperatūras iedarbība",
                "Autotraumas", "Moto traumas",
                "šautu ievainojumu rezultātā (t.sk. sprādzieni)", "Elpošanas ceļu nosprostošana ar svešķermeni",
                "Oglekļa monoksīds (tvana gāze)", "Klasiskās narkotiskās vielas (NKK 1. un 2. saraksts)"];
            $violentDeathReason=(int)readline();
            $criteria[$command-1]=$elements[$violentDeathReason-1];
            break;
        case 6:
            $result=new Filter($criteria, $table);

            foreach ($result->filtered() as $row) {
                echo "Death data: {$row->getData()} \n";
                echo "Death reason: {$row->getNavesCelonis()} \n";
                if ($row->getVardarbigasNavesCelonis()!=null) {
                    echo "Nonviolent death reason: \n";
                    foreach ($row->getVardarbigasNavesCelonis() as $value) {
                        echo "{$value}; ";
                    }
                    echo PHP_EOL;
                }

                if ($row->getVardarbigasNavesLietasApstakli()!=null) {
                    echo "Violent death reason: ";
                    foreach ($row->getVardarbigasNavesLietasApstakli() as $value) {
                        echo "{$value}; ";
                    }
                    echo PHP_EOL;
                }

                if ($row->getVardarbigasNavesVeids()!=null) {
                    echo "Violent death reason type: ";
                    foreach ($row->getVardarbigasNavesVeids() as $value){
                        echo "{$value}; ";
                        }
                    echo PHP_EOL;
                }

                echo PHP_EOL;
                }

            break;
        default:
            echo "Sorry, I don't understand you..\n";
    }

}

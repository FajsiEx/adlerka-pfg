<?php

$dni = array("Pondelok", "Utorok", "Streda", "Štvrtok", "Piatok");
$hodiny = array(0,1,2,3,4,5,6,7,8,9,10);
$rozvrh[2][0] = "PFG";
$rozvrh[2][1] = "PFG";

?>

<table border=1>
    <tr>
        <td>&nbsp;</td>
        <? foreach ($hodiny as $i => $hodina): ?>
            <td><? echo $hodina; ?></td>
        <? endforeach ?>
    </tr>
    <? foreach ($dni as $i => $den): ?>
    <tr>
        <td><? echo $den; ?></td>
        <? foreach ($hodiny as $j => $hodina): ?>
            <td><? echo@$rozvrh[$i][$j]; ?></td>
        <? endforeach; ?>
    </tr>
    <? endforeach; ?>
</table>

<br>

<table></table>
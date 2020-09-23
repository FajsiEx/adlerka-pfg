<?php

$dni = array("Pondelok", "Utorok", "Streda", "Štvrtok", "Piatok");
$hodiny = array(0,1,2,3,4,5,6,7,8,9,10);

?>

<table border=1>
    <tr>
        <td>&nbsp;</td>
        <? foreach ($hodiny as $hodina): ?>
            <td><? echo $hodina; ?></td>
        <? endforeach ?>
    </tr>
    <? foreach ($dni as $den): ?>
    <tr>
        <td><? echo $den; ?></td>
        <? foreach ($hodiny as $hodina): ?>
            <td> <!-- <? echo $hodina ?> --> </td>
        <? endforeach; ?>
    </tr>
    <? endforeach; ?>
</table>

<br>

<table></table>
<?php
session_start();
?>
<?php
if (empty($_SESSION['jazyk'])) {
    $_SESSION['jazyk'] = 'sk';
}

if (!empty($_GET['jazyk'])) {
    $_SESSION['jazyk'] = $_GET['jazyk'];
}

var_dump($_SESSION['jazyk']);

$dni = array("Pondelok", "Utorok", "Streda", "Štvrtok", "Piatok");
$hodiny = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "brazda";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!empty($_GET['trieda'])) {
    $where = " WHERE rozvrh.trieda='" . $_GET["trieda"] . "'";
} else {
    $where = "";
}

$sql = "SELECT * FROM rozvrh" . $where;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $rozvrh[$row["den"]][$row["hodina"]] = $row["predmet"];
    }
} else {
    echo "0 results";
}

//mysqli_close($conn);
?>

    <a href="tabulka.php?jazyk=sk">SLOVENSKY</a> | <a href="tabulka.php?jazyk=en">ANGLICKY</a>

    <table border=1>
        <tr>
            <td>Deň</td>
            <? foreach ($hodiny as $i => $hodina): ?>
                <td><? echo $hodina; ?></td>
            <? endforeach ?>
        </tr>
        <? foreach ($dni as $i => $den): ?>
            <tr>
                <td><? echo $den; ?></td>
                <? foreach ($hodiny as $j => $hodina): ?>
                    <td><? echo @$rozvrh[$i][$j]; ?></td>
                <? endforeach; ?>
            </tr>
        <? endforeach; ?>
    </table>

<?php
echo "<pre>";
var_dump($rozvrh);

$sql = "SELECT trieda FROM rozvrh GROUP BY trieda ORDER BY trieda";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<a href=tabulka.php?trieda=" . $row['trieda'] . ">" . $row['trieda'] . "</a><br>";
}
?>
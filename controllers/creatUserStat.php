<?php
/*
$dataPoints = array(
    array("x" => 10, "y" => 41),
    array("x" => 20, "y" => 35, "indexLabel" => "Lowest"),
    array("x" => 30, "y" => 50),
    array("x" => 40, "y" => 45),
    array("x" => 50, "y" => 52),
    array("x" => 60, "y" => 68),
    array("x" => 70, "y" => 38),
    array("x" => 80, "y" => 71, "indexLabel" => "Highest"),
    array("x" => 90, "y" => 52),
    array("x" => 100, "y" => 60),
    array("x" => 110, "y" => 36),
    array("x" => 120, "y" => 49),
    array("x" => 130, "y" => 41)
$dataPoints = array(
    array("label" => "F", "y" => 30),
    array("label" => "M", "y" => 70),
);
);*/

require_once 'db/conn.php';
//genders of the student that has a note more than or equal to 10
$dataPoints = array();
$dataPoints2 = array();
$sum = 0;
$res1 = $conn->query("SELECT user.role, COUNT() as num FROM user  GROUP BY user.role DESC");
while ($row1 = $res1->fetch_assoc()) {
    array_push($dataPoints, array("label" => $row1["role"], "y" => $row1["num"]));
    $sum += $row1["num"];
}

// count of the sexe divise par la somme
for ($i = 0; $i < count($dataPoints); $i++) {
    $dataPoints2[$i] = array("label" => $dataPoints[$i]["label"], "y" => $dataPoints[$i]["y"]);
    $dataPoints2[$i]["y"] = $dataPoints2[$i]["y"] / $sum * 100;
}

?>
<!DOCTYPE HTML>
<html>

<head>
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                exportEnabled: true,
                theme: "light1", // "light1", "light2", "dark1", "dark2"
                title: {
                    text: "Le  nombre d’étudiants par  sexe  à l’aide d’un graphique histogramme"
                },
                axisY: {
                    includeZero: true
                },
                data: [{
                    type: "column", //change type to bar, line, area, pie, etc
                    //indexLabel: "{y}", //Shows y value on all Data Points
                    indexLabelFontColor: "#5A5757",
                    indexLabelPlacement: "outside",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();


            var chart = new CanvasJS.Chart("chartContainer2", {
                animationEnabled: true,
                title: {
                    text: "Le  nombre d’étudiants  par sexe  à l’aide d’un graphique camembert"
                },
                subtitles: [{
                    text: "university djilali lyabes"
                }],
                data: [{
                    type: "pie",
                    yValueFormatString: "#,##0.00\"%\"",
                    indexLabel: "{label} ({y})",
                    dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
</head>

<body>
    <div class="frame" style="text-align: center; display: flex; margin-top: 50px">
        <div id="chartContainer2" style="height: 370px; width: 100%;"></div>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    </div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>

</html>
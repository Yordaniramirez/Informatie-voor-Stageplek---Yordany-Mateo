<!DOCTYPE html>
<html>
<head>

<script>
    // Functie om stijlen in te stellen op basis van opgeslagen waarden in lokale opslag
    function setStyles() {
        var tekstkleur = localStorage.getItem("tekstkleur");
        var achtergrondKleur = localStorage.getItem("achtergrondKleur");
        var borderDikte = localStorage.getItem("borderDikte");
        var padding = localStorage.getItem("padding");

        if (tekstkleur) {
            document.body.style.color = tekstkleur;
            document.getElementById("tekstkleur").value = tekstkleur;
        }

        if (achtergrondKleur) {
            document.body.style.backgroundColor = achtergrondKleur;
            document.getElementById("achtergrond-color").value = achtergrondKleur;
        }

        if (borderDikte) {
            var table = document.querySelector("table");
            table.style.border = borderDikte + "px solid black";
            document.getElementById("border").value = borderDikte;
        }

        if (padding) {
            var cells = document.querySelectorAll("td");
            for (var i = 0; i < cells.length; i++) {
                cells[i].style.padding = padding + "px";
            }
            document.getElementById("padding").value = padding;
        }
    }

    // Functie om geselecteerde stijlen op te slaan in lokale opslag
    function saveStyles() {
        var tekstkleur = document.getElementById("tekstkleur").value;
        var achtergrondKleur = document.getElementById("achtergrond-color").value;
        var borderDikte = document.getElementById("border").value;
        var padding = document.getElementById("padding").value;

        localStorage.setItem("tekstkleur", tekstkleur);
        localStorage.setItem("achtergrondKleur", achtergrondKleur);
        localStorage.setItem("borderDikte", borderDikte);
        localStorage.setItem("padding", padding);
    }
</script>





    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightgray;
            text-align: center;
        }

        h3 {
            color: darkblue;
        }

        form {
            margin: 20px auto;
            width: 300px;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        select, input[type="text"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: darkblue;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #003366;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #003366;
            color: white;
        }
    </style>
</head>
<body onload="setStyles()">

<h3>Yordany Mateo - Information</h3>
    <form name="invoer" action="index.php" method="post" onsubmit="saveStyles()">

        <label for="tekstkleur">Letterkleur:</label>
        <select name="tekstkleur" id="tekstkleur">
            <?php
            $kleuren = array("red", "blue", "green", "black", "brown");
            foreach ($kleuren as $kleur) {
                echo "<option value='$kleur'>$kleur</option>";
            }
            ?>
        </select>

        <label for="achtergrond-color">Achtergrondkleur:</label>
        <select name="achtergrond-color" id="achtergrond-color">
            <?php
            foreach ($kleuren as $achtergrond_color) {
                echo "<option value='$achtergrond_color'>$achtergrond_color</option>";
            }
            ?>
        </select>

        <label for="border">Tabelranddikte (px):</label>
        <input type="text" name="border" id="border">

        <label for="padding">Cel-padding (px):</label>
        <input type="text" name="padding" id="padding">

        <input type="submit" name="submit" value="Kijk hoe ik Change!">
    </form>

    <table>
        <tr>
            <th>Key</th>
            <th>Value</th>
        </tr>
        <?php
        $mijngegevens = array(
            "naam" => "Yordany",
            "Leeftijd" => 30,
            "woonplaats" => "Amsterdam",
            "Opleiding" => "Software Developer (Niveau 4, Laatste jaar)",
            "Talen" => array("PHP", "HTML", "JavaScript", "CSS"),
            "Database" => "MySQL",
            "Frameworks" => array("React", "React Native", "Yii2"),
            "Ervaring" => array(
                "Webontwikkeling" => "3 jaar",
                "Mobiele App Ontwikkeling" => "Projectervaring",
            ),
            "Andere Vaardigheden" => array("WordPress", "Canvas Poster Ontwerp"),
            "Interesses" => array("Gym", "Salsa dansen", "Technologie"),
        );
        

        foreach ($mijngegevens as $mijngegevens1 => $value) {
            if (is_array($value)) {
                $value = implode(', ', $value);
            }
            echo "<tr><td>$mijngegevens1</td><td>$value</td></tr>";
        }
        
        ?>
    </table>
</body>
</html>

<!DOCTYPE html>
<head>
    <title>Schaakbord</title>
</head>
    <style>
        table {
            border: 2px solid black;
        }
        td {
            height: 30px;
            width: 30px;
            border: 1px solid black;
        }
        .black {
            background: black;
        }
    </style>
<body>
    <h1>Schaakbord</h1>
    <table>
        <?php
            for($row = 1; $row <= 8; $row++){
                echo "<tr>";
                    for($column = 1; $column <= 8; $column++){
                        if(($row + $column) % 2 == 0){
                            echo "<td class='black'></td>";
                        } else {
                            echo "<td></td>";
                        }    
                    }
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>
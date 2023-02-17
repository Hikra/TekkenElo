<!doctype html>

<html>
    <head>
        <meta charset="utf-8">

        <title>Tekken Elo</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


    </head>

    <body style="margin: 50px;">

        <h1 style="text-align: center;">Tekken Elo</h1>
        <h2 style="text-align: center;">Leaderboard</h2>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID player</th>
                    <th>Nick</th>
                    <th>Rank</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $servername = "dbhikra.crc76m1dziqr.us-east-1.rds.amazonaws.com";
                $username = "admin";
                $password = "pinguino26";
                $database = "tekken_elo";

                $connection = new mysqli($servername, $username, $password, $database);

                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                $sql = "SELECT * FROM players";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["nickname"] . "</td>
                        <td>" . $row["ranking"] . "</td>
                    </tr>";
                }

                
                ?>
            </tbody>
        </table>
        

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <!-- Load external JavaScript -->
        <!--<script src="scripts.js"></script>-->
        
    </body>

</html>

<html>
 <head>
    <style type="text/css">
        table{
            border-collapse: collapse;
            width: 100%;
            color:darkgreen;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 30px;
            text-align: center;
        }
        th{
            background-color:green;
            color: white;
            
        }
        tr:nth-child(even){
            background-color: whitesmoke;
        }

        </style>
 </head>
    <body>
        <table>
            <tr>
                <th>Name</th>
                <th>DOB</th>
                <th>SSC</th>
                <th>HSC</th>
                
            </tr>
            <?php
            $conn = mysqli_connect("localhost","root","","register");
            $sql = "SELECT * FROM jobs";
            $result = $conn->query($sql);

            if ($result->num_rows > 0){
                while ($row = $result-> fetch_assoc()){
                    echo "<tr><td>". $row["Name"]. "</td><td>". $row["DOB"]. "</td><td>". $row["SSC"]. "</td><td>". $row["HSC"]. "</td><td>";
                }
                }
                else{
                    echo "No Results";
                }
                $conn->close();
                ?>
            
        </table>
    </body>
</html>
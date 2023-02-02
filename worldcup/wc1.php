<?php 


    $teams = array (
        array("Morocco",0,0,0,0,0,0,0,0),
        array("Belgium",0,0,0,0,0,0,0,0),
        array("Canada",0,0,0,0,0,0,0,0),
        array("Croatia",0,0,0,0,0,0,0,0)
    );

    if(isset($_POST['submit'])){

    
    function matchRules( $result1, $result2, $team1, $team2, &$matchs, &$points1, &$points2, &$GP1, &$GP2, &$GW1, &$GW2, &$GD1, &$GD2, &$GL1, &$GL2, &$GF1, &$GF2, &$GA1, &$GA2, &$GDif1, &$GDif2)
    {

    if( $result1 > $result2 ){

        $points1 += 3;
        $GP1 += 1;
        $GP2 += 1;
        $GF1 += $result1;
        $GF2 += $result2;
        $GA1 += $result2;
        $GA2 += $result1;
        $GW1 += 1;
        $GL2 += 1;
        $GDif1 += $result1 - $result2;
        $GDif2 += $result2 - $result1;

    }

    elseif( $result1 < $result2 ){

        $points2 += 3;
        $GP1 += 1;
        $GP2 += 1;
        $GF1 += $result1;
        $GF2 += $result2;
        $GA1 += $result2;
        $GA2 += $result1;
        $GW2 += 1;
        $GL1 += 1;
        $GDif1 += $result1 - $result2;
        $GDif2 += $result2 - $result1;

    }

    elseif( $result1 = $result2 ){

        $points1 += 1;
        $points2 += 1;
        $GP1 += 1;
        $GP2 += 1;
        $GF1 += $result1;
        $GF2 += $result2;
        $GA1 += $result2;
        $GA2 += $result1;
        $GD1 += 1;
        $GD2 += 1;
        $GDif1 += $result1 - $result2;
        $GDif2 += $result2 - $result1;

    }
    }

    matchRules($_POST["Morocco"], $_POST["Croatia"], $teams[0][0], $teams[3][0], $Matchs,
    $teams[0][1], $teams[3][1], $teams[0][2], $teams[3][2], $teams[0][3], $teams[3][3], 
    $teams[0][4], $teams[3][4], $teams[0][5], $teams[3][5], $teams[0][6], $teams[3][6], 
    $teams[0][7], $teams[3][7], $teams[0][8], $teams[3][8]);

    matchRules($_POST["Belgium"], $_POST["Canada"], $teams[1][0], $teams[2][0], $Matchs,
    $teams[1][1], $teams[2][1], $teams[1][2], $teams[2][2], $teams[1][3], $teams[2][3], 
    $teams[1][4], $teams[2][4], $teams[1][5], $teams[2][5], $teams[1][6], $teams[2][6], 
    $teams[1][7], $teams[2][7], $teams[1][8], $teams[2][8]);

    matchRules($_POST["Belgium2"], $_POST["Morocco2"], $teams[1][0], $teams[0][0], $Matchs,
    $teams[1][1], $teams[0][1], $teams[1][2], $teams[0][2], $teams[1][3], $teams[0][3], 
    $teams[1][4], $teams[0][4], $teams[1][5], $teams[0][5], $teams[1][6], $teams[0][6], 
    $teams[1][7], $teams[0][7], $teams[1][8], $teams[0][8]);

    matchRules($_POST["Croatia2"], $_POST["Canada2"], $teams[3][0], $teams[2][0], $Matchs,
    $teams[3][1], $teams[2][1], $teams[3][2], $teams[2][2], $teams[3][3], $teams[2][3], 
    $teams[3][4], $teams[2][4], $teams[3][5], $teams[2][5], $teams[3][6], $teams[2][6], 
    $teams[3][7], $teams[2][7], $teams[3][8], $teams[2][8]);

    matchRules($_POST["Morocco3"], $_POST["Canada3"], $teams[0][0], $teams[2][0], $Matchs,
    $teams[0][1], $teams[2][1], $teams[0][2], $teams[2][2], $teams[0][3], $teams[2][3], 
    $teams[0][4], $teams[2][4], $teams[0][5], $teams[2][5], $teams[0][6], $teams[2][6], 
    $teams[0][7], $teams[2][7], $teams[0][8], $teams[2][8]);

    matchRules($_POST["Belgium3"], $_POST["Croatia3"], $teams[1][0], $teams[3][0], $Matchs,
    $teams[1][1], $teams[3][1], $teams[1][2], $teams[3][2], $teams[1][3], $teams[3][3], 
    $teams[1][4], $teams[3][4], $teams[1][5], $teams[3][5], $teams[1][6], $teams[3][6], 
    $teams[1][7], $teams[3][7], $teams[1][8], $teams[3][8]);



            //sort
    
    usort ( $teams, function($b, $a) {

        if ( ( $a[1] <=> $b[1] ) == 1 ){

        return $a[1] <=> $b[1];
    }
    
        elseif ( ( $a[1] <=> $b[1] ) == 0){

            return $a[6] <=> $b[6];

        }



    }

);
    

}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>World Cup 2022</title>
</head>
<style>
*{
    margin: 0;
    padding: 0;
}

body{
    background-color: #450c29 !important;
}

h1{
    color: aliceblue;
    text-align: center;
    font-size: 3em;
    text-shadow: 2px 2px 4px white;
    margin: 5% 0px;
}

img{
    margin: 0px 20%;
}

h2{
    color: aliceblue;
    text-align: center;
    font-size: 2em;
    text-shadow: 2px 2px 4px white;
    margin: 0px 0px 5% 0px;
}

form{
    width: 98%;
    margin: 5% 1%;
    text-align: center;
    
}

form  .match{
    color: white;
    width: 60%;
    margin : 0px 20% ;
    display : flex;
    justify-content : space-between;
}
.teams{
    width: 30%;
    margin : auto;
    padding :auto;
}

input{
    width: 20%;
    height: 5%;
    margin: 1% 1%;
    text-align : center ;
}

.table{
    width: 98%;
    margin: 5% 1%;
}




</style>
<body>

    <div><h1>World Cup 2023 is Here !</h1></div>
    <div >
    <img src="img/worldcup_photo.jpg" class="img-fluid" alt="coupr-du-monde" width="60%">
    </div>
    
    <form action ="wc1.php" method="post">
    
        <h2>Try Here !</h2>
        <div class = "match">
        <div class="teams">Morocco</div><input type="number" name="Morocco">   <!-- 1-->
            <input type="number" name="Croatia"><div class="teams">Croatia</div>   <!-- 1-->
        </div>
    <div class = "match">
    <div class="teams">Belgium</div><input type="number" name="Belgium">     <!-- 1-->
            <input type="number" name="Canada"><div class="teams">Canada</div>  <!-- 1-->
    </div>
    <div class = "match">
    <div class="teams">Belgium</div><input type="number" name="Belgium2">    <!-- 2-->
            <input type="number" name="Morocco2"><div class="teams">Morocco</div>    <!-- 2-->
    </div>
        <div class = "match">
        <div class="teams">Croatia</div><input type="number" name="Croatia2">     <!-- 2-->
            <input type="number" name="Canada2"><div class="teams">Canada</div>    <!-- 2-->
        </div>
        <div class = "match">
        <div class="teams">Morocco</div><input type="number" name="Morocco3">   <!-- 3-->
            <input type="number" name="Canada3"><div class="teams">Canada</div>   <!-- 3-->
        </div>
        <div class = "match">
        <div class="teams">Belgium</div><input type="number" name="Belgium3">   <!-- 3-->
            <input type="number"name="Croatia3"><div class="teams">Croatia</div> <!-- 3-->
        </div>

    <input type="submit" value="Simulate" name="submit" id="submit"> 
    </form>

    <table class="table table-danger table-sm">
        <thead>
            <tr>
                <th scope="col">Teams</th>
                <th scope="col">Pts</th>
                <th scope="col">MJ</th>
                <th scope="col">MG</th>
                <th scope="col">Nuls</th>
                <th scope="col">MP</th>
                <th scope="col">BM</th>
                <th scope="col">BE</th>
                <th scope="col">Dif</th>
            </tr>
        </thead>
        <tbody >
                        <tr>
                        <td><?php echo $teams[0][0] ?></td>
                        <td><?php echo $teams[0][1] ?></td>
                        <td><?php echo $teams[0][2] ?></td>
                        <td><?php echo $teams[0][3] ?></td>
                        <td><?php echo $teams[0][4] ?></td>
                        <td><?php echo $teams[0][5] ?></td>
                        <td><?php echo $teams[0][6] ?></td>
                        <td><?php echo $teams[0][7] ?></td>
                        <td><?php echo $teams[0][8] ?></td>
                    </tr> 
                    
                    <tr>
                        <td><?php echo $teams[1][0] ?></td>
                        <td><?php echo $teams[1][1] ?></td>
                        <td><?php echo $teams[1][2] ?></td>
                        <td><?php echo $teams[1][3] ?></td>
                        <td><?php echo $teams[1][4] ?></td>
                        <td><?php echo $teams[1][5] ?></td>
                        <td><?php echo $teams[1][6] ?></td>
                        <td><?php echo $teams[1][7] ?></td>
                        <td><?php echo $teams[1][8] ?></td>
                    </tr>

                    <tr>
                        <td><?php echo $teams[2][0] ?></td>
                        <td><?php echo $teams[2][1] ?></td>
                        <td><?php echo $teams[2][2] ?></td>
                        <td><?php echo $teams[2][3] ?></td>
                        <td><?php echo $teams[2][4] ?></td>
                        <td><?php echo $teams[2][5] ?></td>
                        <td><?php echo $teams[2][6] ?></td>
                        <td><?php echo $teams[2][7] ?></td>
                        <td><?php echo $teams[2][8] ?></td>
                    </tr>

                    <tr>
                        <td><?php echo $teams[3][0] ?></td>
                        <td><?php echo $teams[3][1] ?></td>
                        <td><?php echo $teams[3][2] ?></td>
                        <td><?php echo $teams[3][3] ?></td>
                        <td><?php echo $teams[3][4] ?></td>
                        <td><?php echo $teams[3][5] ?></td>
                        <td><?php echo $teams[3][6] ?></td>
                        <td><?php echo $teams[3][7] ?></td>
                        <td><?php echo $teams[3][8] ?></td>
                    </tr>
        </tbody>
</table>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
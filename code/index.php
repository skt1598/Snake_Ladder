<?php
    $array[10][10]=array();
    $k=100;
    $t=$k;
    for($i=0;$i<10;$i++){
        if($i%2==1){ 
            $t=$k;
            $k=$k+1;
            $m=$k;   
        }
        else{
            $k=$t;
        }
        for($j=0;$j<10;$j++){
            if($i%2==1){
            $array[$i][$j]=$k-10;   
            $m++;                   
            $k=$m;                  
            $t--;                   
            }else{
                $array[$i][$j]=$k;
                $k--;
            }    
        }
   }
?>
<!doctype html>
    <html>
        <head>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
            <style>
                .dice{
                    padding:10px;
                    font-size: 40px;
                    text-align: center;
                }  
             </style>
        </head>
    <body style="text-align: center; ">
        <div class="alert alert-success">
           <span id="success"><strong></strong><span>
        </div>
        <table style="border:5px solid; margin: 0 auto;">
            <?php
                for($i=0;$i<10;$i++){
                    echo '<tr>';
                    for($j=0;$j<10;$j++){
                        echo '<td id="box_'.$array[$i][$j].'" style="border:1px solid; padding:15px; text-align:center;">'.$array[$i][$j].'</td>';
                       echo "\x20";
                    }
                    echo "</tr>";
               }
            ?>
        </table>
        
    <div class="dice">
        <span class="currentNumber">0</span>
        <br>
        <button class="rollbutton" id="rollTheDice">Roll</button>
    </div>
       
        
        <script>
            var currentPosition = 0;
            var i;
            var j;
            var id;
            var id_value;
            var margin =[[3,51],[6,27],[20,70],[63,95],[34,1],[25,5],[91,61],[87,57],[99,2]];
            $(function(){
                $("#rollTheDice").on("click", function(){         
                    var diceNumber = Math.floor(Math.random() * 6) + 1;
                    $(".currentNumber").text(diceNumber);
                    if(currentPosition === 0){
                        if(diceNumber === 1){
                            currentPosition = currentPosition + diceNumber;
                        }
                    }else if((currentPosition + diceNumber)>100){
                        currentPosition = currentPosition;
                    }else{
                        currentPosition = currentPosition + diceNumber;
                    }
                    for(i=0;i<margin.length;i++){
                        if(currentPosition === margin[i][0]){
                            currentPosition = margin[i][1];
                        }
                    }
                    if(currentPosition === 100){
                        document.getElementById("success").innerHTML = "You Have Won!";
                    }
                    console.log(currentPosition);
                    if(id_value === "set"){
                        $(id).css('background-color', 'white');
                    }
//                    $("#box_"+currentPosition).css({'background-color':'yellow'});​
                    $("#box_"+currentPosition).css('background-color', 'yellow');
                    if(currentPosition != 0){
                       id =  "#box_"+currentPosition;
                       id_value = "set";
                    }
                }); 
            });
            </script>
    </body>
</html>
            
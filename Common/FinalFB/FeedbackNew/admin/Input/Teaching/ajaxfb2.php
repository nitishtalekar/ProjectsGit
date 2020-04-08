<?php
include('dbconnect.php');

if(isset($_POST["deptid"])){

    echo '<option selected disabled value="">Choose</option>';
    $sem_query = "SELECT * from semester";
    $sem_results = mysqli_query($db, $sem_query);
    $sem_row = mysqli_fetch_assoc($sem_results);
    
    $x = explode('#',$_POST['deptid']);
    
    if($x[1] == 'tsem'){
      if($x[0] == 'Applied Sciences'){
        if($sem_row['current_sem'] == 1){
          echo '<option value="1">1</option>';
        }
        else{
          echo '<option value="2">2</option>';
        }
      }
      else{
        if($sem_row['current_sem'] == 1){
          echo '<option value="3">3</option>';
          echo '<option value="5">5</option>';
          echo '<option value="7">7</option>';
        }
        else{
          echo '<option value="4">4</option>';
          echo '<option value="6">6</option>';
          echo '<option value="8">8</option>';
        }
      }
    }
    elseif($x[1] == 'tdiv'){
      if($x[0] == 'Applied Sciences'){
        echo '<option value="A">A</option>';
        echo '<option value="B">B</option>';
        echo '<option value="C">C</option>';
        echo '<option value="D">D</option>';
        echo '<option value="E">E</option>';
        echo '<option value="F">F</option>';
        echo '<option value="G">G</option>';
      }
      elseif($x[0] == 'Information Technology' || $x[0] == 'Instumentation Engineering'){
        echo '<option value="A">A</option>';
      }
      else{
        echo '<option value="A">A</option>';
        echo '<option value="B">B</option>';
      }
    }    
}

?>
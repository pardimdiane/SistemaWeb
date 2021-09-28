
<?php  
$ligax = mysqli_connect('localhost', 'root', '', "casadocriador"); 
if (!$ligax) {echo '<p> Falha na ligação.';} 
    mysqli_select_db($ligax, 'cliente'); 
    $consulta = "Select * From Cliente"; 
    $result = mysqli_query($ligax, $consulta); $nregistos = mysqli_num_rows($result); 
    echo "Nº de registos encontrados: $nregistos ";
?> 
<br> <table border="1"> 
<tr><td> Codigo: <td> Nome: <td> Morada: </tr>
<?php 
    for ($i=0; $i <$nregistos; $i++)  {  
        $registo = mysqli_fetch_assoc($result);  
        echo '<tr>';   echo '<td>'.$registo['CodCli'].'</td>';  
        echo '<td>'.$registo['Nome'].'</td>';   
        echo '<td>'.$registo['Morada'].'<td>';   
        echo '</tr>'; echo '</p>'; 
    } 

?>
  
<?php
$link= mysqli_connect("localhost", "root", "", "quiz");
$usuarios = mysqli_query($link, "select * from Usuario" );
echo '<table border=1> <tr> <th> Nombre </th> <th> APELLIDOS </th> <th> CORREO </th> <th> CONTRASENA </th> <th> TELEFONO </th> <th> ESPECIALIDAD </th>
</tr>';
while ($row = mysqli_fetch_array( $usuarios )) {
echo '<tr><td>' . $row['Nombre'] . '</td> <td>' . $row['Apellidos'] . '</td> <td>' . $row['Correo'] . '</td> <td>' . $row['Contrasena'] . '</td> <td>' . $row['Telefono'] . '</td>  <td>' . $row['Especialidad'] . '</td>
</tr>';
}
echo '</table>';
$usuarios->close();
mysqli_close($link);
?>
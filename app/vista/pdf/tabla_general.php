<!DOCTYPE html>
<html lang="en">

  <head>
  </head>

  <body>
    <table border="1">
      <thead>
        <tr>
          <th>Cedula</th>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>N° Certificado Discapacidad</th>
          <th>Gerencia</th>
          <th>Tipo de Visita</th>
          <th>Responsable</th>
          <th>Entrada</th>
          <th>Salida</th>
        </tr>
      </thead>
      <tbody>
        <?php

        while ($row = pg_fetch_array($consulta))
        {
        ?>
        <tr>
          <td><?php echo $row['cedula']; ?></td>
          <td><?php echo $row['nombre']; ?></td>
          <td><?php echo $row['apellido']; ?></td>
          <td><?php echo $row['n_certificado']; ?></td>
          <td><?php echo $row['descripcion_gerencia']; ?></td>
          <td><?php echo $row['descripcion_tipo_visita']; ?></td>
          <td><?php echo $row['responsable']; ?></td>
          <td><?php echo $row['created_at']; ?></td>
          <td><?php echo $row['updated_at']; ?></td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>

  </body>

</html>
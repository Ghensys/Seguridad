<!DOCTYPE html>
<html lang="en">

  <head>
  </head>

  <body>
    <table border="1">
      <thead>
        <tr>
          <th>Gerencia</th>
          <th>Responsable</th>
          <th>Tipo de Visita</th>
          <th>N° Pase</th>
          <th>Observación</th>
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
          <td><?php echo $row['descripcion_gerencia']; ?></td>
          <td><?php echo $row['responsable']; ?></td>
          <td><?php echo $row['descripcion_tipo_visita']; ?></td>
          <td><?php echo $row['n_pase']; ?></td>
          <td><?php echo $row['observacion']; ?></td>
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
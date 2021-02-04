<?php
include("conn.php");

$smtp = $conn->prepare("SELECT * FROM  funcionarios");
$output= "";

if($smtp->execute() == true && $smtp->rowCount() > 0){
  
    $output = 
    '<table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">CPF</th>
          <th scope="col">Genêro</th>
          <th scope="col">Data de Nascimento</th>
          <th scope="col">Ação</th>
        </tr>
      </thead>
    <tbody>';

    foreach ($smtp->fetchAll(PDO::FETCH_ASSOC) as $row) {

      $output .= 
        "<tr>
            <th scope='row'>{$row["id"]}</th>
            <td>{$row["tb_nome"]}</td>
            <td>{$row["tb_cpf"]}</td>
            <td>{$row["tb_genero"]}</td>
            <td>{$row["tb_data_nascimento"]}</td>
            <td><button type='button' class='btn btn-danger' data-id='{$row["id"]}' data-nome='{$row["tb_nome"]}' id='btn-delete'><i class='fas fa-trash-alt'></i></button></td>
        </tr>";
    }

    $output .= "</tbody></table>";

    echo $output;
  
}else{
  echo "<div class='alert alert-warning text-center' role='alert'>
          <i class='fas fa-exclamation-circle'></i> Nenhum funcionário cadastrado.
        </div>";
}
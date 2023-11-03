<?PHP

// Incluir o arquivo com a conexão com banco de dados
include_once './conexao.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$queryeditEvento = "UPDATE task SET title:title, color:color, start:start, end:end WHERE id=:id";

$editEvento = $conn->prepare($queryeditEvento);

$editEvento->bindParam(':title', $dados["editTitle"]);
$editEvento->bindParam(':color', $dados["editColor"]);
$editEvento->bindParam(':start', $dados["editStart"]);
$editEvento->bindParam(':end', $dados["editEnd"]);
$editEvento->bindParam(':id', $dados["editId"]);

if($editEvento->execute()){

    $retorno = ["status" => true, "msg"=> "Evento editado com sucesso", 'id' => $dados["editId"],'title' => $dados["editTitle"], 'color'=> $dados["editColor"], 'start' => $dados["editStart"],'end' => $dados["editEnd"]];

}else{
    $retorno = ["status" => false, "msg"=> "Erro ao editar o evento!"];
}

echo json_encode($retorno);


?>
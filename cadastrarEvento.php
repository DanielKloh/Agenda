<?PHP

// Incluir o arquivo com a conexão com banco de dados
include_once './conexao.php';


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$queryCadEvento = "INSERT INTO task (title, color, start, end) values (:title, :color, :start, :end)";

$cadEvento = $conn->prepare($queryCadEvento);

$cadEvento->bindParam(':title', $dados["inputTitle"]);
$cadEvento->bindParam(':color', $dados["inputColor"]);
$cadEvento->bindParam(':start', $dados["inputStart"]);
$cadEvento->bindParam(':end', $dados["inputEnd"]);

if($cadEvento->execute()){

    $retorno = ["status" => true, "msg"=> "Evento cadastrado com sucesso", "id" => $conn->lastInsertId(),'title', $dados["inputTitle"], 'color', $dados["inputColor"], 'start', $dados["inputStart"],'end', $dados["inputEnd"]];

}else{
    $retorno = ["status" => false, "msg"=> "Erro ao cadastrar evento!"];
}

echo json_encode($retorno);


?>
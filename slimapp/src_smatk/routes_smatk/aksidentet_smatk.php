<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App();
$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

$app->get('/api/aksidentet',function(Request $request, Response $response){

    $sql = "SELECT * FROM aksidentetetrafikutnekosove_smatk";
    
    try {

        $db_smatk = new db_smatk();
        $db_smatk = $db_smatk->connect();
        $stmt = $db_smatk->query($sql);
        $aksidentet = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db_smatk = null;
        echo json_encode($aksidentet);
        
    }catch(PDOException $e){
        echo '{"error": {"text": ' .$e->getMessage().'}';
    }
});

$app->get('/api/aksidentet/{NumriAksidentit_SMATK}',function(Request $request, Response $response){

    $NumriAksidentit_SMATK = $request->getAttribute('NumriAksidentit_SMATK');
    
    $sql = "SELECT * FROM aksidentetetrafikutnekosove_smatk WHERE NumriAksidentit_SMATK = '$NumriAksidentit_SMATK'";
    
    try {

        $db_smatk = new db_smatk();
        $db_smatk = $db_smatk->connect();
        $stmt = $db_smatk->query($sql);
        $aksidentet = $stmt->fetch(PDO::FETCH_OBJ);
        $db_smatk = null;
        echo json_encode($aksidentet);

    }catch(PDOException $e){
        echo '{"error": {"text": ' .$e->getMessage().'}';
    }
});

$app->post('/api/aksidentet/shto',function(Request $request, Response $response){

    $Lokacioni_SMATK=$request->getParam('Lokacioni_SMATK');
    $Koha_SMATK=$request->getParam('Koha_SMATK');
    $TeAksidentuarit_SMATK=$request->getParam('TeAksidentuarit_SMATK');
    $ShkakuAksidentit_SMATK=$request->getParam('ShkakuAksidentit_SMATK');
    $DemetMateriale_SMATK=$request->getParam('DemetMateriale_SMATK');
    $DemetneNjerz_SMATK=$request->getParam('DemetneNjerz_SMATK');
    $Arrestime_SMATK=$request->getParam('Arrestime_SMATK');
    
    $sql = "INSERT INTO aksidentetetrafikutnekosove_smatk(Lokacioni_SMATK,Koha_SMATK,TeAksidentuarit_SMATK,
    ShkakuAksidentit_SMATK,DemetMateriale_SMATK,DemetneNjerz_SMATK,Arrestime_SMATK)
    VALUES(:Lokacioni_SMATK,:Koha_SMATK,:TeAksidentuarit_SMATK,:ShkakuAksidentit_SMATK,:DemetMateriale_SMATK,
    :DemetneNjerz_SMATK,:Arrestime_SMATK)";
    
    try {

        $db_smatk = new db_smatk();
        $db_smatk = $db_smatk->connect();
        $stmt = $db_smatk->prepare($sql);
        $stmt->bindParam(':Lokacioni_SMATK' , $Lokacioni_SMATK);
        $stmt->bindParam(':Koha_SMATK' , $Koha_SMATK);
        $stmt->bindParam(':TeAksidentuarit_SMATK' , $TeAksidentuarit_SMATK);
        $stmt->bindParam(':ShkakuAksidentit_SMATK' , $ShkakuAksidentit_SMATK);
        $stmt->bindParam(':DemetMateriale_SMATK' , $DemetMateriale_SMATK);
        $stmt->bindParam(':DemetneNjerz_SMATK' , $DemetneNjerz_SMATK);
        $stmt->bindParam(':Arrestime_SMATK' , $Arrestime_SMATK);
        $stmt->execute();
        echo '{"notice": {"text": "Aksidenti u shtua!"}';
        
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    } 
});

$app->put('/api/aksidentet/modifiko/{NumriAksidentit_SMATK}', function (Request $request, Response $response) {
    
    $NumriAksidentit_SMATK = $request->getAttribute('NumriAksidentit_SMATK');
    $Lokacioni_SMATK=$request->getParam('Lokacioni_SMATK');
    $Koha_SMATK=$request->getParam('Koha_SMATK');
    $TeAksidentuarit_SMATK=$request->getParam('TeAksidentuarit_SMATK');
    $ShkakuAksidentit_SMATK=$request->getParam('ShkakuAksidentit_SMATK');
    $DemetMateriale_SMATK=$request->getParam('DemetMateriale_SMATK');
    $DemetneNjerz_SMATK=$request->getParam('DemetneNjerz_SMATK');
    $Arrestime_SMATK=$request->getParam('Arrestime_SMATK');
    
    $sql = "UPDATE aksidentetetrafikutnekosove_smatk SET
    Lokacioni_SMATK = :Lokacioni_SMATK,
    Koha_SMATK = :Koha_SMATK,
    TeAksidentuarit_SMATK = :TeAksidentuarit_SMATK,
    ShkakuAksidentit_SMATK = :ShkakuAksidentit_SMATK,
    DemetMateriale_SMATK = :DemetMateriale_SMATK,
    DemetneNjerz_SMATK = :DemetneNjerz_SMATK,
    Arrestime_SMATK = :Arrestime_SMATK
    WHERE NumriAksidentit_SMATK = '$NumriAksidentit_SMATK'";
    
    try{
        
        $db_smatk = new db_smatk();
        $db_smatk = $db_smatk->connect();
        $stmt = $db_smatk->prepare($sql);
        $stmt->bindParam(':Lokacioni_SMATK',$Lokacioni_SMATK);
        $stmt->bindParam(':Koha_SMATK',$Koha_SMATK);
        $stmt->bindParam(':TeAksidentuarit_SMATK',$TeAksidentuarit_SMATK);
        $stmt->bindParam(':ShkakuAksidentit_SMATK',$ShkakuAksidentit_SMATK);
        $stmt->bindParam(':DemetMateriale_SMATK',$DemetMateriale_SMATK);
        $stmt->bindParam(':DemetneNjerz_SMATK',$DemetneNjerz_SMATK);
        $stmt->bindParam(':Arrestime_SMATK',$Arrestime_SMATK);
        $stmt->execute();
        echo'{"notice":{"text":"Aksidenti u modifikua"}';

    } catch(PDOException $e){
        echo '{"error":{"text": '.$e->getMessage().'}';
    }
});

$app->delete('/api/aksidentet/fshij/{NumriAksidentit_SMATK}', function (Request $request, Response $response) {

    $NumriAksidentit_SMATK = $request->getAttribute('NumriAksidentit_SMATK');
    
    $sql = "DELETE FROM aksidentetetrafikutnekosove_smatk WHERE NumriAksidentit_SMATK = '$NumriAksidentit_SMATK'";

    try{

        $db_smatk = new db_smatk();
        $db_smatk=$db_smatk->connect();
        $stmt = $db_smatk->prepare($sql);
        $stmt->execute();
        $db_smatk=null;
        echo'{"notice":{"text":"Aksidenti u fshij"}';

    } catch(PDOException $e){
        echo '{"error":{"text": '.$e->getMessage().'}';
    }
});
?>
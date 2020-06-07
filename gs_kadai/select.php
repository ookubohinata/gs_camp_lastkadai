<?php
//1.  DB接続します xxxにDB名を入れます
try {
// mampの場合は注意です！違います！別途後ほど確認します！
$pdo = new PDO('mysql:dbname=compony_info;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
//作ったテーブル名を書く場所  xxxにテーブル名を入れます
$stmt = $pdo->prepare("SELECT * FROM info_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる $resultの中に「カラム名」が入ってくるのでそれを表示させる例
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    // 
    $view .= "<p>";
    $view .= '<a href="u_view.php?id='.$result["id"].'">';
    $view .= "企業ID:";
    $view .= $result["id"]." ".$result["c_name"];
    $view .= '</a>';
    $view .= '　';
    $view .= '<a href="delete.php?id='.$result["id"].'" class="delete">';
    $view .= "[削除]";
    $view .= '</a>';
    $view .= "</p>";
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>企業情報一覧
</title>
  <link href="gs_kadai.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body id="main">
  <div class="bg"></div>
  <div class="bg bg2"></div>
  <div class="bg bg3"></div>

<!-- Main[Start] $view-->
    <h1 id="main_title">企業情報管理サイト</h1>
    <legend id="com_list">企業一覧</legend>

<div>
    <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->

<!-- Head[Start] -->
<div id="link_str">
  <a id="navbar-brand" href="index.php">企業登録へ</a>
</div>
<!-- Head[End] -->

<!-- footer start -->
<div id="footer2">
  <div id="wrapper">
  <footer id="footer">
      <small class="copyrights">copyrights 2020 ookubofactory All RIghts Reserved.
      </small>
  </footer>
  </div>
</div>
<!-- footer end -->

</body>
</html>

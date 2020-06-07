<?php
// 1.POSTでid値を取得
$id = $_GET["id"];


// ２．DB接続など
try {
  $pdo = new PDO('mysql:dbname=compony_info;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

// ３．SELECT*FROM a_table WHERE id=:id;
$sql = "SELECT * FROM info_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();

// 4.データ表示
$view="";
if($status==false){
    //execute(SQL実行時にエラーがある場合)
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]); 
}else{
    // 1.データのみ抽出の場合はwhileループで取り出さない
    $row = $stmt->fetch();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link href="gs_kadai.css" rel="stylesheet">
</head>
<body>
  <div class="bg"></div>
  <div class="bg bg2"></div>
  <div class="bg bg3"></div>

  <!-- Main[Start] -->

  <!-- メインタイトル -->
    <h1 id="main_title">企業情報管理サイト</h1>

<!-- ここからupdate.phpにデータを送ります -->
<form method="post" action="update.php">
  <div class="jumbotron">
    <legend id="title">更新フォーム</legend>
        <div id=nyuryoku_form>
          <div id="form_list">
            <label>企業名：<input type="text" id="form_item" name="c_name" value="<?=$row["c_name"]?>"></label><br>
            <label>郵便番号：<input type="text" id="form_item" name="post_numb" value="<?=$row["post_numb"]?>"></label><br>
            <label>住所１：<input type="text" id="form_item" name="address1" value="<?=$row["address1"]?>"></label><br>
            <label>住所２：<input type="text" id="form_item" name="address2" value="<?=$row["address2"]?>"></label><br>
            <label>電話番号：<input type="text" id="form_item" name="phone_num" value="<?=$row["phone_num"]?>"></label><br>
            <label>メールアドレス：<input type="text" id="form_item" name="mail" value="<?=$row["mail"]?>"></label><br>
            <label>利用サービス：<input type="text" id="form_item" name="s_name" value="<?=$row["s_name"]?>"></label><br>
            <label>サービスパターン：<input type="text" id="form_item" name="s_ptn" value="<?=$row["s_ptn"]?>"></label><br>
            <input type="hidden" name="id" value="<?=$row["id"]?>">

          </div>
        </div>
      <input type="submit" id="update_btn" value="更新">
  </div>
</form>

<!-- Head[Start] -->
<div id="link_str">
  <a id="navbar-brand" href="select.php">企業一覧へ</a>
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

<!-- javascript作成 -->
<script src="js/apps2.js"></script>

</body>
</html>
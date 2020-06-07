<?php
// 1.POSTでid,name,email,naiyouを取得
$id     = $_POST["id"];
$c_name   = $_POST["c_name"];
$post_numb  = $_POST["post_numb"];
$address1 = $_POST["address1"];
$address2 = $_POST["address2"];
$phone_num = $_POST["phone_num"];
$mail = $_POST["mail"];
$s_name = $_POST["s_name"];
$s_ptn = $_POST["s_ptn"];

// ２．DB接続
try {
  $pdo = new PDO('mysql:dbname=compony_info;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

// UPDATE info_table SET ....;で更新（bindValue）
$sql = 'UPDATE info_table SET 
    c_name=:c_name,
    post_numb=:post_numb,
    address1=:address1,
    address2=:address2,
    phone_num=:phone_num,
    mail=:mail,
    s_name=:s_name,
    s_ptn=:s_ptn
WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':c_name',$c_name,PDO::PARAM_STR);
$stmt->bindValue(':post_numb',$post_numb,PDO::PARAM_INT);
$stmt->bindValue(':address1',$address1,PDO::PARAM_STR);
$stmt->bindValue(':address2',$address2,PDO::PARAM_STR);
$stmt->bindValue(':phone_num',$phone_num,PDO::PARAM_INT);
$stmt->bindValue(':mail',$mail,PDO::PARAM_STR);
$stmt->bindValue(':s_name',$s_name,PDO::PARAM_STR);
$stmt->bindValue(':s_ptn',$s_ptn,PDO::PARAM_STR);
$stmt->bindValue(':id',$id,PDO::PARAM_INT); //更新したいidを渡す
$status = $stmt->execute();

// 4.データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト 書くときにLocation: in この:　のあとは半角スペースがいるので注意！！
  header("Location: select.php");
  exit;

}
?>
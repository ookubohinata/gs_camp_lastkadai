<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>企業情報管理サイト</title>
  <link href="gs_kadai.css" rel="stylesheet">
</head>
<body>
<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
<!-- Main[Start] -->    

  <!-- メインタイトル -->
  <h1 id="main_title">企業情報管理サイト</h1>
  
<!-- ここからinsert.phpにデータを送ります -->
<form method="post" action="insert.php">
  <div class="jumbotron">
    <legend id="title">登録フォーム</legend>
    <div id=nyuryoku_form>
        <div id=form_list>
                <label>企業名：<input type="text" id="form_item" name="c_name"></label><br>
                <label>郵便番号：<input type="text" id="form_item" name="post_numb"></label><br>
                <label>住所１：<input type="text" id="form_item" name="address1"></label><br>
                <label>住所２：<input type="text" id="form_item" name="address2"></label><br>
                <label>電話番号：<input type="text" id="form_item" name="phone_num"></label><br>
                <label>メールアドレス：<input type="text" id="form_item" name="mail"></label><br>
                <label>利用サービス：<input type="text" id="form_item" name="s_name"></label><br>
                <label>サービスパターン：<input type="text" id="form_item" name="s_ptn"></label><br>
        </div>
    </div>
      <input type="submit" id="reg" value="新規登録">


  </div>
</form>

<!-- Main[End] -->

<!-- Head[Start] -->
<div id="link_str">
  <a id="navbar-brand" href="select.php">企業一覧へ</a>
</div>
<!-- Head[End] -->

<!-- footer start -->
<div id="footer2">
<footer id="footer">
  <div id="wrapper">
		<small class="copyrights">copyrights 2020 ookubofactory All RIghts Reserved.
		</small>
  </div>
</footer>
</div>
<!-- footer end -->

<!-- javascript作成 -->
<script src="js/apps.js"></script>

</body>
</html>

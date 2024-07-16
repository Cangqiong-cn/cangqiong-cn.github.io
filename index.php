<?php
// 连接数据库
$servername = "localhost";
$username = "Wang";
$password = "114514wmz";
$dbname = "wang";

$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("连接失败: ". $conn->connect_error);
}

// 获取点赞数量
$sql = "SELECT count FROM likes WHERE user_id = 1"; // 假设用户 ID 为 1
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $likeCount = $row["count"];
} else {
    $likeCount = 0;
}

// 点赞操作
if (isset($_POST['like'])) {
    $likeCount++;
    $updateSql = "UPDATE likes SET count = $likeCount WHERE user_id = 1";
    if ($conn->query($updateSql) === TRUE) {
        echo "点赞成功，当前点赞数: $likeCount";
    } else {
        echo "更新点赞数量时出错: ". $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>

<html lang="en">

<body>

  <head>

      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>苍穹联协_官方门户网站</title>
    <link rel="shortcut icon" type="image/x-icon" href="icon.ico" width="100%" height="100%" />
    <link rel="stylesheet" type="text/css" href="styles.css">
    <img src="icon.ico" alt=" " width="100%" height="100%">
<h1 style="text-align: center;">苍穹联协 官方门户网站</h1>
<p style="text-align: center;"><small>Internet DogHead CangQiong Joint Association Official Website</small></p>	
  <br><br>	

  <style>
    head * {
      text-align: center;
    }

    :root {
      --w: 80vw;
      --div_w: calc(var(--w) / 6);
      --h: 95px;
      --r: 15px;
    }

    nav {
      width: var(--w);
      height: var(--h);
      border-radius: var(--r);
      background: rgba(255, 255, 255,.5);
      box-shadow: 16px 16px 32px #9f9f9f,
        -16px -16px 32px #ffffff;
      display: flex;
      margin: 100px auto;
      position: relative;
    }

  .item {
      width: var(--div_w);
      height: var(--h);
      font-size: 30px;
      text-align: center;
      line-height: var(--h);
    }

  .item:nth-child(2):hover~#block {
      left: var(--div_w);
    }

  .item:nth-child(3):hover~#block {
      left: calc(var(--div_w) * 2);
    }

  .item:nth-child(4):hover~#block {
      left: calc(var(--div_w) * 3);
    }

  .item:nth-child(5):hover~#block {
      left: calc(var(--div_w) * 4);
    }

  .item:nth-child(6):hover~#block {
      left: calc(var(--div_w) * 5);
    }
    .item:hover{
        cursor: pointer;
    }
    #block {
      transition: .5s;
      width: var(--div_w);
      height: var(--h);
      background-color: rgba(100, 100, 130,.8);
      border-radius: var(--r);
      position: absolute;
      left: 0;
      z-index: -1;
    }
    .eDiv{
        padding: 10px;
        margin: 100px auto;
        width: 600px;
        height: 400px;
        border: 2px solid #000;
        border-radius: 10px;
    }
    p::selection{
        background-color: #9f9f9f;
        color: black;
    }
    h2::selection{
    background-color: #9f9f9f;
    color: black;
    }


    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }

   .like-box {
      position: fixed;
      top: 50%;
      right: 20px;
      width: 80px;
      height: 80px;
      background-color: #e84118;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

   .like-text {
      color: white;
      font-size: 20px;
      font-weight: bold;
    }

  </style>
  <hr><br>
</head>

<body>

  <nav>
    <div class="item"><a href="https://cangqiong-cn.github.io/about.html">关于我们</a></div>
    <div class="item"><a href="http://qm.qq.com/cgi-bin/qm/qr?_wv=1027&k=CMrpGAq4r6E6mwbEpY7GTXoMFyZ9YHGJ&authKey=8YU39TKepVyRe7bMbkKDM7XiUr938UgnrjqwDVizACa5bDEbeB4CTD32qEmIEyJb&noverify=0&group_code=885876679">加入官方群</a></div>
    <div class="item"><a href="https://cangqiong-cn.github.io/rule.html">本站规则</a></div>
    <div class="item"><a href="https://cangqiong-cn.github.io/yonghu.html">用户隐私条例</a></div>
    <div class="item"><a href="https://cangqiong-cn.github.io/mhelp.html">赞助</a></div>
    <div class="item"><a href="https://cangqiong-cn.github.io/kefu.html">自动客服</a></div>
    <div id="block"></div>
  </nav>

  <div class="eDiv">
      <h2>欢迎：</h2>
    <div class="like-box" onclick="document.getElementById('likeForm').submit()">
    <div class="like-text">喜欢 (<?php echo $likeCount;?>)</div>
  </div>

  <form action="" method="post" id="likeForm">
    <input type="hidden" name="like">
  </form>
      <p>
            &nbsp;&nbsp;&nbsp;&nbsp;欢迎踏入这个充满创意与技术的狗头动画世界——我们的动画分析与制作技术网站！<br>
          动画，是一门融合了艺术与技术的奇妙学科，它有着无尽的魅力和可能性。在这里，您将找到深入了解动画的钥匙。对于想要提升自己动画制作技能的您来说，本网站是一座知识的宝库。我们提供详细的教程、案例分析以及专家经验分享，助您掌握从动画的基本原理到高级制作技术的一切内容。无论是传统的手绘动画技巧，还是先进的数字动画工具应用，我们都一一为您呈现。如果您热衷于对优秀狗头动画作品进行深入解读，我们也有丰富的分析文章和视频，带您领略动画大师们的创作思路，学习如何从专业角度欣赏和理解动画的艺术价值。在这里，您不是一个人在探索。我们拥有一个充满热情的动画爱好者和专业人士社区，大家可以交流想法、分享经验、互相学习。<br>我们期待您在这里开启精彩的学习与探索之旅，不断提升自己的动画分析和制作能力，为狗头动画注入新的活力。再次欢迎您，让我们一起为狗头动画的未来努力！
      </p>
  </div>
  
</body>
<footer>
    <br><br><br><br><br><br>
        <hr>
            <p style="text-align: center;">Copyright © 2024 cangqiong.github.io All rights reserved | 版权所有·保留所有权利 |苍穹联协 主办
    <br>
    建议您使用Chrome、Firefox、Edge、IE10及以上版本和360等主流浏览器浏览本网站</p>
    <small><img src="icon120.png" alt="moin" width="1%" height="2%"> <a href="https://icp.gov.moe/?keyword=20240380" target="_blank">萌ICP备20240380号</a></small><br></p>
    <br><br><br><br>
</footer> 
</html>

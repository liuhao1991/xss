# Web安全 - XSS漏洞（跨域脚本漏洞）

## XSS漏洞简介

跨站脚本攻击是指恶意攻击者往Web页面里插入恶意script代码，当用户浏览该页之时，嵌入其中Web里面的script代码会被执行，从而达到恶意攻击用户的目的。
xss漏洞通常是通过php的输出函数将javascript代码输出到html页面中，通过用户本地浏览器执行的，所以xss漏洞关键就是寻找参数未过滤的输出函数。

## 类型

### 反射性XSS

又称为是非持久性XSS，往往是一次性的。

场景：攻击者通过邮件等形式讲包含XSS代码的连接发送给正常用户，当用户点击时，服务器接收该用户的请求并进行处理，然后把带有XSS代码的发送给用户。用户浏览器解析执行代码，触发XSS漏洞。

## PHP REST API

1. <https://www.youtube.com/watch?v=_AZcwf0wXBM&list=PLTb3qGCzYjS17CMm1n9FTY9KyzHG07Qlo>

2. C:\Windows\System32\drivers\etc 폴더 내의 hosts 파일 안에 내용 추가 <br>
<pre>
  127.0.0.1 product.com
  127.0.0.1 www.product.com
</pre>

3. C:\xampp8.1.2\apache\conf\extra 폴더 내의 httpd-vhosts.conf 파일 안에 내용 추가 <br>
<pre>
  <VirtualHost *:80>
    DocumentRoot "C:/xampp8.1.2/htdocs/restapi4/product" <br>
    ServerName product.com <br>
    ServerAlias www.product.com <br>
    <Directory "C:/xampp8.1.2/htdocs/restapi4/product"> <br>
    </Directory> <br>
  </VirtualHost> <br>
</pre>

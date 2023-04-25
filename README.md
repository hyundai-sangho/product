## PHP REST API

1. <https://www.youtube.com/watch?v=_AZcwf0wXBM&list=PLTb3qGCzYjS17CMm1n9FTY9KyzHG07Qlo>

2. C:\Windows\System32\drivers\etc 폴더 내의 hosts 파일 안에 내용 추가 <br>
   127.0.0.1 product.com
   127.0.0.1 www.product.com

3. C:\xampp8.1.2\apache\conf\extra 폴더 내의 httpd-vhosts.conf 파일 안에 내용 추가 <br>
   <VirtualHost \*:80>
   DocumentRoot "C:/xampp8.1.2/htdocs/restapi4/product"
   ServerName product.com
   ServerAlias www.product.com
   <Directory "C:/xampp8.1.2/htdocs/restapi4/product">
   </Directory>
   </VirtualHost>

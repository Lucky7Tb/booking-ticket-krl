# UJIKOM SMKN 1 Katapang

*******************
# Password Login
*******************
Admin(backend) : 'path/ke/project/backend/web' contoh : 'localhost/Book-Tiket-Krl/backend/web'
    
	username = Lucky
	password = 123456

End-User(frontend) : 'path/ke/project/frontend/web' contoh : 'localhost/Book-Tiket-Krl/frontend/web'

    username dan password register sendiri
  
*******************
# Persyaratan
*******************  
 - PHP >= 5.4
 - local server
 - database server
 
*******************
# Cara Instalasi
*******************

- git clone https://github.com/Lucky7Tb/Book-Tiket-KRL.git atau https://github.com/Lucky7Tb/Book-Tiket-KRL.git nama_project

- Install Package yang dibutuhkan dengan composer 
    - buka terminal atau cmd
    - 'path/ke/project' lalu ketikan composer install contoh 'C:\xampp\htdocs\Book-Tiket-KRL> composer install'

- Buat database dengan nama db_krl

- Migrasi database dengan cara :
    - buka terminal atau cmd
    - 'path/ke/project' lalu ketikan yii migrate contoh 'C:\xampp\htdocs\Book-Tiket-KRL> yii migrate'

- Atau dengan cara import db_krl.sql

- Selesai

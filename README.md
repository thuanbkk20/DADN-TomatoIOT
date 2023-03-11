## SET UP

### Tạo mysql database:

1. Đầu tiên, sử dụng DBMS của bạn tạo một connection mysql database
2. Chạy lệnh sau để khởi tạo biến môi trường `.env`

    ```bash
    cp .env.example .env
    ```
### Install dependencies package
1. Nếu chưa có `composer` thì tiến hành cài đặt bằng cách mở terminal rồi chạy các lệnh sau, có thể xem chi tiêt ở trang web [này](https://getcomposer.org/download/).
 
    ```bash
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    ```
    ```bash
    php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
   ```
   ```bash
   php composer-setup.php
   ```
2. Cuối cùng chạy lệnh sau, nếu thấy thư mục vendor được tạo ra trong project có nghĩa bước setup này đã thành công:

    ```bash
    composer install
    ```
### Tạo dotenv


1. Vào folder project, truy cập file `.env`.
2. Copy các biến môi trường sau vào file `.env`
    ```bash
    DB_HOST=
    DB_USER=
    DB_PASSWORD=
    DB_NAME = 
    ```
3. Điền các thông tin về `mysql server` của bạn. 
- Trong đó `DB_PASSWORD`, `DB_USER` lần lượt là các thông tin về `user` và `password` của `mysql server`. 
- `DB_NAME` là tên `schema` mà bạn đặt cho `database` trong project này.

## Run project

Để chạy project, chạy lệnh sau:

```bash
php -S localhost:3000
```
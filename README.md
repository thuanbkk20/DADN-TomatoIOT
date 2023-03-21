## SET UP

### Tạo mysql database:

1. Đầu tiên, sử dụng DBMS của bạn tạo một connection mysql database
2. Chạy lệnh sau để khởi tạo biến môi trường `.env`

    ```bash
    cp .env.example .env
    ```
### Install dependencies package
1. Nếu chưa có `composer` thì tiến hành cài đặt ở trang web [này](https://getcomposer.org/download/).

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

### Run migration:

1. Mở terminal lên rồi lệnh sau:

    ```bash
    php migrations.php
    ```

2. Terminal trả về như sau là thành công:

    ```bash
    [2021-10-28 19:10:49] - Applying migration m0001_initial.php
    [2021-10-28 19:10:49] - Applyied migration m0001_initial.php
    ```

3. Nếu không được như vậy thì hãy `drop` hết table trong `database` rồi chạy migrate lại.<br />

## Run project

Để chạy project, chạy lệnh sau:

```bash
php -S localhost:3000
```
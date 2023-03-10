## SET UP

### Tạo mysql database:

1. Đầu tiên, sử dụng DBMS của bạn tạo một connection mysql database
2. Chạy lệnh sau để khởi tạo biến môi trường `.env`

    ```bash
    cp .env.example .env
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
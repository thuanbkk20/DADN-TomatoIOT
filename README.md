## SET UP

### Tạo mysql database:

1. Đầu tiên, sử dụng DBMS của bạn tạo một connection mysql database, tạo database có tên là 'tomatoiot'

2. Vào configs/database.php

3. Thay thế các thông tin về `mysql server` của bạn trong mảng $config['database'] 
- Trong đó các key `host` `user` và `pass` lần lượt là các thông tin về `host`, `user` và `password` của `mysql server`. 


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

### Add adafruit IO key

Vào file core/AdafruitIO.php, thêm giá trị sau đây  `aio_EevX842A3w3Qz6A7Bs5RbZpum1bQ` làm giá trị mặt định cho tham số `$key` của hàm `__construct`

## Run project

Để chạy project, chạy lệnh sau:

```bash
php -S localhost:3000
```
# Drupal 7 local with Docker

Stack fixed theo yeu cau:
- PHP: `php:7.4-apache`
- DB: `mariadb:10.5`

## Port da chon (da check conflict)
- Web: `18080`
- MariaDB: `13306`

Hai port nay khong nam trong danh sach dang listen tren may tai thoi diem tao.

## 1) Chay container
```bash
docker compose up -d --build
```

## 2) Tao settings.php cho Drupal 7 (neu chua co)
Neu khong co `sites/default/settings.php`, tao tu `default.settings.php`:
```bash
cp sites/default/default.settings.php sites/default/settings.php
chmod 664 sites/default/settings.php
```

Cap nhat DB config trong `sites/default/settings.php` theo ket noi trong network Docker:
```php
$databases['default']['default'] = array(
  'driver' => 'mysql',
  'database' => 'drupal',
  'username' => 'drupal',
  'password' => 'drupal_local_change_me',
  'host' => 'db',
  'port' => '3306',
  'prefix' => '',
  'collation' => 'utf8_general_ci',
);
```

Neu site dung private files, them:
```php
$conf['file_private_path'] = 'private';
```

## 3) Import database dump
Vi du import file dump moi nhat trong `private/`:
```bash
gunzip -c private/<ten-file>.mysql.gz | docker compose exec -T db mysql -udrupal -pdrupal_local_change_me drupal
```

## 4) Truy cap
- Web: `http://localhost:18080`
- DB tu host: `127.0.0.1:13306`

## 5) Kiem tra nhanh
```bash
docker compose ps
docker compose logs --tail=100 web
docker compose logs --tail=100 db
```

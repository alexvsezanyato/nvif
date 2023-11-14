apt clear
apt update

apt install -y libonig-dev
apt install -y url git unzip

docker-php-ext-install pdo pdo_mysql mysqli mbstring

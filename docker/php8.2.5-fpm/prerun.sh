apt clear
apt update

apt install -y libonig-dev
apt install -y git
apt install -y unzip
apt install -y 7zip
apt install -y mysql-client

docker-php-ext-install pdo pdo_mysql mysqli mbstring

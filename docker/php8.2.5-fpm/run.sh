echo 'root' | passwd --stdin root

groupadd --gid ${UID} coal
useradd --uid ${UID} --gid ${GID} --groups www-data --shell /bin/bash coal --create-home
usermod --groups coal www-data

echo 'alias a="php /home/php/artisan"' >> /home/coal/.bashrc
echo 'alias artisan="php /home/php/artisan"' >> /home/coal/.bashrc
echo 'alias c="composer"' >> /home/coal/.bashrc

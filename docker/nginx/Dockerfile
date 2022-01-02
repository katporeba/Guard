# Obraz z docker-hub
FROM nginx:1.17.8-alpine

# Copy the public directory
# COPY ./public/ /app/public/
COPY . /app/

# Copy the nginx config file

# dzieki temu nasz plik z konfiguracją zostanie przekopiowany na serwer nginx'a, który zostanie zainstalowany wewnątrz 
# naszego kontenera wirtualnego obrazu
COPY ./docker/nginx/nginx.conf /etc/nginx/conf.d/default.conf

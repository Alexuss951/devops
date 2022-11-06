FROM nginx

RUN apt-get update && apt-get upgrade

COPY lab /usr/share/nginx/html

# Tentang

Tigahari adalah kamus perintah dasar dan virtualisasi Linux (Debian) berbasis web yang digunakan untuk penelitian di SMK Muhammadiyah 2 Yogyakarta sebagai Tugas Akhir Skripsi.


# Installasi

Installation process is really simple:

  - Download latest version of the Web Console.
  - Unpack archive and open file "webconsole.php" in your favorite text editor.
  - At the beginning of the file enter your $USER and $PASSWORD credentials, edit any other settings that you like (see description in the comments).
  - Upload changed "webconsole.php" file to the web server and open it in the browser.

# About author

Web Console has been developed by Nickolay Kovalev (http://nickola.ru).
If you have interest job offers, you can see him contacts at his CV (http://cv.nickola.ru).
Also, various third-party components are used.

# Used components

  - jQuery JavaScript Library: https://github.com/jquery/jquery
  - jQuery Terminal Emulator: https://github.com/jcubic/jquery.terminal
  - jQuery Mouse Wheel Plugin: https://github.com/brandonaaron/jquery-mousewheel
  - PHP JSON-RPC 2.0 Server/Client Implementation: https://github.com/sergeyfast/eazy-jsonrpc
  - Normalize.css: https://github.com/necolas/normalize.css

# URLs

 - GitHub: https://github.com/nickola/web-console
 - Patreon: https://www.patreon.com/nickola
 - Author: http://nickola.ru

# License

Web Console is licensed under GNU LGPL Version 3 (http://www.gnu.org/licenses/lgpl.html) license.


ALAT dan BAHAN :
Laptop/PC sebagai server
OS Debian based 64bit ONLY (Dalam hal ini menggunakan Ubuntu 14.04)
RAM
CPU
Internet

CARA KERJA :
Install server dengan Debian kemudian atur agar bisa terkoneksi dengan internet.
Arahkan ke repository lokal kemudian update paket data.
*sudo nano /etc/apt/source.list
*sudo apt update

Berikut yang perlu diinstall di server (apabila diperlukan akan kami jabarkan dibagian tertentu) dengan catatan OS server masih FRESH install
-Docker sebagai virtual console
-Apache2 sebagai akses phpsysinfo
*apt install -y phpsysinfo apache2 



###########  DOCKER  ################

Pastikan bahwa docker belum terinstall, dengan menjalankan perintah
sudo apt remove docker docker-engine

Jika OS HOST adalah UBUNTU 14.04, maka membutuhkan paket ekstra untuk menjalankan docker, maka kita install dulu paket ektra tersebut (selain Ubuntu 14.04 sepertinya tidak membutuhkan paket esktra)
*sudo apt install linux-image-extra-$(uname -r) linux-image-extra-virtual

Setelah paket ekstra terinstall, kita telah siap untuk menginstall docker. Ada beberapa cara untuk menginstall docker, dan yang paling mudah adalah dengan menginstallnya dari repository docker itu sendiri. Caranya bagaimana? Yak, kita membutuhkan beberapa aplikasi yang dapat mengijinkan kita untuk menginstall via https, terlebih dahulu kita menginstall aplikasi-aplikasi tersebut
*sudo apt install apt-transport-https ca-certificates curl software-properties-common

Lalu kita tambahkan kunci GPS milik docker
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
Kita masukkan repository milik docker ke daftar repository kita
sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"

Setelah repository docker kita tambahkan, lalu update kembali daftar repository kita,
sudo aptupdate

Mari kita mulai install docker dengan menjalankan perintah
sudo apt install docker-ce
Perintah diatas akan menginstall docker community edition

Untuk mengecek apakah docker telah terinstall dengan benar, kita cek dengan menjalankan perintah
sudo docker run hello-world

Untuk keluar dari kontainer sekaligus stop, ketikkan exit atau tekan Ctrl + c 
Untuk keluar dari kontainer tanpa stop, Ctrl + p + q

###########  USERMOD   ###########
Menjadikan user satu grup dengan docker
sudo usermod -aG docker nama_user (www-data dan idn)
Setelah jadi satu grup dengan docker, maka logoff kemudian masuk lagi untuk bekerja.

Mendownload image, atau istilahnya pull image
docker pull debian / docker pull ubuntu / docker pull centos

Untuk melihat image apa saja yang ada dalam komputer, tinggal ketikkan perintah
docker images

Perintah dibawah digunakan untuk menjalanakan kontainer dengan nama tertentu, semisal siswa dengan imagebase debian.
docker run --name siswa -it debian

membuat bridge, dengan tujuan agar setiap kontainer yang dibuat menjadi satu network
docker network create --driver bridge --subnet 192.168.24.0/24 xtime-Net

Membuat kontainer dengan network tertentu 
docker run --name siswa --network xtime-Net -it debian

jika ingin membuat ip static pada kontainer yang dibuat, tambahkan saja perintah --ip string
docker run --name siswa --network xtime-Net --ip 192.168.24.5 -it debian

Karena docker ini minimal, maka untuk ping, text editor nano dan edit konfigurasi network saja ndak disertakan.
ping : apt-get install netwox
nano : apt-get install nano
/etc/network/interfaces : apt-get install  embuhh....


#############   WEBCONSOLE   #################
Download webconsole via google
WinSCP kan ke VM ubuntu untuk running test
/var/www/html/webconsole

kemudian install tool2 lainnya
sudo apt-get install apache2 php5
sudo apt-get install php libapache2-mod-php php-mcrypt php-mysql
sudo apt-get install apache2 apache2-doc apache2-utils
sudo apt-get install php5-gd php5-cli php5-curl

/etc/apache2/sites-available/000-default.conf
<VirtualHost *:80>
        #ServerName www.example.com
        ServerAdmin webmaster@localhost
        DocumentRoot /var/www/html/vc/

        <Directory /var/www/html/vc/>
                Options Indexes FollowSymLinks
                AllowOverride All
                Require all granted
        </Directory>
        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>

############# BUILD OUR IMAGE OWN  #################
Buat file namanya Dockerfile
Contoh :
FROM debian
RUN apt-get update
RUN apt-get install -y apache2 nano php5
CMD /etc/init.d/apache2 start

jalankan perintah
docker build -t nama_image .
(jangan lupa tanda titiknya, menandakan bahwa Dockerfile dijalankan di direktori saat ini)

#############  BETA CONTAINER  ####################
docker run --name testing --network xtime -v /home/idn/webconsole:/share -p 1414:80 -it debian
apt-get update ; apt-get install -y apache2 nano php5 sudo
sudo iptables -t nat -L

######## DON'T ########
uninstall/reinstall apache2



####### DOCKERFILE  #########
FROM debian
RUN apt-get update
#RUN apt-get update --fix-missing
RUN apt-get install -y apt-utils
RUN apt-get install -y nano sudo htop
RUN apt-get install -y curl
RUN apt-get install -y git
#RUN apt-get update
RUN apt-get update --fix-missing
RUN apt-get install -y nodejs
RUN apt-get install -y node
RUN apt-get install -y npm
RUN cd /
RUN git clone https://github.com/krishnasrinivas/wetty
RUN mv wetty /usr/
RUN mv /usr/wetty /usr/vc
RUN cd /usr/vc
RUN npm cache clean -f
RUN npm install -g n ; n 4.4.5
RUN npm install npm -g
RUN npm uninstall node-gyp -g
RUN cd /usr/vc/ ; npm install
RUN useradd -ms /bin/bash vault
RUN echo "vault:Docker!" | chpasswd
RUN usermod -G sudo vault
ENTRYPOINT node /usr/vc/app.js -p 3000

/*
Navicat MariaDB Data Transfer

Source Server         : 192.168.47.128
Source Server Version : 50554
Source Host           : 192.168.47.128:3306
Source Database       : tigahari

Target Server Type    : MariaDB
Target Server Version : 50554
File Encoding         : 65001

Date: 2017-09-20 11:49:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for command
-- ----------------------------
DROP TABLE IF EXISTS `command`;
CREATE TABLE `command` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `use` varchar(10000) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `opt` varchar(10000) DEFAULT NULL,
  `example` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of command
-- ----------------------------
INSERT INTO `command` VALUES ('1', 'cp', 'cp [OPTION]... SOURCE DEST', 'Meng-copy-paste file atau folder / direktori ke lokasi baru', '-R, -r,  --recursive<br>copy direktori (secara rekursif/berulang), digunakan untuk mengcopy folder<br><br>-s, --symbolic-link<br>membuat simbolik link<br><br>-v, --verbose<br>menampilkan proses yang terjadi<br><br>--help<br>menampilkan halaman bantuan<br><br>--version<br>menampilkan halaman versi', 'cp -rf /home/user1  /home/user2');
INSERT INTO `command` VALUES ('2', 'mkdir', 'mkdir [OPTION] DIRECTORY...', 'Membuat folder / direktori baru di lokasi yang diinginkan', '-v, --verbose<br>menampilkan proses yang terjadi<br><br>--help<br>menampilkan halaman bantuan<br><br>--version<br>menampilkan halaman versi', 'mkdir /home/user1/data_profil');
INSERT INTO `command` VALUES ('5', 'ls', 'ls [OPTION]... [FILE]...', 'Melihat isi file dari direktori /folder aktif', '-a, --all <br> Menampilkan semua isi direktori termasuk file / folder yang diawali dengan karakter .  <br><br> -A, --almost-all <br> Menampilkan semua isi direktori kecuali yang diawali oleh karakter . dan .. <br><br> --author <br> Jika dikombinasikan dengan opsi -l maka akan menampilkan nama pemilik file / folder <br><br> -c <br> jika dikombinasikan dengan -lt maka akan menampilkan berdasar nama atau file yang paling baru <br><br> -h, --human-readable <br> Menampilkan ukuran file yang dapat dibaca dengan mudah <br><br> -S <br> Mengurutkan berdasar ukuran yang paling besar <br><br> -t <br> Mengurutkan berdasarkan modifikasi terbaru<br><br> --help <br> menampilkan halaman bantuan <br><br> --version <br> menampilkan halaman versi', 'ls -alt /home/user1');
INSERT INTO `command` VALUES ('6', 'cd', 'cd [DIRECTORY]', 'Berpindah lokasi dari suatu direktori ke direktori lainnya', '--help<br>menampilkan halaman bantuan<br><br>--version<br>menampilkan halaman informasi versi', 'cd /home/adrenaline/');
INSERT INTO `command` VALUES ('7', 'mv', 'mv [OPTION]... SOURCE DEST', 'Perintah yang ini digunakan untuk memindahkan (move) file / folder ke lokasi baru', '-v, --verbose<br>menampilkan proses yang terjadi<br><br>--help<br>menampilkan halaman bantuan<br><br>--version<br>menampilkan halaman informasi versi', 'mv /home/adrenaline/folder_data /home/adrenaline/');
INSERT INTO `command` VALUES ('8', 'rm', 'rm [OPTION]... FILE...', 'Menghapus file atau folder', '-d, --dir <br> Menghapus direktori kosong <br><br>-r, -R,  --recursive<br>Menghapus folder <br><br> -v, --verbose<br>menampilkan proses yang terjadi<br><br>--help<br>menampilkan halaman bantuan<br><br>--version<br>menampilkan halaman informasi versi', 'rm -rf /home/adrenaline');
INSERT INTO `command` VALUES ('9', 'pwd', '$ pwd', 'Menginformasikan lokasi folder tempat anda berada saat ini.', '--help<br>menampilkan halaman bantuan<br><br>--version<br>menampilkan halaman informasi versi', 'pwd --help');
INSERT INTO `command` VALUES ('10', 'rmdir', 'rmdir [OPTION] ... DIRECTORY ...', 'Menghapus direktori kosong', '-v, --verbose<br>menampilkan proses yang terjadi<br><br>--help<br>menampilkan halaman bantuan<br><br>--version<br>menampilkan halaman informasi versi', 'rmdir /home/adrenaline');
INSERT INTO `command` VALUES ('11', 'ps', 'ps [OPTION]', 'Menampilkan informasi dari proses yang aktif.', 'ps -e <br> ps -ef <br> ps -eF <br> ps -ely <br> Melihat setiap proses dalam sistem menggunakan sintak standar <br><br> ps ax <br> ps axu <br> Melihat proses sistem menggunakan sintak BSD <br><br> ps -ejH <br> ps axjf <br> Melihat proses secara terstruktural <br><br> ps -eLf <br> ps axms <br> Mendapatkan info secara terurut <br><br> ps -eo euser , ruser , fuser , f , comm , label <br> ps axZ <br> ps -eM <br> Info keamanan', 'ps -e');
INSERT INTO `command` VALUES ('12', 'touch', 'touch [OPTION]... FILE...', 'Dengan perintah touch dapat digunakan untuk membuat file kosong. File kosong adalah  file dengan ukuran 0 byte.', '-m <br> Merubah waktu modifikasi saja <br><br>--help<br>menampilkan halaman bantuan<br><br>--version<br>menampilkan halaman informasi versi', 'touch /home/adrenaline/data.txt');
INSERT INTO `command` VALUES ('13', 'grep', 'grep [OPTION] PATTERN [FILE]...', 'Berfungsi untuk mencari isi suatu file di suatu direktori', '--help<br>menampilkan halaman bantuan<br><br>--version<br>menampilkan halaman informasi versi', 'grep data.txt /home/adrenaline');
INSERT INTO `command` VALUES ('14', 'clear', '$ clear', 'Menghapus tampilan layar terminal', '-', '$ clear');
INSERT INTO `command` VALUES ('15', 'useradd', 'useradd [options] LOGIN', 'Useradd dapat diikuti beberapa opsi perintah , sehingga perintah useradd dapat juga berfungsi untuk memperbarui file sistem , membuat direktori home user baru dan menyalin file', '-', 'useradd adrenaline2');
INSERT INTO `command` VALUES ('16', 'tar', 'tar {A|c|d|r|t|u|x}[GnSkUWOmpsMBiajJzZhPlRvwo] [ARG...]', 'Program kompresi', '-', 'tar -zxvf /home/adrenaline/data.tar.gz');
INSERT INTO `command` VALUES ('17', 'find', 'find [-H] [-L] [-P] [-D debugopts] [-Olevel] [starting-point...] [expression]', 'Perintah ini digunakan untuk mencari file berdasarkan nama file', '-', 'find data.txt /home/adrenaline');
INSERT INTO `command` VALUES ('18', 'whoami', 'whoami [OPTION]', 'Menampilkan nama dari pengguna yang login saja tanpa informasi yang lain', '--help<br>menampilkan halaman bantuan<br><br>--version<br>menampilkan halaman informasi versi', '$ whoami');
INSERT INTO `command` VALUES ('19', 'shutdown', 'shutdown [OPTION]', 'Mematikan seluruh proses pada sistem', '--help<br>menampilkan halaman bantuan<br><br>--version<br>menampilkan halaman informasi versi', 'shutdown -h 0');
INSERT INTO `command` VALUES ('20', 'halt', '# halt', 'Mematikan sistem dan hanya bisa dijalankan oleh superuser', '--help<br>menampilkan halaman bantuan<br><br>--version<br>menampilkan halaman informasi versi', '# halt');
INSERT INTO `command` VALUES ('21', 'hostname', 'hostname [-v] [-s|--short]', 'Digunakan untuk menampilkan atau mengatur nama host , domain , dan node ', '-i, --ip-address <br> Menampilkan ip address host<br><br>--help<br>menampilkan halaman bantuan<br><br>--version<br>menampilkan halaman informasi versi', '$ hostname');
INSERT INTO `command` VALUES ('22', 'date', 'date [OPTION]... [+FORMAT]', 'Menampilkan atau mengatur waktu dan tanggal sistem', '--help<br>menampilkan halaman bantuan<br><br>--version<br>menampilkan halaman informasi versi', '$ date');
INSERT INTO `command` VALUES ('23', 'time', 'time [options] command [arghuments...]', 'Melihat jumlah waktu yg ditangani untuk penyelesaian suatu proses dan info lainnya', '-v, --verbose<br>menampilkan proses yang terjadi<br><br>--help<br>menampilkan halaman bantuan<br><br>--version<br>menampilkan halaman informasi versi', '$ time');
INSERT INTO `command` VALUES ('24', 'who', 'who [OPTION]', 'Menampilkan  informasi mengenai user yang sedang login  saat ini pada komputer kita', '-a, --all <br> sama dengan opsi -b -d --login -p -r -t -T -u <br><br> -u, --users <br><br> mendaftar pengguna yang sedang login', 'who -a');
INSERT INTO `command` VALUES ('25', 'last', '$ last', 'Menampilkan login terakhir, dilihat melalui wtmp berkas ( yang merekam semua login / logout ) dan mencetak informasi tentang waktu connect dari pengguna', null, '');
INSERT INTO `command` VALUES ('26', 'uptime', '$ uptime', 'Memberikan informasi mengenai waktu saat ini , berapa lama sistem telah berjalan , berapa banyak pengguna yang sedang login, dan beban sistem rata - rata untuk waktu  1 , 5  dan 15 menit', null, '');
INSERT INTO `command` VALUES ('27', 'du', 'du [OPTION]...[FILE]...', 'Meringkas penggunaan disk dari kumpulan file , rekursif untuk direktori', null, '');
INSERT INTO `command` VALUES ('28', 'nano', '$ nano filename', 'Salah satu editor di linux , seperti halnya notepad di windows . Contoh untuk mengedit suatu file', null, '');
INSERT INTO `command` VALUES ('29', 'ifconfig', '$ ifconfig', 'Hal ini digunakan pada saat boot untuk mengatur interface atau antarmuka yang diperlukan', null, '');
INSERT INTO `command` VALUES ('30', 'free', 'free [options]', 'Perintah ini digunakan menampilkan jumlah free memori dan memori yang digunakan pada sistem serta serta buffer dan cache yang digunakan oleh kernel', null, '');
INSERT INTO `command` VALUES ('31', 'reboot', '# reboot', 'Menghidupkan ulang sistem / komputer', null, '');
INSERT INTO `command` VALUES ('32', 'cat', 'cat [OPTION] [FILE]…', 'Menampilkan isi suatu file', null, '');
INSERT INTO `command` VALUES ('33', 'wc', 'wc [OPTION]… [FILE]…', 'Menampilkan jumlah baris, kata dan byte sebuah file', null, '');
INSERT INTO `command` VALUES ('34', 'chmod', 'chmod [OPTION]... MODE[,MODE]... FILE... <br>chmod [OPTION]... OCTAL-MODE FILE...<br>chmod [OPTION]... --reference=RFILE FILE...', 'Mengatur hak akses file atau direktori', '--help <br> menampilkan halaman bantuan <br><br> --version <br> menampilkan halaman versi', 'chmod 777 /home/enrahmad/data.txt');
INSERT INTO `command` VALUES ('35', 'chown', 'chown [OPTION]... [OWNER][:[GROUP]] FILE... <br> chown [OPTION]... --reference=RFILE FILE...', 'Merubah kepemilikan file', '--help <br> menampilkan halaman bantuan <br><br> --version <br> menampilkan halaman versi', 'chown enrahmad:enrahmad /home/enrahmad/data.txt ');
INSERT INTO `command` VALUES ('36', 'echo', 'echo [SHORT-OPTION]... [STRING]... <br> echo LONG-OPTION', 'Menampilkan pesan dilayar', '--help <br> menampilkan halaman bantuan <br><br> --version <br> menampilkan halaman versi', 'echo Hello World!!');
INSERT INTO `command` VALUES ('37', 'eject', 'eject [options] device|mountpoint', 'Mengeluarkan <i>removable media</i>', '--help <br> menampilkan halaman bantuan <br><br> --version <br> menampilkan halaman versi', '$eject');
INSERT INTO `command` VALUES ('38', 'exit', '$exit', 'Keluar dari shell', 'None.', '$exit');
INSERT INTO `command` VALUES ('39', 'kill', 'kill [-signal|-s signal|-p] [-q value] [-a] [--] pid|name...<br>kill -l [number] | -L', 'Menghentikan suatu proses', '--help <br> menampilkan halaman bantuan <br><br> --version <br> menampilkan halaman versi', 'kill -9 1721;');
INSERT INTO `command` VALUES ('40', 'logout', '$logout', 'Keluar dari shell', 'None.', '$logout');
INSERT INTO `command` VALUES ('41', 'man', 'man', 'Menampilkan refrensi manual', '--help <br> menampilkan halaman bantuan <br><br> --version <br> menampilkan halaman versi', '$man ls');
INSERT INTO `command` VALUES ('42', 'netstat', 'netstat [address_family_options] [--tcp|-t] [--udp|-u] [--udplite|-U]        [--sctp|-S] [--raw|-w] [--l2cap|-2] [--rfcomm|-f] [--listening|-l]        [--all|-a] [--numeric|-n] [--numeric-hosts] [--numeric-ports]        [--numeric-users] [--symbolic|-N] [', 'Menampilkan koneksi jaringan, tabel routing, statistik <i>interface</i>, koneksi <i>masquerade</i>', '--help <br> menampilkan halaman bantuan <br><br> --version <br> menampilkan halaman versi', 'netstat -tulpn 3232');
INSERT INTO `command` VALUES ('43', 'ssh', 'ssh [-1246AaCfGgKkMNnqsTtVvXxYy] [-b bind_address] [-c cipher_spec]          [-D [bind_address:]port] [-E log_file] [-e escape_char]          [-F configfile] [-I pkcs11] [-i identity_file]          [-J [user@]host[:port]] [-L address] [-l login_name] [-m mac_spec]          [-O ctl_cmd] [-o option] [-p port] [-Q query_option] [-R address]          [-S ctl_path] [-W host:port] [-w local_tun[:remote_tun]]          [user@]hostname [command]', 'Login ke sebuah host secara remote', '--help <br> menampilkan halaman bantuan <br><br> --version <br> menampilkan halaman versi', 'ssh 192.168.24.30');
INSERT INTO `command` VALUES ('44', 'sed', 'sed [OPTION]... {script-only-if-no-other-script} [input-file]...', 'Mengubah format file DOS ke format UNIX', '--help <br> menampilkan halaman bantuan <br><br> --version <br> menampilkan halaman versi', '$sed \'s/.$//\' filename');
INSERT INTO `command` VALUES ('45', 'awk', 'awk [?F sepstring] [?v assignment]... program [argument...]', 'Menghapus duplikasi file', '--help <br> menampilkan halaman bantuan <br><br> --version <br> menampilkan halaman versi', 'awk -F \':\' \'$3==$4\' passwd.txt');
INSERT INTO `command` VALUES ('46', 'sort', 'sort [OPTION]... [FILE]...<br><br>sort [OPTION]... --files0-from=F', 'Mengurutkan file secara ascending', '--help <br> menampilkan halaman bantuan <br><br> --version <br> menampilkan halaman versi', 'sort -r names.txt');
INSERT INTO `command` VALUES ('47', 'gedit', 'gedit name', 'Membuka file menggunakan gedit', '--help <br> menampilkan halaman bantuan <br><br> --version <br> menampilkan halaman versi', 'gedit nama_file.txt');
INSERT INTO `command` VALUES ('48', 'ln', 'ln [OPTION]... [-T] TARGET LINK_NAME   (1st form) <br><br> ln [OPTION]... TARGET                  (2nd form)<br><br>ln [OPTION]... TARGET... DIRECTORY     (3rd form) <br><br>  ln [OPTION]... -t DIRECTORY TARGET...  (4th form)', 'Membuat simbolik link', '--help <br> menampilkan halaman bantuan <br><br> --version <br> menampilkan halaman versi', 'ln /home/erahmad /var/www/html');
INSERT INTO `command` VALUES ('49', 'more', 'more [options] file...', 'Melihat file yang akan ditampilkan per layar', '--help <br> menampilkan halaman bantuan <br><br> --version <br> menampilkan halaman versi', 'more name.txt');
INSERT INTO `command` VALUES ('50', 'pico', 'pico name', 'Membuka file dengan file editor pico', '--help <br> menampilkan halaman bantuan <br><br> --version <br> menampilkan halaman versi', 'pico name.txt');
INSERT INTO `command` VALUES ('51', 'lynx', 'lynx name', 'Melihat file html dengan mode teks', '--help <br> menampilkan halaman bantuan <br><br> --version <br> menampilkan halaman versi', 'lynx nama_halaman.html');
INSERT INTO `command` VALUES ('52', 'mc', '$mc', 'Membuka file manager', 'None.', '$mc');
INSERT INTO `command` VALUES ('53', 'startx', '$startx', 'Menjalankan sesi X-Window dan meload windows manager', 'None.', '$startx');
INSERT INTO `command` VALUES ('54', 'top', 'top -hv|-bcEHiOSs1 -d secs -n max -u|U user -p pid -o fld -w [cols]', 'Melihat proses manager Linux', '--help <br> menampilkan halaman bantuan <br><br> --version <br> menampilkan halaman versi', '$top');
INSERT INTO `command` VALUES ('55', 'htop', '$htop', 'Melihat proses manager Linux menggunakan htop', '--help <br> menampilkan halaman bantuan <br><br> --version <br> menampilkan halaman versi', '$htop');
INSERT INTO `command` VALUES ('56', 'uname', 'uname [OPTION]...', 'Informasi sistem kernel Linux', '--help <br> menampilkan halaman bantuan <br><br> --version <br> menampilkan halaman versi', 'uname -a');
INSERT INTO `command` VALUES ('57', 'lsmod', '$lsmod', 'Melihat modul kernel yang telah di load', '--help <br> menampilkan halaman bantuan <br><br> --version <br> menampilkan halaman versi', '$lsmod');
INSERT INTO `command` VALUES ('58', 'dmesg', 'dmesg [options] <br><br> dmesg --clear <br><br> dmesg --read-clear [options] <br><br> dmesg --console-level level <br><br> dmesg --console-on <br><br> dmesg --console-off', 'Melihat pesan-pesan pada waktu proses boot', '--help <br> menampilkan halaman bantuan <br><br> --version <br> menampilkan halaman versi', '$dmesg');
INSERT INTO `command` VALUES ('59', 'wall', 'wall [-n] [-t timeout] [-g group] [message | file]', 'Menulis pesan ke semua pengguna', '--help <br> menampilkan halaman bantuan <br><br> --version <br> menampilkan halaman versi', 'wall komputer akan dimatikan.');
INSERT INTO `command` VALUES ('60', 'su', 'su [options] [-] [user [argument...]]', 'Login sementara sebagai user lain', '--help <br> menampilkan halaman bantuan <br><br> --version <br> menampilkan halaman versi', 'su fatih');
INSERT INTO `command` VALUES ('61', 'fg', 'fg [job_id]', 'Mengembalikan suatu proses yang dihentikan sementara agar berjalan kembali', '--help <br> menampilkan halaman bantuan <br><br> --version <br> menampilkan halaman versi', 'fg name ...');
INSERT INTO `command` VALUES ('62', 'cal', '$call', 'Menampilkan kalender', 'None.', '$cal');
INSERT INTO `command` VALUES ('63', 'head', 'head name....', 'Menampilkan baris pertama, defaultnya 10 baris teratas', '--help <br> menampilkan halaman bantuan <br><br> --version <br> menampilkan halaman versi', 'head name.txt');
INSERT INTO `command` VALUES ('64', 'ping', 'ping [-aAbBdDfhLnOqrRUvV] [-c count] [-F flowlabel] [-i interval] [-I        interface] [-l preload] [-m mark] [-M pmtudisc_option] [-N        nodeinfo_option] [-w deadline] [-W timeout] [-p pattern] [-Q tos] [-s        packetsize] [-S sndbuf] [-t ttl] [-T timestamp option] [hop ...]        destination', 'Melakukan test konektifitas antar komputer dalam suatu jaringan', '--help <br> menampilkan halaman bantuan <br><br> --version <br> menampilkan halaman versi', 'ping www.google.com');

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `name` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES ('dockeros', 'Debian 8.0 64 bit');
INSERT INTO `setting` VALUES ('dockerver', '5.5');
INSERT INTO `setting` VALUES ('password', 'folkeram33');
INSERT INTO `setting` VALUES ('register', 'true');
INSERT INTO `setting` VALUES ('servercpu', 'Intel Core i3 M280');
INSERT INTO `setting` VALUES ('serverip', '192.168.47.128');
INSERT INTO `setting` VALUES ('serveros', 'Mint 18.1 64bit');
INSERT INTO `setting` VALUES ('serverram', '4000 MB');
INSERT INTO `setting` VALUES ('serverswap', '128 MB');
INSERT INTO `setting` VALUES ('username', 'adrenaline');
INSERT INTO `setting` VALUES ('vcpackage', 'nano sudo htop curl git nodejs node npm');
INSERT INTO `setting` VALUES ('wettydir', '/usr/wetty/disini');
INSERT INTO `setting` VALUES ('wettyport', '3000');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nis` int(6) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `class` enum('','X TKJ','XI TKJ','XII TKJ') DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','siswa') DEFAULT 'siswa',
  `remove` enum('true','false') NOT NULL DEFAULT 'true',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '4444', 'Nur Rahmad Suhendra', 'XI TKJ', 'admin@admin.com', 'b857eed5c9405c1f2b98048aae506792', 'admin', 'false');
INSERT INTO `user` VALUES ('2', '3333', 'Maulida', 'XI TKJ', 'mana@ida.com', 'b857eed5c9405c1f2b98048aae506792', 'admin', 'true');
INSERT INTO `user` VALUES ('3', '1024', 'enrahmad', 'XI TKJ', 'en@rah.mad', '25d55ad283aa400af464c76d713c07ad', 'siswa', 'true');
INSERT INTO `user` VALUES ('4', '1000', 'syla', null, 'syla@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'siswa', 'true');

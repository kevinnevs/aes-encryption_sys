# AES IMAGE ENCRYPTION SYSTEM

## Introduction
This is an image encryption and decryption system that allows users to safely send & receive multimedia documents in a secure manner. The encryption system used is the AES (Advanced Encryption Standard). This is a safe, and hard to bruteforce through, making it the most secure and safest web application system to use when submitting multimedia documents to friends, family and colleagues.

## Team Members
This project will only be done by a single person, named Kevin Macharia Njuguna. Kevin will handle the preparation and work dynamics. Handling front-end, back-end and full deployment of the web application system. 

## Technologies
The below is a list of all technologies that will be used in the creation of this web app system : 
1. Cryptography encryption algorithm → AES (Advanced Encryption Standard), a symmetric block cipher. We will use the key generation algorithm CryptoJS.AES.encrypt & CryptoJS.AES.decrypt
2. Frontend application → HTML, CSS & Javascript
3. Backend application → PHP
4. Resources → https://www.researchgate.net/publication/357232938_AES_Image_Encryption

## AES Encryption Algorithm
Encryption Algorithm

![This is an image](/Images/encrypt_algo.jpg)

Decryption Algorithm
![This is an image](/Images/decrypt_algo.jpg)

## Encryption Code Snippet
Encryption Javascript base code:

{javascript} {<script>
     function encryptFile(event) {
       event.preventDefault();

       const file = document.getElementById("file").files[0];
       const password = document.getElementById("password").value;
       const reader = new FileReader();

       reader.onload = function(event) {
         const content = event.target.result;
         const encrypted = CryptoJS.AES.encrypt(content, password);
         downloadFile(encrypted, file.name);
       }

       reader.readAsText(file);
     }

     function downloadFile(content, filename) {
       const element = document.createElement("a");
       element.setAttribute("href", "data:text/plain;charset=utf-8," + encodeURIComponent(content));
       element.setAttribute("download", filename + ".enc");
       element.style.display = "none";
       document.body.appendChild(element);
       element.click();
       document.body.removeChild(element);
     }
   </script>
}

Decryption Javascript code:

{javascript} {   <script>
     function decryptFile(event) {
       event.preventDefault();

       const file = document.getElementById("file").files[0];
       const password = document.getElementById("password").value;
       const reader = new FileReader();

       reader.onload = function(event) {
         const content = event.target.result;
         const decrypted = CryptoJS.AES.decrypt(content, password);
         downloadFile(decrypted, file.name.replace(".enc", ""));
       }

       reader.readAsText(file);
     }

     function downloadFile(content, filename) {
       const element = document.createElement("a");
       element.setAttribute("href", "data:text/plain;charset=utf-8," + encodeURIComponent(content.toString(CryptoJS.enc.Utf8)));
       element.setAttribute("download", filename);
       element.style.display = "none";
       document.body.appendChild(element);
       element.click();
       document.body.removeChild(element);
     }
</script>
}

## Installation and Usage

##### UNIX/Linux

1. Ensure that the following is [installed](https://www.cherryservers.com/blog/how-to-install-linux-apache-mysql-and-php-lamp-stack-on-ubuntu-20-04#install-apache) in the system :
* [Apache Server](https://www.cherryservers.com/blog/how-to-install-linux-apache-mysql-and-php-lamp-stack-on-ubuntu-20-04#install-apache)
* [MySQL Database](https://linuxhint.com/install-mysql-linux-mint-ubuntu/) 
* [PHP](https://linuxhint.com/install-php-8-on-linux-mint-20/)
* [PHP MySQL Extenstion](https://www.cherryservers.com/blog/how-to-install-linux-apache-mysql-and-php-lamp-stack-on-ubuntu-20-04#install-mysql)

2. Ensure you have created a DATABASE. You can use the following MySQL commands to do so:
CREATE DATABASE `<databasename>`;
USE `<databasename>`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

GRANT ALL PRIVILEGES ON `<databasename>`.* TO '<username>'@'localhost' IDENTIFIED BY 'mypassword';

3. Ensure that the Apache server is running. To do so, run the below command on the terminal.
sudo systemctl apache2 status

If it's running. Just run the below command to start it.
sudo systemctl apache2 start

4. Once everything is installed and the Apache server is running. Navigate to the following directory
cd /var/www/

Then clone this repository using this command
git clone https://github.com/kevinnebs/aes-encryption_sys.git

5. Once the repository is downloaded. Navigate to the following directory and file
cd /etc/apache2/sites-enabled

Modify the file '000-default.conf' and change the 'DocumentRoot' section to "/var/www/aes-encryption_sys/"

6. Restart the Apache server using 'sudo systemctl apache2 restart' and open your browser.

7. To confirm if your apache server is running. Just type 'localhost' or '127.0.0.1' and you should see the Apache index page.
   Proceed and navigate to 'localhost/registration.html' or '127.0.0.1/registration.html'.

You should see the web application running locally on your computer.

##### Windows

1. Ensure you install the following :
* XAMPP
* Apache server
* MySQL database
* PHP MyAdmin

You can look at this [page](https://codebriefly.com/how-to-setup-apache-php-mysql-on-windows-10/), or this one for [XAMPP](https://www.techomoro.com/how-to-run-a-php-application-on-windows-10-using-xampp/) for more info.

2. Ensure both the Apache service and PHP are running and working.

3. Open a browser and on the address bar. Go to '127.0.0.1' or 'localhost' to see the GUI version of MySQL database.

4. Proceed and create the database, with the table 'Users' having the 'id','username','email', and 'password' present.
   Or use the below mysql commands:
   CREATE DATABASE `<databasename>`;

   CREATE TABLE `users` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `username` varchar(255) NOT NULL,
   `password` varchar(255) NOT NULL,
   `email` varchar(255) NOT NULL,
   PRIMARY KEY (`id`)
   );

5. Navigate to the :C drive folder and look for the 'htdocs' folder. Clone the repository in the folder.

6. Proceed and go the the browser, opening up 'registration.html' using 'https://localhost/aes-encryption_sys/registration.html' 

You should now see your Web Application running locally.

## Usage

Encrypting a file:

![This is an image](/Images/encrypt_tut.jpg)

Attach the image you want to encrypt. Then proceed to key in the encryption password. 

Decrypting a file:

![This is an image](/Images/decrypt_tut.jpg)

Attach the encrypted image to decrypt. Then proceed to key in the decryption

## Acknowledgments

* ALX Holberton School Staff - For the help, advice and resources they provided us with during this project and during all our curriculum.
* Cohort 7 and all ALX Holberton Students - For your friendship, invaluable support, and insight not only for this project, but over the last year.
* [Joan Daemen and Vincent Rijmen](https://www.britannica.com/topic/AES) - For inventing/creating the Advanced Encryption Standard. Without your program/idea. This web Application won't  have been possible.

## Related Projects

1. [AirBnB Clone](https://github.com/kevinnevs/AirBnB_clone_v4) - a simple web app made in Python, Flask, and JQuery.
2. [Simple Shell CMD](https://github.com/kevinnevs/simple_shell) - a command line interpreter that replicates the sh program.
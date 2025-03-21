# EventOrganizer Laravel Project Setup

Welcome to the **EventOrganizer** Laravel project! This guide will take you through the necessary steps to get the project running locally on your machine.

## Prerequisites

Before you begin, make sure your system meets the following requirements:

- **PHP Version**: 8.2 to 8.4
- **Composer**: PHP dependency manager
- **Database**: MySQL (via XAMPP/WAMP)
- **Laravel**: Version 8.x (this is the version for this project, but make sure the required version aligns with your system)

---

## Step 1: Install XAMPP/WAMP

You need to set up a local development environment with XAMPP or WAMP. Both include PHP, MySQL, and Apache.

### For XAMPP:

1. Go to the [XAMPP download page](https://www.apachefriends.org/index.html) and download the appropriate version for your operating system.
2. Run the installer and follow the instructions to install XAMPP.
3. After installation, open the **XAMPP Control Panel** and start **Apache** and **MySQL**.

### For WAMP:

1. Visit the [WAMP Server website](https://www.wampserver.com/en/) and download the latest version.
2. Follow the installation steps to set up WAMP on your system.
3. Once installed, launch WAMP and ensure that the **Apache** and **MySQL** services are running (the WAMP icon in the taskbar should turn green).

---

## Step 2: Install Composer

Composer is a dependency manager for PHP, which you'll need to install before setting up Laravel.

### Installation:

1. Download **Composer** from the [official website](https://getcomposer.org/download/).
2. Follow the installation instructions based on your operating system.
3. Once installed, open a terminal or command prompt and verify that Composer is working:

   ```bash
   composer --version

# Development and Deployment Workflow
## Overview 
This document outlines the workflow neccessary for developing theme updates, testing updates locally, and deploying to live sites. It covers project management, version control, testing, automation processes, and everything else in between. 

## Project Management
* **Task Management**: We use Discord and Trello to assign jobs/responsibilites, track tasks, and monitor progress. 
* **Communication**: Team communication primarily occurs through Discord, where, as previously mentioned, we discuss updates, announcements, assign tasks, track progress, etc.
* **Sprints**: We attempt to follow agile methodology by using sprints (whenever we all have time) to manage development cycles as efficiently as possible. Team members have committments outside of this project, so regular sprints are not always achievable. Therefore, when we are able to meet, we try to get as much work done as we can and then add/subtract/refine in the next ieration.

## Version Control
**Repository**: 
The [Project](https://github.com/cp3402-students/project-team9) is hosted on [Github](https://github.com/).

**Branching Model**: 
We utilize a branching model for organising development, staging and production environments.

**Local Development/Workflow**: 
This section will be discussed in third person to make it easier for the reader/developer taking over the project to understand. It is important to note, these exact steps were used by the Team 9 Development Team to develop our project. 

1. The developer(s) is expected to create their own personal fork of the main [Project](https://github.com/cp3402-students/project-team9) repository (For example - https://github.com/BeauWilliams97/project-team9). 

2. After creating their personalised fork, the developer should then create a 'staging' branch in his/her fork (This branch is used to facilitate deployment to a test/staging site).

3. Following this, the forked repository should then be cloned to a local directory on the developers PC. It is recommended that this be done via CLI. Refer to the example below. 

```
git clone https://github.com/BeauWilliams97/project-team9.git foldername
```
This will usually clone the repository into 'C:\Users\YourUser'. If you wish to put it somewhere more specific, navigate to that directory first before running the command.

4. Before any changes can be made to the theme (that you will be able to see), the developer will need to make sure they have some sort of a local development environment set up. There are many ways to achieve this, although, Team 9 recommends [XAMPP](https://www.apachefriends.org/download.html). If you're on a Windows machine, download the latest 64 bit version and run the installer. Be sure to install it in 'C:\', when prompted. Installing in 'C:\Program Files' can cause issues.

5. Next, the developer will need to download [WordPress](https://wordpress.org/download/) 
--> Extract the .zip --> Move the extracted folder to 'C:\xampp\htdocs\'. 

6. Open XXAMP Control Panel 
--> Start Apache and MySQL 
--> Open a browser 
--> Navigate to 'localhost/phpmyadmin' and sign in (credentials are usually - username: phpmyadmin, password: root) 
--> Select 'Databases' tab 
--> Create a database and call it something like 'wordpress_db' 
--> Go to 'localhost/wordpress' and follow installation instructions (you will need to enter the name of the database you just created during the install).

7. Navigate to the directory where your personal, forked repository was cloned (For example - 'C:\Users\YourUsername') 
--> Copy directory to 'C:\xampp\htdocs\wordpress\wp-content\themes' 
--> In your browser of choice, visit 'localhost/wordpress/wp-admin' and sign in (you should have set the credentials during installation) 
--> From the admin dashboard, select the 'Appearance' tab on the left hand side of the page and then 'Themes'. The Team 9 theme should now be availiable for selection.

## **Develop Theme Updates**
Now that a local development environment has been set up (with WordPress installed), the developer is very close to being able to develop and test theme updates. In order to do so, he/she will need an Interactive Developement Environment (IDE) installed on their PC (Team 9 recommends [Visual Studio Code](https://code.visualstudio.com/Download)). 

Once this has been done, launch your IDE of choice --> select 'Open Folder' and navigate to 'C:\xampp\htdocs\wordpress\wp-content\themes\project-team9' (It is important to make sure you open it from this directory and not the directory it was cloned into initially i.e 'C:\Users\YourUser'). 

## Testing
**Testing Procedures**
Testing is conducted in the developers local development environment first.

Any bugs encountered during deployment to staging are to be documented so they can be ironed out/resolved before deployment to production. 


## Automation/Deployment
Whenever a push is made to the staging branch of a developers fork, the staging.yml file in './github/workflows/' runs. The script in this file makes use of the GitHub Action [ssh deploy](https://github.com/marketplace/actions/ssh-deploy); which essentially deploys whatever file/directory is specified, to a folder on the staging server via rsync over ssh, using NodeJS. Currently, the staging.yml script deploys both the Team 9 theme directory, as well as an .xml export of the entire WordPress site. 

The theme is deployed to - /var/www/html/wordpress/wp-content/themes/project-team9

The .xml file is deployed to - /var/www/html/wordpress

In order to get the deployment script(s) set up you will need to:

1. Email beau.williams@my.jcu.edu.au and let him know that you are going to be continuing development on the theme. He will then generate a public and private keypair for you; add the public key to the authorized_users file on the server, and send you the private key. 
   
If you are curious about how you can generate a public/private keypair yourself - open a CLI and run the following command:

```
ssh-keygen -m PEM -t rsa -b 4096
```

2. Copy the private key and go to https://github.com/YourFork/project-team9 --> Click on the 'Settings' tab --> In the left hand column click 'Secrets and variables' and then select the 'Actions' option from the drop down list --> Click 'New Repository Secret' --> Name it 'SSH_PRIVATE_KEY'. Use the template below when you add it. 

```
-----BEGIN OPENSSH PRIVATE KEY-----
Your key goes here

-----END OPENSSH PRIVATE KEY-----
```

3. You will also need to two more repository secrets - REMOTE_HOST & REMOTE_USER
* In REMOTE_HOST, you will need to put the public IP address of the staging web server --> '20.2.82.196'
* In REMOTE_USER, you will need to put the name --> 'azureuser'

4. In order to get the previously mentioned '.xml' file into your project directory for deployment, you will need to install [WP-CLI](https://wp-cli.org/). The steps listed below outline this process. In order for these commands to work, you will need to make sure you are using a bash terminal, not powershell. 

```
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
```
Verify that it was installed correctly

```
php wp-cli.phar --info
```
Make the file executable

```
chmod +x wp-cli.phar
```

You can now take an export of your local WordPress site by running: 

```
wp-cli.phar export
```

This will export the file to your project directory, effectively preparing it for deployment to the staging server. Alternatively, visit the WordPress admin dashboard, on your local site, and go to 'Tools' then 'Export'. This is another way to acquire the export. Keep in mind, if you do it the alternate way, you will need to copy the '.xml' file to your project directory before it can be deployed. 

5. Once all of the previous steps have been completed, open up your project in VS Code. Remember, the file path should look something like this - 'C:\xampp\htdocs\wordpress\wp-content\themes\project-team9'. 
Make some basic styling changes and save the file --> Click on 'Source Control' --> Add a meaningful commit message (i.e 'changed colour of navigation bar') and then push your changes to the staging branch of your fork. 

You can track the progress of the deployment by visiting your forked repository on GitHub and navigation to the 'Actions' tab. In here, you will be able to see all of your workflows and their status. 

## Migration
If, for whatever reason, the site needs to be moved and the developer(s) wish to migrate the database, this is something they will have to source of their own volition. 

In our case, when moving from staging to production, the project and '.xml' were deployed via the '.yml' scripts we have provided, the plugins were transferred manually via SFTP, and the site url and home address were manually updated via wp-cli. 

## Maintenance/Backups
Backups of the Virtual Machines used to host both the staging and production web servers are taken routinely. This is done so that in the event that something catastrophic happens,  the existing machine can be restored to a previous point, or a new machine can be provisioned. 

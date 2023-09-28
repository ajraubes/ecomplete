## About This Project

This project is a PHP backend data processing developed in PHP and SQLite.

### Deploying the project

1. Download and install Docker for your relevant OS
2. Move to your project root directory
1. Clone this repository into the root directory of your desire LAMP environment
   
       git clone git@github.com:ajraubes/ecomplete.git .

5. Run a ready to serve `make` commands from your root directory as per below

         make build
   

3. Go to your webserver URL serving this root directory on `port: 80` and you will be presented with the Index Page and follow the on-screen steps in order to generate the csv with specified amount of records


4. Go to your webserver URL/import on `port:80` and you will be presented with the Data Importing Page, follow the on-screen steps in order to import the generated csv export into the Sqlite database
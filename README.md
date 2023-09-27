# ecomplete

Notes:

Number of Names = 20
Number of Surnames = 20
Number of Ages (from 18 to 99) = 99 - 18 + 1 = 82

So, the number of possible combinations would be:

20 (names) × 20 (surnames) × 82 (ages) = 32,800 combinations

that gets written to csv so that is my unique combinations limit 
but with current setup i can write over 1000000 of random combinations unique to id
but with the import of csv it will only add 32,800 combinations to database


# Test case 

in output_2023-09-27_13-46-25.csv: i have 586000 combinations and that is where my laptop slowed down and had to restart
in output_2023-09-27_14-12-01.csv: i used the input to run 1 000 000 entries and only got 28 999 that is uniquie

in user_data_import_20230927110715.db: i imported one of my out put and that is the db inport

## Prerequisites

Before you begin, ensure you have the following prerequisites installed on your system:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Docker Compose Configuration

### 1. PHP

- The PHP service uses a custom Docker image defined in the `./php` context.
- It mounts the `./web` directory as the web server root in the container.
- It is connected to the `my_network` network.

### 2. MongoDB

- The MongoDB service uses a custom Docker image defined in the `./mongodb` context.
- It maps port `27017` from the host to the container.
- It is connected to the `my_network` network.

### 3. Nginx

- The Nginx service uses a custom Docker image defined in the `./nginx` context.
- It mounts the `./web` directory as the web server root in the container.
- It maps port `8081` from the host to port `80` in the container.
- It depends on the PHP service to ensure it starts after PHP is up and running.
- It is connected to the `my_network` network.

### 4. Redis

- The Redis service uses the official Redis image from Docker Hub.
- It maps port `6379` from the host to the container.
- It is connected to the `my_network` network.

### Network

A custom network named `my_network` is defined to allow these services to communicate with each other.

## Usage

To start your Docker containers and run your application:

1. Open a terminal and navigate to the project's root directory.

2. Run the following command to start the services in detached mode:

   ```bash
   docker-compose up -d
   ```

3. Access your web application through your browser at `http://localhost:8081` or the appropriate URL and port as specified in your Nginx configuration.

4. To stop the services, run the following command:

   ```bash
   docker-compose down
   ```
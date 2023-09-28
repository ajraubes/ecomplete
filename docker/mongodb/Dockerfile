# Use the official MongoDB image as the base image
FROM mongo:latest

# Copy the custom mongod.conf to the container
COPY mongod.conf /etc/mongod.conf

# Set the command to run MongoDB with the custom configuration file
CMD ["mongod", "--config", "/etc/mongod.conf"]

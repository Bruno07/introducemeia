# Introduceme.ia API
Introducemeia is an artificial intelligence developed to learn and interact intelligently about the life, career and interests of Bruno, a professional passionate about technology and innovation.

This AI is not just an assistant, but a virtual version that deeply understands Bruno's trajectory: from his technical skills and experiences to his personal interests and professional goals.


# Table of content
* [Features](#features)
* [Getting started](#getting-started)
    * [Prerequisites](#prerequisites)
    * [Installation](#installation)
* [Usage](#usage)
    * [Docker](#docker)
* [API Endpoints](#api-endpoints)

# Features
* PHP/Framework Lumen
* MySQL
* Redis
* Docker
* Nginx
* API Rest

# Getting started

## Prerequisites
* PHP (8.3 or later)
* MYSQL (5.7 or later)
* Radis (latest For Cache)

## Installation
To install the Introducemeia API, follow these steps:

1. Clone this repository to your local machine:
```bash
git clone git@github.com:Bruno07/introducemeia.git
```
# Usage

## Docker compose
To execute the Introducemeia using docker-compose, follow these steps:

1. Configure environment variables:

```bash
cp .env.axample .env
```


For testing purposes, some variables are already filled in, feel free to change them.


2. Start container 
```bash
docker compose up -d --build
```

The API can be accessed at http://localhost:8000.


This will start the following containers:
* App
* MYSQL
* Redis
* Nginx

3. Access container
```bash
docker compose exec introducemeia_app bash
```

4. Run commands

```bash
composer install
php artisan migrate
php artisan db:seed TopicSeeder
```

Check the environment variables to make sure everything is correct before running migrate

After these steps, you need to create or update a task and you should be notified.

# API Endpoints
* POST /: Chat chat
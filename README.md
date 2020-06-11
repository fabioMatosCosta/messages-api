# Messages API

For this assignment I used Laravel framework, a SQLite database and tested the API routes using Postman.

## Getting started

Clone the repository

`git clone https://github.com/fabioMatosCosta/messages-api.git`

Switch to the repo folder

`cd messages-api`

Install all the dependencies using composer

`composer install`

Copy the example env file and make the required configuration changes in the .env file

`cp .env.example .env`

Create a database.sqlite file in the database folder and run the database migrations (Set the database connection in .env before migrating)

`php artisan migrate`

Seeding the database for testing, open the database seeder for users and messages, set the property values as per your requirement 

`database\seeds\UserTableSeeder.php`
`database\seeds\MessagesTableSeeder.php`

Run the database seeder and you're done

`php artisan db:seed`

Start the local development server

`php artisan serve`

You can now access the server at http://localhost:8000



## Routes

All routes return a JSON response with a data key

#### Root end point :

http://localhost:8000/api/messages/

#### Authentication :

Since it was not necessary for this assignment, I assumed that the user is logged in and authenticated.

#### Parameters :

`:user_id` 

This parameter is the user id, I assumed the user is logged in, and we have access to his user id, it should be a number.

#### Get /allusers

http://localhost:8000/api/messages/allusers 

Gets a list of all users name and email in the database.
It is paginated, returns 15 users per page, and you can access other pages using the `?page` parameter, which is passed as 
a query string.

Example = http://localhost:8000/api/messages/allusers?page=2


#### Get /:user_id/info

http://localhost:8000/api/messages/:user_id/info

Gets the user info: name and email.


#### Get /:user_id/allmessages  

http://localhost:8000/api/messages/:user_id/allmessages  

Gets user messages.

Return fields:

| Name | Description |
|------|-------------|
| sender_id | The id of the sender user |
| email | The email of the sender user |
| firs_name | The name of the sender user |
| recipient_id | The id of the recipient user |
| body | The text body of the message |





  api/messages/{user}/send


### Testing

For testing the API I used Postman

#### Headers


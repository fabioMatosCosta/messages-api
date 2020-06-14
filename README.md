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

http://localhost:8000/api/v1/messages/

#### Authentication :

Since it was not necessary for this assignment, I assumed that the user is logged in and authenticated.

#### Parameters :

`:user_id` 

This parameter is the user id, I assumed the user is logged in, and we have access to his user id, it should be a number.

`:message_id`

This parameter is the id of a message in the database, it should be a number.

#### Get /allusers

http://localhost:8000/api/v1/messages/allusers 

Gets a list of all users name and email in the database.
It is paginated, returns 15 users per page, and you can access other pages using the `?page` parameter, which is passed as 
a query string.

Example = http://localhost:8000/api/v1/messages/allusers?page=2

| Name | Description |
|------|-------------|
| user_id | The id of the user |
| first_name | The name of the user |
| email | The email of the user |


#### Get /:user_id/info

http://localhost:8000/api/v1/messages/:user_id/info

Gets the user info.

Return fields:

| Name | Description |
|------|-------------|
| user_id | The id of the user |
| first_name | The name of the user |
| email | The email of the user |


#### Get /:user_id/allmessages  

http://localhost:8000/api/v1/messages/:user_id/allmessages  

Gets user messages ordered by date, latest first.

Return fields:

| Name | Description |
|------|-------------|
| message_id | The id of the message |
| sender_id | The id of the sender user |
| email | The email of the sender user |
| first_name | The name of the sender user |
| recipient_id | The id of the recipient user |
| body | The text body of the message |
| message_created_at | Date of the message |


#### Post /:user_id/send

http://localhost:8000/api/v1/messages/:user_id/send

Send a message to another user.

The following parameters are passed as parameters in a form-encoded body of your HTTP request.

Request parameters:

The following parameters are required.

| Parameter | Description |
|-----------|-------------|
| recipient_email |The email of the recipient user |
| body | The text body of the message |


Return response:

If the user email is in the database and all if both parameters are filled in :+1:, the response should be:

`"Message sent"`

Otherwise it will throw an error.

#### Delete /delete/:message_id

http://localhost:8000/api/v1/messages/delete/:message_id

Delete a message from the database.

If the message doen't exist, it throws an error. If the message exists it deletes the message and returns status 204.


### Testing

For testing the API I used Postman

#### Headers

I used this Headers for testing, but they are not required

| Key | Value |
|-----------|-------------|
| Accept | application/json |
| Content-Type | application/json |

#### Send a message

In postman I used on the : Body - x-www-form-urlencoded ;
to simulate a form, and used this parameters: 

| Parameter | Description |
|-----------|-------------|
| recipient_email | The email of the recipient user |
| body | The text body of the message |
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Study Api

#### Tutorial get from https://www.toptal.com/laravel/restful-laravel-api-tutorial

_This is project for study only_

> You can use

* CRUD for articles
* Authorization and authentication for users

## Methods
_Articles_
- Method GET  /articles ( all articles )
- Method GET  /article/{article} ( article with id {article} )
- Method POST /articles ( store article )
- Method PUT /articles/{article} ( update article for with id {article} )
- Method DELETE /article/{article} ( delete article with id {article} )

_User_

- Method POST Register
- Method POST Login
- Method POST Logout

### User methods

* Register user

```text
POST http://127.0.0.1:8000/api/register
All params required:
* name = John
* email = john@gmail.com
* password = password
* confirmation_password = password
```

```
$ curl -X POST http://127.0.0.1:8000/api/register \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -d '{"name": "John", "email": "john@gmail.com", "password": "password", "password_confirmation": "password"}'
```
Response
```JSON
{
    "data": {
        "api_token":"0syHnl0Y9jOIfszq11EC2CBQwCfObmvscrZYo5o2ilZPnohvndH797nDNyAT",
        "created_at": "2017-06-20 21:17:15",
        "email": "john.doe@toptal.com",
        "id": 51,
        "name": "John",
        "updated_at": "2017-06-20 21:17:15"
    }
}
```
*********************
*********************
* Authorize user

```text
POST http://127.0.0.1:8000/api/login
Params:
* email
* password
```

```text
$ curl -X POST http://127.0.0.1:8000/api/login \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -d '{"email": "john@gmail.com", "password": "password"}'
```
Reponse
```JSON
{
    "data": {
        "id":1,
        "name":"Administrator",
        "email":"admin@test.com",
        "created_at":"2017-04-25 01:05:34",
        "updated_at":"2017-04-25 02:50:40",
        "api_token":"Jll7q0BSijLOrzaOSm5Dr5hW9cJRZAJKOzvDlxjKCXepwAeZ7JR6YP5zQqnw"
    }
}
```
*********************
*********************

* Logout user

```text
POST http://127.0.0.1:8000/api/logout
```

```text
$ curl -X POST http://127.0.0.1:8000/api/logout \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -H "Authorization: Bearer {token} " \
```
### Article Methods
* Get All articles 

```text
GET http://127.0.0.1:8000/api/articles

$ curl -X GET http://127.0.0.1:8000/api/articles \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -H "Authorization: Bearer {token} " \
```
Reponse
```JSON
[
    {
        "id": 4,
        "title": "title",
        "body": "Quia dolores neque quidem rem. Voluptatem fugiat error dolorem tenetur est. Ut ut aut ut ipsa tempora. Ut mollitia cumque enim possimus temporibus velit. Aliquid error necessitatibus nulla distinctio repellat veritatis consequatur.",
        "created_at": "2021-05-29T19:06:16.000000Z",
        "updated_at": "2021-05-29T22:40:19.000000Z"
    },
    {
        "id": 5,
        "title": "title",
        "body": "description",
        "created_at": "2021-05-29T19:06:16.000000Z",
        "updated_at": "2021-05-29T22:46:41.000000Z"
    }
]
```
*********************
*********************
* Get one article

```text
GET http://127.0.0.1:8000/api/articles/{article}

$ curl -X GET http://127.0.0.1:8000/api/articles/{article} \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -H "Authorization: Bearer {token} " \
```
Response
```JSON
{
    "id": 7,
    "title": "Corrupti sit est harum eum necessitatibus ut molestiae.",
    "body": "Ad quia aut non id nihil eius sunt. Autem fugit eum dolorum sint vel. Exercitationem facere non fugiat occaecati. A enim culpa quos tempore ea.",
    "created_at": "2021-05-29T19:06:16.000000Z",
    "updated_at": "2021-05-29T19:06:16.000000Z"
}
```
*********************
*********************
* Create article

```text
POST http://127.0.0.1:8000/api/articles

$ curl -X POST http://127.0.0.1:8000/api/articles \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -H "Authorization: Bearer {token} " \
 -d "{\"title\" : \"Title" , \"\Body" : \"Lorem ipsum\"}"
```
Response
```JSON
{
    "title": "Title",
    "body": "Lorem ipsum",
    "updated_at": "2021-05-30T01:02:31.000000Z",
    "created_at": "2021-05-30T01:02:31.000000Z",
    "id": 51
}
```
*********************
*********************
* Delete article

```text
DELETE http://127.0.0.1:8000/api/articles
$ curl -X DELETE http://127.0.0.1:8000/api/articles/{article} \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -H "Authorization: Bearer {token} " \
```
```text
Without response
```


# Veto
> Name: VETO <br>
> [Repository](https://github.com/Vica17/VETO-Gruppexamination) | [Trello](https://trello.com/b/EONkCMzI/veto)

> Members: Victoria Nordkvist, Ellinor Nilsson Kaufeldt, Tommy Kärnström

---

### Uppgift
Ni som grupp ska skapa ett API med hjälp av PHP-ramverket Slim och databasen MySQL. Till detta API ska ni bygga ett enklare grafiskt gränssnitt. Detta blir som ert eget CMS.

---

### Database Structure

- `users`
  - userID - INT (AI)(PK)
  - username - VARCHAR (50)
  - password - VARCHAR (250)
  - createdAt - DATETIME
  - isAdmin - BOOL


- `entries`
  - entryID - INT (AI)(PK)
  - title - VARCHAR(100)
  - content - TEXT
  - createdBy - INT(11)
  - createAt - DATETIME


- `comments`
  - commentID - INT (AI)(PK)
  - entryID - INT(11)
  - content - TEXT
  - createdBy - INT(11)
  - createAt - DATETIME


- `likes`
  - likeID - INT (AI)(PK)
  - entryID - INT
  - userID - INT

---

### Routes/ Controllers

#### Entries
- [x] `GET` senaste 20 entries (/api/entries)
- [x] `GET` specifik entry med ID (/api/entries/{id})
- [x] `GET` alla entries en user har skapat (/api/entries/user/{id})
- [x] `GET` söka efter title (api/entries/search/{key})
- [x] `POST` skapa en ny entry (/api/entries)
- [x] `DELETE` ta bort en entry (/api/entries)
- [x] `PATCH` Updatera en entry (/api/entries)

#### Users
- [x] `GET` hämta alla användare (/api/users)
- [x] `GET` hämta all info en en användare med ID (/api/users/{id})
- [x] `GET` hämta användare med användarnamn (/api/users/username/{username})

#### Comments
- [x] `GET` senaste 20 comments (/api/commments)
- [x] `GET` specifik comment med ID (/api/comments/{id})
- [x] `GET` alla comments en specifik user har skapat (/api/users/{userID}/comments)
- [x] `GET` alla comments på en entry (/api/entries/{entryID}/comments)
- [x] `POST` skapa en ny comment (/api/comments)
- [x] `DELETE` ta bort en comment (/api/comments)

#### Likes
- [x] `GET` hämta alla likes (/api/likes)
- [x] `GET` hämta alla likes en användare har gjort (/api/users/{userID}/likes)
- [x] `GET` hämta alla likes kopplade till en entry (/api/entries/{entryID}/likes)
- [x] `DELETE` ta bort en like (/api/likes)
- [x] `POST` skapa en ny like (/api/likes)

#### Other (outside /api)
- [x] `POST` Login function
- [x] `POST` Logout function
- [x] `POST` Register function

---

### Views
- [ ] index (Login/registrering och efter inloggning visa alla inlägg)
- [ ] new - Skapa nytt inlägg
- [ ] documentation - info om projektet

---

### Other Ideas
- Ta bort `isAdmin`/ `isLoggedIn` middleware from App (ingen användning?) eller gör om så att den länkar till en annan route ex. `/` (home) om man inte är admin eller inloggad?

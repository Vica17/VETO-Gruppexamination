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
  - content - VARCHAR(100)
  - createdBy - INT(11)
  - createAt - DATETIME

- `comments`
 - commentID - INT (AI)(PK)
 - entryID - INT(11)
 - content - VARCHAR(250)
 - createdBy - INT(11)
 - createAt - DATETIME

- `likes`
  - likeID - INT (AI)(PK)
  - entryID - INT
  - userID - INT

---

### Routes/ Controllers

#### Entries
- [ ] `GET` senaste 20 entries
- [ ] `GET` specifik entry med ID (/api/entries/{id})
- [ ] `GET` alla entries en user har skapat (/api/entries/user/{id})
- [ ] `POST` skapa en ny entry (/api/entries)
- [ ] `DELETE` ta bort en entry (/api/entries)
- [ ] `PATCH` Updatera en entry (/api/entries)

#### Comments
- [ ] `GET` senaste 20 comments (/api/commments)
- [ ] `GET` specifik comment med ID (/api/comments/{id})
- [ ] `GET` alla comments en specifik user har skapat (/api/comments/user/{userID})
- [ ] `GET` alla comments på en entry (/api/comments/entry/{id})
- [ ] `POST` skapa en ny comment (/api/comments)
- [ ] `DELETE` ta bort en comment (/api/comments)
- [ ] `PATCH` Updatera en comment (/api/comments)

#### Users
- [ ] `GET` hämta alla användare (/api/users)
- [ ] `GET` hämta all info en en användare med ID (/api/users/id/{id})
- [ ] `GET` hämta användare med användarnamn (/api/users/username/{username})


#### Likes
- `GET` hämta senaste 20 likes (/api/likes)
- `GET` hämta alla likes en användare har gjort (/api/likes/user/{id})
- `GET` hämta alla likes kopplade till en entry (/api/likes/entry/{id})
- `DELETE` ta bort en like (/api/likes)
- `POST` skapa en ny like (/api/likes)

#### Other (outside /api)
- `POST` Login function
- `POST` Logout function
- `POST` Register function

### Views
- index (Login/registrering och efter inloggning visa alla inlägg)
- new - Skapa nytt inlägg
- documentation - info om projektet
#### Index

Om inloggad
- Visa meny
- Visa de senaste 20 entries

Om utloggad
- Visa login/ Register


#### Profile
Om inloggad
- Visa menu
- Visa users entries/ likes/ comments

Om utloggad
- Redirect to `index`?



---

### Other Ideas
- Lägg till `.map` i `.gitignore`-filen
- Dela upp routes i `index.php`-filen för att hjälpa till att få en bättre överblick i projectet.
- Lägg till `isAdmin` och `isloggedIn` som partials i views som man kan använda de där istället.
- Ta bort `isAdmin`/ `isLoggedIn` middleware from App (ingen användning?) eller gör om så att den länkar till en annan route ex. `/` (home) om man inte är admin eller inloggad?
- Ta bort `isLoggedIn` & `isAdmin` från `UserController` (ingen användning?)

# Documentation Routes etc.



## Routes
| Type | Route | Description |
| ---- | ----- | ----------- |
| `GET` | `/` | Home page |
| `POST` | `/register` | Register function -> redirect to start page |
| `POST` | `/login` | Login function -> redirect to start page |
| `GET` | `/logout` | Logout function -> redirect to start page |

## Users
| Type | Route | Description |
| ---- | ----- | ----------- |
| `GET` | `/api/users` | Get all users, returns 20 results by default |
| `GET` | `/api/users?limit` | Decide how many results the database should return |
| `GET` | `/api/users/{userID}` | Get a specific user with the help of the **userID**, expected to return one result |
| `GET` | `/api/users/username/{username}` | Get a specific user with the help of the **username**, expected to return one result |

| Type | Route | Description |
| ---- | ----- | ----------- |
| `GET` | `/api/users/{userID}/entries` | Get all entries by a specific user, using the **userID**. |
| `GET` | `/api/users/{userID}/comments` | Get all comments by a specific user, using the **userID**. |
| `GET` | `/api/users/{userID}/likes` | Get all likes by a specific user, using the **userID**. |


## Entries
| Type | Route | Description |
| ---- | ----- | ----------- |
| `GET` | `/api/entries` | Get all entries, return 20 results by default |
| `GET` | `/api/entries?limit` | Decide how many results the database should return |
| `GET` | `/api/entries/{entryID}` | Get a specific user with the help of the **entryID**, expected to return one result. |
| `GET` | `/api/entries/user/{userID}` | Get all entries by a specific user, using the **userID** |
| `GET` | `/api/entries/search/{key}` | Search for entries using *keywords/ text* |
| `POST` | `/api/entries` | Post a new entry. Send *title*, *content* and *createdBy*. |
| `DELETE` | `/api/entries/{entryID}` | Delete/ remove a entry, by using the **entryID**. |
| `PATCH` | `/api/entries/{entryID}` | Update a entry. Send *title* and *content*. |

| Type | Route | Description |
| ---- | ----- | ----------- |
| `GET` | `/api/entries/{id}/comments` | Get all comments connected to a entry. |
| `GET` | `/api/entries/{id}/likes` | Get all likes connected to a entry. |

## Comments
| Type | Route | Description |
| ---- | ----- | ----------- |
| `GET` | `/api/comments` | Get all comments, return 20 results by default. |
| `GET` | `/api/comments?limit` | Decide how many results the database should return. |
| `GET` | `/api/comments/{commentID}` | Get a specific comment with the help of the **entryID**, expected to return one result. |
| `POST` | `/api/comments` | Post a new comment. Send *entryID*, *content* and *createdBy*. |
| `DELETE` | `/api/comments/{commentID}` | Delete/ remove a comment. |

| Type | Route | Description |
| ---- | ----- | ----------- |
| `GET` | `/api/entries/{id}/comments` | Get all comments connected to a entry. |
| `GET` | `/api/users/{userID}/comments` | Get all comments by a specific user, using the **userID**. |

## Likes
| Type | Route | Description |
| ---- | ----- | ----------- |
| `GET` | `/api/likes` | Get all likes, return 20 results by default. |
| `GET` | `/api/likes?limit` | Decide how many like the database should return. |
| `GET` | `/api/likes/{likeId}` | Get specific like with the help of the **likeID**, expected to return one result. |
| `POST` | `/api/likes` | Post a new like. Send *entryID* and *userID*. |
| `DELETE` | `/api/likes/{likeID}` | Delete/ remove a like. |

| Type | Route | Description |
| ---- | ----- | ----------- |
| `GET` | `/api/entries/{id}/likes` | Get all likes connected to a entry. |
| `GET` | `/api/users/{userID}/likes` | Get all likes by a specific user, using the **userID**. |

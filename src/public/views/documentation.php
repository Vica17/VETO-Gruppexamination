<?php require 'components/head.php'; ?>
<?php require 'components/nav.php'; ?>



<h1 id="documentationroutesetc">Documentation Routes etc.</h1>

<h2 id="routes">Routes</h2>

<table>
  <tr>
    <td><b>Type</b></td>
    <td><b>Route</b></td>
    <td><b>Description</b></td>
  </tr>
  <tr>
    <td><code>GET</code></td>
    <td><code>/</code></td>
    <td>Home page</td>
  </tr>
  <tr>
    <td><code>POST</code></td>
    <td><code>/register</code></td>
    <td>Register function</td>
  </tr>
  <tr>
    <td><code>POST</code></td>
    <td><code>/login</code></td>
    <td>Login function</td>
  </tr>
  <tr>
    <td><code>GET</code></td>
    <td><code>/logout</code></td>
    <td>Logout function</td>
  </tr>
</table>



<h2 id="users">Users</h2>

<table>
  <tr>
    <td><b>Type</b></td>
    <td><b>Route</b></td>
    <td><b>Description</b></td>
  </tr>
  <tr>
    <td><code>GET</code></td>
    <td><code>/api/users</code></td>
    <td>Get all users, returns 20 results by default</td>
  </tr>
  <tr>
    <td><code>GET</code></td>
    <td><code>/api/users?limit</code></td>
    <td>Decide how many results the database should return</td>
  </tr>
  <tr>
    <td><code>GET</code></td>
    <td><code>/api/users/{userID}</code></td>
    <td>Get a specific user with the help of the <strong>userID</strong>, expected to return one result</td>
  </tr>
  <tr>
    <td><code>GET</code></td>
    <td><code>/api/users/username/{username}}</code></td>
    <td>Get a specific user with the help of the <strong>username</strong>, expected to return one result</td>
  </tr>
</table>

<br>

<table>
  <tr>
    <td><b>Type</b></td>
    <td><b>Route</b></td>
    <td><b>Description</b></td>
  </tr>
  <tr>
    <td><code>GET</code></td>
    <td><code>/api/users/{userID}/entries</code></td>
    <td>Get all entries by a specific user, using the <strong>userID</strong>.</td>
  </tr>
  <tr>
    <td><code>GET</code></td>
    <td><code>/api/users/{userID}/comments</code></td>
    <td>Get all comments by a specific user, using the <strong>userID</strong>.</td>
  </tr>
  <tr>
    <td><code>GET</code></td>
    <td><code>/api/users/{userID}/likes</code></td>
    <td>Get all likes by a specific user, using the <strong>userID</strong>.</td>
  </tr>
</table>

<h2 id="entries">Entries</h2>





<table>
  <tr>
    <td><b>Type</b></td>
    <td><b>Route</b></td>
    <td><b>Description</b></td>
  </tr>
  <tr>
    <td><code>GET</code></td>
    <td><code>/api/entries</code></td>
    <td>Get all entries, return 20 results by default</td>
  </tr>
  <tr>
    <td><code>GET</code></td>
    <td><code>/api/entries?limit</code></td>
    <td>Decide how many results the database should return</td>
  </tr>
  <tr>
    <td><code>GET</code></td>
    <td><code>/api/entries/{entryID}</code></td>
    <td>Get a specific user with the help of the <strong>entryID</strong>, expected to return one result.</td>
  </tr>
  <tr>
    <td><code>GET</code></td>
    <td><code>/api/entries/user/{userID}</code></td>
    <td>Get all entries by a specific user, using the <strong>userID</strong></td>
  </tr>
  <tr>
    <td><code>GET</code></td>
    <td><code>/api/entries/search/{key}</code></td>
    <td>Search for entries using <em>keywords/ text</em></td>
  </tr>
  <tr>
    <td><code>POST</code></td>
    <td><code>/api/entries</code></td>
    <td>Post a new entry. Send <em>title</em>, <em>content</em> and <em>createdBy</em>.</td>
  </tr>
  <tr>
    <td><code>DELETE</code></td>
    <td><code>/api/entries/{entryID}</code></td>
    <td>Delete/ remove a entry, by using the <strong>entryID</strong>.</td>
  </tr>
  <tr>
    <td><code>PATCH</code></td>
    <td><code>/api/entries/{entryID}</code></td>
    <td>Update a entry. Send <em>title</em> and <em>content</em>.</td>
  </tr>
</table>

<br>

<table>
  <tr>
    <td><b>Type</b></td>
    <td><b>Route</b></td>
    <td><b>Description</b></td>
  </tr>
  <tr>
    <td><code>GET</code></td>
    <td><code>/api/entries/{id}/comments</code></td>
    <td>Get all comments connected to a entry.</td>
  </tr>
  <tr>
    <td><code>GET</code></td>
    <td><code>/api/entries/{id}/likes</code></td>
    <td>Get all likes connected to a entry.</td>
  </tr>
</table>




<h2 id="comments">Comments</h2>



<table>
  <tr>
    <td><b>Type</b></td>
    <td><b>Route</b></td>
    <td><b>Description</b></td>
  </tr>
  <tr>
    <td><code>GET</code></td>
    <td><code>/api/comments</code></td>
    <td>Get all comments, return 20 results by default.</td>
  </tr>
  <tr>
    <td><code>GET</code></td>
    <td><code>/api/comments?limit</code></td>
    <td>Decide how many results the database should return.</td>
  </tr>
  <tr>
    <td><code>GET</code></td>
    <td><code>/api/comments/{commentID}</code></td>
    <td>Get a specific comment with the help of the <b>entryID</b>, expected to return one result.</td>
  </tr>
  <tr>
    <td><code>POST</code></td>
    <td><code>/api/comments</code></td>
    <td>Post a new comment. Send <em>entryID</em>, <em>content</em> and <em>createdBy</em>.</td>
  </tr>
  <tr>
    <td><code>DELETE</code></td>
    <td><code>/api/comments/{commentID}</code></td>
    <td>Delete/ remove a comment.</td>
  </tr>
</table>

<br>

<table>
  <tr>
    <td><b>Type</b></td>
    <td><b>Route</b></td>
    <td><b>Description</b></td>
  </tr>
  <tr>
    <td><code>GET</code></td>
    <td><code>/api/entries/{id}/comments</code></td>
    <td>Get all comments connected to a entry.</td>
  </tr>
  <tr>
    <td><code>GET</code></td>
    <td><code>/api/users/{userID}/comments</code></td>
    <td>Get all comments by a specific user, using the <b>userID</b>.</td>
  </tr>
</table>



<h2 id="likes">Likes</h2>










<table>
  <tr>
    <td><b>Type</b></td>
    <td><b>Route</b></td>
    <td><b>Description</b></td>
  </tr>
  <tr>
    <td><code>GET</code></td>
    <td><code>	/api/likes</code></td>
    <td>Get all likes, return 20 results by default.</td>
  </tr>
  <tr>
    <td><code>GET</code></td>
    <td><code>/api/likes?limit</code></td>
    <td>Decide how many like the database should return.</td>
  </tr>
  <tr>
    <td><code>GET</code></td>
    <td><code>/api/likes/{likeId}</code></td>
    <td>Get specific like with the help of the <b>likeID</b>, expected to return one result.</td>
  </tr>
  <tr>
    <td><code>POST</code></td>
    <td><code>/api/likes</code></td>
    <td>Post a new like. Send <em>entryID</em> and <em>userID</em>.</td>
  </tr>
  <tr>
    <td><code>DELETE</code></td>
    <td><code>/api/likes/{likeID}</code></td>
    <td>Delete/ remove a like.</td>
  </tr>
</table>

<br>

<table>
  <tr>
    <td><b>Type</b></td>
    <td><b>Route</b></td>
    <td><b>Description</b></td>
  </tr>
  <tr>
    <td><code>GET</code></td>
    <td><code>/api/entries/{id}/like</code></td>
    <td>Get all like connected to a entry.</td>
  </tr>
  <tr>
    <td><code>GET</code></td>
    <td><code>/api/users/{userID}/like</code></td>
    <td>Get all likes by a specific user, using the <b>userID</b>.</td>
  </tr>
</table>



<?php require 'components/footer.php'; ?>

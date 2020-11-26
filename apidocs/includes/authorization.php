<h3 id="check-login">Check login</h3>
<p>This endpoint checks the user's credentials and create the auth_key needed for some requests.</p>
<h4>HTTP Request</h4>
<pre data-type="post"><code class="language-html">/login/</code></pre>
<h4>Query Parameters</h4>
<table class="table table-striped">
	<tr>
		<th>Field</th>
		<th>Default</th>
		<th>Required</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>login</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>Login details. This accepts email or username.</td>
	</tr>
	<tr>
		<td>password</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>Password for the login details.</td>
	</tr>
</table>
<h4>Successful response example</h4>
<pre><code class="language-json">{
	"id": 123,
	"auth_key": {auth_key}
}</code></pre>
<h4>Unsuccessful response example</h4>
<pre><code class="language-json">{
	"message": "<strong>ERROR</strong>: The username or password you entered is incorrect."
}</code></pre>

<div class="spacer"></div>
<h3 id="check-social-login">Check social login</h3>
<p>This endpoint checks the user's credentials and create the auth_key needed for some requests.</p>
<h4>HTTP Request</h4>
<pre data-type="post"><code class="language-html">/social-login/</code></pre>
<h4>Query Parameters</h4>
<table class="table table-striped">
	<tr>
		<th>Field</th>
		<th>Default</th>
		<th>Required</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>email</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>When authorized, the email should be passed to this endpoint. If a matching user is found, an ID and auth_key is returned like the default login.</td>
	</tr>
</table>
<h4>Successful response example</h4>
<pre><code class="language-json">{
	"id": 123,
	"auth_key": {auth_key}
}</code></pre>
<h4>Unsuccessful response example</h4>
<pre><code class="language-json">{
	"message": "Invalid email address"
}</code></pre>

<div class="spacer"></div>
<h3 id="get-user-id">Get user ID by auth_key</h3>
<p>This endpoint returns the matching user ID when given a valid auth_key.</p>
<h4>HTTP Request</h4>
<pre data-type="get"><code class="language-html">/user_id/:auth_key</code></pre>
<h4>Query Parameters</h4>
<table class="table table-striped">
	<tr>
		<th>Field</th>
		<th>Default</th>
		<th>Required</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>auth_key</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The authorization key as returned by the login endpoint.</td>
	</tr>
</table>
<h4>Successful response example</h4>
<pre><code class="language-json">{
	"id": 123
}</code></pre>
<h4>Unsuccessful response example</h4>
<pre><code class="language-json">{
	"code": "rest_no_route",
	"message": "Anmodningen blev afvist.",
	"data": {
		"status": 404
	}
}</code></pre>

<div class="spacer"></div>
<h3 id="log-out">Log out</h3>
<p>This endpoint removes the auth_key from the user.</p>
<h4>HTTP Request</h4>
<pre data-type="post"><code class="language-html">/log-out/</code></pre>
<h4>Query Parameters</h4>
<table class="table table-striped">
	<tr>
		<th>Field</th>
		<th>Default</th>
		<th>Required</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>user_id</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The ID of the logged in user / the user logging out.</td>
	</tr>
	<tr>
		<td>auth_key</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The authorization key as returned by the login endpoint.</td>
	</tr>
</table>
<h4>Successful response example</h4>
<pre><code class="language-json">{
	"message": "Logged out."
}</code></pre>
<h4>Unsuccessful response example</h4>
<pre><code class="language-json">{
	"code": "rest_unauthorized_access",
	"message": "Anmodning afvist. Uautoriseret adgang.",
	"data": {
		"status": 401
	}
}</code></pre>
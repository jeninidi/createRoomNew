<h3 id="get-user">Get user</h3>
<p>This endpoint retrieves info for a specific user.</p>
<h4>HTTP Request</h4>
<pre data-type="get"><code class="language-html">/user/:id</code></pre>
<h4>URL Parameters</h4>
<table class="table table-striped">
	<tr>
		<th>Field</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>id</td>
		<td>The ID of the user to retrieve.</td>
	</tr>
</table>
<h4>Query Parameters</h4>
<table class="table table-striped">
	<tr>
		<th>Field</th>
		<th>Default</th>
		<th>Required</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>auth_id</td>
		<td>NULL</td>
		<td>No</td>
		<td>The authorization key as returned by the login endpoint. If auth_key is present, the response contains all the info for the authorized user. If not, it only contains the public data.</td>
	</tr>
</table>
<h4>Successful response example</h4>
<pre><code class="language-json">{
	"id": 123,
	"first_name": "John",
	"last_name": "Doe",
	"address": "Some street 123",
	"zip": "2200",
	"city": "København N",
	"country": "DK",
	"gender": "male",
	"description": "",
	"registered": "12-12-2020",
	"image": "https://www.gravatar.com/avatar/123",
	"ratings": [
		{
			"id": 3942,
			"date": "08-06-2018 kl. 09:58",
			"user": {
				"id": "234",
				"first_name": "John",
				"last_name": "Doe",
				"image": "https://www.gravatar.com/avatar/123"
			},
			"reviewtitle": "Amazing!",
			"reviewtext": "Lorem ipsum dolor sit amet…",
			"rating": 4
		}
	]
}</code></pre>
<h4>Unsuccessful response example</h4>
<pre><code class="language-json">{
	"code": "rest_no_route",
	"message": "Anmodningen blev afvist.",
	"data": {
		"status": 404
	}
}</code></pre>

<h3 id="get-account-balance">Get account balance</h3>
<p>This endpoint retrieves account balance for a specific user.</p>
<h4>HTTP Request</h4>
<pre data-type="get"><code class="language-html">/account-balance/:user_id</code></pre>
<h4>URL Parameters</h4>
<table class="table table-striped">
	<tr>
		<th>Field</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>id</td>
		<td>The ID of the user to retrieve.</td>
	</tr>
</table>
<h4>Query Parameters</h4>
<table class="table table-striped">
	<tr>
		<th>Field</th>
		<th>Default</th>
		<th>Required</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>auth_id</td>
		<td>NULL</td>
		<td>No</td>
		<td>The authorization key as returned by the login endpoint. If auth_key is present, the response contains all the info for the authorized user. If not, it only contains the public data.</td>
	</tr>
</table>
<h4>Successful response example</h4>
<pre><code class="language-json">{
	"user_id": 123,
	"account_balance": 234,00
}</code></pre>
<h4>Unsuccessful response example</h4>
<pre><code class="language-json">{
	"code": "rest_unauthorized_access",
	"message": "Anmodning afvist. Uautoriseret adgang.",
	"data": {
		"status": 401
	}
}</code></pre>

<div class="spacer"></div>
<h3 id="create-user">Create user</h3>
<p>This endpoint creates a new user.</p>
<h4>HTTP Request</h4>
<pre data-type="post"><code class="language-html">/register/</code></pre>
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
		<td>The new user's email address.</td>
	</tr>
	<tr>
		<td>password</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>This is the desired password.</td>
	</tr>
	<tr>
		<td>confirm_password</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>Just for confirmation – this must an exact match to password.</td>
	</tr>
</table>
<h4>Successful response example</h4>
<pre><code class="language-json">{
	"id": 123,
	"auth_key": {auth_key}
}</code></pre>
<h4>Unsuccessful response example</h4>
<pre><code class="language-json">{
	"message": "User already exists."
}</code></pre>

<div class="spacer"></div>
<h3 id="update-user">Update user</h3>
<p>This endpoint updates the logged in user.</p>
<h4>HTTP Request</h4>
<pre data-type="post"><code class="language-html">/update-user/</code></pre>
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
		<td>The ID of the logged in user / the user updating their profile.</td>
	</tr>
	<tr>
		<td>auth_key</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The authorization key as returned by the login endpoint.</td>
	</tr>
	<tr>
		<td>email</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>User's email address.</td>
	</tr>
	<tr>
		<td>first_name</td>
		<td>NULL</td>
		<td>No</td>
		<td>User's first name.</td>
	</tr>
	<tr>
		<td>last_name</td>
		<td>NULL</td>
		<td>No</td>
		<td>User's last name.</td>
	</tr>
	<tr>
		<td>nickname</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>User's display name (what other user see). This can be put together by first and last name, if empty when submitting.</td>
	</tr>
	<tr>
		<td>description</td>
		<td>NULL</td>
		<td>No</td>
		<td>A description of the user.</td>
	</tr>
	<tr>
		<td>new_password</td>
		<td>NULL</td>
		<td>No</td>
		<td>If the user want to change password, this is where to input the password.</td>
	</tr>
	<tr>
		<td>confirm_new_password</td>
		<td>NULL</td>
		<td>No*</td>
		<td>* Required if the field "new_password" is set. The passwords must match.</td>
	</tr>
	<tr>
		<td>phone</td>
		<td>NULL</td>
		<td>No</td>
		<td>Mobile phone number. Required to receive SMS notifications.</td>
	</tr>
	<tr>
		<td>type</td>
		<td>private</td>
		<td>No</td>
		<td>This should be either "private" or "business".</td>
	</tr>
	<tr>
		<td>address</td>
		<td>NULL</td>
		<td>No</td>
		<td>Home or business address.</td>
	</tr>
	<tr>
		<td>zip</td>
		<td>NULL</td>
		<td>No</td>
		<td>Zip code.</td>
	</tr>
	<tr>
		<td>city</td>
		<td>NULL</td>
		<td>No</td>
		<td>City.</td>
	</tr>
	<tr>
		<td>country</td>
		<td>NULL</td>
		<td>No</td>
		<td>Country code (Alpha 2 format). See the complete list at <a href="https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2" target="_blank">https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2</a></td>
	</tr>
	<tr>
		<td>company_name</td>
		<td>NULL</td>
		<td>No</td>
		<td>Company name. If "type" is "business", this is optional. Hidden if "private".</td>
	</tr>
	<tr>
		<td>company_vat</td>
		<td>NULL</td>
		<td>No</td>
		<td>VAT no. If "type" is "business", this is optional. Hidden if "private".</td>
	</tr>
	<tr>
		<td>company_contact</td>
		<td>NULL</td>
		<td>No</td>
		<td>Company contact person. If "type" is "business", this is optional. Hidden if "private".</td>
	</tr>
	<tr>
		<td>company_phone</td>
		<td>NULL</td>
		<td>No</td>
		<td>Main phone no. for the company. If "type" is "business", this is optional. Hidden if "private".</td>
	</tr>
	<tr>
		<td>gender</td>
		<td>NULL</td>
		<td>No</td>
		<td>Can be either "male" or "female".</td>
	</tr>
	<tr>
		<td>birthday</td>
		<td>NULL</td>
		<td>No</td>
		<td>A string that represents the user's birth date.</td>
	</tr>
	<tr>
		<td>bank_reg_no</td>
		<td>NULL</td>
		<td>No</td>
		<td>Bank reg. no. Required for payouts.</td>
	</tr>
	<tr>
		<td>bank_account_no</td>
		<td>NULL</td>
		<td>No</td>
		<td>Bank account no. Required for payouts.</td>
	</tr>
	<tr>
		<td>newsletter</td>
		<td>0</td>
		<td>No</td>
		<td>If the user opts in for the newletter, set the value to "1".</td>
	</tr>
	<tr>
		<td>sms</td>
		<td>0</td>
		<td>No</td>
		<td>If the user opts in for sms notifications, set the value to "1".</td>
	</tr>
</table>
<h4>Successful response example</h4>
<pre><code class="language-json">{
	"id": 123,
	"message": "Profile updated."
}</code></pre>
<h4>Unsuccessful response example</h4>
<pre><code class="language-json">{
	"message": "Invalid email address."
}</code></pre>

<div class="spacer"></div>
<h3 id="rate-user">Rate user</h3>
<p>This endpoint creates a new rating/review for a user.</p>
<h4>HTTP Request</h4>
<pre data-type="post"><code class="language-html">/rate-user/</code></pre>
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
		<td>The ID of the logged in user / the user creating the review.</td>
	</tr>
	<tr>
		<td>auth_key</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The authorization key as returned by the login endpoint.</td>
	</tr>
	<tr>
		<td>review_member_id</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The ID of the user receiving the rating.</td>
	</tr>
	<tr>
		<td>review_rating</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The rating score. Accepts the numbers 1-5.</td>
	</tr>
	<tr>
		<td>review_title</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>Headline / title for the review.</td>
	</tr>
	<tr>
		<td>review_text</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>Description / content for the review.</td>
	</tr>
</table>
<h4>Successful response example</h4>
<pre><code class="language-json">{
	"id": 123,
	"message": "Review saved successfully."
}</code></pre>
<h4>Unsuccessful response example</h4>
<pre><code class="language-json">{
	"message": "You are not allowed to rate this user."
}</code></pre>
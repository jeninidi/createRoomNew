<h3 id="get-all-messages">Get all messages</h3>
<p>This endpoint retrieves all messages sent to a specific user.</p>
<h4>HTTP Request</h4>
<pre data-type="get"><code class="language-html">/messages/</code></pre>
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
		<td>The user ID to retrieve messages for.</td>
	</tr>
	<tr>
		<td>auth_key</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The authorization key as returned by the login endpoint.</td>
	</tr>
</table>
<h4>Successful response example</h4>
<pre><code class="language-json">[
	{
		"id": 1234,
		"date": "15-11-2018 kl. 14:54",
		"excerpt": "Testing.",
		"you": {
			"id": 123,
			"display_name": "John Doe",
			"image": "https://www.gravatar.com/avatar/123"
		},
		"recipient": {
			"id": 234,
			"display_name": "John Doe",
			"image": "https://www.gravatar.com/avatar/123"
		}
	},
	{
		"id": 2345,
		"date": "12-06-2018 kl. 15:54",
		"excerpt": "Testing.",
		"sender": {
			"id": 234,
			"display_name": "John Doe",
			"image": "https://www.gravatar.com/avatar/123"
		},
		"you": {
			"id": 123,
			"display_name": "John Doe",
			"image": "https://www.gravatar.com/avatar/123"
		}
	}
]</code></pre>
<h4>Unsuccessful response example</h4>
<pre><code class="language-json">{
	"code": "rest_unauthorized_access",
	"message": "Anmodning afvist. Uautoriseret adgang.",
	"data": {
		"status": 401
	}
}</code></pre>

<div class="spacer"></div>
<h3 id="get-message">Get message / conversation</h3>
<p>This endpoint retrieves a message and all its replies.</p>
<h4>HTTP Request</h4>
<pre data-type="get"><code class="language-html">/message/:id</code></pre>
<h4>URL Parameters</h4>
<table class="table table-striped">
	<tr>
		<th>Field</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>id</td>
		<td>The ID of the message / conversation to retrieve.</td>
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
		<td>user_id</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The ID of the logged in user / the user requesting the message.</td>
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
	"id": 1234,
	"date": "08-06-2018 kl. 09:58",
	"excerpt": "Testing.",
	"you": {
		"id": 123,
		"display_name": "John Doe",
		"image": "https://www.gravatar.com/avatar/123"
	},
	"recipient": {
		"id": 234,
		"display_name": "John Doe",
		"image": "https://www.gravatar.com/avatar/123"
	},
	"replies": [
		{
			"id": 1235,
			"date": "08-06-2018 kl. 10:02",
			"excerpt": "Testing reply.",
			"sender": {
				"id": 234,
				"display_name": "John Doe",
				"image": "https://www.gravatar.com/avatar/123"
			},
			"you": {
				"id": 123,
				"display_name": "John Doe",
				"image": "https://www.gravatar.com/avatar/123"
			}
		}
	]
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
<h3 id="send-message">Send message</h3>
<p>This endpoint sends a message to another user.</p>
<h4>HTTP Request</h4>
<pre data-type="post"><code class="language-html">/create-message/</code></pre>
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
		<td>The ID of the logged in user / the user sending the message.</td>
	</tr>
	<tr>
		<td>auth_key</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The authorization key as returned by the login endpoint.</td>
	</tr>
	<tr>
		<td>recipient</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The user ID of the user who should receive the message.</td>
	</tr>
	<tr>
		<td>message_body</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The message body.</td>
	</tr>
	<tr>
		<td>reply_to</td>
		<td>0</td>
		<td>No</td>
		<td>If the message is a reply in a conversation, this should be the ID of the top level message (the first message in the conversation)</td>
	</tr>
</table>
<h4>Successful response example</h4>
<pre><code class="language-json">{
	"id": 1234,
	"parent": 0,
	"message": "Message successfully sent"
}</code></pre>
<h4>Unsuccessful response example</h4>
<pre><code class="language-json">{
	"code": "rest_no_route",
	"message": "Anmodningen blev afvist.",
	"data": {
		"status": 404
	}
}</code></pre>
<h4>Unsuccessful response example 2</h4>
<pre><code class="language-json">{
	"message": "An error occured"
}</code></pre>
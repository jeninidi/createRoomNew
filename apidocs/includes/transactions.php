<h3 id="get-all-transactions">Get all transactions</h3>
<p>This endpoint retrieves all transactions specific for the logged in user.</p>
<h4>HTTP Request</h4>
<pre data-type="get"><code class="language-html">/transactions/</code></pre>
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
		<td>The ID of the logged in user / the user requesting the transactions.</td>
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
	"0": {
		"id": 2345,
		"order_id": 0,
		"title": "Gave fra Hamsto",
		"date": "09-11-2018 kl. 10:32",
		"status": "gift",
		"status_display": "",
		"type": "deposit",
		"amount": "100,00"
	},
	"1": {
		"id": 1234,
		"order_id": 123,
		"title": "Ordre: 123 - Hamsto indbetaling",
		"date": "18-06-2018 kl. 15:53",
		"status": "approved",
		"status_display": "Godkendt",
		"type": "deposit",
		"amount": "10,00"
	},
	"pagination": false
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
<h3 id="get-transaction">Get transaction</h3>
<p>This endpoint retrieves info for a specific transaction.</p>
<h4>HTTP Request</h4>
<pre data-type="get"><code class="language-html">/transaction/:id</code></pre>
<h4>URL Parameters</h4>
<table class="table table-striped">
	<tr>
		<th>Field</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>id</td>
		<td>The ID of the transaction to retrieve.</td>
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
		<td>The ID of the logged in user / the user requesting the transaction.</td>
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
	"order_id": "123",
	"transaction_id": 1234,
	"date": "18-06-2018 kl. 15:54",
	"net_amount": "8,00",
	"tax_amount": "2,00",
	"total_amount": "10,00",
	"currency": "DKK",
	"billing_details": {
		"payment_status": "approved",
		"payment_method": "MasterCard",
		"card_number": "123456******1234",
		"card_expire_month": "23",
		"card_expire_year": "23",
		"billing_address": [
			"John Doe",
			"Some street 123",
			"2900 Hellerup",
			"DNK",
			"johndoe@example.com",
			"+4512345678"
		]
	}
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
<h3 id="create-deposit">Create deposit</h3>
<p>This endpoint makes a deposit to the user's Hamsto account.</p>
<h4>HTTP Request</h4>
<pre data-type="post"><code class="language-html">/create-deposit/</code></pre>
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
		<td>The ID of the logged in user / the user making the deposit.</td>
	</tr>
	<tr>
		<td>auth_key</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The authorization key as returned by the login endpoint.</td>
	</tr>
	<tr>
		<td>amount</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The amount to deposit in DKK. Expects a "float".</td>
	</tr>
</table>
<h4>Successful response example</h4>
<pre><code class="language-json">{
	"transaction_id": 1234,
	"order_id": "123",
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
<h3 id="request-payout">Request payout</h3>
<p>This endpoint requests a payout.</p>
<h4>HTTP Request</h4>
<pre data-type="post"><code class="language-html">/request-payout/</code></pre>
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
		<td>The ID of the logged in user / the user requesting the payout.</td>
	</tr>
	<tr>
		<td>auth_key</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The authorization key as returned by the login endpoint.</td>
	</tr>
	<tr>
		<td>instant</td>
		<td>NULL</td>
		<td>No</td>
		<td>If it is a request for instant payout, set the value to "1".</td>
	</tr>
</table>
<h4>Successful response example</h4>
<pre><code class="language-json">{
	"transaction_id": 1234,
	"order_id": "123",
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
<h3 id="update-transaction">Update transaction</h3>
<p>This endpoint updates payment info for a single transaction.</p>
<h4>HTTP Request</h4>
<pre data-type="post"><code class="language-html">/update-transaction/</code></pre>
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
		<td>The ID of the logged in user / the user updating the transaction.</td>
	</tr>
	<tr>
		<td>auth_key</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The authorization key as returned by the login endpoint.</td>
	</tr>
	<tr>
		<td>transaction_id</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>Transaction ID. The ID of the transaction being updated.</td>
	</tr>
	<tr>
		<td>payment_id</td>
		<td>NULL</td>
		<td>No</td>
		<td>Payment ID. This is returned by DIBS Easy payment API.</td>
	</tr>
	<tr>
		<td>payment_id</td>
		<td>NULL</td>
		<td>No</td>
		<td>Payment ID. This is returned by DIBS Easy payment API when creating a payment.</td>
	</tr>
	<tr>
		<td>payment_status</td>
		<td>NULL</td>
		<td>No</td>
		<td>One of the following values can be used:<br><ul>
			<li>pending</li>
			<li>approved</li>
			<li>refunded</li>
			<li>cancelled</li>
			<li>rejected</li>
		</ul></td>
	</tr>
	<tr>
		<td>payment_type</td>
		<td>NULL</td>
		<td>No</td>
		<td>One of the following values can be used:<br><ul>
			<li>deposit</li>
			<li>booking_tenant</li>
			<li>booking_landlord</li>
			<li>payout</li>
		</ul></td>
	</tr>
	<tr>
		<td>charge_id</td>
		<td>NULL</td>
		<td>No</td>
		<td>Charge ID. This is returned by DIBS Easy payment API when a payment is captured.</td>
	</tr>
	<tr>
		<td>response_code</td>
		<td>NULL</td>
		<td>No</td>
		<td>The HTTP response code. This is returned by DIBS Easy payment API when a payment is made. This is for debugging purposes.</td>
	</tr>
	<tr>
		<td>booking_id</td>
		<td>NULL</td>
		<td>No</td>
		<td>If a transaction need to be updated with a booking ID.</td>
	</tr>
	<tr>
		<td>datastring</td>
		<td>NULL</td>
		<td>No</td>
		<td>This is the data string that is sent to the DIBS Easy payment API. This is for debugging purposes.</td>
	</tr>
</table>
<h4>Successful response example</h4>
<pre><code class="language-json">{
	"transaction_id": 1234,
	"message": "Transaction updated",
}</code></pre>
<h4>Unsuccessful response example</h4>
<pre><code class="language-json">{
	"code": "rest_unauthorized_access",
	"message": "Anmodning afvist. Uautoriseret adgang.",
	"data": {
		"status": 401
	}
}</code></pre>
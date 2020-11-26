<h3 id="get-all-bookings">Get all bookings</h3>
<p>This endpoint retrieves all bookings specific for the logged in user.</p>
<h4>HTTP Request</h4>
<pre data-type="get"><code class="language-html">/bookings/</code></pre>
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
		<td>The ID of the logged in user / the user requesting the bookings.</td>
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
		"image": "https://www.hamsto.com/wp-content/123.jpg",
		"title": "Location title",
		"start_date": "13-10-2018",
		"end_date": "",
		"type": "continually",
		"type_display": "Løbende booking",
		"status": "rejected",
		"status_display": "Afvist"
		"location_type": "storage"
	}
]</code></pre>
<h4>Unsuccessful response example</h4>
<pre><code class="language-json">{
	"code": "rest_no_route",
	"message": "Anmodningen blev afvist.",
	"data": {
		"status": 404
	}
}</code></pre>

<div class="spacer"></div>
<h3 id="get-booking">Get booking</h3>
<p>This endpoint retrieves info for a specific booking.</p>
<p>Note that the price changes, depending on the user. If user_id and auth_key is for the author of the location, the price returned is the calculated payout. If not, the price returned is the public price (the price for the person renting the place).</p>
<h4>HTTP Request</h4>
<pre data-type="get"><code class="language-html">/booking/:id</code></pre>
<h4>URL Parameters</h4>
<table class="table table-striped">
	<tr>
		<th>Field</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>id</td>
		<td>The ID of the booking to retrieve.</td>
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
		<td>The ID of the logged in user / the user requesting the booking.</td>
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
	"booking_details": {
		"id": 1234,
		"start_date": "13-10-2018",
		"end_date": "",
		"status": "rejected",
		"status_display": "Annulleret",
		"type": "continually",
		"type_display": "Booking",
		"price_first_month": "1.363,82",
		"price_additional_months": "1.579,20",
		"agreement_status": "created"
	},
	"location_details": {
		"id": 2345,
		"title": "Location title",
		"description": "Location description",
		"image": "https://www.hamsto.com/wp-content/uploads/123.jpeg",
		"latitude": "55.6727552",
		"longitude": "12.552999",
		"street_name": "Some street",
		"zip": "1620",
		"city": "København V "
	},
	"landlord_details": {
		"headline": "Detaljer om udlejer",
		"user": {
			"id": "123",
			"registered": "21-06-2018",
			"city": "",
			"phone": "12345678"
		}
	}
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
<h3 id="create-booking">Create booking</h3>
<p>This endpoint creates a pending booking.</p>
<h4>HTTP Request</h4>
<pre data-type="post"><code class="language-html">/create-booking/</code></pre>
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
		<td>The ID of the logged in user / the user creating the booking.</td>
	</tr>
	<tr>
		<td>auth_key</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The authorization key as returned by the login endpoint.</td>
	</tr>
	<tr>
		<td>location_id</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The ID of the location being booked.</td>
	</tr>
	<tr>
		<td>booking_type</td>
		<td>NULL</td>
		<td>No</td>
		<td>Booking type can be either "continually" or empty. If empty, an end date is required.</td>
	</tr>
	<tr>
		<td>start_date</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>First day of the booking agreement. Format expected: d-m-Y</td>
	</tr>
	<tr>
		<td>end_date</td>
		<td>NULL</td>
		<td>No</td>
		<td>Last day of the booking agreement. Required if booking type is empty. Format expected: d-m-Y</td>
	</tr>
</table>
<h4>Successful response example</h4>
<pre><code class="language-json">{
	"booking_id": 123,
	"message": "Din forespørgsel er sendt til udlejer. Du vil få besked på mail og eventuelt sms, når udlejer har bekræftet din booking."
}</code></pre>
<h4>Unsuccessful response example</h4>
<pre><code class="language-json">{
	"message": "Der er ikke penge nok på din Hamsto konto til at leje for den angivne periode."
}</code></pre>

<div class="spacer"></div>
<h3 id="accept-booking">Accept booking</h3>
<p>This endpoint accepts a pending booking.</p>
<h4>HTTP Request</h4>
<pre data-type="post"><code class="language-html">/accept-booking/</code></pre>
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
		<td>The ID of the logged in user / the user accepting the booking.</td>
	</tr>
	<tr>
		<td>auth_key</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The authorization key as returned by the login endpoint.</td>
	</tr>
	<tr>
		<td>booking_id</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The ID of the booking.</td>
	</tr>
</table>
<h4>Successful response example</h4>
<pre><code class="language-json">{
	"booking_id": 123,
	"message": "Du har bekræftet denne booking. Lejer vil få besked hurtigst muligt."
}</code></pre>
<h4>Unsuccessful response example</h4>
<pre><code class="language-json">{
	"message": "Der er ikke penge nok på lejers Hamsto konto til at kunne bekræfte denne booking. Lejer har fået besked herom."
}</code></pre>

<div class="spacer"></div>
<h3 id="reject-booking">Reject booking</h3>
<p>This endpoint rejects a pending booking. This is only for the landlord, and only before the booking is accepted. The tenant gets another <a href="#cancel-booking">endpoint</a>, to check if the booking start date has passed and other things.</p>
<h4>HTTP Request</h4>
<pre data-type="post"><code class="language-html">/reject-booking/</code></pre>
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
		<td>The ID of the logged in user / the user rejecting the booking.</td>
	</tr>
	<tr>
		<td>auth_key</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The authorization key as returned by the login endpoint.</td>
	</tr>
	<tr>
		<td>booking_id</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The ID of the booking.</td>
	</tr>
</table>
<h4>Successful response example</h4>
<pre><code class="language-json">{
	"booking_id": 123,
	"message": "Du har annulleret denne booking. Lejer har fået besked herom."
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
<h3 id="cancel-booking">Cancel booking</h3>
<p>This endpoint cancels/terminates an active booking. This can be used by both landlords and tenants, and will automatically terminate the booking according to terms.</p>
<h4>HTTP Request</h4>
<pre data-type="post"><code class="language-html">/cancel-booking/</code></pre>
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
		<td>The ID of the logged in user / the user cancelling the booking.</td>
	</tr>
	<tr>
		<td>auth_key</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The authorization key as returned by the login endpoint.</td>
	</tr>
	<tr>
		<td>booking_id</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The ID of the booking.</td>
	</tr>
</table>
<h4>Successful response example</h4>
<pre><code class="language-json">{
	"booking_id": 123,
	"message": "Du har annulleret denne booking. Udlejer har fået besked herom."
}</code></pre>
<h4>Unsuccessful response example</h4>
<pre><code class="language-json">{
	"message": "User does not have permissions to cancel this booking."
}</code></pre>

<div class="spacer"></div>
<h3 id="get-agreement">Get agreement</h3>
<p>This endpoint retrieves the details of the agreement.</p>
<h4>HTTP Request</h4>
<pre data-type="get"><code class="language-html">/get-agreement/:id</code></pre>
<h4>URL Parameters</h4>
<table class="table table-striped">
	<tr>
		<th>Field</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>id</td>
		<td>The ID of the booking.</td>
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
		<td>The ID of the logged in user / the user cancelling the booking.</td>
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
	"booking_id": 123,
	"status": "pending",
	"status_display": "Afventer",
	"text": "Sample description",
	"gallery": [
		{
			"id": 234,
			"thumbnail": "https://www.hamsto.com/path/to/thumbnail.jpg",
			"image": "https://www.hamsto.com/path/to/image.jpg"
		},
		{
			"id": 234,
			"thumbnail": "https://www.hamsto.com/path/to/thumbnail.jpg",
			"image": "https://www.hamsto.com/path/to/image.jpg"
		}
	]
}</code></pre>
<h4>Unsuccessful response example</h4>
<pre><code class="language-json">{
	"message": "There are no agreement details for this booking yet."
}</code></pre>

<div class="spacer"></div>
<h3 id="update-agreement">Update agreement</h3>
<p>This endpoint updates the details of the agreement.</p>
<h4>HTTP Request</h4>
<pre data-type="post"><code class="language-html">/update-agreement/</code></pre>
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
		<td>The ID of the logged in user / the user updating the agreement.</td>
	</tr>
	<tr>
		<td>auth_key</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The authorization key as returned by the login endpoint.</td>
	</tr>
	<tr>
		<td>booking_id</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The ID of the booking.</td>
	</tr>
	<tr>
		<td>existing_gallery</td>
		<td>NULL</td>
		<td>No</td>
		<td>An array of image ID's as returned by "get-agreement". If no agreement exists, leave this empty.</td>
	</tr>
	<tr>
		<td>gallery</td>
		<td>NULL</td>
		<td>No</td>
		<td>An array of file objects.</td>
	</tr>
	<tr>
		<td>text</td>
		<td>NULL</td>
		<td>No</td>
		<td>A text describing the gallery images, or simply just a description.</td>
	</tr>
</table>
<h4>Successful response example</h4>
<pre><code class="language-json">{
	"booking_id": 123,
	"message": "Aftale blev opdateret."
}</code></pre>
<h4>Unsuccessful response example</h4>
<pre><code class="language-json">{
	"message": "Booking ID is required."
}</code></pre>

<div class="spacer"></div>
<h3 id="accept-agreement">Accept agreement</h3>
<p>This endpoint updates the details of the agreement.</p>
<h4>HTTP Request</h4>
<pre data-type="post"><code class="language-html">/accept-agreement/</code></pre>
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
		<td>The ID of the logged in user / the user accepting the agreement.</td>
	</tr>
	<tr>
		<td>auth_key</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The authorization key as returned by the login endpoint.</td>
	</tr>
	<tr>
		<td>booking_id</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The ID of the booking.</td>
	</tr>
</table>
<h4>Successful response example</h4>
<pre><code class="language-json">{
	"booking_id": 123,
	"message": "Du har bekræftet aftalegrundlag. Lejer har fået besked herom."
}</code></pre>
<h4>Unsuccessful response example</h4>
<pre><code class="language-json">{
	"message": "Booking ID is required."
}</code></pre>

<div class="spacer"></div>
<h3 id="reject-agreement">Reject agreement</h3>
<p>This endpoint updates the details of the agreement.</p>
<h4>HTTP Request</h4>
<pre data-type="post"><code class="language-html">/reject-agreement/</code></pre>
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
		<td>The ID of the logged in user / the user rejecting the agreement.</td>
	</tr>
	<tr>
		<td>auth_key</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The authorization key as returned by the login endpoint.</td>
	</tr>
	<tr>
		<td>booking_id</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The ID of the booking.</td>
	</tr>
</table>
<h4>Successful response example</h4>
<pre><code class="language-json">{
	"booking_id": 123,
	"message": "Du har afvist aftalegrundlag. Lejer har fået besked herom, og kan rette aftalen til."
}</code></pre>
<h4>Unsuccessful response example</h4>
<pre><code class="language-json">{
	"message": "Booking ID is required."
}</code></pre>
<h3 id="get-all-locations">Get all locations</h3>
<p>This endpoint retrieves all locations.</p>
<p>Note that the price changes, depending on the user. If user_id and auth_key is supplied, and the logged in user is the author of the location, the price returned is the user's asking price. If not, the price returned is the public price (the price for those who wants to rent the place).</p>
<p>In general, if user_id and auth_key is supplied for this endpoint, we assume that the request should only return the user's own locations. This means, that in order to get favorites, the user_id and auth_key are required.</p>
<p>The status returned, indicates whether a location is active, or disabled. When disabled, it no longer appears in the public response.</p>

<h4>HTTP Request</h4>
<pre data-type="get"><code class="language-html">/locations/</code></pre>
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
		<td>No</td>
		<td>The ID of the logged in user / the user requesting the locations.</td>
	</tr>
	<tr>
		<td>auth_key</td>
		<td>NULL</td>
		<td>No</td>
		<td>The authorization key as returned by the login endpoint.</td>
	</tr>
	<tr>
		<td>page</td>
		<td>1</td>
		<td>No</td>
		<td>Change this to return next 10 results. Pagination is returned by default in the response.</td>
	</tr>
	<tr>
		<td>per_page</td>
		<td>10</td>
		<td>No</td>
		<td>This defines how many locations will be returned per page in the response.</td>
	</tr>
	<tr>
		<td>type</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>This can be either "storage", "parking" or "favorite".</td>
	</tr>
</table>
<h4>Successful response example</h4>
<pre><code class="language-json">{
	"locations": [
		{
			"id": 1234,
			"image": "https://www.hamsto.com/wp-content/uploads/123.jpeg",
			"price": "1234",
			"title": "Location headline",
			"description": "Location description",
			"area": "20",
			"latitude": "55.6524681",
			"longitude": "12.5118469",
			"status": "active"
		},
		{...}
	],
	"pagination": {
		"next_page": "https://www.hamsto.com/wp-json/v1/units/?page=2&auth_key={auth_key}&user_id={ID}&per_page=10&type=storage"
	}
}</code></pre>
<h4>Unsuccessful response example</h4>
<pre><code class="language-json">{
	"message": "No location type selected."
}</code></pre>
<h4>Unsuccessful response example 2</h4>
<pre><code class="language-json">{
	"message": "Please provide a User ID and Auth key to view favorites."
}</code></pre>

<div class="spacer"></div>
<h3 id="get-location">Get location</h3>
<p>This endpoint retrieves info for a specific location.</p>
<p>Note that the info (including the price) changes if given user_id and auth_key. If user is authenticated and is the author of the location, all the fields for the location are returned in the response.</p>
<h4>HTTP Request</h4>
<pre data-type="get"><code class="language-html">/location/:id</code></pre>
<h4>URL Parameters</h4>
<table class="table table-striped">
	<tr>
		<th>Field</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>id</td>
		<td>The ID of the location to retrieve.</td>
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
		<td>No</td>
		<td>The ID of the logged in user / the user requesting the location.</td>
	</tr>
	<tr>
		<td>auth_key</td>
		<td>NULL</td>
		<td>No</td>
		<td>The authorization key as returned by the login endpoint.</td>
	</tr>
</table>
<h4>Successful response example</h4>
<pre><code class="language-json">{
	"id": 1234,
	"image": "https://www.hamsto.com/wp-content/uploads/123.jpeg",
	"price_per_month": "905,10",
	"price_per_day": "41,14",
	"title": "Location title",
	"description": "Location description",
	"latitude": "55.5982236",
	"longitude": "12.6355388",
	"street_name": "Some street",
	"zip": "2791",
	"city": "Dragør",
	"area": "10.14",
	"volume": "22.31",
	"floor": "Kælder",
	"security": "Dør med nøgle",
	"access": "24/7 adgang",
	"sharing": "Eget lokale",
	"properties": [
		"Elektricitet",
		"Belysning",
		"Egen nøgle"
	],
	"status": "active",
	"type": "storage",
	"user": {
		"id": "123",
		"registered": "08-06-2018",
		"name": "John Doe",
		"image": "https://www.gravatar.com/avatar/123",
		"ratings": []
	},
	"gallery": [
		{
			"id": 2345,
			"url": "https://www.hamsto.com/wp-content/uploads/123.jpeg"
		},
		{
			"id": 3456,
			"url": "https://www.hamsto.com/wp-content/uploads/234.jpeg"
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

<div class="spacer"></div>
<h3 id="create-location">Create location</h3>
<p>This endpoint creates a new location.</p>
<h4>HTTP Request</h4>
<pre data-type="post"><code class="language-html">/create-location/</code></pre>
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
		<td>The ID of the logged in user / the user creating the location.</td>
	</tr>
	<tr>
		<td>auth_key</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The authorization key as returned by the login endpoint.</td>
	</tr>
	<tr>
		<td>title</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The name/title of the new location.</td>
	</tr>
	<tr>
		<td>type</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>587 = Storage<br>588 = Parking</td>
	</tr>
	<tr>
		<td>description</td>
		<td>NULL</td>
		<td>No</td>
		<td>Description of the location.</td>
	</tr>
	<tr>
		<td>address_1</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>Address field 1</td>
	</tr>
	<tr>
		<td>address_2</td>
		<td>NULL</td>
		<td>No</td>
		<td>Address field 2</td>
	</tr>
	<tr>
		<td>zip</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>Zip code</td>
	</tr>
	<tr>
		<td>city</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>City</td>
	</tr>
	<tr>
		<td>country</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>Country</td>
	</tr>
	<tr>
		<td>width</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>Width of the storage/parking. This is used to calculate the area.</td>
	</tr>
	<tr>
		<td>length</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>Length of the storage/parking This is used to calculate the area.</td>
	</tr>
	<tr>
		<td>height</td>
		<td>NULL</td>
		<td>No</td>
		<td>Height of storage space. Useful for calculating volume.</td>
	</tr>
	<tr>
		<td>price</td>
		<td>0</td>
		<td>Yes</td>
		<td>Price is required. The calculations are done server-side.</td>
	</tr>
	<tr>
		<td>floor</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>One of the following values can be used:<br>
		<ul>
			<li>Kælder</li>
			<li>Stue</li>
			<li>Første</li>
			<li>Anden</li>
			<li>Tredje</li>
			<li>Fjerde</li>
			<li>Femte</li>
			<li>Sjette</li>
			<li>Syvende</li>
			<li>Ottende</li>
			<li>Niende</li>
			<li>10+</li>
		</ul></td>
	</tr>
	<tr>
		<td>security</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>One of the following values can be used:<br>
		<ul>
			<li>Dør med nøgle</li>
			<li>Dør med kode</li>
			<li>Hængelås</li>
			<li>Ikke aflåst</li>
		</ul></td>
	</tr>
	<tr>
		<td>access</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>One of the following values can be used:<br>
		<ul>
			<li>24/7 adgang</li>
			<li>Efter aftale</li>
		</ul></td>
	</tr>
	<tr>
		<td>sharing</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>One of the following values can be used:<br>
		<ul>
			<li>Delelokale</li>
			<li>Eget lokale</li>
		</ul></td>
	</tr>
	<tr>
		<td>properties</td>
		<td>NULL</td>
		<td>No</td>
		<td>Expecting an array. The following values can be used:<br>
		<ul>
			<li>Hylder</li>
			<li>Opvarmning</li>
			<li>Elektricitet</li>
			<li>Vand</li>
			<li>Overvågning</li>
			<li>Port</li>
			<li>Elevator</li>
			<li>Alarm</li>
			<li>Belysning</li>
			<li>Egen nøgle</li>
			<li>Parkering</li>
			<li>Brandalarm</li>
		</ul></td>
	</tr>
	<tr>
		<td>notice_days</td>
		<td>NULL</td>
		<td>No</td>
		<td>How many days must elapse from booking to the agreement start?</td>
	</tr>
	<tr>
		<td>primary_image</td>
		<td>NULL</td>
		<td>No</td>
		<td>A file object is expected.</td>
	</tr>
	<tr>
		<td>gallery</td>
		<td>NULL</td>
		<td>No</td>
		<td>An array of file objects is expected.</td>
	</tr>
</table>
<h4>Successful response example</h4>
<pre><code class="language-json">{
	"id": 1234,
	"message": "Location created"
}</code></pre>
<h4>Unsuccessful response example</h4>
<pre><code class="language-json">{
	"message": "An error occurred while creating the location."
}</code></pre>

<div class="spacer"></div>
<h3 id="update-location">Update location</h3>
<p>This endpoint updates an existing location.</p>
<h4>HTTP Request</h4>
<pre data-type="post"><code class="language-html">/update-location/</code></pre>
<h4>Query Parameters</h4>
<table class="table table-striped">
	<tr>
		<th>Field</th>
		<th>Default</th>
		<th>Required</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>id</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The ID of location to update.</td>
	</tr>
	<tr>
		<td>user_id</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The ID of the logged in user / the user updating the location.</td>
	</tr>
	<tr>
		<td>auth_key</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The authorization key as returned by the login endpoint.</td>
	</tr>
	<tr>
		<td>title</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The name/title of the new location.</td>
	</tr>
	<tr>
		<td>type</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>587 = Storage<br>588 = Parking</td>
	</tr>
	<tr>
		<td>description</td>
		<td>NULL</td>
		<td>No</td>
		<td>Description of the location.</td>
	</tr>
	<tr>
		<td>address_1</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>Address field 1</td>
	</tr>
	<tr>
		<td>address_2</td>
		<td>NULL</td>
		<td>No</td>
		<td>Address field 2</td>
	</tr>
	<tr>
		<td>zip</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>Zip code</td>
	</tr>
	<tr>
		<td>city</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>City</td>
	</tr>
	<tr>
		<td>country</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>Country</td>
	</tr>
	<tr>
		<td>width</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>Width of the storage/parking. This is used to calculate the area.</td>
	</tr>
	<tr>
		<td>length</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>Length of the storage/parking This is used to calculate the area.</td>
	</tr>
	<tr>
		<td>height</td>
		<td>NULL</td>
		<td>No</td>
		<td>Height of storage space. Useful for calculating volume.</td>
	</tr>
	<tr>
		<td>price</td>
		<td>0</td>
		<td>Yes</td>
		<td>Price is required. The calculations are done server-side.</td>
	</tr>
	<tr>
		<td>floor</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>One of the following values can be used:<br>
		<ul>
			<li>Kælder</li>
			<li>Stue</li>
			<li>Første</li>
			<li>Anden</li>
			<li>Tredje</li>
			<li>Fjerde</li>
			<li>Femte</li>
			<li>Sjette</li>
			<li>Syvende</li>
			<li>Ottende</li>
			<li>Niende</li>
			<li>10+</li>
		</ul></td>
	</tr>
	<tr>
		<td>security</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>One of the following values can be used:<br>
		<ul>
			<li>Dør med nøgle</li>
			<li>Dør med kode</li>
			<li>Hængelås</li>
			<li>Ikke aflåst</li>
		</ul></td>
	</tr>
	<tr>
		<td>access</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>One of the following values can be used:<br>
		<ul>
			<li>24/7 adgang</li>
			<li>Efter aftale</li>
		</ul></td>
	</tr>
	<tr>
		<td>sharing</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>One of the following values can be used:<br>
		<ul>
			<li>Delelokale</li>
			<li>Eget lokale</li>
		</ul></td>
	</tr>
	<tr>
		<td>properties</td>
		<td>NULL</td>
		<td>No</td>
		<td>Expecting an array. The following values can be used:<br>
		<ul>
			<li>Hylder</li>
			<li>Opvarmning</li>
			<li>Elektricitet</li>
			<li>Vand</li>
			<li>Overvågning</li>
			<li>Port</li>
			<li>Elevator</li>
			<li>Alarm</li>
			<li>Belysning</li>
			<li>Egen nøgle</li>
			<li>Parkering</li>
			<li>Brandalarm</li>
		</ul></td>
	</tr>
	<tr>
		<td>notice_days</td>
		<td>NULL</td>
		<td>No</td>
		<td>How many days must elapse from booking to the agreement start?</td>
	</tr>
	<tr>
		<td>primary_image</td>
		<td>NULL</td>
		<td>No</td>
		<td>A file object is expected. If empty, existing image will be used.</td>
	</tr>
	<tr>
		<td>gallery</td>
		<td>NULL</td>
		<td>No</td>
		<td>An array of file objects is expected.</td>
	</tr>
	<tr>
		<td>existing_gallery</td>
		<td>NULL</td>
		<td>No</td>
		<td>An array of image ID's. These are returned by the "/location/" endpoint.</td>
	</tr>
</table>
<h4>Successful response example</h4>
<pre><code class="language-json">{
	"id": 1234,
	"message": "Location updated"
}</code></pre>
<h4>Unsuccessful response example</h4>
<pre><code class="language-json">{
	"message": "An error occurred while updating the location."
}</code></pre>

<div class="spacer"></div>
<h3 id="toggle-status">Toggle status</h3>
<p>This endpoint toggles the location status (active / disabled).</p>
<h4>HTTP Request</h4>
<pre data-type="post"><code class="language-html">/toggle-location-status/</code></pre>
<h4>Query Parameters</h4>
<table class="table table-striped">
	<tr>
		<th>Field</th>
		<th>Default</th>
		<th>Required</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>id</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The ID of location.</td>
	</tr>
	<tr>
		<td>user_id</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The ID of the logged in user / the user changing the location.</td>
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
	"message": "Location status changed to disabled"
}</code></pre>
<h4>Unsuccessful response example</h4>
<pre><code class="language-json">{
	"errors": [
		"An error occurred while updating the location."
	]
}</code></pre>

<div class="spacer"></div>
<h3 id="toggle-favorite">Toggle favorite</h3>
<p>This endpoint adds or removes the location from favorites.</p>
<h4>HTTP Request</h4>
<pre data-type="post"><code class="language-html">/toggle-favorite/</code></pre>
<h4>Query Parameters</h4>
<table class="table table-striped">
	<tr>
		<th>Field</th>
		<th>Default</th>
		<th>Required</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>location_id</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The ID of location.</td>
	</tr>
	<tr>
		<td>user_id</td>
		<td>NULL</td>
		<td>Yes</td>
		<td>The ID of the logged in user.</td>
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
	"message": "Location added to favorites"
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
<h3 id="search-locations">Search locations</h3>
<p>This endpoint returns locations based on the given query parameters.</p>
<h4>HTTP Request</h4>
<pre data-type="get"><code class="language-html">/search/</code></pre>
<h4>Query Parameters</h4>
<table class="table table-striped">
	<tr>
		<th>Field</th>
		<th>Default</th>
		<th>Required</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>type</td>
		<td>NULL</td>
		<td>No</td>
		<td>The type of location. This should be either "storage" or "parking". If nothing is passed, everything will be searched.</td>
	</tr>
	<tr>
		<td>search</td>
		<td>NULL</td>
		<td>No</td>
		<td>Search string. This is matched against title, zip code and full address.</td>
	</tr>
	<tr>
		<td>radius</td>
		<td>NULL</td>
		<td>No</td>
		<td>Radius to search in km. Visitors current latitude and longitude required for this to work.</td>
	</tr>
	<tr>
		<td>latitude</td>
		<td>NULL</td>
		<td>No</td>
		<td>Current latitude. Must be provided if given a radius.</td>
	</tr>
	<tr>
		<td>longitude</td>
		<td>NULL</td>
		<td>No</td>
		<td>Current longitude. Must be provided if given a radius.</td>
	</tr>
	<tr>
		<td>area</td>
		<td>0</td>
		<td>No</td>
		<td>Minimum area size. 0 for no restrictions.</td>
	</tr>
	<tr>
		<td>volume</td>
		<td>0</td>
		<td>No</td>
		<td>Minimum volume size. 0 for no restrictions.</td>
	</tr>
	<tr>
		<td>price_per_month</td>
		<td>0</td>
		<td>No</td>
		<td>Maximum price per month. 0 for no restrictions.</td>
	</tr>
	<tr>
		<td>price_per_day</td>
		<td>0</td>
		<td>No</td>
		<td>Maximum price per day. 0 for no restrictions.</td>
	</tr>
	<tr>
		<td>shelves</td>
		<td>FALSE</td>
		<td>No</td>
		<td>Set to true if the locations should have shelves as a property. FALSE for ignore.</td>
	</tr>
	<tr>
		<td>warming</td>
		<td>FALSE</td>
		<td>No</td>
		<td>Set to true if the locations should have warming as a property. FALSE for ignore.</td>
	</tr>
	<tr>
		<td>electricity</td>
		<td>FALSE</td>
		<td>No</td>
		<td>Set to true if the locations should have electricity as a property. FALSE for ignore.</td>
	</tr>
	<tr>
		<td>water</td>
		<td>FALSE</td>
		<td>No</td>
		<td>Set to true if the locations should have water as a property. FALSE for ignore.</td>
	</tr>
	<tr>
		<td>surveillance</td>
		<td>FALSE</td>
		<td>No</td>
		<td>Set to true if the locations should have surveillance as a property. FALSE for ignore.</td>
	</tr>
	<tr>
		<td>gate</td>
		<td>FALSE</td>
		<td>No</td>
		<td>Set to true if the locations should have gate as a property. FALSE for ignore.</td>
	</tr>
	<tr>
		<td>elevator</td>
		<td>FALSE</td>
		<td>No</td>
		<td>Set to true if the locations should have elevator as a property. FALSE for ignore.</td>
	</tr>
	<tr>
		<td>alarm</td>
		<td>FALSE</td>
		<td>No</td>
		<td>Set to true if the locations should have alarm as a property. FALSE for ignore.</td>
	</tr>
	<tr>
		<td>lighting</td>
		<td>FALSE</td>
		<td>No</td>
		<td>Set to true if the locations should have lighting as a property. FALSE for ignore.</td>
	</tr>
	<tr>
		<td>own_key</td>
		<td>FALSE</td>
		<td>No</td>
		<td>Set to true if the locations should have own_key as a property. FALSE for ignore.</td>
	</tr>
	<tr>
		<td>parking</td>
		<td>FALSE</td>
		<td>No</td>
		<td>Set to true if the locations should have parking as a property. FALSE for ignore.</td>
	</tr>
	<tr>
		<td>firealarm</td>
		<td>FALSE</td>
		<td>No</td>
		<td>Set to true if the locations should have firealarm as a property. FALSE for ignore.</td>
	</tr>
</table>
<h4>Successful response example</h4>
<pre><code class="language-json">{
	"locations": [
		{
			"id": 1234,
			"image": "https://www.hamsto.com/wp-content/uploads/123.jpeg",
			"price": "1234",
			"title": "Location headline",
			"description": "Location description",
			"area": "20",
			"latitude": "55.6524681",
			"longitude": "12.5118469",
			"status": "active"
		},
		{...}
	]
}</code></pre>
<h4>Unsuccessful response example</h4>
<pre><code class="language-json">{
	"message": "No locations found"
}</code></pre>
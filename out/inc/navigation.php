    <p><strong>Current weather station: </strong><br />
    <span id="station_name"><?php echo ucwords($closest_station['station_name']); ?></span></p>
    <span id="station_id" class="hidden"><?php echo $closest_station['station_id']; ?></span>
    <span id="station_lat" class="hidden"><?php echo !empty($closest_station['station_lat']) ? $closest_station['station_lat'] : '0'; ?></span>
    <span id="station_lng" class="hidden"><?php echo !empty($closest_station['station_lon']) ? $closest_station['station_lon'] : '0'; ?></span>
    
    <br />
    
    <ul data-role="listview">
      <li>
        <div id="location-form">
          <label>Find another weather station</label>
          <a href="#" id="get-location" class="ui-btn ui-corner-all ui-icon-location ui-btn-icon-notext">Get my closest station</a>
          <input type="text" name="postcode" id="postcode" placeholder="Post code" required/>
          <button id="postcode-search" class="ui-btn-inline">Go</button>
        </div>
      </li>
      <li><a href="/">Home</a></li>
      <li><a href="/pages/weather-data/">Weather Data</a></li>
      <li><a href="/pages/climate-change/">Climate Change</a></li>
      <li><a href="/pages/climate-events/">Climate Events</a></li>
      <li><a href="/pages/about/">About Mapp My Climate</a></li>
    </ul>
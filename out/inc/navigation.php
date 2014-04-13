    <h4>Closest weather station</h4>
    <p id="station_name"><?php echo ucwords($closest_station['station_name']); ?><p>
    <span id="station_lat" class="hidden"><?php echo !empty($closest_station['station_lat']) ? $closest_station['station_lat'] : '0'; ?></span>
    <span id="station_lng" class="hidden"><?php echo !empty($closest_station['station_lon']) ? $closest_station['station_lon'] : '0'; ?></span>

    <form method="post">
      <input type="text" name="postcode" id="postcode" placeholder="Post code" required/>
      <input type="submit" value="Go">
    </form>
    
    <br />
    
    <ul data-role="listview">
      <li><a href="/">Home</a></li>
      <li><a href="/pages/weather-data/">Weather Data</a></li>
      <li><a href="/pages/climate-change/">Climate Change</a></li>
      <li><a href="/pages/climate-events/">Climate Events</a></li>
      <li><a href="/pages/about/">About Mapp My Climate</a></li>
    </ul>
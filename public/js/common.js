$(document).ready(function() {
  
  var map = $('#map-canvas');

  var map_options = {
    center: new google.maps.LatLng($('#station_lat').text(), $('#station_lng').text()),
    zoom: 9,
    disableDefaultUI: true,
    scrollwheel: false
  };
    
  var google_map = new google.maps.Map(document.getElementById("map-canvas"), map_options);

  if ($('#station_name').text() == '') {
    
    // get location
    navigator.geolocation.getCurrentPosition(function(position) {
      var coords = { 
        'lat':  position.coords.latitude,
        'lng':  position.coords.longitude,
      }
      $.get('/data/closest-station/' + coords.lat + '/' + coords.lng + '/', function(data) {
        var station = JSON.parse(data);
        console.log(station);
        $('#station_name').text(station.station_name);
        $('#station_lat').text(station.station_lat);
        $('#station_lng').text(station.station_lon);

        if (google_map) google_map.setCenter(new google.maps.LatLng($('#station_lat').text(), $('#station_lng').text()));
      });
    },
    function(error) {
      console.log('error locating');
    }, {timeout: 5000});

  }

  //-------------------------

  //graph();

  function graph() {

    $.get('/data/station-data/25/sun_hours/', function(data) {

      data = JSON.parse(data);

      var duration = 100;

      var margin = {top: 6, right: 0, bottom: 25, left: 40},
          width = $(window).width() - margin.right,
          height = ($(window).height() / 5) - margin.top - margin.bottom;

      var count = data.length;
      var start = new Date(data[0].station_data_year, data[0].station_data_month);
      var end = new Date(data[11].station_data_year, data[11].station_data_month);

      var x = d3.time.scale()
          .domain([start, end])
          .range([0, width]);

      var y = d3.scale.linear()
          .domain([0, d3.max(data, function(d) { return d.station_data_sun_hours; })])
          .range([height, 0]);

      var line = d3.svg.line()
          .interpolate("basis")
          .x(function(d, i) { return x(start - (count - 1 - i) * duration); })
          .y(function(d, i) { return y(d.station_data_sun_hours); });

      var svg = d3.select("#graphs").append("p").append("svg")
          .attr("width", width + margin.left + margin.right)
          .attr("height", height + margin.top + margin.bottom)
          .style("margin-left", -margin.left + "px")
        .append("g")
          .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

      svg.append("defs").append("clipPath")
          .attr("id", "clip")
        .append("rect")
          .attr("width", width)
          .attr("height", height);

      var axis = svg.append("g")
          .attr("class", "x axis")
          .attr("transform", "translate(0," + height + ")")
          .call(x.axis = d3.svg.axis().scale(x).orient("bottom"));

      var path = svg.append("g")
          .attr("clip-path", "url(#clip)")
        .append("path")
          .data([data])
          .attr("class", "line");

      var c = 0;
      tick();

      function tick() {

        ++c;

        // update the domains
        now = new Date();
        x.domain([new Date(data[c].station_data_year, data[c].station_data_month), new Date(data[c+12].station_data_year, data[c+12].station_data_month)]);

        // redraw the line
        svg.select(".line")
            .attr("d", line)
            .attr("transform", null);

        // slide the x-axis left
        axis.transition()
            .duration(duration)
            .ease("linear")
            .call(x.axis);

        // slide the line left
        path.transition()
            .duration(duration)
            .ease("linear")
            .attr("transform", "translate(" + x(start - (count - 1) * duration) + ")")
            .each("end", tick);

        // pop the old data point off the front
        data.shift();

      }

    });

  }

});
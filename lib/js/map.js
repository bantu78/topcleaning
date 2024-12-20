$(document).ready(() => {
  latitude = "-4.254711928119066";
  longitude = "15.276762792759628";

  if (document.getElementById('map_container')) {
      var map = L.map("map_container", {
          center: [latitude, longitude],
          zoom: 13,
          dragging: false, // Disable dragging
          zoomControl: false, // Disable zoom control
          scrollWheelZoom: false, // Disable scroll wheel zoom
          doubleClickZoom: false, // Disable double click zoom
          boxZoom: false, // Disable box zoom
          tap: false // Disable tap zoom for mobile
      });

      L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
          maxZoom: 19,
          attribution:
              '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
      }).addTo(map);

      L.marker([latitude, longitude], {
          title: "Top Cleaning",
      })
          .bindPopup(
              `<span class="popup" >
                  <b>Top Cleaning</b><br>
                  <p> 30 Rue Djambala Moungali</p>
                  <p>   <a href="tel:242068328553">06-832-85-53</a></p>
                  <img src="img/as.jpg" style="width:100%">
              </span>`
          )
          .addTo(map);
  }
});

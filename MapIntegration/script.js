

var map = L.map('map');
var osmUrl='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
var osm = new L.TileLayer(osmUrl);
map.setView([47.750839, 7.335888], 11); //centre de la carte : [latitude, longitude], zoom
map.addLayer(osm);

// pour ajouter un marqueur
var marker = L.marker([47.750839, 7.335888]).addTo(map);
//  pour supprimer un marqueur :  map.removeLayer(marker);

//on ajoute un pop-up
var popup = L.popup();
popup.setLatLng([47.750839, 7.035888]);
popup.setContent("A cote de Mulhouse<br>blablabla");
popup.openOn(map);
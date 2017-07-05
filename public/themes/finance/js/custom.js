jQuery(function($) {
	$(document).ready(function(){

		var slideHeight = $(window).height()-70 ;
		$('#calinogCarousel.carousel').css('height',slideHeight);
		$('#calinogCarousel.carousel .item').css('height',slideHeight);
		$('#calinogCarousel.carousel .item img').css('height',slideHeight);
		$('#homeAbout').css('height',slideHeight+70);
		$('.bg-fade-right').css('height',slideHeight+70);
		$('#map').css('height', (slideHeight/2)+70);
	});



	// MAP Scripts

	// var panorama;

	// function initMap() {
	// var calinogruralbank = {lat: 10.7003348, lng: 122.5579173};

	// // Set up the map
	// var map = new google.maps.Map(document.getElementById('map'), {
	//   center: calinogruralbank,
	//   zoom: 18,
	//   streetViewControl: false
	// });

	// // Set up the markers on the map
	// var cafeMarker = new google.maps.Marker({
	// 	// 10.7003348,122.5579173
	//     position: {lat: 10.7003348, lng: 122.5579173},
	//     map: map,
	//     icon: 'https://chart.apis.google.com/chart?chst=d_map_pin_icon&chld=cafe|FFFF00',
	//     title: 'Cafe'
	// });


	// // We get the map's default panorama and set up some defaults.
	// // Note that we don't yet set it visible.
	// panorama = map.getStreetView();
	// panorama.setPosition(calinogruralbank);
	// panorama.setPov(/** @type {google.maps.StreetViewPov} */({
	//   heading: 265,
	//   pitch: 0
	// }));
	// }

	// function toggleStreetView() {
	// var toggle = panorama.getVisible();
	// if (toggle == false) {
	//   panorama.setVisible(true);
	// } else {
	//   panorama.setVisible(false);
	// }
	// }
	// end MAP script

});


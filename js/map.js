/* 
Title: Google Map Javascript 
Author: Travis Caro
Course: CIS 370
Description: Initialize and configure google map API
 */

 $(window).load(
 		function(){

			//Map requires two args
			//first container element
			//second mapOptions

			var mapContain = document.getElementById('map-view');
			var mapOptions = {
				center: new google.maps.LatLng(39.8848364,-105.7695201),
				zoom: 15,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};

			var map = new google.maps.Map(mapContain,mapOptions);

 		}

 	);
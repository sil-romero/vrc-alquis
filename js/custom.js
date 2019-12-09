/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Set Header
3. Init Menu
4. Init Home Slider
5. Init Google Map
6. Init Testimonials Slider


******************************/

$(document).ready(function()
{
	"use strict";

	/* 

	1. Vars and Inits

	*/

	var header = $('.header');
	var map;

	initMenu();
	initHomeSlider();
	initGoogleMap();
	initTestSlider();
	

	setHeader();

	$(window).on('resize', function()
	{
		setHeader();

		setTimeout(function()
		{
			$(window).trigger('resize.px.parallax');
		}, 375);
	});

	$(document).on('scroll', function()
	{
		setHeader();
	});

	/* 

	2. Set Header

	*/

	function setHeader()
	{
		if($(window).scrollTop() > 91)
		{
			header.addClass('scrolled');
		}
		else
		{
			header.removeClass('scrolled');
		}
	}

	/* 

	3. Init Menu

	*/

	function initMenu()
	{
		if($('.menu').length && $('.hamburger').length)
		{
			var menu = $('.menu');
			var hamburger = $('.hamburger');
			var close = $('.menu_close');
			var superOverlay = $('.super_overlay');

			hamburger.on('click', function()
			{
				menu.toggleClass('active');
				superOverlay.toggleClass('active');
			});

			close.on('click', function()
			{
				menu.toggleClass('active');
				superOverlay.toggleClass('active');
			});

			superOverlay.on('click', function()
			{
				menu.toggleClass('active');
				superOverlay.toggleClass('active');
			});
		}
	}

	/* 

	4. Init Home Slider

	*/

	function initHomeSlider()
	{
		if($('.home_slider').length)
		{
			var homeSlider = $('.home_slider');
			homeSlider.owlCarousel(
			{
				items:1,
				autoplay:true,
				autoplayTimeout:8000,
				loop:true,
				dots:false,
				nav:false,
				mouseDrag:false,
				smartSpeed:1200
			});

			if($('.home_slider_nav').length)
			{
				var next = $('.home_slider_nav');
				next.on('click', function()
				{
					homeSlider.trigger('next.owl.carousel');
				});
			}
		}
	}

	/* 

	5. Init Google Map

	*/

	/* esta funcion te trae un lugar por defecto */
	function initGoogleMap()
	{
		var myLatlng = new google.maps.LatLng(-26.1833, -58.1833);
    	var mapOptions = 
    	{
    		center: myLatlng,
	       	zoom: 14,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			draggable: true,

			/* se modifico a true */
			scrollwheel: true,
			zoomControl: false,
			zoomControlOptions:
			{
				position: google.maps.ControlPosition.RIGHT_CENTER
			},
			mapTypeControl: false,
			scaleControl: false,
			streetViewControl: false,
			rotateControl: false,
			fullscreenControl: false,
			styles:
			[
			  {
			    "featureType": "road.highway",
			    "elementType": "geometry.fill",
			    "stylers": [
			      {
			        "color": "#ffeba1"
			      }
			    ]
			  }
			]
    	}

    	// Initialize a map with options
    	map = new google.maps.Map(document.getElementById('map'), mapOptions);

		// Re-center map after window resize
		google.maps.event.addDomListener(window, 'resize', function()
		{
			setTimeout(function()
			{
				google.maps.event.trigger(map, "resize");
				map.setCenter(myLatlng);
			}, 1400);
		});

		function newLocation(newLat, newLng)
		{
			map.setCenter(
			{
				lat : newLat,
				lng : newLng
			});
		}
		//colocamos una peticion ajax para traer los marcadores y crear marcadores dentro de googlemaps

		

		var locationList = $('.location_contaner');
		locationList.each(function()
		{
			var loc = $(this);
			loc.on('click', function()
			{
				var newLat = loc.data('lat');
				var newLng = loc.data('lng');
				newLocation(newLat, newLng);
				/* se crea un objeto cuyo valores le asignamos nuevalat y nuevalong  */
				var formData=new FormData();
				formData.append('latitud',newLat);
				formData.append('longitud',newLng);
				$.ajax({
		            url: 'ajax/listar_marcadores_localidad.php',
		            type: 'post',
		            data: formData,
		            contentType: false,
		            processData: false,
		            success: function (response){
		            	console.log(response);
					let marcadores= JSON.parse(response);
					/* recibimos marcadores  */
		            marcadores.forEach(element => {
		               var marker = new google.maps.Marker({
							/* y por cada marcador lo mostramos en el mapa */
					            position: {lat:parseFloat(element.latitud),lng:parseFloat(element.longitud)},
								map: map
								
					        });

		            });

		            },

		            error: function () {
		                alert('Publicación no exitosa');
		            }
		        });
				
			});
				
		});
	}
	
		
	
	/* 

	6. Init Testimonials Slider

	*/

	function initTestSlider()
	{
		if($('.test_slider').length)
		{
			var testSlider = $('.test_slider');
			testSlider.owlCarousel(
			{
				items:1,
				autoplay:true,
				autoplayHoverPause:true,
				loop:true,
				nav:false,
				dots:true,
				smartSpeed:1200
			});
		}
	}


	

});
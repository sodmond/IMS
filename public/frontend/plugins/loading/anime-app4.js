jQuery(document).ready(function() {
	'use strict';
	// Wrap every letter in a span
	$('.ml1 .letters').each(function(){
	  $(this).html($(this).text().replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>"));
	});

	anime.timeline({loop: true})
	  .add({
		targets: '.ml1 .letter',
		scale: [0.3,1],
		opacity: [0,1],
		translateZ: 0,
		easing: "easeOutExpo",
		duration: 600,
		delay: function(el, i) {
		  return 70 * (i+1)
		}
	  }).add({
		targets: '.ml1 .line',
		scaleX: [0,1],
		opacity: [0.5,1],
		easing: "easeOutExpo",
		duration: 700,
		offset: '-=875',
		delay: function(el, i, l) {
		  return 80 * (l - i);
		}
	  }).add({
		targets: '.ml1',
		opacity: 0,
		duration: 1000,
		easing: "easeOutExpo",
		delay: 1000
	  });
	
	// Wrap every letter in a span
	$('.ml2').each(function(){
	  $(this).html($(this).text().replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>"));
	});

	anime.timeline({loop: true})
	  .add({
		targets: '.ml2 .letter',
		scale: [4,1],
		opacity: [0,1],
		translateZ: 0,
		easing: "easeOutExpo",
		duration: 950,
		delay: function(el, i) {
		  return 70*i;
		}
	  }).add({
		targets: '.ml2',
		opacity: 0,
		duration: 1000,
		easing: "easeOutExpo",
		delay: 1000
	  });
	
	// Wrap every letter in a span
	$('.ml3').each(function(){
	  $(this).html($(this).text().replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>"));
	});

	anime.timeline({loop: true})
	  .add({
		targets: '.ml3 .letter',
		opacity: [0,1],
		easing: "easeInOutQuad",
		duration: 2250,
		delay: function(el, i) {
		  return 150 * (i+1)
		}
	  }).add({
		targets: '.ml3',
		opacity: 0,
		duration: 1000,
		easing: "easeOutExpo",
		delay: 1000
	  });
	  
	  var ml4 = {};
	ml4.opacityIn = [0,1];
	ml4.scaleIn = [0.2, 1];
	ml4.scaleOut = 3;
	ml4.durationIn = 800;
	ml4.durationOut = 600;
	ml4.delay = 500;

	anime.timeline({loop: true})
	  .add({
		targets: '.ml4 .letters-1',
		opacity: ml4.opacityIn,
		scale: ml4.scaleIn,
		duration: ml4.durationIn
	  }).add({
		targets: '.ml4 .letters-1',
		opacity: 0,
		scale: ml4.scaleOut,
		duration: ml4.durationOut,
		easing: "easeInExpo",
		delay: ml4.delay
	  }).add({
		targets: '.ml4 .letters-2',
		opacity: ml4.opacityIn,
		scale: ml4.scaleIn,
		duration: ml4.durationIn
	  }).add({
		targets: '.ml4 .letters-2',
		opacity: 0,
		scale: ml4.scaleOut,
		duration: ml4.durationOut,
		easing: "easeInExpo",
		delay: ml4.delay
	  }).add({
		targets: '.ml4 .letters-3',
		opacity: ml4.opacityIn,
		scale: ml4.scaleIn,
		duration: ml4.durationIn
	  }).add({
		targets: '.ml4 .letters-3',
		opacity: 0,
		scale: ml4.scaleOut,
		duration: ml4.durationOut,
		easing: "easeInExpo",
		delay: ml4.delay
	  }).add({
		targets: '.ml4',
		opacity: 0,
		duration: 500,
		delay: 500
	  });
	  
	  anime.timeline({loop: true})
	  .add({
		targets: '.ml5 .line',
		opacity: [0.5,1],
		scaleX: [0, 1],
		easing: "easeInOutExpo",
		duration: 700
	  }).add({
		targets: '.ml5 .line',
		duration: 600,
		easing: "easeOutExpo",
		translateY: function(e, i, l) {
		  var offset = -0.625 + 0.625*2*i;
		  return offset + "em";
		}
	  }).add({
		targets: '.ml5 .ampersand',
		opacity: [0,1],
		scaleY: [0.5, 1],
		easing: "easeOutExpo",
		duration: 600,
		offset: '-=600'
	  }).add({
		targets: '.ml5 .letters-left',
		opacity: [0,1],
		translateX: ["0.5em", 0],
		easing: "easeOutExpo",
		duration: 600,
		offset: '-=300'
	  }).add({
		targets: '.ml5 .letters-right',
		opacity: [0,1],
		translateX: ["-0.5em", 0],
		easing: "easeOutExpo",
		duration: 600,
		offset: '-=600'
	  }).add({
		targets: '.ml5',
		opacity: 0,
		duration: 1000,
		easing: "easeOutExpo",
		delay: 1000
	  });
	  
	  // Wrap every letter in a span
	$('.ml6 .letters').each(function(){
	  $(this).html($(this).text().replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>"));
	});

	anime.timeline({loop: true})
	  .add({
		targets: '.ml6 .letter',
		translateY: ["1.1em", 0],
		translateZ: 0,
		duration: 750,
		delay: function(el, i) {
		  return 50 * i;
		}
	  }).add({
		targets: '.ml6',
		opacity: 0,
		duration: 1000,
		easing: "easeOutExpo",
		delay: 1000
	  });
	  
	  // Wrap every letter in a span
		$('.ml7 .letters').each(function(){
		  $(this).html($(this).text().replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>"));
		});

		anime.timeline({loop: true})
		  .add({
			targets: '.ml7 .letter',
			translateY: ["1.1em", 0],
			translateX: ["0.55em", 0],
			translateZ: 0,
			rotateZ: [180, 0],
			duration: 750,
			easing: "easeOutExpo",
			delay: function(el, i) {
			  return 50 * i;
			}
		  }).add({
			targets: '.ml7',
			opacity: 0,
			duration: 1000,
			easing: "easeOutExpo",
			delay: 1000
		  });
	  
	  // Wrap every letter in a span
	$('.ml9 .letters').each(function(){
	  $(this).html($(this).text().replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>"));
	});

	anime.timeline({loop: true})
	  .add({
		targets: '.ml9 .letter',
		scale: [0, 1],
		duration: 1500,
		elasticity: 600,
		delay: function(el, i) {
		  return 45 * (i+1)
		}
	  }).add({
		targets: '.ml9',
		opacity: 0,
		duration: 1000,
		easing: "easeOutExpo",
		delay: 1000
	  });
});
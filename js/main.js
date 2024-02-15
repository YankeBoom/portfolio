/* ================= MOBILE NAV ========================= */
const mobileNavButton = document.querySelector('.mobile-nav-button');
const mobileNavIcon = document.querySelector('.mobile-nav-button__icon');
const mobileNav = document.querySelector('.mobile-nav');

mobileNavButton.addEventListener('click', function () {
	mobileNavIcon.classList.toggle('active');
	mobileNav.classList.toggle('active');
	document.body.classList.toggle('no-scroll');
});

/* ================= VIDEO ========================= */
const videoBtn = document.querySelector('#video-appointment-btn');
const videoBtnIcon = document.querySelector('#video-appointment-btn-icon');
const videoOverlay = document.querySelector('#video-appointment-overlay');
const videoFile = document.querySelector('#video-appointment');

videoBtn.addEventListener('click', function () {

	function toggleOverlay(event){
		if (event.type === 'mouseleave') {
			videoOverlay.classList.add('hidden');
		} else {
			videoOverlay.classList.remove('hidden');
		}
	}

	if (videoFile.paused) {
		videoFile.play();
		videoBtnIcon.src = './img/appointment/pause-white.svg';

		videoOverlay.onmouseleave = toggleOverlay;
		videoOverlay.onmouseenter = toggleOverlay;

	} else {
		videoFile.pause();
		videoBtnIcon.src = './img/appointment/play-white.svg';
		videoOverlay.onmouseleave = null;
		videoOverlay.onmouseenter = null;

	}

})

let swiperPortfolio = new Swiper('.slider__container', {
    cssMode: true,
    loop: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    
  });

  function scrollUp(){
    const scrollUp = document.getElementById('scroll-up');
    // When the scroll is higher than 560 viewport height, add the show-scroll class to the a tag with the scroll-top class
    if(this.scrollY >= 560) scrollUp.classList.add('show-scroll'); else scrollUp.classList.remove('show-scroll')
}
window.addEventListener('scroll', scrollUp);


/* myLib start */
;(function() {
	window.myLib = {};
  
	window.myLib.body = document.querySelector('body');
  
	window.myLib.closestAttr = function(item, attr) {
	  var node = item;
  
	  while(node) {
		var attrValue = node.getAttribute(attr);
		if (attrValue) {
		  return attrValue;
		}
  
		node = node.parentElement;
	  }
  
	  return null;
	};
  
	window.myLib.closestItemByClass = function(item, className) {
	  var node = item;
  
	  while(node) {
		if (node.classList.contains(className)) {
		  return node;
		}
  
		node = node.parentElement;
	  }
  
	  return null;
	};
  
	window.myLib.toggleScroll = function() {
	  myLib.body.classList.toggle('no-scroll');
	};
  })();
  /* myLib end */
  
  /* popup start */
  ;(function() {
	var showPopup = function(target) {
	  target.classList.add('is-active');
	};
  
	var closePopup = function(target) {
	  target.classList.remove('is-active');
	};
  
	myLib.body.addEventListener('click', function(e) {
	  var target = e.target;
	  var popupClass = myLib.closestAttr(target, 'data-popup');
  
	  if (popupClass === null) {
		return;
	  }
  
	  e.preventDefault();
	  var popup = document.querySelector('.' + popupClass);
  
	  if (popup) {
		showPopup(popup);
		myLib.toggleScroll();
	  }
	});
  
	myLib.body.addEventListener('click', function(e) {
	  var target = e.target;
  
	  if (target.classList.contains('popup-close') ||
		  target.classList.contains('popup__inner')) {
			var popup = myLib.closestItemByClass(target, 'popup');
  
			closePopup(popup);
			myLib.toggleScroll();
	  }
	});
  
	myLib.body.addEventListener('keydown', function(e) {
	  if (e.keyCode !== 27) {
		return;
	  }
  
	  var popup = document.querySelector('.popup.is-active');
  
	  if (popup) {
		closePopup(popup);
		myLib.toggleScroll();
	  }
	});
  })();
  
  /* popup end */

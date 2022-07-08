import Plyr from 'plyr';

export default {
  init() {
    // JavaScript to be fired on all pages

    window.homepagecheck = function() {
      var check = false;
      if(document.location.pathname === '/'){
        check=true;
        }
      return check;
    }
        
    // Scroll ID(anchor) to animation

        let theLanguage = $('html').attr('lang');
        console.log(theLanguage);
        // to top right away
        if ( window.location.hash ) scroll(0,0);
        // void some browsers issue
        setTimeout( function() { scroll(0,0); }, 1);

            if(window.homepagecheck()){
              if (theLanguage == 'en-GB') {
                    $('a[href*="#"]').on('click', function(e) {
                        e.preventDefault();
                        var strA = $(this).attr('href');
                        strA = strA.replace('/', '');
                        $('html, body').animate({
                            scrollTop: $(strA).offset().top + 'px',
                        }, 1000, 'swing');
                  });
                } else if (theLanguage == 'fr-FR') {
                  console.log(theLanguage);
                    $('a[href*="#"]').on('click', function(e) {
                        e.preventDefault();
                        var strA = $(this).attr('href');
                        strA = strA.replace('/fr/home-francais/', '');
                        $('html, body').animate({
                            scrollTop: $(strA).offset().top + 'px',
                        }, 1000, 'swing');
                  });
                }
              } 

            // your current click function
            $('a[href^="#"]').on('click', function(e) {
                e.preventDefault();
                var strA = $(this).attr('href');
                $('html, body').animate({
                    scrollTop: $(strA).offset().top + 'px',
                }, 1000, 'swing');
            });
            
            // *only* if we have anchor on the url
            if(window.location.hash) {

                // smooth scroll to the anchor id
                $('html, body').animate({
                    scrollTop: ($(window.location.hash).offset().top - 50 ) + 'px',
                }, 1000, 'swing');
            }

    // mobile menu

    $('.menu__toggle').on('click', () => {
      $('.nav-primary').addClass('active');
      $('body').addClass('bodyOverlay');
    })

    $('.closeMenu').on('click', () => {
      $('.nav-primary').removeClass('active');
      $('body').removeClass('bodyOverlay');
    })

    $('.menu-item a').on('click', () => {
      $('.nav-primary').removeClass('active');
      $('body').removeClass('bodyOverlay');
    })

    $('.nav-primary .btn--round').on('click', () => {
      $('.nav-primary').removeClass('active');
      $('body').removeClass('bodyOverlay');
    })
        
    // FAQ toggle

    $('.faq__q').click(function () {
        $(this).next().slideToggle('fast');
        $(this).toggleClass('faq_active');
    });
        
    // Custom HTML 5 player for vimeo

    // Video popup

    const player = new Plyr('#player', {
      autoplay: false,
    });  
  
    $('.videoBtn').on('click', () => {
      $('#vimeoPopup').fadeIn();

      player.init();
    })

    $('#closePopup').on('click', () => {
      $('#vimeoPopup').fadeOut();
      player.stop();
    })

    // Map click insert in select of gravity forms

      window.toForm = function(e) {
        let dateOption = e.id;
        $('.gfield_select > option').each(function(){
            let thisOptionValue = $(this).val();
            if (thisOptionValue == dateOption) {
              $(this).prop('selected', true);
          }
        });

          $('html, body').stop().animate(
            {
              scrollTop: $('#booking-element').offset().top - 100,
            }, 1000, 'swing');
       
      }
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};

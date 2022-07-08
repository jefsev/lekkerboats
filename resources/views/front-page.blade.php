@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @group('page_hero')
        <section class="container page__hero flex-it f-row f-just-between f-align-center">
            @group('left')
            <div class="hero__text">
                <h1>@sub('title_h1')</h1>
                <h2>@sub('title_h2')</h2>
                <p>@sub('text')</p>
                <div class="btn__row flex-it f-row f-just-start">
                    @hassub('btn_black')
                    <div class="btn btn--black">
                        <a href="@sub('btn_black', 'url')">@sub('btn_black', 'title')</a>
                    </div>
                    @endsub
                    @hassub('btn_border')
                    <div class="btn btn--border">
                        <a href="@sub('btn_border', 'url')">@sub('btn_border', 'title')</a>
                    </div>
                    @endsub
                </div>
            </div>
            @endgroup
            @group('right')
            <div class="hero__img">
                <img src="@sub('image', 'url')" alt="@sub('image', 'alt')">
            </div>
            @endgroup
        </section>
    @endgroup

    @layouts('flexible')

        @layout('google_map')

        <section class="container__locations" id="location-element">
            <div class="container">
                <div class="map__intro">
                    <h2>@sub('map_title')</h2>
                    @sub('map_intro')
                </div>

                <div class="wrap__map">
                    <style>
                        #map {
                            height: 525px;
                            width: 100%;
                        }
                
                        .infowindow b {
                            color: #000;
                            font-weight: 700;
                        }

                        .infowindow .marker-link {
                            cursor: pointer;
                            text-decoration: underline;
                        }
                
                        #legend {
                            font-family: Arial, sans-serif;
                            background: #fff;
                            margin: 10px;
                            border-radius: 5px;
                        }
                
                        #legend h4 {
                            font-size: 14px;
                            margin-bottom: 5px;
                            margin-top: 0;
                        }
                
                        #legend p {
                            margin-bottom: 5px;
                            margin-top: 0;
                            font-size: 12px;
                            line-height: 14px;
                        }
                
                        #legend a {
                            text-decoration: none;
                            padding: 8px 10px;
                            display: block;
                        }
                
                        #legend a:hover {
                            transition: .3s ease;
                            background: #ededed;
                        }

                        @media screen and (max-width: 767px) {
                            #legend a {
                                text-decoration: none;
                                padding: 5px;
                                display: block;
                                max-width: 150px;
                            }

                            #legend h4 {
                                font-size: 12px;
                                margin-bottom: 5px;
                                margin-top: 0;
                            }
                    
                            #legend p {
                                margin-bottom: 5px;
                                margin-top: 0;
                                font-size: 10px;
                                line-height: 12px;
                            }
                        }

                        </style>
                        <div id="map"></div>
                        <div id="legend">
                            @fields("locations_dates")
                            <a href="#booking-element" class="legendLoc" data-loc="@sub('latitude-langitude')" id="@sub('location_date')" onclick="toForm(this)">
                                <h4>@sub('location_name')</h4>
                                <p>@sub('location_date')</p>
                            </a>
                            @endfields
                        </div>
                        <script>
                        
                        var map;

                        const locations = [];
                        const legendLocs = document.querySelectorAll('.legendLoc');
                        const currentUrl = window.location.origin;

                        legendLocs.forEach(loci => {
                            let latlang = loci.dataset.loc;
                            latlang = latlang.split(',');
                            let lat = latlang[0];
                            let lang = latlang[1];

                            let locName = loci.querySelector('h4').innerText;
                            let locDate = loci.querySelector('p').innerText;

                            
                            let obj = [];
                                // An array of keys
                            var keys = ['lat', 'lng', 'name', 'date', 'mapLink'];
                            
                            // An array of values
                            var values = [lat, lang, locName, locDate, '#booking-element'];

                            for(var i = 0; i < keys.length; i++){
                                obj[keys[i]] = values[i];
                            }

                            locations.push(obj);

                        });
                
                        const france = {
                            lat: 43.5125636,
                            lng: 6.2627197
                        };
                
                        function initMap() {
                
                            const infowindow = new google.maps.InfoWindow();
                
                            const map = new google.maps.Map(
                                document.getElementById('map'), {
                                    center: new google.maps.LatLng(france),
                                    zoom: 8,
                                    mapTypeControl: false
                                });
                
                            const custom_icon = currentUrl + "/wp-content/themes/lekker/resources/assets/images/locpin.svg";
                            // Create markers.
                
                            function placeMarker(loc) {
                                const marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(loc.lat, loc.lng),
                                    icon: custom_icon,
                                    map: map
                                });
                                google.maps.event.addListener(marker, 'click', function() {
                                    infowindow.close(); // Close previously opened infowindow
                                    infowindow.setContent(
                                        `<div class="infowindow"><b>${loc.name}</b><br><span>${loc.date}</span><br><span class="marker-link" onclick="toForm(this)" id="${loc.date}">BOOK A BOAT</span> </div>`
                                    );
                                    infowindow.open(map, marker);
                                });
                            }
                            // ITERATE ALL LOCATIONS. Pass every location to placeMarker
                            locations.forEach(placeMarker);
                
                            var legend = document.getElementById('legend');
                
                            map.controls[google.maps.ControlPosition.LEFT_TOP].push(legend);
                        }
                        </script>
                        <script
                            src="https://maps.googleapis.com/maps/api/js?key=xxxx-xxxx-xxxx-xxxx&callback=initMap&language=EN&region=FR"
                            async defer></script>
                </div>

                @hassub('btn_black')
                    <div class="btn btn--black">
                        <a href="@sub('btn_black', 'url')">@sub('btn_black', 'title')</a>
                    </div>
                @endsub
            </div>
        </section>

        @endlayout

        @layout('booking_form')

        <section class="container__booking-form">
            @group('booking_form')
            <div class="container form__content" id="booking-element">
                <div class="wrap">
                    <h2>@sub('title')</h2>
                    <p>@sub('text')</p>

                    @php
                        $shortcode = get_sub_field('form_shortcode');
                    @endphp

                    @shortcode($shortcode)
                </div>
            </div>
            @endgroup

            <div class="background flex-it f-row f-just-between f-align-center f-wrap-r">
                <div class="background__grey-skew"></div>
                <div class="background__video">
                    @group('booking_video')
                        <video autoplay="" muted="" loop="" preload="auto" loading="lazy" poster="" playsinline="true" id="bgVideo"> 
                            <source class="inner__video" src="@sub('video_mp4', 'url')" type="video/mp4">
                        </video>
                    @endgroup
                </div>
            </div>
        </section>

        @endlayout

        @layout('faq')

            <section class="container__faq" id="faq-element">
                <h2>@sub('title')</h2>
                <div class="wrap__faqs">
                    @php
                        $i = 1
                    @endphp
                    @fields('faqs')
                        <h3 class="faq__q <?php if($i == 1) {?> faq_active <?php } ?>">@sub('question')
                            <img src="@asset('images/faq-arrow.svg')" alt="">
                        </h3>
                        <div class="faq__a">@sub('answer')</div>
                        @php
                            $i++;
                        @endphp
                    @endfields
                </div>
            </section>

        @endlayout

        @layout('discover')

            <section class="container__discover container flex-it f-row f-just-end f-align-center">
                <img class="bg__img" src="@sub('image', 'url')" alt="@sub('image', 'alt')">

                @group('text')
                <div class="discover__card" id="discover-element">
                    <h2>@sub('title')</h2>
                    <p>@sub('text')</p>
                    <span class="btn btn--white btn--icon videoBtn">
                        <span class="flex-it f-row f-just-center f-align-center">@sub('popup_btn_text')
                            <img src="@asset('images/play-black.svg')" alt="">
                        </span>
                    </span>
                </div>
                @endgroup

            </section>

            @group('text')
            <div class="vimeo__popup" id="vimeoPopup">
                <div class="popup__holder">
                    <img src="@asset('images/close-circle.svg')" alt="" class="close" id="closePopup">
                    <div class="plyr__video-embed" id="player">
                        <iframe
                          src="@sub('vimeo_link')"
                          allowfullscreen
                          allowtransparency
                        ></iframe>
                      </div>

                </div>
            </div>
            @endgroup

        @endlayout

    @endlayouts

  @endwhile
@endsection

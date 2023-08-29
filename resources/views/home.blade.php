@extends('common.layouts.app', [
    'page' => __('Home'),
    'homeFor' => config('constants.userType.parent'),
])

@section('header_content')
    <div class="main-header clearfix" role="header">
        <div class="logo">
            <a href="{{ route('home') }}"  style="text-decoration: none;"><em>My</em>Uni</a>
        </div>
        <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
        <nav id="menu" class="main-nav" role="navigation">
            <ul class="main-menu">
                <li><a href="{{ route('common.colleges') }}">Colleges</a></li>
                <li><a href="{{ route('common.courses') }}">Courses</a></li>
                <li><a href="{{ route('common.exams')}}">Entrance Exams</a></li>
                <li> <a href="{{ route('common.signup') }}">Admission Form 2023</a></li>
                <li> <a href="{{ route('common.signin') }}">Login</a></li>
            </ul>
        </nav>
    </div>
@endsection
@section('content')
    <section class="section main-banner" id="top" data-section="section1">
        <video autoplay muted loop id="bg-video">
            <source src="{{ asset('assets/img/course-video.mp4') }}" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
                <h6>Graduate School of Management</h6>
                <h2><em>Your</em> Classroom</h2>
                <div class="main-button">
                    <div class="scroll-to-section"><a href="#section2">Discover more</a></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Main Banner Area End ***** -->


    <section class="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="features-post">
                        <div class="features-content">
                            <div class="content-show">
                                <h4><i class="fa fa-pencil"></i>All Courses</h4>
                            </div>
                            <div class="content-hide">
                                <p>Curabitur id eros vehicula, tincidunt libero eu, lobortis mi. In mollis eros a posuere
                                    imperdiet. Donec maximus elementum ex. Cras convallis ex rhoncus, laoreet libero eu,
                                    vehicula libero.</p>
                                <p class="hidden-sm">Curabitur id eros vehicula, tincidunt libero eu, lobortis mi. In mollis
                                    eros a posuere imperdiet.</p>
                                <div class="scroll-to-section"><a href="#section2">More Info.</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="features-post second-features">
                        <div class="features-content">
                            <div class="content-show">
                                <h4><i class="fa fa-graduation-cap"></i>Virtual Class</h4>
                            </div>
                            <div class="content-hide">
                                <p>Curabitur id eros vehicula, tincidunt libero eu, lobortis mi. In mollis eros a posuere
                                    imperdiet. Donec maximus elementum ex. Cras convallis ex rhoncus, laoreet libero eu,
                                    vehicula libero.</p>
                                <p class="hidden-sm">Curabitur id eros vehicula, tincidunt libero eu, lobortis mi. In mollis
                                    eros a posuere imperdiet.</p>
                                <div class="scroll-to-section"><a href="#section3">Details</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="features-post third-features">
                        <div class="features-content">
                            <div class="content-show">
                                <h4><i class="fa fa-book"></i>Real Meeting</h4>
                            </div>
                            <div class="content-hide">
                                <p>Curabitur id eros vehicula, tincidunt libero eu, lobortis mi. In mollis eros a posuere
                                    imperdiet. Donec maximus elementum ex. Cras convallis ex rhoncus, laoreet libero eu,
                                    vehicula libero.</p>
                                <p class="hidden-sm">Curabitur id eros vehicula, tincidunt libero eu, lobortis mi. In mollis
                                    eros a posuere imperdiet.</p>
                                <div class="scroll-to-section"><a href="#section4">Read More</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section courses" data-section="section4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Our Courses</h2>
                    </div>
                </div>
                <div class="owl-carousel owl-theme">
                    <?php $n = 1; ?>
                    @foreach ($courses as $course)
                        <div class="item">
                            <img style="height: 197px" src="{{ asset('assets/img/courses-0' . $n . '.jpg') }}" alt="Course #1">
                            <div class="down-content">
                                <h4>{{ $course->name }}</h4>
                                <p><?php
                                $words = explode(' ', $course->description);
                                $maxWords = 20; 
                                $shortDescription = implode(' ', array_slice($words, 0, $maxWords)); // Adjust the number of words as needed
                                if (count($words) > $maxWords) {
                                    $shortDescription .= '...';
                                }
                                echo $shortDescription;
                                ?></p>
                                <div class="text-button-pay">
                                    <a href="{{ route('common.courseinfo', $course->id) }}">More Info<i
                                            class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php $n++; ?>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="section why-us" data-section="section2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Why choose Grad School?</h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div id='tabs'>
                        <ul>
                            <li><a href='#tabs-1'>Best Education</a></li>
                            <li><a href='#tabs-2'>Top Management</a></li>
                            <li><a href='#tabs-3'>Quality Meeting</a></li>
                        </ul>
                        <section class='tabs-content'>
                            <article id='tabs-1'>
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="{{ asset('assets/img/choose-us-image-01.png') }}" alt="">
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Best Education</h4>
                                        <p>Grad School is free educational HTML template with Bootstrap 4.5.2 CSS layout.
                                            Feel free to use it for educational or commercial purposes. You may want to make
                                            <a href="https://paypal.me/templatemo" target="_parent" rel="sponsored">a little
                                                donation</a> to TemplateMo. Please tell your friends about us. Thank you.
                                        </p>
                                    </div>
                                </div>
                            </article>
                            <article id='tabs-2'>
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="{{ asset('assets/img/choose-us-image-02.png') }}" alt="">
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Top Level</h4>
                                        <p>You can modify this HTML layout by editing contents and adding more pages as you
                                            needed. Since this template has options to add dropdown menus, you can put many
                                            HTML pages.</p>
                                        <p>Suspendisse tincidunt, magna ut finibus rutrum, libero dolor euismod odio, nec
                                            interdum quam felis non ante.</p>
                                    </div>
                                </div>
                            </article>
                            <article id='tabs-3'>
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="{{ asset('assets/img/choose-us-image-03.png') }}" alt="">
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Quality Meeting</h4>
                                        <p>You are NOT allowed to redistribute this template ZIP file on any template
                                            collection website. However, you can use this template to convert into a
                                            specific theme for any kind of CMS platform such as WordPress. For more
                                            information, you shall <a rel="nofollow" href="https://templatemo.com/contact"
                                                target="_parent">contact TemplateMo</a> now.</p>
                                    </div>
                                </div>
                            </article>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section coming-soon" data-section="section3">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-xs-12">
                    <div class="continer centerIt">
                        <div>
                            <h4>Take <em>any online course</em> and win $326 for your next class</h4>
                            <div class="counter">

                                <div class="days">
                                    <div class="value">00</div>
                                    <span>Days</span>
                                </div>

                                <div class="hours">
                                    <div class="value">00</div>
                                    <span>Hours</span>
                                </div>

                                <div class="minutes">
                                    <div class="value">00</div>
                                    <span>Minutes</span>
                                </div>

                                <div class="seconds">
                                    <div class="value">00</div>
                                    <span>Seconds</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="right-content">
                        <div class="top-content">
                            <h6>Register your free account and <em>get immediate</em> access to online courses</h6>
                        </div>
                        <form id="contact" action="" method="get">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="name" type="text" class="form-control" id="name"
                                            placeholder="Your Name" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="email" type="text" class="form-control" id="email"
                                            placeholder="Your Email" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="phone-number" type="text" class="form-control" id="phone-number"
                                            placeholder="Your Phone Number" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="button">Get it now</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

  
    <section class="section courses" data-section="section4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Our Colleges</h2>
                    </div>
                </div>
                <div class="owl-carousel owl-theme">
                    <?php $n = 1; ?>
                    @foreach ($colleges as $college)
                        <div class="item">
                            <img style="height: 197px" src="{{ asset('assets/img/college-0' . $n . '.jpg') }}" alt="Course #1">
                            <div class="down-content">
                                <h4>{{ $college->name }}</h4>
                                <p><?php
                                $words = explode(' ', $college->description);
                                $maxWords = 20; 
                                $shortDescription = implode(' ', array_slice($words, 0, $maxWords)); // Adjust the number of words as needed
                                if (count($words) > $maxWords) {
                                    $shortDescription .= '...';
                                }
                                echo $shortDescription;
                                ?></p>
                                <div class="text-button-pay">
                                    <a href="{{ route('common.collegeinfo', $college->id) }}">More Info<i
                                            class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php $n++; ?>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="section video" data-section="section5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <div class="left-content">
                        <span>our presentation is for you</span>
                        <h4>Watch the video to learn more <em>about Grad School</em></h4>
                        <p style="color: white">You are NOT allowed to redistribute this template ZIP file on any template
                            collection website. However, you can use this template to convert into a specific theme for any
                            kind of CMS platform such as WordPress. You may <a rel="nofollow"
                                href="https://templatemo.com/contact" target="_parent">contact TemplateMo</a> for details.
                            <br><br>Suspendisse tincidunt, magna ut finibus rutrum, libero dolor euismod odio, nec interdum
                            quam felis non ante.
                        </p>
                        <div class="main-button"><a rel="nofollow" href="https://fb.com/templatemo"
                                target="_parent">External URL</a></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <article class="video-item">
                        <div class="video-caption">
                            <h4>Power HTML Template</h4>
                        </div>
                        <figure>
                            <a href="https://www.youtube.com/watch?v=r9LtOG6pNUw" class="play"><img
                                    src="{{ asset('assets/img/main-thumb.png') }}"></a>
                        </figure>
                    </article>
                </div>
            </div>
        </div>
    </section>
  
    <section class="section contact" data-section="section6">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Contact us</h2>
                    </div>
                </div>
                <div class="col-md-6">

                    <!-- Do you need a working HTML contact-form script?
                                
                                Please visit https://templatemo.com/contact page -->

                    <form id="contact" action="" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <input name="name" type="text" class="form-control" id="name"
                                        placeholder="Your Name" required="">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <input name="email" type="text" class="form-control" id="email"
                                        placeholder="Your Email" required="">
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..."
                                        required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="button">Send Message Now</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div id="map">
                        {{-- <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe> --}}
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3430.4599833101856!2d76.68666977479111!3d30.705466574597462!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390feefe72076225%3A0x8c8c5e2f63134023!2sWalkwel%20Technology%20(P)%20Limited!5e0!3m2!1sen!2sin!4v1691498565866!5m2!1sen!2sin"
                            width="100%" height="422px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('assets/js/tabs.js') }}"></script>
    <script src="{{ asset('assets/js/video.js') }}"></script>
    <script src="{{ asset('assets/js/slick-slider.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    {{-- <script
            //according to loftblog tut
            // $('.nav li:first').addClass('active');
    
            // var showSection = function showSection(section, isAnimate) {
            //   var
            //   direction = section.replace(/#/, ''),
            //   reqSection = $('.section').filter('[data-section="' + direction + '"]'),
            //   reqSectionPos = reqSection.offset().top - 0;
    
            //   if (isAnimate) {
            //     $('body, html').animate({
            //       scrollTop: reqSectionPos },
            //     800);
            //   } else {
            //     $('body, html').scrollTop(reqSectionPos);
            //   }
    
            // };
    
        //     var checkSection = function checkSection() {
        //       $('.section').each(function () {
        //         var
        //         $this = $(this),
        //         topEdge = $this.offset().top - 80,
        //         bottomEdge = topEdge + $this.height(),
        //         wScroll = $(window).scrollTop();
        //         if (topEdge < wScroll && bottomEdge > wScroll) {
        //           var
        //           currentId = $this.data('section'),
        //           reqLink = $('a').filter('[href*=\\#' + currentId + ']');
        //           reqLink.closest('li').addClass('active').
        //           siblings().removeClass('active');
        //         }
        //       });
        //     };
    
        //     $('.main-menu, .scroll-to-section').on('click', 'a', function (e) {
        //       if($(e.target).hasClass('external')) {
        //         return;
        //       }
        //       e.preventDefault();
        //       $('#menu').removeClass('active');
        //       showSection($(this).attr('href'), true);
        //     });
    
        //     $(window).scroll(function () {
        //       checkSection();
        //     });
        </script> --}}
@endsection

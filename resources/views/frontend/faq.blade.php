
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kraviti</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('CL-Kraviti-Front-End/dist/assets/img/logo-kraviti.png') }}">
    <link rel="stylesheet" href="{{ asset('CL-Kraviti-Front-End/dist/assets/css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>

    <header class="header">
        <div class="grid-container align-justify align-middle">
            <img src="{{ asset('CL-Kraviti-Front-End/dist/assets/img/logo-kraviti.png') }}" class="header-logo">
            <nav class=" header-nav">
                <ul>
                    <li class="link"><a href="{{ url('/') }}" class="is-active">Home</a></li>
                    <li class="link"><a href="{{ url('/product') }}" class="">Product</a></li>
                    <li class="link"><a href="{{ url('/about') }}" class="">About Us</a></li>
                    <li class="link"><a href="{{ url('/faq') }}" class="">FAQ</a></li>
                    <li class="link"><a href="{{ url('/contact') }}" class="">Contact</a></li>
                </ul>
            </nav>  
        </div>
    </header>    <div class="sosmed">
        <ul class="sosmed-list">
            <li class="sosmed-list-item">
                <a target="_blank" href="https://www.facebook.com/"><img src="{{ asset('CL-Kraviti-Front-End/dist/assets/img/ic-fb.png') }}" title="facebook"></a>
            </li>
            <li class="sosmed-list-item">
                <a target="_blank" href="https://www.instagram.com/"><img src="{{ asset('CL-Kraviti-Front-End/dist/assets/img/ic-insta.png') }}" title="instagram"></a>
            </li>
            <li class="sosmed-list-item">
                <a target="_blank" href="https://www.youtube.com/"><img src="{{ asset('CL-Kraviti-Front-End/dist/assets/img/ic-youtube.png') }}" title="youtube"></a>
            </li>
            <li class="sosmed-list-item">
                <a target="_blank" href="https://id.pinterest.com/"><img src="{{ asset('CL-Kraviti-Front-End/dist/assets/img/ic-pint.png') }}" title="pinterest"></a>
            </li>
        </ul>
    </div>    
    <main class="main">
        <div class="grid-container faq">
        <h3 class="title">Frequently Asked Questions</h3>
        <ul class="list">
            @foreach ($faqs as $faq)
            <li class="js-faq">
              <div class="list-question">
                <h5 class="list-question-text">{{ $faq->faq }}</h5>
                <span class="list-question-button"></span>  
              </div>
              <ul class="list">
                <div class="list-answer">
                    @foreach ($faq->faqAnswers as $answer)
                       <li>
                        <span>
                            <i class="fa fa-arrow-right"></i>
                        </span>{{ $answer->answer }}
                       </li>
                   @endforeach
                </div>
              </ul>
            </li>
            @endforeach
        </ul>
      </div>
    </main>
    <footer class="footer">
        <div class="footer-top">
            <div class="grid-container">
                <div class="grid-x">
                    <div class="small-12 medium-6 large-4 section1">
                        <h5 class="title">KRAVITI STUDIO</h5>
                        <p class="address">Jl. Guntur Sari II No. 37 Buah Batu Bandung, Jawa Barat 40264</p>
                        <h5 class="title">KRAVITI SHOWROOM</h5>
                        <p class="address">Jl. Guntur Sari II No. 37 Buah Batu Bandung, Jawa Barat 40264</p>
                    </div>
                    <div class="small-12 medium-6 large-4 section2">
                        <h5 class="title">NEED TO TALK TO US?</h5>
                        <p class="time">(09.00 WIB - 15.00 WIB)</p>
                        <div class="contact">
                            <img src="{{ asset('CL-Kraviti-Front-End/dist/assets/img/ic-mail.png') }}" class="icon">
                            <span>info@karaviti.co.id</span>
                        </div>
                        <div class="contact">
                            <img src="{{ asset('CL-Kraviti-Front-End/dist/assets/img/ic-phone.png') }}" class="icon">
                            <span>(022) 8224 154</span>
                        </div>
                        <div class="contact">
                            <img src="{{ asset('CL-Kraviti-Front-End/dist/assets/img/ic-wa.png') }}" class="icon">
                            <span>0812 8127 8121</span>
                        </div>
                    </div>
                    <div class="small-12 medium-12 large-4 section3">
                        <h5 class="title">INSTAGRAM</h5>
                        <div class="description">
                            <img src="{{ asset('CL-Kraviti-Front-End/dist/assets/img/logo-kraviti.png') }}" class="image">
                            <div class="text">
                                <p class="name">Kraviti</p>
                                <p class="bio">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse laoreet congue nisl vel egestas.</p>
                            </div>
                        </div>
                        <ul class="section3-list">
                            <!-- LightWidget WIDGET --><script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/71e98736eafa5ad4bd7fcc228aa1c691.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
                            {{-- <div class="section3-list-area">
                                <li class="item">
                                    <img src="{{ asset('CL-Kraviti-Front-End/dist/assets/img/product/produk-1.png') }}" alt="">
                                </li>
                                <li class="item">
                                    <img src="{{ asset('CL-Kraviti-Front-End/dist/assets/img/product/produk-1.png') }}" alt="">
                                </li>
                                <li class="item">
                                    <img src="{{ asset('CL-Kraviti-Front-End/dist/assets/img/product/produk-1.png') }}" alt="">
                                </li>
                                <li class="item">
                                    <img src="{{ asset('CL-Kraviti-Front-End/dist/assets/img/product/produk-1.png') }}" alt="">
                                </li>
                            </div>
                            <div class="section3-list-area">
                                <li class="item">
                                    <img src="{{ asset('CL-Kraviti-Front-End/dist/assets/img/product/produk-1.png') }}" alt="">
                                </li>
                                <li class="item">
                                    <img src="{{ asset('CL-Kraviti-Front-End/dist/assets/img/product/produk-1.png') }}" alt="">
                                </li>
                                <li class="item">
                                    <img src="{{ asset('CL-Kraviti-Front-End/dist/assets/img/product/produk-1.png') }}" alt="">
                                </li>
                                <li class="item">
                                    <img src="{{ asset('CL-Kraviti-Front-End/dist/assets/img/product/produk-1.png') }}" alt="">
                                </li>
                            </div> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2018 Kraviti by Cyberlabs.
        </div>
    </footer>
    <script src="{{ asset('CL-Kraviti-Front-End/dist/assets/js/app.js') }}"></script>
  </body>
</html>
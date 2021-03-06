
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
                <a  target="_blank" href="https://www.facebook.com/"><img src="{{ asset('CL-Kraviti-Front-End/dist/assets/img/ic-fb.png') }}" title="facebook"></a>
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
    <main class="main about">
        <div class="grid-container">
            <img src="{{ asset('images/about/'.$about->image) }}" class="about-cover">
            <section class="about-explanation">
                <div class="small-12 medium-12 large-12">
                    <h3 class="title fade-animate">Apa itu Kraviti?</h3>
                    <p class="description fade-animate">
                        {{ $about->description }}
                    </p>
                </div>
                <div class="grid-x">
                    <div class="cell small-12 medium-12 large-6 fade-animate">
                        <h5 class="title">Visi</h5>
                        <p class="vision">
                            {{ $about->vision }}
                        </p>
                    </div>
                    <div class="cell small-12 medium-12 large-6 fade-animate">
                        <h5 class="title">Misi</h5>
                        <p class="mision">
                            {{ $about->mission }}
                        </p>
                    </div>
                </div>
            </section>      <section class="hopes">
                <h5 class="title">Patch of Hopes</h5>

                @foreach ($hopes as $hope)
                @if ($loop->index  % 2 == 0)
                    <div class="grid-x hopes-item">
                        <div class="small-12 medium-6 large-6 image">
                            <img src="{{ asset('images/hope/'.$hope->image) }}">
                        </div>
                        <div class="small-12 medium-6 large-6 desc fade-animate">
                            <h5 class="title">{{ $hope->title }}</h5>
                            <p>
                                {{ $hope->description }}
                            </p>
                        </div>
                    </div>
                @else
                    <div class="grid-x hopes-item">
                        <div class="small-12 medium-6 large-6 desc fade-animate">
                            <h5 class="title">{{ $hope->title }}</h5>
                            <p>
                                {{ $hope->description }}
                            </p>
                        </div>
                        <div class="small-12 medium-6 large-6 image3">
                            <img src="{{ asset('images/hope/'.$hope->image) }}">
                        </div>
                    </div>
                @endif
                @endforeach
            </section>  </div>
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
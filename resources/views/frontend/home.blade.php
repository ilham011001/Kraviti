
@php $message = session('message'); @endphp
@if(session('message'))
    <script>alert('Successfully sent a request');</script>
@endif
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <main class="main home">
    	<div class="grid-container">
    		<section class="home-banner">
    			<div class="orbit" role="region" aria-label="Sambutan" data-orbit>
    				<div class="orbit-wrapper">
    					<ul class="orbit-container">
                            @foreach ($banners as $banner)
    						<li class="is-active orbit-slide">
    							<figure class="orbit-figure">
    								<img class="orbit-image" src="{{ asset('images/banner/'.$banner->name) }}" alt="gambar 1">
    							</figure>
    						</li>
                            @endforeach
    					</ul>
    				</div>
    				<nav class="orbit-bullets">
    					<button class="is-active" data-slide="0"><span class="show-for-sr"></span><span class="show-for-sr">Current Slide</span></button>
    					<button data-slide="1"><span class="show-for-sr"></span></button>
    					<button data-slide="2"><span class="show-for-sr"></span></button>
    				</nav>
    			</div>
    			<div class="grid-x banner-bottom">
    				<div class="cell small-12 medium-4 large-4 image fade-animate">
    					<h3 class="text">Campaign</h3>
    					<img src="{{ asset('CL-Kraviti-Front-End/dist/assets/img/dpn-1.png') }}">
    				</div>
    				<div class="cell small-12 medium-4 large-4 image fade-animate">
    					<h3 class="text">SALE</h3>
    					<img src="{{ asset('CL-Kraviti-Front-End/dist/assets/img/dpn-2.png') }}">
    				</div>
    				<div class="cell small-12 medium-4 large-4 image fade-animate">
    					<h3 class="text">ETC.</h3>
    					<img src="{{ asset('CL-Kraviti-Front-End/dist/assets/img/dpn-3.png') }}">
    				</div>
    			</div>
    		</section>		<section class="home-product">
    			<div class="grid-contaner">
    				<h5 class="title">NEW ARRIVALS</h5>
    				<ul class="grid-x product-list">
                        @foreach ($products as $product)
    					<li class="cell small-12 medium-6 large-4 fade-animate">
    						<a href="product-detail.html" class="product-block">
    							<article>
    								<img src="{{ asset('images/product/'.$product->image) }}" class="image">
    								<p class="name">{{ $product->name }}</p>
    								<span></span>
    								<p class="price">Rp {{ number_format($product->price,0, ',' , '.') }}</p>
    							</article>
    						</a>
    					</li>
                        @endforeach
    				</ul>
    			</div>
    		</section>		<section class="home-hope">
    			<div class="hopes">
    			<h5 class="title">PATCH A HOPE</h5>
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
    			</div>
    			<div class="more-stories">
    				<a href="{{ url('/about') }}" class="link">SEE MORE STORIES</a>
    			</div>
    		</section>		<section class="home-form">
    			<div class="form">
    				<h5 class="title">FOR SPECIAL REQUEST & ORDER</h5>
    				<form class="grid-x" method="POST" action="{{ url('/request') }}">
                        @csrf
    					<div class="from-group small-12 medium-6 large-6 custom-input">
    						<input type="text" name="full_name" placeholder="Full Name*" required>
    					</div>
    		
    					<div class="from-group small-12 medium-6 large-6 custom-input">
    						<input type="email" name="email" placeholder="Email*" required>
    					</div>
    		
    					<div class="from-group small-12 medium-12 large-12 custom-input">
    						<input type="text" name="subject" placeholder="Subject*" required>
    					</div>
    		
    					<div class="from-group small-12 medium-12 large-12 custom-input">
    						<textarea placeholder="Message*" rows="6" cols="50" required name="message"></textarea>
    					</div>
    		
    					<div class="from-group small-12 medium-12 large-12 custom-input">
    						<button type="submit" class="button expanded btn">SEND</button>
    					</div>
    				</form>
    			</div>
    		</section>	</div>
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
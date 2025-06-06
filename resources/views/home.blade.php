@extends('layouts.app')
@section('title', 'Home | FourAxiz')
@section('content')
<!-- ===== Banner Section Start===== -->
<section class="position-relative overflow-hidden">
  <img id="initialImage" src="{{ asset('images/fouraxiz-impression.webp') }}" alt="Initial Banner" class="initial-banner-image">
  <video id="video1" autoplay muted playsinline class="banner-video active-video"></video>
  <video id="video2" autoplay muted playsinline class="banner-video"></video>
  <div class="video-blur-layer"></div>
  
  <div class="position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center overlay-clear">
    <div class="text-center text-white">
      <h1 class="typing-text mb-2"></h1>
      <p id="typing-subtext" class="lead mt-2">Building Smart Solutions for a Digital World</p>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const el = document.querySelector('.typing-text');
  const subtextEl = document.getElementById('typing-subtext');
  const video1 = document.getElementById('video1');
  const video2 = document.getElementById('video2');
  const initialImage = document.getElementById('initialImage');
  const slides = [
    {
      video: "{{ asset('videos/fouraxiz-ai.mp4') }}",
      text: "Transforming Ideas with AI-Powered Innovation",
      subtext: "We harness the potential of artificial intelligence to deliver smarter, future-ready solutions."
    },
    {
      video: "{{ asset('videos/fouraxiz-web.mp4') }}",
      text: "Cutting-Edge Web & App Development Solutions",
      subtext: "We build scalable web and mobile platforms using the most advanced and reliable technologies."
    },
    {
      video: "{{ asset('videos/fouraxiz-cs.mp4') }}",
      text: "Robust Cybersecurity Services for Your Business",
      subtext: "Protecting digital assets with industry-leading security strategies and 24/7 protection."
    }
  ];

  let index = 0;
  let activeVideo = video1;
  let inactiveVideo = video2;

  const swapVideos = () => {
    const temp = activeVideo;
    activeVideo = inactiveVideo;
    inactiveVideo = temp;
  };

  const loadVideo = (src, onReady) => {
    inactiveVideo.innerHTML = '';
    const source = document.createElement('source');
    source.src = src;
    source.type = 'video/mp4';
    inactiveVideo.appendChild(source);
    inactiveVideo.load();
    inactiveVideo.oncanplay = () => {
      onReady();
    };
  };

  const typeWriter = (text, callback = null, i = 0) => {
    if (i <= text.length) {
      el.textContent = text.substring(0, i);
      setTimeout(() => typeWriter(text, callback, i + 1), 115);
    } else {
      if (callback) setTimeout(callback, 1500);
    }
  };

  const eraseText = (i, callback) => {
    if (i >= 0) {
      el.textContent = el.textContent.substring(0, i);
      setTimeout(() => eraseText(i - 1, callback), 60);
    } else if (callback) {
      callback();
    }
  };

  const playSlide = (idx) => {
    const { video, text, subtext } = slides[idx];

    loadVideo(video, () => {
      inactiveVideo.play();

      subtextEl.textContent = subtext;
      subtextEl.style.display = 'block';

      typeWriter(text, () => {
        eraseText(text.length, () => {
          index = (index + 1) % slides.length;
          swapVideos();
          playSlide(index);
        });
      });

      activeVideo.classList.remove('active-video');
      inactiveVideo.classList.add('active-video');
    });
  };

  // Show subtext with img
  subtextEl.style.display = 'block';
  typeWriter("Welcome to Fouraxiz", () => {
    eraseText("Welcome to Fouraxiz".length, () => {
      // Img fade-out
      initialImage.classList.add('fade-out');
      playSlide(index);
    });
  });

});
</script>
<!-- ===== Banner Section End===== -->

<!-- ===== Company Stats Section Start===== -->
<section class="py-5 my-0 company-stats-section" style="background: linear-gradient(to right, #f5f7fa, #e2e6ec);">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-5 g-3 g-md-4">
            <!-- Item 1 -->
            <div class="col">
              <div class="stats-card d-flex align-items-center bg-white p-2 rounded-0 h-100 shadow" style="border-left: 4px solid #F95133;">
                <img src="{{ asset('images/fouraxiz-deal.webp') }}" alt="Years">
                  <div class="ms-2 text-start">
                      <h4 class="counter fw-bold mb-0" data-target="18" style="color: #F95133;">0</h4>
                      <small>Years in Business</small>
                    </div>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="col">
                <div class="stats-card d-flex align-items-center bg-white p-2 rounded-0 h-100 shadow" style="border-left: 4px solid #F95133;">
                    <img src="{{ asset('images/fouraxiz-world.webp') }}" alt="Countries">
                    <div class="ms-2 text-start">
                        <h4 class="counter fw-bold mb-0" data-target="27" style="color: #F95133;">0</h4>
                        <small>Countries Served</small>
                    </div>
                </div>
            </div>
            <!-- Item 3 -->
            <div class="col">
              <div class="stats-card d-flex align-items-center bg-white p-2 rounded-0 h-100 shadow" style="border-left: 4px solid #F95133;">
                <img src="{{ asset('images/fouraxiz-deadline.webp') }}" alt="Clients">
                  <div class="ms-2 text-start">
                      <h4 class="counter fw-bold mb-0" data-target="997" style="color: #F95133;">0</h4>
                      <small>Clients Worldwide</small>
                  </div>
                </div>
            </div>
            <!-- Item 4 -->
            <div class="col">
              <div class="stats-card d-flex align-items-center bg-white p-2 rounded-0 h-100 shadow" style="border-left: 4px solid #F95133;">
                <img src="{{ asset('images/fouraxiz-certificate.webp') }}" alt="Projects">
                  <div class="ms-2 text-start">
                      <h4 class="counter fw-bold mb-0" data-target="2847" style="color: #F95133;">0</h4>
                      <small>Projects Delivered</small>
                    </div>
                </div>
            </div>
            <!-- Item 5 -->
            <div class="col">
              <div class="stats-card d-flex align-items-center bg-white p-2 rounded-0 h-100 shadow" style="border-left: 4px solid #F95133;">
                <img src="{{ asset('images/fouraxiz-24hr-support.webp') }}" alt="Support">
                    <div class="ms-2 text-start">
                      <h4 class="fw-bold mb-0" style="color: #F95133;">24/7</h4>
                      <small>Support Available</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const counters = document.querySelectorAll('.counter');
    const duration = 4000;
    const interval = 30;

    const runCounter = (counter) => {
        const target = +counter.getAttribute('data-target');
        let count = 0;
        const steps = Math.ceil(duration / interval);
        const increment = target / steps;

        const updateCount = () => {
            count += increment;
            if (count < target) {
                counter.innerText = Math.floor(count);
                setTimeout(updateCount, interval);
            } else {
                counter.innerText = target + "+";
            }
        };
        updateCount();
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                if (!counter.classList.contains('counted')) {
                    counter.classList.add('counted');
                    runCounter(counter);
                }
            }
        });
    }, {
        threshold: 0.6
    });

    counters.forEach(counter => {
        observer.observe(counter);
    });
</script>
<!-- ===== Company Stats Section End===== -->

<!-- ===== Experience Section Start===== -->
<section class="py-5 bg-white">
  <div class="container">
    <div class="row align-items-center">
      <!-- Left Side: Text Content -->
      <div class="col-lg-6 mb-4 mb-lg-0 mt-lg-n3">
        <h1 class="fw-bold display-5 mb-3">
          <span class="text-dark">13+</span> <span style="color: #FF0D0D;">Years in Business</span>
        </h1>
        <p class="text-secondary small mb-4">
          Since our founding, we have been committed to delivering high-quality software solutions tailored to meet the diverse needs of our clients across the globe. With a presence in the USA, our expert team has helped hundreds of businesses grow with confidence.
        </p>
        <ul class="list-unstyled text-muted small">
          <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Enterprise Software Development</li>
          <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Custom Web & Mobile Applications</li>
          <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Digital Transformation Services</li>
        </ul>
      </div>
      <!-- Right Side: Video -->
      <div class="col-lg-6 text-center">
        <video class="img-fluid rounded-2 shadow-lg" style="max-height: 400px;" autoplay muted loop playsinline>
          <source src="{{ asset('videos/fourAxiz-experience.mp4') }}" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
    </div>
  </div>
</section>
<!-- ===== Experience Section End===== -->

<!-- ===== Our Services Section Start===== -->
<section class="py-5" style="background: linear-gradient(to right, #f5f7fa, #e2e6ec);">
  <div class="container">
    <h1 class="text-center fw-bold mb-3">Our <span style="color: #FF0D0D;">Services</span></h1>
    <p class="text-center text-muted mb-5 small">
      Empowering businesses with a complete suite of web services – from design to deployment and beyond.
    </p>
    <div class="row g-4 justify-content-center">
      <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 deep-shadow hover-shadow" style="border-radius: 0;">
          <div class="image-wrapper">
            <img src="{{ asset('images/fa-web-dev.webp') }}" alt="Web Development" class="service-img">
          </div>
          <div class="card-body">
            <h5 class="card-title">Web Development</h5>
            <p class="card-text small">Expert web development services for your website – professional, reliable, and tailored to you.</p>
            <a href="#" class="btn btn-learn btn-sm">Learn More</a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 deep-shadow hover-shadow" style="border-radius: 0;">
          <div class="image-wrapper">
            <img src="{{ asset('images/fa-app-dev.webp') }}" alt="App Development" class="service-img">
          </div>
          <div class="card-body">
            <h5 class="card-title">App Development</h5>
            <p class="card-text small">Custom app development – innovative, seamless, and user-friendly solutions for your needs.</p>
            <a href="#" class="btn btn-learn btn-sm">Learn More</a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 deep-shadow hover-shadow" style="border-radius: 0;">
          <div class="image-wrapper">
            <img src="{{ asset('images/fa-ai-ml.webp') }}" alt="AI & Machine Learning" class="service-img">
          </div>
          <div class="card-body">
            <h5 class="card-title">AI & Machine Learning</h5>
            <p class="card-text small">Cutting-edge AI and machine learning solutions – unlocking the power of your data.</p>
            <a href="#" class="btn btn-learn btn-sm">Learn More</a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 deep-shadow hover-shadow" style="border-radius: 0;">
          <div class="image-wrapper">
            <img src="{{ asset('images/fa-software-testing.webp') }}" alt="Software Testing" class="service-img">
          </div>
          <div class="card-body">
            <h5 class="card-title">Software Testing</h5>
            <p class="card-text small">Quality-driven testing services for flawless performance and reliable functionality.</p>
            <a href="#" class="btn btn-learn btn-sm">Learn More</a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 deep-shadow hover-shadow" style="border-radius: 0;">
          <div class="image-wrapper">
            <img src="{{ asset('images/fa-security.webp') }}" alt="Security Solutions" class="service-img">
          </div>
          <div class="card-body">
            <h5 class="card-title">Security Solutions</h5>
            <p class="card-text small">Robust digital security solutions – safeguard your data with confidence.</p>
            <a href="#" class="btn btn-learn btn-sm">Learn More</a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 deep-shadow hover-shadow" style="border-radius: 0;">
          <div class="image-wrapper">
            <img src="{{ asset('images/fa-hosting.webp') }}" alt="Domain & Hosting" class="service-img">
          </div>
          <div class="card-body">
            <h5 class="card-title">Domain & Hosting</h5>
            <p class="card-text small">Reliable web hosting and domain solutions – empower your online presence effortlessly.</p>
            <a href="#" class="btn btn-learn btn-sm">Learn More</a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 deep-shadow hover-shadow" style="border-radius: 0;">
          <div class="image-wrapper">
            <img src="{{ asset('images/fa-seo.webp') }}" alt="Digital Marketing" class="service-img">
          </div>
          <div class="card-body">
            <h5 class="card-title">Digital Marketing (SEO)</h5>
            <p class="card-text small">Optimize your website with powerful SEO and digital marketing strategies.</p>
            <a href="#" class="btn btn-learn btn-sm">Learn More</a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 deep-shadow hover-shadow" style="border-radius: 0;">
          <div class="image-wrapper">
            <img src="{{ asset('images/fa-graphics.webp') }}" alt="Graphics Design" class="service-img">
          </div>
          <div class="card-body">
            <h5 class="card-title">Graphics Design</h5>
            <p class="card-text small">Creative graphic design services – captivate your audience visually.</p>
            <a href="#" class="btn btn-learn btn-sm">Learn More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ===== Our Services Section End===== -->

<!-- ===== Our Clients Section Start ===== -->
<section class="py-5 bg-white text-center">
    <div class="container">
        <h1 class="mb-4 fw-bold split-title">
            <span>Our</span> <span>Clients</span>
        </h1>
        <p class="text-center text-muted mb-5 small">
        With over 13 years of experience, we have proudly delivered tailored software solutions to a wide range of esteemed clients. Their trust in our expertise has empowered us to streamline operations, enhance digital efficiency, and build lasting partnerships.
        </p>
        <div class="client-slider-wrapper overflow-hidden position-relative">
            <div class="client-slider d-flex align-items-center" id="clientSlider">
                @php
                    $logos = ['fa-dgfp', 'fa-bicm', 'fa-toyota', 'fa-great-eastern', 'fa-hospice', 'fa-msh', 'fa-northernlowa', 'fa-sanofi', 'fa-al-fatha', 'fa-undp', 'fa-unikart'];
                @endphp
                @foreach($logos as $logo)
                    <div class="client-logo flex-shrink-0 px-4">
                        <img src="{{ asset('images/clients/' . $logo . '.webp') }}" alt="{{ $logo }}" class="img-fluid">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const slider = document.getElementById('clientSlider');
    let speed = 1; // pixels per frame
    const clone = slider.cloneNode(true);
    clone.setAttribute("aria-hidden", "true");
    slider.parentElement.appendChild(clone);

    let position = 0;
    function moveSlider() {
        position -= speed;
        if (position <= -slider.scrollWidth) {
            position = 0;
        }
        slider.style.transform = `translateX(${position}px)`;
        slider.nextElementSibling.style.transform = `translateX(${position + slider.scrollWidth}px)`;
        requestAnimationFrame(moveSlider);
    }
    moveSlider();
  });
</script>
<!-- ===== Our Clients Section End ===== -->


<!-- ===== USA Section Start ===== -->
<section class="py-5 text-left" style="background: linear-gradient(to right, #f5f7fa, #e2e6ec);">
  <div class="container">
    <div class="row align-items-center flex-lg-row flex-column">
      <!-- Left Image -->
      <div class="col-lg-6 mb-4 mb-lg-0 d-flex align-items-center justify-content-center img-container">
        <img src="{{ asset('images/us-trust.webp') }}"
          alt="Trusted by US Companies"
          class="img-fluid rounded-2 shadow-lg"
          style="width: 100%; object-fit: contain; animation: fadeInLeft 1s ease;">
      </div>
      <!-- Right Text -->
      <div class="col-lg-6 text-container">
        <h2 class="fw-bold text-dark mb-3" style="font-size: 2rem;">Why Leading USA Brands Trust <span style="color: #FF0D0D;">4AXIZ</span></h2>
        <p class="text-secondary mb-4" style="font-size: 15px;">
          We empower USA businesses with scalable, secure, and innovative technology that delivers real results — not promises.
        </p>
        <ul class="list-unstyled text-dark">
          <li class="mb-3"><i class="fas fa-star text-warning me-2"></i><strong>13+ years</strong> serving top USA markets</li>
          <li class="mb-3"><i class="fas fa-clock text-primary me-2"></i><strong>Real-time support</strong> in USA business hours</li>
          <li class="mb-3"><i class="fas fa-lock text-success me-2"></i><strong>HIPAA / SOC 2</strong> security-compliant development</li>
          <li class="mb-3"><i class="fas fa-handshake text-danger me-2"></i><strong>Long-term partnerships</strong> with USA enterprises</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- CSS -->
<style>
    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Mobile responsiveness */
    @media (max-width: 991.98px) {
        .img-container {
            display: block !important;
            text-align: center;
        }

        .img-container img {
            width: auto;
            margin-bottom: 20px;
        }

        .text-container {
            text-align: center;
        }

        .text-container h2 {
            font-size: 1.5rem;
        }

        .text-container p,
        .text-container ul li {
            font-size: 14px;
        }
    }
</style>



<!-- ===== Featured Projects Section Start ===== -->
<section class="py-5 bg-white">
    <div class="container text-center">
        <h1 class="mb-3 fw-bold split-title">
            <span>Featured</span> <span>Projects</span>
        </h1>
        <p class="text-muted mb-5">
            Over the last 13+ years, we have delivered modern software solutions across industries — from eCommerce to government archives.
        </p>
        @php
            $projects = [
                ['image' => 'project-Task-Management.webp', 'title' => 'Task Management', 'desc' => 'A complete task tracking and assignment tool.'],
                ['image' => 'project-Online-Pharmacy.webp', 'title' => 'Online Pharmacy', 'desc' => 'Real-time medicine ordering system.'],
                ['image' => 'project-Grocery-App.webp', 'title' => 'Grocery App', 'desc' => 'App for instant grocery delivery.'],
                ['image' => 'project-app.webp', 'title' => 'Mobile App', 'desc' => 'Cross-platform scalable mobile app.'],
                ['image' => 'project-Bazarnao-Ecommerce.webp', 'title' => 'Bazarnao Ecommerce', 'desc' => 'Smart shopping platform.'],
                ['image' => 'project-DGFP-Archive.webp', 'title' => 'DGFP Archive', 'desc' => 'Government document archiving solution.'],
            ];
        @endphp
        <div class="swiper mySwiper px-3 py-3">
            <div class="swiper-wrapper">
                @foreach($projects as $project)
                    <div class="swiper-slide d-flex justify-content-center">
                        <div class="card project-card shadow-lg h-100">
                            <img src="{{ asset('images/' . $project['image']) }}" class="card-img-top" alt="{{ $project['title'] }}">
                            <div class="card-body bg-light">
                                <h5 class="card-title">{{ $project['title'] }}</h5>
                                <p class="card-text">{{ $project['desc'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination mt-5"></div>
        </div>
    </div>
</section>
  <!-- Swiper CSS & JS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        centeredSlides: false,
        autoplay: {
          delay: 4000,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          768: {
            slidesPerView: 2,
          },
          992: {
            slidesPerView: 3,
          },
          1200: {
            slidesPerView: 4,
          }
        }
    });
</script>
<style>
.swiper-pagination {
  position: relative;
}
</style>
<!-- ===== Featured Projects Section End ===== -->

<!-- ===== Client Testimonials Section Start ===== -->
<section class="py-5 text-center" style="background: linear-gradient(to right, #f5f7fa, #e2e6ec);">
  <div class="container">
    <h1 class="mb-3 fw-bold split-title">
      <span>Client</span> <span>Testimonials</span>
    </h1>
    <p class="text-muted mb-5">
      Hear from those who trusted us — real stories from clients across industries who've experienced our dedication, quality, and results.
    </p>
    @php
      $testimonials = [
          ['name' => 'Evan L.', 'title' => 'Marketing Head, BrightIdeas', 'image' => 'fouraxiz-client-2.webp', 'text' => 'The support and response time is top-notch!', 'stars' => 4],
          ['name' => 'Alim R.', 'title' => 'CO, Amazon', 'image' => 'fouraxiz-client-1.webp', 'text' => 'Amazing team! Delivered exactly what we needed.', 'stars' => 5],
          ['name' => 'Nafizul I.', 'title' => 'CTO, GenZ', 'image' => 'fouraxiz-client-3.webp', 'text' => 'Great experience working with this Laravel team.', 'stars' => 4],
          ['name' => 'Luis W.', 'title' => 'Product Manager, Appify', 'image' => 'fouraxiz-client-4.webp', 'text' => 'Professional, fast and reliable — highly recommended!', 'stars' => 5],
          ['name' => 'Ravi S.', 'title' => 'Founder, EduNext', 'image' => 'fouraxiz-client-5.webp', 'text' => 'They really care about our product success.', 'stars' => 3],
          ['name' => 'Smith G.', 'title' => 'Lead Developer, SmartLabs', 'image' => 'fouraxiz-client-6.webp', 'text' => 'Excellent collaboration and great communication.', 'stars' => 5],
      ];
    @endphp
    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000" data-bs-pause="hover">
      <div class="carousel-inner">
        <!-- Slide Items will be dynamically generated by JS -->
      </div>
      <!-- Custom Pagination -->
      <ul class="custom-indicators"></ul>
    </div>
  </div>
</section>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const testimonials = @json($testimonials);
    const carouselInner = document.querySelector('#testimonialCarousel .carousel-inner');
    const indicatorsContainer = document.querySelector('.custom-indicators');
    let slides = [];
    let itemsPerSlide = window.innerWidth >= 992 ? 2 : 1;
    // Create profile card HTML
    function createProfileCard(client) {
      return `
        <div class="profile-card col">
          <img src="{{ asset('images/${client.image}') }}" alt="${client.name}" />
          <h5>${client.name}</h5>
          <small>${client.title}</small>
          <p>“${client.text}”</p>
          <div class="stars">${'★'.repeat(client.stars) + '☆'.repeat(5 - client.stars)}</div>
        </div>`;
    }
    // Build slides (overlapping 2 per slide on desktop, 1 on mobile)
    function buildSlides() {
      carouselInner.innerHTML = '';
      indicatorsContainer.innerHTML = '';

      for (let i = 0; i < testimonials.length; i++) {
        let slideProfiles = [];

        if (itemsPerSlide === 2 && i + 1 < testimonials.length) {
          slideProfiles = [testimonials[i], testimonials[i + 1]];
        } else {
          slideProfiles = [testimonials[i]];
        }

        let slideInnerHTML = '<div class="row justify-content-center">';
        slideProfiles.forEach(client => {
          slideInnerHTML += createProfileCard(client);
        });
        slideInnerHTML += '</div>';

        let div = document.createElement('div');
        div.className = 'carousel-item';
        if (i === 0) div.classList.add('active');
        div.innerHTML = slideInnerHTML;

        carouselInner.appendChild(div);
        // Pagination dot
        let li = document.createElement('li');
        li.setAttribute('data-bs-target', '#testimonialCarousel');
        li.setAttribute('data-bs-slide-to', i);
        if (i === 0) li.classList.add('active');
        indicatorsContainer.appendChild(li);
      }
    }
    // Initial build
    buildSlides();

    const carouselElement = document.getElementById('testimonialCarousel');
    const carousel = new bootstrap.Carousel(carouselElement, {
      interval: 4000,
      ride: 'carousel',
      wrap: true,
      touch: true,
      keyboard: true,
      pause: 'hover',
    });

    // Sync dots on slide change
    carouselElement.addEventListener('slide.bs.carousel', function (e) {
      const activeIndex = e.to;
      indicatorsContainer.querySelectorAll('li').forEach((li, idx) => {
        li.classList.toggle('active', idx === activeIndex);
      });
    });

    // Dot click moves carousel
    indicatorsContainer.querySelectorAll('li').forEach((li, idx) => {
      li.addEventListener('click', () => {
        carousel.to(idx);
      });
    });

    let lastItemsPerSlide = itemsPerSlide;
    window.addEventListener('resize', () => {
      const newItemsPerSlide = window.innerWidth >= 992 ? 2 : 1;
      if (newItemsPerSlide !== lastItemsPerSlide) {
        itemsPerSlide = newItemsPerSlide;
        lastItemsPerSlide = itemsPerSlide;
        buildSlides();
        carousel.dispose();
        new bootstrap.Carousel(carouselElement, {
          interval: 4000,
          ride: 'carousel',
          wrap: true,
          touch: true,
          keyboard: true,
          pause: 'hover',
        });
      }
    });
  });
</script>
<!-- ===== Client Testimonials Section End ===== -->

<!-- ===== Call To Action Section ===== -->
<section class="py-5" style="background-color: #F95133;">
    <div class="container text-center text-white">
        <h1 class="mb-3 fw-bold">Ready to start your next project?</h1>
        <p class="mb-4">Contact us today for a free consultation.</p>
        <a href="/contact" class="btn btn-light btn-lg text-dark">Get In Touch</a>
    </div>
</section>

@endsection
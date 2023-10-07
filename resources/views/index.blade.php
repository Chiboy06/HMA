<x-layout>
  <section id="hero">
    <div
      id="heroCarousel"
      data-bs-interval="5000"
      class="carousel slide carousel-fade"
      data-bs-ride="carousel"
    >
      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">
        <div
          class="carousel-item active"
          style="background-image: url({{ asset('img/hospitalpic.png')}})"
        >
          <div class="container">
            <h2>Welcome to <span>Ibrahim Memorial Hospital</span></h2>
            <p>
              Welcome to Ibrahim Memorial Hospital (IMH) Gwagwalada where compassionate care meets cutting-edge technology. We take pride in being a leading private healthcare institution 
              dedicated to providing exceptional healthcare services to the community and beyond.
             
            </p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>

        <!-- Slide 2 -->
        <div
          class="carousel-item"
          style="background-image: url({{ asset('img/hospital6.jpg')}})"
        >
          <div class="container">
            <h2>State Of The Art Facilities</h2>
            <p>
              Our hospital is equipped with the latest medical equipment and technology, ensuring accurate diagnoses and effective treatments.
              We constantly invest in upgrading our facilities to maintain the highest standard of healthcare.
            </p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>

        <!-- Slide 3 -->
        <div
          class="carousel-item"
          style="background-image: url({{ asset('img/hospital4.jpg') }})"
        >
          <div class="container">
            <h2>Experienced Medical Professionals</h2>
            <p>
              Our teams of highly skilled medical professionals are committed to delivering the best quality healthcare to our patients.
              With years of experience and expertise in various medical specialties, you can trust that you are in capable hands.
            </p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>

        <div
        class="carousel-item"
        style="background-image: url({{ asset('img/hospital3.jpg') }})"
      >
        <div class="container">
          <h2>Condusive Medical Facilities</h2>
          <p>
           We have medical facilities specially dedicated to aiding speedy recovery. Our facilities are world-class and top-notch with equipments
           to assist in speedy recovery and nursing our patients to full health and vitality.
          </p>
          <a href="#about" class="btn-get-started scrollto">Read More</a>
        </div>
      </div>

      </div>

      <a
        class="carousel-control-prev"
        href="#heroCarousel"
        role="button"
        data-bs-slide="prev"
      >
        <span
          class="carousel-control-prev-icon bi bi-chevron-left"
          aria-hidden="true"
        ></span>
      </a>

      <a
        class="carousel-control-next"
        href="#heroCarousel"
        role="button"
        data-bs-slide="next"
      >
        <span
          class="carousel-control-next-icon bi bi-chevron-right"
          aria-hidden="true"
        ></span>
      </a>
    </div>
  </section>
  <!-- End Hero -->
  @include('section.cta')
  @include('section.about')
  @include('section.counts')
  @include('section.features')
  @include('section.services')
  @include('section.departments')
  @include('section.doctors')
  @include('section.gallery')
  @include('section.contact')
</x-layout>
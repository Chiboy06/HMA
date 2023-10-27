<x-layout>
  @php
    $user = Auth::user();    
  @endphp
  
      <!-- ======= Appointment Section ======= -->
      <section id="appointment" class="appointment section-bg ">
          <div class="container" style="padding-top: 10rem" data-aos="fade-up">
            <div class="section-title">    
              <h2>Book Your Appointment</h2>
            </div>
            <form action="/create-appointments" method="POST">
              @csrf
              <div class="row">
                <div class="col-md-4 form-group">
                  <input
                    type="text"
                    name="bookingName"
                    class="form-control"
                    id="bookingName"
                    placeholder="Your Name"
                    value="{{$user->name}}"
                    required
                  />
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                  <input
                    type="email"
                    class="form-control"
                    name="bookingEmail"
                    id="email"
                    value="{{$user->email}}"
                    placeholder="Your Email Address"
                    required
                  />
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                  <input
                    type="tel"
                    class="form-control"
                    name="phoneNo"
                    id="phone"
                    placeholder="Your Phone Number"
                    required
                  />
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 form-group mt-3">
                  <input
                    type="date"
                    name="bookingDate"
                    class="form-control datepicker"
                    id="date"
                    placeholder="Appointment Date"
                    required
                  />
                </div>
                <div class="col-md-4 form-group mt-3">
                  <select name="department" id="department" class="form-select">
                    <option value="0">Select Department</option>
                    <option value="1">Dental Care</option>
                    <option value="2">Pharmacy</option>
                    <option value="3">Anasthethics</option>
                    <option value="4">Paediatrics</option>
                    <option value="5">Laboratory</option>
                    <option value="6">General Medicine</option>

                  </select>
                </div>
                <div class="col-md-4 form-group mt-3">
                  <select name="doctor" id="doctor" class="form-select">
                    <option value="0">Select Doctor</option>
                    <option value="1">Dentist</option>
                    <option value="2">Pharmacist</option>
                    <option value="3">Anasthethologist</option>
                    <option value="4">Paediatrist</option>
                    <option value="5">Lab Attendant/Assistant</option>
                    <option value="6">General Doctor</option>
                  </select>
                </div>
              </div>

              <div class="form-group mt-3">
                <textarea
                  class="form-control"
                  style="margin: 0 0 10px"
                  name="message"
                  rows="5"
                  placeholder="Leave your Complaint"
                ></textarea>
              </div>
              <div class="text-center">
                    <button style="padding: 15px; border-style: none; background-color: #65c9cd; color: white; border-radius: 5px;">Book Appointment</button>
              </div>
            </form>
          </div>
      </section>
      <!-- End Appointment Section -->

</x-layout>
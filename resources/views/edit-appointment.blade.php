<x-layout>

    <div class="container" style="padding-top: 15rem; padding-bottom:5rem">
        <h1>Edit Appointments</h1>

        <form action="{{ secure_url(route('editAppointments', $appointment->id)) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-md-4 form-group">
                <input
                  type="text"
                  name="bookingName"
                  class="form-control"
                  id="bookingName"
                  placeholder="Your Name"
                  value="{{ old('bookingName', $appointment->bookingName) }}"
                  required
                />
              </div>
              <div class="col-md-4 form-group mt-3 mt-md-0">
                <input
                  type="email"
                  class="form-control"
                  name="bookingEmail"
                  id="email"
                  value="{{ old('bookingEmail', $appointment->bookingEmail) }}"
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
                  value="{{ old('phoneNo', $appointment->phoneNo) }}"
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
                  value="{{ old('bookingDate', $appointment->bookingDate) }}"
                  class="form-control datepicker"
                  id="date"
                  placeholder="Appointment Date"
                  required
                />
              </div>
              <div class="col-md-4 form-group mt-3">
                <select name="department" id="department" class="form-select">
                  <option value="0" {{ old('department', $appointment->department) === 'Select Department' ? 'selected' : '' }}>Select Department</option>
                  <option value="1" {{ old('department', $appointment->department) === 'Dental Care' ? 'selected' : '' }}>Dental Care</option>
                  <option value="2" {{ old('department', $appointment->department) === 'Pharmacy' ? 'selected' : '' }}>Pharmacy</option>
                  <option value="3" {{ old('department', $appointment->department) === 'Anasthethics' ? 'selected' : '' }}>Anasthethics</option>
                  <option value="4" {{ old('department', $appointment->department) === 'Paediatrics' ? 'selected' : '' }}>Paediatrics</option>
                  <option value="5" {{ old('department', $appointment->department) === 'Laboratory' ? 'selected' : '' }}>Laboratory</option>
                  <option value="6" {{ old('department', $appointment->department) === 'General Medicine' ? 'selected' : '' }}>General Medicine</option>

                </select>
              </div>
              <div class="col-md-4 form-group mt-3">
                <select name="doctor" id="doctor" class="form-select">
                  <option value="0">Select Doctor</option>
                  <option value="1" {{ old('doctor', $appointment->doctor) === 'Dentist' ? 'selected' : '' }}>Dentist</option>
                  <option value="2" {{ old('doctor', $appointment->doctor) === 'Pharmacist' ? 'selected' : '' }}>Pharmacist</option>
                  <option value="3" {{ old('doctor', $appointment->doctor) === 'Anasthethologist' ? 'selected' : '' }}>Anasthethologist</option>
                  <option value="4" {{ old('doctor', $appointment->doctor) === 'Paediatrist' ? 'selected' : '' }}>Paediatrist</option>
                  <option value="5" {{ old('doctor', $appointment->doctor) === 'Lab Attendant/Assistant' ? 'selected' : '' }}>Lab Attendant/Assistant</option>
                  <option value="6" {{ old('doctor', $appointment->doctor) === 'General Doctor' ? 'selected' : '' }}>General Doctor</option>
                </select>
              </div>
            </div>

            <div class="form-group mt-3">
              <textarea
                class="form-control"
                style="margin: 0 0 10px"
                name="message"
                value="{{$appointment->message}}"
                rows="5"
                placeholder="Leave your Complaint"
              >{{ old('message', $appointment->message) }}</textarea>
            </div>
            <div class="text-center">
              <button style="padding: 15px; border-style: none; background-color: #65c9cd; color: white; border-radius: 5px;">Book Appointment</button>
            </div>
          </form>
    </div>
    


</x-layout>
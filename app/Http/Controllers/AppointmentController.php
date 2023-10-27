<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    // public function deleteAppointment($id) {
    //     // Find the booking by ID and delete it
    //     $booking = Book::find($id);

    //     if (!$booking) {
    //         // Handle if the booking doesn't exist (optional)
    //         return redirect()->route('viewBookings')->with('error', 'Booking not found.');
    //     }

    //     $booking->delete();
    // }

    public function deleteAppointment(Appointment $id) {
        if (auth()->user()->id === $id['user_id']) {
            $id->delete();
        }
        return redirect('/appointments');
    }

    public function showEditPage(Appointment $id) {
        if (auth()->user()->id !== $id['user_id']) {
            return redirect('/');
        }

        return view('/edit-appointment', ['appointment' => $id]);
    }

    public function updateAppointment(Appointment $id, Request $request) {
        if (auth()->user()->id !== $id['user_id']) {
            return redirect('/');
        }

        $i = rand(1000000, 6000000);
        $incomingFields = $request->validate([
            'bookingName' => 'required',
            'bookingEmail' => 'required',
            'phoneNo' => 'required',
            'bookingDate' => 'required',
            'department' => 'required',
            'doctor' => 'required',
            'message' => 'required',
        ]);

        // Define an array to map numeric values to doctor names
        $doctorNames = [
            '0' => 'Select Doctor',
            '1' => 'Dentist',
            '2' => 'Pharmacist',
            '3' => 'Anesthetist',
            '4' => 'Pediatrician',
            '5' => 'Lab Attendant/Assistant',
            '6' => 'General Doctor',
        ];

        $departmentNames = [
            '0' => 'Select Doctor',
            '1' => 'Dental Care',
            '2' => 'Pharmacy',
            '3' => 'Anasthethics',
            '4' => 'Paediatrics',
            '5' => 'Laboratory',
            '6' => 'General Medicine',
        ];

        $selectedDepartmentValue = strip_tags($incomingFields['department']);
        $selectedDepartmentName = $departmentNames[$selectedDepartmentValue];

        $selectedDoctorValue = strip_tags($incomingFields['doctor']);
        
        $selectedDoctorName = $doctorNames[$selectedDoctorValue];

        $incomingFields['bookingName'] = strip_tags($incomingFields['bookingName']);
        $incomingFields['bookingEmail'] = strip_tags($incomingFields['bookingEmail']);
        $incomingFields['phoneNo'] = strip_tags($incomingFields['phoneNo']);
        $incomingFields['bookingDate'] = strip_tags($incomingFields['bookingDate']);
        $incomingFields['department'] = $selectedDepartmentName;
        $incomingFields['doctor'] = $selectedDoctorName;
        $incomingFields['message'] = strip_tags($incomingFields['message']);
        $incomingFields['code'] = $i;

        $id->update($incomingFields);
        return redirect('/appointments');

    }

    public function createAppointment(Request $request) {
        $i = rand(1000000, 6000000);
        $incomingFields = $request->validate([
            'bookingName' => 'required',
            'bookingEmail' => 'required',
            'phoneNo' => 'required',
            'bookingDate' => 'required',
            'department' => 'required',
            'doctor' => 'required',
            'message' => 'required',
        ]);
        
        // Define an array to map numeric values to doctor names
        $doctorNames = [
            '0' => 'Select Doctor',
            '1' => 'Dentist', 
            '2' => 'Pharmacist',
            '3' => 'Anasthethologist',
            '4' => 'Paediatrist',
            '5' => 'Lab Attendant/Assistant',
            '6' => 'General Doctor',
        ];

        $departmentNames = [
            '0' => 'Select Doctor',
            '1' => 'Dental Care',
            '2' => 'Pharmacy',
            '3' => 'Anasthethics',
            '4' => 'Paediatrics',
            '5' => 'Laboratory',
            '6' => 'General Medicine',
        ];

        $selectedDepartmentValue = strip_tags($incomingFields['department']);
        $selectedDepartmentName = $departmentNames[$selectedDepartmentValue];

        $selectedDoctorValue = strip_tags($incomingFields['doctor']);
        
        $selectedDoctorName = $doctorNames[$selectedDoctorValue];

        $incomingFields['bookingName'] = strip_tags($incomingFields['bookingName']);
        $incomingFields['bookingEmail'] = strip_tags($incomingFields['bookingEmail']);
        $incomingFields['phoneNo'] = strip_tags($incomingFields['phoneNo']);
        $incomingFields['bookingDate'] = strip_tags($incomingFields['bookingDate']);
        $incomingFields['department'] = $selectedDepartmentName;
        $incomingFields['doctor'] = $selectedDoctorName;
        $incomingFields['message'] = strip_tags($incomingFields['message']);
        $incomingFields['code'] = $i;
        $incomingFields['user_id'] = auth()->id();
        Appointment::create($incomingFields);

        $page = route('view.appointments');
        return redirect('/appointment')->
        with('Success Booking', 'Appointment Booked Successfully. Booking Code: ' . $i . '. Please visit the View <a href="' . $page . '" class="text-blue-800 font-semibold">Appointment Page</a> to View and Edit your Appointments.');
    }


    public function filterAppointments(Request $request) {
        $filter = $request->input('filter');
        $search = $request->input('search');
        // $search = $searchValue;

        $user = auth()->user();

        $query = Appointment::query();

        if ($filter !== 'all') {
            $query->where('doctor', $filter);
        }

        if ($search && $search !== '') {
            $query->where('code', 'like', '%'. $search . '%');
            // $query->where('code', 'like', '%'. $search . '%');
        }

        $query->where('user_id', $user->id);

        $appointments = $query->get();

        return view('/view-bookings', ['bookings' => $appointments]);
    }


}
// bookingEmail
// phoneNo
// bookingDate
// department
// doctor
// message

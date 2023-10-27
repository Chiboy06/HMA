<x-layout>

    <div class="container overflow-x-hidden" style="padding-top: 12rem">
        <h1 class="text-2xl font-semibold mb-4">Bookings</h1>

            <!-- Filter and Search Form -->
        <form action="{{ route('filterAppointment') }}" method="GET">
            <div class="flex px-4  font-semibold justify-items-start place-items-start md:justify-between flex-col h-auto md:items-center bg-blue-500/20 md:flex-row md:flex md:h-20">
                <div class="p-2">
                    <label for="filter" class="mr-2">Filter:</label>
                    <select name="filter" id="filter" class="border rounded px-2 py-1 border-blue-500/20">
                        <option value="all">All</option>
                        <option value="Dentist">Dentist</option>
                        <option value="Pharmacist">Pharmacist</option>
                        <option value="Anasthethologist">Anasthethologist</option>
                        <option value="Paediatrist">Paediatrist</option>
                        <option value="Lab Attendant/Assistant">Lab Attendant/Assistant</option>
                        <option value="General Doctor">General Doctor</option>
                    </select>
                </div>
                <div class="p-2">
                    <label for="search" class="mr-2">Search:</label>
                    <input type="text" name="search" id="search" placeholder="search ... code, name" class="border rounded px-2">
                    
                </div>
                <button type="submit" class="bg-blue-500/20 btn btn-primary justify-center">Apply</button>
            </div>
        </form>

        <div class="container p-0 overflow-x-none">
            <div style="overflow-x: scroll">
                <table class="table-auto w-full md:w-fit overflow-x-auto border border-blue-500/20">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Date of Appointment</th>
                            <th class="px-4 py-2">Doctor</th>
                            <th class="px-4 py-2">Department</th>
                            <th class="px-4 py-2">Complaint</th>
                            <th class="px-4 py-2">Phone Number</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Appointment Code</th>
                            <th class="px-4 py-2">Edit</th>
                            <th class="px-4 py-2">Delete</th> {{-- Add a column for actions --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                            <tr>
                                <td class="px-4 py-2">{{ $booking->bookingDate }}</td>
                                <td class="px-4 py-2">{{ $booking->doctor }}</td>
                                <td class="px-4 py-2">{{ $booking->department }}</td>
                                <td class="px-4 py-2">{{ $booking->message }}</td>
                                <td class="px-4 py-2">{{ $booking->phoneNo }}</td>
                                <td class="px-4 py-2">{{ $booking->bookingEmail }}</td>
                                <td class="px-4 py-2">{{ $booking->code }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ secure_url(route('editAppointment', $booking->id)) }}" class="text-green-500 hover:text-blue-700"><i class="bi bi-pencil"></i></a>
                                </td>
                                <td class="px-4 py-2">
                                    <form action="{{ secure_url(route('deleteAppointment', $booking->id)) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-red-500 hover:text-red-700" title="Delete">
                                            <i class="bi bi-trash text-red-500 hover:text-red-700"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>

</x-layout>
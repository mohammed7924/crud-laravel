<style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }

    th {
      background-color: yellow;
    }


  </style>


<table style="width: 100%">
    <thead>
        <th   class="th" >S:n</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>DOB</th>
        <th>Place</th>
    </thead>
    <tbody>
                @foreach($users as $user)
                <tr class="text-center">
                    <td style="color: red">{{ $loop->iteration }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phonenumber }}</td>
                    <td>{{ $user->dob }}</td>
                    <td>{{ $user->place }}</td>




                </tr>


                @endforeach
            </tbody></table>

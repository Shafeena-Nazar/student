@include('common.header')
<div class="app-content">
    
     <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                  <div class="card-title">Students</div>
                    <div class="card-options"> <a href="{{ route('addNewStudent') }}" class="btn btn-radius btn-primary pull-right">New</a></div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="datatable-5" class="table table-bordered key-buttons text-nowrap" >
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Age</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Reporting Teacher</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach($students as $stud)
                            <tr>
                                <td data-label="#">{{ $no }}</td>
                                <td data-label="Name"> {{ $stud['name'] }}</td>
                                <td data-label="Age"> {{ $stud['age'] }}</td>
                                <td>{{ $stud['gender'] }} </td>
                                <td data-label="Reporting Teacher"> {{ $stud['reportingTeacher'] }}</td>
                                <td data-label="ACTION">
                                    <a href="{{ route('editStudent',$stud['studentsId']) }}" class="btn btn-success">Edit</a>
                                    <button class="btn btn-danger delete-content" element-id="{{ $stud['studentsId'] }}" element-table="students">Delete</button>
                                </td>
                            </tr>
                            @php
                                $no++;
                            @endphp
                        @endforeach
                        </tbody>
                    </table>
                  </div>
              </div>
          </div>
      </div>
    </div>
</div>
@include('common.footer')
@include('common.header')
<div class="app-content">
    
     <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                  <div class="card-title">Student Marks</div>
                    <div class="card-options"> <a href="{{ route('addNewMark') }}" class="btn btn-radius btn-primary pull-right">New</a></div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="datatable-5" class="table table-bordered key-buttons text-nowrap" >
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Maths</th>
                                <th scope="col">Science</th>
                                <th scope="col">History</th>
                                <th scope="col">Term</th>
                                <th scope="col">Total Marks</th>
                                <th scope="col">Created On</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach($marks as $score)
                            <tr>
                                <td data-label="#">{{ $no }}</td>
                                <td data-label="Name"> {{ $score['name'] }}</td>
                                <td data-label="Maths"> {{ $score['markMaths'] }}</td>
                                <td data-label="Science">{{ $score['markScience'] }} </td>
                                <td data-label="History"> {{ $score['markHistory'] }}</td>
                                <td data-label="Term"> {{ $score['term'] }}</td>
                                <td data-label="Total Marks"> {{ $score['markTotal'] }}</td>
                                <td data-label="Created On">{{ date('M j, Y h:i A',strtotime($score['created_at'])) }} </td>
                                <td data-label="Action">
                                    <a href="{{ route('editMark',$score['marksId']) }}" class="btn btn-success">Edit</a>
                                    <button class="btn btn-danger delete-content" element-id="{{ $score['marksId'] }}" element-table="marks">Delete</button>
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
@include('common.header')
<div class="app-content">
    <div class="row" id="addDiv">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    @if(!empty($profile['marksId']))
                        <div class="card-title">Edit Mark</div>
                    @else
                        <div class="card-title">New Mark</div>
                    @endif
                    <div class="card-options">
                    </div>
                </div>
                <div class="card-body">
                    @if(!empty($profile['marksId']))
                        <form method="post" action="{{ route('updateMark') }}" class="form-horizontal" id="departments_form">
                    @else
                        <form method="post" action="{{ route('addNewMark') }}" class="form-horizontal" id="departments_form">
                    @endif
                        @csrf
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                @if(!empty($profile['marksId']))
                                                    <input type="text" name="marksId"  value="{{ $profile['marksId'] }}"  id="marksId" class="form-control hidden" placeholder="id"   />
                                                    <input type="text" name="name" value="{{ $profile['name'] }}" readonly class="form-control" placeholder="Name"  required />
                                                @else
                                                    <select class="form-control select-box" name="student" >
                                                        <option value="">Student</option>
                                                        @foreach($students as $stud)
                                                        <option value="{{ $stud['studentsId']}} ">{{ $stud['name']}} </option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                                @error('name')
                                                <span class="text-red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="text" name="markMaths" @if(empty($profile['markMaths'])) value="{{ old('markMaths') }}" @else value="{{ $profile['markMaths'] }}" @endif   id="markMaths" class="form-control" placeholder ="Mark in maths"  required />
                                            </div>
                                            @error('markMaths')
                                                <span class="text-red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="text" name="markHistory" @if(empty($profile['markHistory'])) value="{{ old('markHistory') }}" @else value="{{ $profile['markHistory'] }}" @endif   id="markHistory" class="form-control" placeholder ="Mark in history"  required />
                                            </div>
                                            @error('markHistory')
                                                <span class="text-red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="text" name="markScience" @if(empty($profile['markScience'])) value="{{ old('markScience') }}" @else value="{{ $profile['markScience'] }}" @endif   id="markScience" class="form-control" placeholder ="Mark in science"  required />
                                            </div>
                                            @error('markScience')
                                                <span class="text-red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <select name="term" class="form-control select-box" required>
                                                    <option  value="">Term</option>
                                                    <option  @if(!empty($profile['term'])) @if($profile['term']   == 'One') selected ="" @endif  @endif value="One">One</option>
                                                    <option   @if(!empty($profile['term'])) @if($profile['term']  == 'Two') selected ="" @endif  @endif value="Two">Two</option>
                                                    <option  @if(!empty($profile['term'])) @if($profile['term']  == 'Three') selected ="" @endif  @endif value="Three">Three</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <input type="submit" name="btnsubmit" value="Generate"  class="btn btn-primary pull-right" id="btnsubmit" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('common.footer')

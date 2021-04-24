@include('common.header')
<div class="app-content">
	<div class="row" id="addDiv">
		<div class="col-md-12 col-lg-12">
			<div class="card">
				<div class="card-header">
					@if(!empty($profile['studentsId']))
						<div class="card-title">Edit Student</div>
					@else
						<div class="card-title">New Student</div>
					@endif
					<div class="card-options">
					</div>
				</div>
				<div class="card-body">
					@if(!empty($profile['studentsId']))
						<form method="post" action="{{ route('updateNewStudent') }}" class="form-horizontal" id="departments_form">
					@else
						<form method="post" action="{{ route('addNewStudent') }}" class="form-horizontal" id="departments_form">
					@endif
						@csrf
							<div class="panel-body">
								<div class="form-group">
									<div class="col-md-12 ">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" name="name" @if(empty($profile['name'])) value="{{ old('name') }}" @else value="{{ $profile['name'] }}" @endif  id="name" class="form-control" placeholder="Name"  required />
												@if(!empty($profile['studentsId']))
												<input type="text" name="studentsId"  value="{{ $profile['studentsId'] }}"  id="studentsId" class="form-control hidden" placeholder="id"   />
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
												<input type="text" name="age" @if(empty($profile['name'])) value="{{ old('age') }}" @else value="{{ $profile['age'] }}" @endif   id="age" class="form-control" placeholder ="Age"  required />
											</div>
											@error('age')
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
												<input type="radio" name="gender" value="M"  id="gender" class="radio-inline"  @if(!empty($profile['gender'])) @if($profile['gender']  == 'M') checked="" @endif @else checked @endif> Male &emsp;
												<input type="radio" name="gender" value="F"  id="gender" class="radio-inline"   @if(!empty($profile['gender'])) @if($profile['gender']  == 'F') checked="" @endif  @endif > Female &emsp;
												<input type="radio" name="gender" value="O"  id="gender" class="radio-inline"   @if(!empty($profile['gender'])) @if($profile['gender']  == 'O') checked="" @endif  @endif> Other
											</div>
											@error('gender')
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
												<select name="reportingTeacher" class="form-control select-box" required>
													<option  value="">Reporting Teacher</option>
													<option  @if(!empty($profile['reportingTeacher'])) @if($profile['reportingTeacher']  == 'Katie') selected ="" @endif  @endif value="Katie">Katie</option>
													<option  @if(!empty($profile['reportingTeacher'])) @if($profile['reportingTeacher']  == 'Max') selected ="" @endif  @endif value="Max">Max</option>
													<option  @if(!empty($profile['reportingTeacher'])) @if($profile['reportingTeacher']  == 'Alpha') selected ="" @endif  @endif value="Alpha">Alpha</option>
													<option  @if(!empty($profile['reportingTeacher'])) @if($profile['reportingTeacher']  == 'John') selected ="" @endif  @endif value="John">John</option>
													<option  @if(!empty($profile['reportingTeacher'])) @if($profile['reportingTeacher']  == 'Deo') selected ="" @endif  @endif value="Deo">Deo</option>
													<option  @if(!empty($profile['reportingTeacher'])) @if($profile['reportingTeacher']  == 'Mercy') selected ="" @endif  @endif value="Mercy">Mercy</option>
													<option  @if(!empty($profile['reportingTeacher'])) @if($profile['reportingTeacher']  == 'Sam') selected ="" @endif  @endif value="Sam">Sam</option>
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

@extends('layouts.base')
@section('title', 'メンバー名編集')

@section('content')
	<div class="container">
		@if (Auth::check())
			<div class="row">
				<div class="col-sm-offset-2 col-sm-8">
					<div class="card">
						<div class="card-header">
							メンバー名編集
						</div>

						<div class="card-body">
							<div class="col-sm-8">
								メンバー名 : {{ $member->membername }}
							</div>
							<!-- Display Validation Errors -->
							@include('common.errors')

							<!-- New Book Form -->
							<form action="/member-update/{{ $member->id }}" method="POST" class="form-horizontal">
								{{ csrf_field() }}

								<!-- Member Name -->
								<div class="form-group">
									<label for="task-name" class="col-sm-3 control-label">Member</label>

									<div class="col-sm-8">
										<input type="text" name="name" id="member-name" class="form-control" value="{{ old('member') }}">
									</div>
								</div>

								<!-- Add Book Button -->
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-8">
										<button type="submit" class="btn btn-outline-secondary">
											<i class="fa fa-plus"></i>メンバー名を変更する
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		@else
			<div class="row">
				<div class="col-sm-offset-2 col-sm-8">
					<div class="card">
						<div class="card-header">
							権限が必要
						</div>
						
						<div class="card-body">
							<div class="col-sm-8">
								ログインする必要があります
							</div>
						</div>
					</div>
				</div>
			</div>
		@endif

	</div>
@endsection
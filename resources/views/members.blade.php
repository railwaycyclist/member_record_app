@extends('layouts.base')
@section('title', 'メンバー情報一覧')

@section('content')
	<div class="container">
	@if (Auth::check())
		<p>USER: {{$user->name . '(' . $user->email . ')'}}</p>
	@else
		<p>
			※ログインしていません(<a href="/login">ログイン</a> | <a href="/register">登録</a>)
		</p>
	@endif
	<div class="container">
		<div class="col-sm-12">
			<div class="row">
				<div class="float-left">
					<a class="btn btn-outline-secondary" href="/create">新規メンバー</a>
				</div>
			</div>
			<!-- Members -->
			@if (count($members) > 0)
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							メンバー一覧
						</div>
						<div class="card-body">
							<table class="table table-striped task-table">
								<thead>
									<th>Member</th>
									<th>&nbsp;</th>
								</thead>
								<tbody>
									@foreach ($members as $member)
										<tr>
											<div class="float-left">
												<td class="table-text" width="100">
													<div>{{ $member->membername }}</div>
												</td>
												<!-- Task Delete Button -->
												<td>
													<a class="btn btn-outline-secondary" href="/detail/{{ $member->id }}">詳細</a>
													<a class="btn btn-outline-secondary" href="/edit/{{ $member->id }}">編集</a>
													<a class="btn btn-danger" href="/confirm-delete/{{ $member->id }}">
														<i class="fa fa-trash"></i>削除
													</a>
												</td>
											</div>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection
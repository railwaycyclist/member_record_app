@extends('layouts.base')
@section('title', '削除の確認')

@section('content')
	<div class="container">
		@if (Auth::check())
			<div class="col-sm-offset-2 col-sm-8">
				<div class="row">
					<div class="col-sm-12">
						メンバー情報削除
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						名前 : {{ $member->membername }}
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">削除しますか？</div>
					<form action="/delete/{{ $member->id }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button type="submit" class="btn btn-danger">はい</button>
					</form>
					<a class="btn btn-outline-secondary" href="/">いいえ</a>
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
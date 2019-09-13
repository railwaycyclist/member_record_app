@extends('layouts.base')
@section('title', 'メンバー情報詳細')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="row">
				<div class="col-sm-12">
					メンバー情報
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					名前 : {{ $member->membername }}
				</div>
			</div>
			<div class="row">
				<a class="btn btn-outline-secondary" href="/edit/{{ $member->id }}">編集</a>
				<a class="btn btn-danger" href="/confirm-delete/{{ $member->id }}">
					<i class="fa fa-trash"></i>削除
				</a>
				<a class="btn btn-outline-secondary" href="/">戻る</a>
			</div>
		</div>
	</div>
@endsection
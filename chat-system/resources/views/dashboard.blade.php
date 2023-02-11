{{ dd($user) }}

@extends('layouts.main')

@section('content')
				<div class="row">
								<div class="col-3 border border-primary" style="height: 100vh;">
												<x-custom-side-navbar :user='$user' />
								</div>
								<div class="col-9 border border-danger" style="height:100vh;">
								</div>
				</div>
@endsection

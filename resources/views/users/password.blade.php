@extends('layouts.app')

@section('content')

	<h1>Change Password</h1>

	@include('layouts.flash')

	<form action="{{ route('password.update') }}" method="post">
		{{ csrf_field() }}
		<div class="field">
		    <label class="label" for="password">{{ __('Current password') }}</label>
		    <p class="control">
		        <input type="password" class="input" name="password" id="password">
		    </p>
		</div>
		<div class="field">
		    <label class="label" for="new_password">{{ __('New password') }}</label>
		    <p class="control">
		        <input type="password" class="input" name="new_password" id="new_password">
		    </p>
		</div>
		<div class="field">
		    <label class="label" for="new_password_confirm">{{ __('Confirm') }}</label>
		    <p class="control">
		        <input type="password" class="input" name="new_password_confirm" id="new_password_confirm">
		    </p>
		</div>

		<button type="submit" class="button is-primary">Change password</button>
	</form>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align:center">Update Profile</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="products-section container">
        <div class="sidebar">

        </div> <!-- end sidebar -->
        <div class="my-profile">
            <div class="products-header">
                <h1 class="stylish-heading">My Profile</h1>
            </div>

            <div>
                <form action="{{ route('profileUpdate') }}" method="POST">
                    @method('patch')
                    @csrf
                    <div class="form-control">
                        <input id="phone" type="text" name="phone" value="{{ old('phone_no',  auth()->user()->phone_no) }}" placeholder="Phone Number" required>
                    </div>
                    <div class="form-control">
                        <input id="email" type="email" name="email" value="{{ old('email', auth()->user()->email) }}" placeholder="Email" required>
                    </div>
                    <div class="form-control">
                        <input id="password" type="password" name="password" placeholder="Password">
                        <div>Leave password blank to keep current password</div>
                    </div>
                    <div class="form-control">
                        <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password">
                    </div>
                    <div>
                        <button type="submit" class="my-profile-button">Update Profile</button>
                    </div>
                </form>
            </div>

            <div class="spacer"></div>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

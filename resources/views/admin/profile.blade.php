@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <img src="{{asset('storage/profile/'.auth()->user()->avatar)}}" alt="Profile" class="rounded-circle" style="width: 100px;height: 100px;border-radius: 50%;object-fit: cover">
                        <h2>{{auth()->user()->name}}</h2>
                        <h3>{{auth()->user()->job}}</h3>
                        <div class="social-links mt-2">
                            <a target="_blank" href="{{auth()->user()->twitter}}" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a target="_blank" href="{{auth()->user()->facebook}}" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a target="_blank" href="{{auth()->user()->instagram}}" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a target="_blank" href="{{auth()->user()->linkedin}}" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Social Media</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">
                            <!--- overview -->

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">About</h5>
                                <p class="small fst-italic">
                                    @if(auth()->user()->bio === null)
                                        Please describe your bio
                                    @else
                                        {{auth()->user()->bio}}
                                    @endif
                                </p>

                                <h5 class="card-title">Profile Details</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8">{{auth()->user()->name}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{auth()->user()->email}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8">
                                        @if(auth()->user()->phone === null)
                                            Please describe your phone number
                                        @else
                                            {{auth()->user()->phone}}
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Job</div>
                                    <div class="col-lg-9 col-md-8">
                                        @if(auth()->user()->job === null)
                                            Please describe your job
                                        @else
                                            {{auth()->user()->job}}
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Company</div>
                                    <div class="col-lg-9 col-md-8">
                                        @if(auth()->user()->company === null)
                                            Please describe your company
                                        @else
                                            {{auth()->user()->company}}
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Country</div>
                                    <div class="col-lg-9 col-md-8">
                                        @if(auth()->user()->country === null)
                                            Please describe your country
                                            @else
                                        {{auth()->user()->country}}
                                            @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8">
                                        @if(auth()->user()->address === null)
                                            Please describe your address
                                        @else
                                            {{auth()->user()->address}}
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <!-- Profile Edit Form -->
                                <form action="{{route('admin.update-photo')}}" method="post" id="photoForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="{{asset('storage/profile/'.auth()->user()->avatar)}}" alt="Profile">
                                            <div class="pt-2">
                                                <input type="file" name="avatar" id="photoInput" class="d-none">
                                                <button type="button" id="photoBtn" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></button>
                                                <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form action="{{route('admin.update-profile')}}" method="post">
                                    @csrf
                                    <x-input label="Full Name" name="name" placeholder="John Smith"></x-input>

                                    <div class="row mb-3">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="bio" class="form-control" id="about" style="height: 100px"></textarea>
                                        </div>
                                    </div>

                                    <x-input label="Company" name="company" placeholder="COD Company"></x-input>

                                    <x-input label="Job" name="job" placeholder="Web Designer"></x-input>

                                    <x-input label="Country" name="country" placeholder="Myanmar"></x-input>

                                    <x-input label="Address" name="address" placeholder="No.46, Thida Street, Kyauk Myaung, Yangon"></x-input>

                                    <x-input label="Phone" name="phone" placeholder="(+95) 9 403 179 169"></x-input>

{{--                                    <x-input label="Email" name="email" placeholder="tiandi@cmprogrammer.com"></x-input>--}}

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->
                            </div>

                            <div class="tab-pane fade pt-3" id="profile-settings">

                                <!-- Settings Form -->
                                <form action="{{route('admin.social')}}" method="post">
                                    @csrf
                                    <x-input label="Facebook" name="facebook" value="{{auth()->user()->facebook}}"></x-input>
                                    <x-input label="Twitter" name="twitter" value="{{auth()->user()->twitter}}"></x-input>
                                    <x-input label="Instagram" name="instagram" value="{{auth()->user()->instagram}}"></x-input>
                                    <x-input label="Linkedin" name="linkedin" value="{{auth()->user()->linkedin}}"></x-input>
                                    <x-input label="Youtube" name="youtube" value="{{auth()->user()->youtube}}"></x-input>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form action="{{route('admin.change-password')}}" method="post">
                                    @csrf
                                    <x-input label="Current Password" name="current_password" type="password"></x-input>
                                    <x-input label="New Password" name="password" type="password"></x-input>
                                    <x-input label="Re-enter New Password" name="confirm_password" type="password"></x-input>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        let photoBtn = document.getElementById('photoBtn');
        let photoInput = document.getElementById('photoInput');
        let photoForm = document.getElementById('photoForm');

        photoBtn.addEventListener('click',()=>{
            // e.preventDefault();
            photoInput.click();
        })
        photoInput.addEventListener('change',()=>{
            photoForm.submit();
        })
    </script>
@endsection

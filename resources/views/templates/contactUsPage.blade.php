<x-app-layout>
    <x-slot name="header">
        <i id="fa-back" class="d-none fas fa-arrow-left h2 text-dark position-absolute cursor-pointer" title="Go to Dashboard"></i>
        <div class="d-flex justify-between">
            <div class="d-flex">
                <img class="w-10 mt-4 rounded-lg m-auto" src="{{ url('/images/lightbulb.png') }}" alt="logo">
                <!-- <button id="download_app" class="btn btn-primary px-3 my-auto ml-2">Download App</button> -->
            </div>
            <div class="invisible">
                Go to Dashboard
            </div>
            @php
                $icon = $contact->home_icon;
            @endphp
            <div class="d-flex">
                <span class="home_icon btn btn-dark mr-2 my-auto p-1 px-3 rounded-pill">Home</span>
            </div>
        </div>
    </x-slot>
    <div class="contact_background_wall"></div>
    <div class="py-10 px-10 text-center mobile-contact-page">
        <div class="container mx-auto">
            @php
                $profile = $contact->profile_image;
            @endphp
            <div class="card shadow border border-white w-100 bg-dark">
                <div class="card-body m-3">
                    <h2 id="title" class="font-semibold text-dark">{{ $contact->title }}</h2>
                    <div class="row mt-5">
                        <div class="col-md-5" style="z-index: 5;">
                            <img class="w-40 contact_image float-right bg-white rounded-lg mr-3" src="{{ url($profile) }}" alt="profile image">
                        </div>
                        <div class="col-md-5 d-flex flex-column text-left my-auto text-white contact-details">
                            <h3 id="name" class="mb-3 text-danger">{{ $contact->name }}</h3>
                            <h5 id="designation" class="mb-3 text-danger">{{ $contact->designation }}</h5>
                            <h5 id="address" class="mb-3 text-danger">{{ $contact->address }}</h5>
                            <h5 id="city_state"class="mb-3 text-danger">{{ $contact->city }}, {{ $contact->pincode }}</h5>
                        </div>
                    </div>
                    <div class="row mt-4 d-block connect-info">
                        <div class="row mt-2">
                            <div class="col-5">
                                <i class="fa fa-phone-alt text-dark float-right h5"></i>
                            </div>
                            <div class="col-7 text-left text-dark my-auto">
                                <h5 id="phone_no">{{ $contact->phone_no }}</h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-5">
                                <i class="fab fa-whatsapp text-success float-right h3"></i>
                            </div>
                            <div class="col-7 text-left my-auto">
                                <h5 id="whatsapp_no" class="text-success">{{ $contact->whatsapp_no }}</h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-5">
                                <i class="fas fa-envelope text-warning float-right h5"></i>
                            </div>
                            <div class="col-7 text-left text-warning my-auto">
                                <h5 id="email_id">{{ $contact->email }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 mx-auto">
               
                
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('footer').hide();
        });
    </script>
</x-app-layout>

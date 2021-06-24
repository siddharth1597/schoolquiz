<x-app-layout>
    <x-slot name="header">
        <i id="fa-back" class="d-none fas fa-arrow-left h2 text-dark position-absolute cursor-pointer" title="Go to Dashboard"></i>
        <div class="d-flex justify-between">
            <div class="d-flex">
                <i id="fa-edit" class="fas fa-id-card h2 text-dark mr-3"></i>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight my-auto">
                    {{ __('Contact us') }}
                </h2>
            </div>
            <div class="invisible">
                Go to Dashboard
            </div>
            <div class="d-flex">
                <img class="logo home_icon" src="{{ url('images/school_quiz1.png') }}" alt="School Quiz"  title="Go to Home Screen">
            </div>
        </div>
    </x-slot>
    <div class="contact_background_wall"></div>
    <div class="py-10 px-10 text-center">
        <div class="container mx-auto">
            <div class="card shadow border border-white w-100 contact-us-back">
                <div class="card-body m-3">
                    <h2 id="title" class="font-semibold text-white">The Innovation Of</h2>
                    <div class="row mt-5">
                        <div class="col-md-5">
                            <img class="w-40 contact_image float-right bg-white rounded-lg mr-3" src="{{ url('/images/head_question.png') }}" alt="profile image">
                        </div>
                        <div class="col-md-5 d-flex flex-column text-left my-auto text-white">
                            <h3 id="name" class="mb-3">Siddharth Rastogi</h3>
                            <h5 id="designation" class="mb-3">Web Developer and Designer</h5>
                            <h5 id="address" class="mb-3">Address line 1</h5>
                            <h5 id="city_state"class="mb-3">City + State</h5>
                        </div>
                    </div>
                    <div class="row mt-4 d-block">
                        <div class="row mt-2">
                            <div class="col-md-5">
                                <i class="fab fa-whatsapp text-success float-right h3"></i>
                            </div>
                            <div class="col-md-5 text-left my-auto">
                                <h5 id="whatsapp_no" class="text-success">8938052752</h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-5">
                                <i class="fa fa-phone-alt text-light float-right h5"></i>
                            </div>
                            <div class="col-md-5 text-left text-white my-auto">
                                <h5 id="phone_no">8938052752</h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-5">
                                <i class="fas fa-envelope text-light float-right h5"></i>
                            </div>
                            <div class="col-md-5 text-left text-white my-auto">
                                <h5 id="email_id">sidd15597@gmail.com</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div>
                <img class="w-25 mx-auto" src="{{ url('images/quiz-logo-poll.jpg') }}" alt="quiz">
            </div> -->
        </div>
    </div>
</x-app-layout>

<footer class="position-relative bg-dark p-3 px-5 w-100 text-right shadow">
    <i class="fas fa-phone-alt text-white mr-2"></i>
    <a href="#" class="text-white">Contact us</a>
</footer>

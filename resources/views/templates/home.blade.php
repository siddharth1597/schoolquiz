<x-app-layout>
    <x-slot name="header">
        <div class="d-flex">
            <i id="fa-home" class="fas fa-home h2 text-dark mr-3"></i>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight my-auto">
                {{ __('School Quiz Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-16 px-10 text-center">
        <div class="container mx-auto">
            <div class="row">
                <div class="col-md-6 pt-5">
                    <div class="card shadow border border-primary cursor-pointer">
                        <div class="card-body m-12">
                            <i class="fas fa-book h1 text-primary mb-3"></i>
                            <h2 class="text-primary">Saved Quiz</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pt-5">
                    <div class="card shadow border border-success cursor-pointer organize-quiz">
                        <div class="card-body m-12">
                            <i class="fas fa-book h1 text-success mb-3"></i>
                            <h2 class="text-success">Organize Quiz</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white p-4 px-5 fixed-bottom text-right position-absolute shadow">
        <a href="#">Contact us</a>
    </div>
</x-app-layout>

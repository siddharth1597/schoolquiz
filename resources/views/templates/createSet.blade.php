<x-app-layout>
    <x-slot name="header">
        <div class="d-flex">
            <i id="fa-home" class="fas fa-edit h2 text-dark mr-3"></i>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight my-auto">
                {{ __('Create Quiz') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-10 px-10 text-center">
        <i class="fas fa-arrow-circle-left position-absolute text-dark cursor-pointer back_link">  Dashboard</i>
        <div class="container mx-auto">
            <div class="row">
                <img class="w-20" src="{{ url('images/time_paper.jpg') }}" alt="quiz">
                <h2 class="mx-2 my-3">Quiz set 1</h2>
            </div>
            <div class="row">
                <div class="card shadow border border-white w-100 bg-light">
                    <div class="card-body m-3">
                        <h4 class="font-weight-bold">Question 1</h4>
                        <form>
                            <div class="form-group">
                                <textarea class="rounded form-control" name="question" id="question" cols="115" rows="3" placeholder="Type your question here..." style="border-color: #d8dadc;"></textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 ml-3">
                                    <div class="row mt-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                <input type="radio" name="answer" id="answer" aria-label="Radio button for following text input">
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Option 1">
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                <input type="radio" name="answer" id="answer" aria-label="Radio button for following text input">
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Option 2">
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                <input type="radio" name="answer" id="answer" aria-label="Radio button for following text input">
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Option 3">
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                <input type="radio" name="answer" id="answer" aria-label="Radio button for following text input">
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Option 4">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group col-md-5 ml-5 mt-4">
                                    <div class="d-flex">
                                        <div class="custom-file">
                                            <input required type="file" class="custom-file-input" onchange="image_file(event, this.id)" id="contact_image" name="customFile" />
                                            <label class="custom-file-label" for="customFile" id="contact_images">Add Image or Video (optional)</label>
                                            <small id="upload_msg_proof d-none" class="form-text"></small>
                                        </div>
                                    </div>
                                    <img class="mt-3 w-80 mx-auto d-none" src="" alt="image">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer py-4">
                        <button id='save_details' onclick='saveQuestion()' class="btn btn-primary">Save Question</button>
                    </div>
                </div>
            </div>
            <div>
                <img class="w-25 mx-auto" src="{{ url('images/quiz-logo-poll.jpg') }}" alt="quiz">
            </div>
        </div>
    </div>
</x-app-layout>

<footer class="bg-dark p-3 px-5 w-100 text-right shadow">
    <i class="fas fa-phone-alt text-white mr-2"></i>
    <a href="#" class="text-white">Contact us</a>
</footer>

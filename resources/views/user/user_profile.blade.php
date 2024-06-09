@extends('user.user_master')
@section('title', 'Profile')
@section('user')



<div class="max-w-3xl mx-auto">
    

<div class="box relative rounded-lg shadow-md">

    <div class="flex md:gap-8 gap-4 items-center md:p-8 p-6 md:pb-4">


    <div class="relative md:w-20 md:h-20 w-12 h-12 shrink-0"> 
        <label for="file" class="cursor-pointer">
            <img id="img" src="{{ ($userData->photo) ? url('upload/user_images/'.$userData->photo) : asset('upload/no_image.jpg') }}" class="object-cover w-full h-full rounded-full" alt=""/>
            <input type="file"  name="photo" id="file" class="hidden" />
        </label>

        <label for="file" class="md:p-1 p-0.5 rounded-full bg-slate-600 md:border-4 border-white absolute -bottom-2 -right-2 cursor-pointer dark:border-slate-700">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="md:w-4 md:h-4 w-3 h-3 fill-white">
                <path d="M12 9a3.75 3.75 0 100 7.5A3.75 3.75 0 0012 9z" />
                <path fill-rule="evenodd" d="M9.344 3.071a49.52 49.52 0 015.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 01-3 3h-15a3 3 0 01-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 001.11-.71l.822-1.315a2.942 2.942 0 012.332-1.39zM6.75 12.75a5.25 5.25 0 1110.5 0 5.25 5.25 0 01-10.5 0zm12-1.5a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
            </svg>
            <input id="file" type="file"  name="photo"  class="hidden" />
        </label>
    </div>

        <div class="flex-1">
            <h3 class="md:text-xl text-base font-semibold text-black dark:text-white"> {{ $userData->name }}</h3>
            <p class="text-sm text-blue-600 mt-1 font-normal">{{ '@' . $userData->username }}</p>

        </div>

    </div>

    <!-- nav tabs -->
    <div class="relative border-b" tabindex="-1" uk-slider="finite: true">

        <nav class="uk-slider-container overflow-hidden nav__underline px-6 p-0 border-transparent -mb-px">

            <ul class="uk-slider-items w-[calc(100%+10px)] !overflow-hidden" 
                uk-switcher="connect: #setting_tab ; animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium"> 
                
                <li class="w-auto pr-2.5"> <a href="#"> Edit profile </a> </li>
                <li class="w-auto pr-2.5"> <a href="#"> Change Password</a> </li>
                <!-- <li class="w-auto pr-2.5"> <a href="#"> Avatare</a> </li>
                <li class="w-auto pr-2.5"> <a href="#"> Cover Photo</a> </li>
                <li class="w-auto pr-2.5"> <a href="#"> Invites</a> </li>
                <li class="w-auto pr-2.5"> <a href="#"> Finish</a> </li>  
                <li class="w-auto pr-2.5"> <a href="#"> Description </a> </li>
                <li class="w-auto pr-2.5"> <a href="#"> Setting</a> </li>  
                <li class="w-auto pr-2.5"> <a href="#"> anothers</a> </li>  
                <li class="w-auto pr-2.5"> <a href="#"> anothers</a> </li>  
                <li class="w-auto pr-2.5"> <a href="#"> anothers44</a> </li>   -->
                
            </ul>
        
        </nav>
                
        <a class="absolute -translate-y-1/2 top-1/2 left-0 flex items-center w-20 h-full p-2 py-1 justify-start bg-gradient-to-r from-white via-white dark:from-slate-800 dark:via-slate-800" href="#" uk-slider-item="previous"> <ion-icon name="chevron-back" class="text-2xl ml-1"></ion-icon> </a>
        <a class="absolute right-0 -translate-y-1/2 top-1/2 flex items-center w-20 h-full p-2 py-1 justify-end bg-gradient-to-l from-white via-white dark:from-slate-800 dark:via-slate-800" href="#" uk-slider-item="next">  <ion-icon name="chevron-forward" class="text-2xl mr-1"></ion-icon> </a>

    </div> 


    <div id="setting_tab" class="uk-switcher md:py-12 md:px-20 p-6 overflow-hidden text-black text-sm"> 

        <!-- tab user basic info -->
        <!-- <form id="profileForm"> -->
        <form id="profileForm" method="POST" action="{{ route('user.profile.update') }}">
            @csrf
            <div class="space-y-6">
                <div class="md:flex items-center gap-10">
                    <label class="md:w-32 text-right"> Full name </label>
                    <div class="flex-1 max-md:mt-4">
                        <input type="text" name="name" id="name" placeholder="John Doe" value="{{ $userData->name }}" class="w-full" required>
                    </div>
                </div>

                <div class="md:flex items-center gap-10">
                    <label class="md:w-32 text-right"> Username </label>
                    <div class="flex-1 max-md:mt-4">
                        <input type="text" name="username" id="username" placeholder="jdoe" value="{{ $userData->username }}" class="w-full" required>
                    </div>
                </div>

                <div class="md:flex items-center gap-10">
                    <label class="md:w-32 text-right"> Email </label>
                    <div class="flex-1 max-md:mt-4">
                        <input type="text" value="{{ $userData->email }}" placeholder="info@mydomain.com" class="w-full" readonly>
                    </div>
                </div>

                <div class="md:flex items-center gap-10">
                    <label class="md:w-32 text-right"> Phone </label>
                    <div class="flex-1 max-md:mt-4">
                        <input type="text" name="phone" id="phone" placeholder="08035543036" value="{{ $userData->phone }}" class="w-full" required>
                    </div>
                </div>

                <div class="md:flex items-start gap-10">
                    <label class="md:w-32 text-right"> Bio </label>
                    <div class="flex-1 max-md:mt-4">
                        <textarea id="bio" name="bio" class="w-full" rows="5" placeholder="Enter your Bio">{{ $userData->bio }}</textarea>
                    </div>
                </div>

                <div class="md:flex items-center gap-10">
                    <label class="md:w-32 text-right"> Gender </label>
                    <div class="flex-1 max-md:mt-4">
                        <select id="gender" name="gender" class="!border-0 !rounded-md lg:w-1/2 w-full">
                            <option value="male" {{ $userData->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $userData->gender == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                </div>

                <div class="md:flex items-start gap-10">
                    <label class="md:w-32 text-right"> Photo </label>
                    <div class="flex-1 flex items-center gap-5 max-md:mt-4">
                        <img src="{{ $userData->photo ? url('upload/user_images/'.$userData->photo) : asset('upload/no_image.jpg') }}" alt="" class="w-10 h-10 rounded-full">
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-4 mt-16 lg:pl-[10.5rem]">
                <button type="button" id="cancelButton" class="button lg:px-6 bg-secondary max-md:flex-1"> Cancel</button>
                <button type="submit" id="saveButton" class="button lg:px-10 bg-primary text-white max-md:flex-1"> Save <span class="ripple-overlay"></span></button>
            </div>
        </form>
    </div>


        
    <!-- tab password-->
    <div>
    <form id="passwordForm" method="POST" action="{{ route('user.update.password') }}">@csrf <!-- Include CSRF token for security -->
        <div>
            <div class="space-y-6 max-w-lg mx-auto">
                <div class="md:flex items-center gap-16 justify-between max-md:space-y-3">
                    <label class="md:w-40 text-right">Old Password</label>
                    <div class="flex-1 max-md:mt-4">
                        <input type="password" name="old_password" id="old_password" placeholder="******" class="w-full" required>
                    </div>
                </div>
                <div class="md:flex items-center gap-16 justify-between max-md:space-y-3">
                    <label class="md:w-40 text-right">New Password</label>
                    <div class="flex-1 max-md:mt-4">
                        <input type="password" name="new_password" id="new_password" placeholder="******" class="w-full" required>
                    </div>
                </div>
                <div class="md:flex items-center gap-16 justify-between max-md:space-y-3">
                    <label class="md:w-40 text-right">Repeat Password</label>
                    <div class="flex-1 max-md:mt-4">
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation" placeholder="******" class="w-full" required>
                    </div>
                </div>
                <hr class="border-gray-100 dark:border-gray-700">
            </div>
            <div class="flex items-center justify-center gap-4 mt-16">
                <button type="button" class="button lg:px-6 bg-secondary max-md:flex-1">Cancel</button>
                <button type="submit" class="button lg:px-10 bg-primary text-white max-md:flex-1">Save</button>
            </div>
        </div>
    </form>
</div>




    </div>
    

</div>


</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Upload Photo -->
<script>
    document.getElementById('file').addEventListener('change', function() {
        var file = this.files[0];
        var formData = new FormData();
        formData.append('photo', file);

        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/profile/photo', true);

        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

        xhr.onload = function() {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.alert_type === 'success') {
                    document.getElementById('img').src = URL.createObjectURL(file);
                    showSuccess(response.message);
                } else {
                    showError(response.message);
                }
            } else {
                var response = JSON.parse(xhr.responseText);
                showError(response.message || 'An error occurred while updating the photo.');
            }
        };

        xhr.onerror = function() {
            showError('An error occurred while updating the photo.');
        };

        xhr.send(formData);
    });

    function showSuccess(message) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 6000
        });

        Toast.fire({
            type: 'success',
            icon: 'success',
            title: message,
        });
    }

    function showError(message) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 6000
        });

        Toast.fire({
            type: 'error',
            icon: 'error',
            title: message,
        });
    }
</script>



<!-- Edit profile -->
<!-- <script>
    $(document).ready(function() {
        $('#profileForm').on('submit', function(e) {
            e.preventDefault();

            var formData = {
                name: $('#name').val(),
                username: $('#username').val(),
                phone: $('#phone').val(),
                bio: $('#bio').val(),
                gender: $('#gender').val(),
            };

            $.ajax({
                url: '/profile/update',
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    console.log('Server Response:', data);

                    handleResponse(data);
                },
                error: function(xhr, status, error) {
                    console.log('Error Response:', xhr, status, error);

                    var errorMessage = "An error occurred. Please try again later.";

                    if (xhr.status === 404) {
                        errorMessage = xhr.responseJSON.message || "Resource not found.";
                    }

                    showError(errorMessage);
                }
            });
        });
    });

    function handleResponse(data) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 6000
        });

        if (!data.alert_type) {
            showError("An error occurred.");
        } else if (data.alert_type === 'success') {
            Toast.fire({
                type: 'success',
                icon: 'success',
                title: data.message,
            });
        } else {
            showError(data.message);
        }
    }

    function showError(message) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 6000
        });

        Toast.fire({
            type: 'error',
            icon: 'error',
            title: message,
        });
    }
</script> -->

<script>
$(document).ready(function() {
    $('#profileForm').on('submit', function(e) {
        e.preventDefault();

        var formData = {
            name: $('#name').val(),
            username: $('#username').val(),
            phone: $('#phone').val(),
            bio: $('#bio').val(),
            gender: $('#gender').val(),
        };

        $.ajax({
            url: '/profile/update',
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                console.log('Server Response:', data);
                handleResponse(data);
            },
            error: function(xhr, status, error) {
                console.log('Error Response:', xhr, status, error);
                if (xhr.status === 422) {
                    // Handle validation error
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = "Validation Error: " + errors.join(', ');
                    showError(errorMessage);
                } else {
                    var errorMessage = "An error occurred. Please try again later.";
                    if (xhr.status === 404) {
                        errorMessage = xhr.responseJSON.message || "Resource not found.";
                    }
                    showError(errorMessage);
                }
            }
        });
    });
});

function handleResponse(data) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 6000
    });

    if (!data.alert_type) {
        showError("An error occurred.");
    } else if (data.alert_type === 'success') {
        Toast.fire({
            type: 'success',
            icon: 'success',
            title: data.message,
        });
    } else {
        showError(data.message);
    }
}

function showError(message) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 6000
    });

    Toast.fire({
        type: 'error',
        icon: 'error',
        title: message,
    });
}
</script>


<!-- update password -->
<script>
$(document).ready(function() {
    $('#passwordForm').on('submit', function(e) {
        e.preventDefault();

        var formData = {
            old_password: $('#old_password').val(),
            new_password: $('#new_password').val(),
            new_password_confirmation: $('#new_password_confirmation').val(),
            _token: $('input[name="_token"]').val() // CSRF token
        };

        $.ajax({
            url: '{{ route('user.update.password') }}', // Use the named route
            type: 'POST',
            data: formData,
            success: function(data) {
                if (data.alert_type === 'success') {
                    showSuccess(data.message);
                    // Reload the page after a short delay (2 seconds in this example)
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                } else {
                    showError(data.message);
                }
            },
            error: function(xhr, status, error) {
                var response = JSON.parse(xhr.responseText);
                showError(response.message || 'An error occurred while updating the password.');
            }
        });
    });
});

function showSuccess(message) {
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: message,
        showConfirmButton: false,
        timer: 6000
    });
}

function showError(message) {
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'error',
        title: message,
        showConfirmButton: false,
        timer: 6000
    });
}
</script>



@endsection
@extends('layouts.app')

@section('title', 'Book Online Appointment – Immigration & Visa Consulting | Visaway')

@section('content')
    <!-- Breadcrumb-Wrapper Section Start -->
    <section class="breadcrumb-wrapper fix bg-cover" style="background-image: url({{ asset('assets/img/inner-page/breadcrumb.jpg') }});">
        <div class="shape">
            <img src="{{ asset('assets/img/inner-page/shape.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="page-heading">
                <h1 class="breadcrumb-title">Book Appointment</h1>
                <ul class="breadcrumb-list">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                    <li>
                       Book Appointment
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Appointment Standalone Form Section Start -->
    <style>
        .booking-page-section {
            background-color: #F8FAFD;
            position: relative;
            z-index: 1;
        }
        .booking-page-card {
            background: #ffffff;
            border: 1px solid rgba(0, 72, 180, 0.08);
            border-radius: 24px;
            box-shadow: 0 15px 45px rgba(0, 72, 180, 0.05);
            padding: 50px;
        }
        .booking-form .form-label {
            font-weight: 700;
            color: #151A26;
            font-size: 13px;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: block;
        }
        .booking-form .form-control, 
        .booking-form .form-select {
            border: 1px solid #E2E8F0;
            border-radius: 12px;
            padding: 14px 18px;
            font-size: 14px;
            font-weight: 500;
            color: #1e293b;
            background-color: #f8fafc;
            transition: all 0.3s ease;
            width: 100%;
        }
        .booking-form .form-control:focus,
        .booking-form .form-select:focus {
            border-color: #0048B4;
            background-color: #fff;
            box-shadow: 0 0 0 4px rgba(0, 72, 180, 0.1);
            outline: none;
        }
        .booking-form .theme-btn {
            width: 100%;
            justify-content: center;
            border-radius: 12px;
            padding: 16px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        .is-invalid {
            border-color: #dc3545 !important;
            background-color: #fff8f8 !important;
        }
        .invalid-feedback {
            color: #dc3545;
            font-size: 12px;
            font-weight: 600;
            margin-top: 5px;
            display: block;
        }
    </style>

    <section class="booking-page-section section-padding fix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10">
                    <div class="booking-page-card">
                        <div class="text-center mb-5">
                            <span class="sub-title"
                                style="background: #EBF2FF; color: #0048B4; border: none; padding: 6px 18px; border-radius: 50px; font-size: 12px; font-weight: 800; text-transform: uppercase; display: inline-block; margin-bottom: 15px; letter-spacing: 1px;">
                                Book Online Consultation
                            </span>
                            <h2 style="font-size: 36px; font-weight: 800; color: #151A26; line-height: 1.25; margin-bottom: 15px;">
                                Schedule Your One-on-One Session
                            </h2>
                            <p style="color: #535761; font-size: 15px; max-width: 600px; margin: 0 auto; line-height: 1.6;">
                                Complete the quick form below, choose your preferred visa service category and scheduled time slot, and one of our dedicated global career advisors will contact you to confirm.
                            </p>
                        </div>

                        {{-- Alert messages --}}
                        <div id="booking-alert" style="display: none; margin-bottom: 25px;"></div>

                        <form id="appointmentForm" action="{{ route('appointment.store') }}" method="POST" class="booking-form">
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="book_name">Full Name *</label>
                                    <input type="text" name="name" id="book_name" class="form-control" placeholder="e.g. John Doe" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="book_email">Email Address *</label>
                                    <input type="email" name="email" id="book_email" class="form-control" placeholder="e.g. john@example.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="book_phone">Phone Number *</label>
                                    <input type="text" name="phone" id="book_phone" class="form-control" placeholder="e.g. +91 98765 43210" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="book_service">Desired Service *</label>
                                    <select name="service_id" id="book_service" class="form-select" style="height: 52px; background-color: #f8fafc;" required>
                                        <option value="">Select Service Category</option>
                                        @foreach($services as $service)
                                            <option value="{{ $service->Serviceid }}">{{ $service->ServicesTitle }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="book_date">Appointment Date *</label>
                                    <input type="date" name="appointment_date" id="book_date" class="form-control" min="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="book_time">Preferred Time Slot *</label>
                                    <select name="appointment_time" id="book_time" class="form-select" style="height: 52px; background-color: #f8fafc;" required>
                                        <option value="">Select Time Slot</option>
                                        <option value="10:00 AM - 11:00 AM">10:00 AM - 11:00 AM</option>
                                        <option value="11:00 AM - 12:00 PM">11:00 AM - 12:00 PM</option>
                                        <option value="12:00 PM - 01:00 PM">12:00 PM - 01:00 PM</option>
                                        <option value="02:00 PM - 03:00 PM">02:00 PM - 03:00 PM</option>
                                        <option value="03:00 PM - 04:00 PM">03:00 PM - 04:00 PM</option>
                                        <option value="04:00 PM - 05:00 PM">04:00 PM - 05:00 PM</option>
                                        <option value="05:00 PM - 06:00 PM">05:00 PM - 06:00 PM</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="book_message">Additional Message / Questions</label>
                                    <textarea name="message" id="book_message" class="form-control" rows="4" placeholder="Tell us more about your target country, course, or custom questions so we can prepare before the call..."></textarea>
                                </div>
                                <div class="col-12 mt-5">
                                    <button type="submit" class="theme-btn btn-blue" style="background-color: #0048B4; color: #fff; padding: 18px;">
                                        <span>CONFIRM BOOKING REQUEST</span>
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#appointmentForm').on('submit', function(e) {
            e.preventDefault();

            var $form = $(this);
            var $button = $form.find('button[type="submit"]');
            var $alertBox = $('#booking-alert');
            
            // Clear previous errors
            $form.find('.form-control, .form-select').removeClass('is-invalid');
            $form.find('.invalid-feedback').remove();
            $alertBox.hide().html('');

            // Loading state
            $button.prop('disabled', true).html('<span>PROCESSING BOOKING...</span> <i class="fa-solid fa-spinner fa-spin"></i>');

            $.ajax({
                url: $form.attr('action'),
                type: 'POST',
                data: $form.serialize(),
                dataType: 'json',
                success: function(response) {
                    // Success message
                    $alertBox.html('<div class="alert alert-success" style="border-radius: 12px; border: none; background-color: #d1e7dd; color: #0f5132; padding: 18px; font-weight: 600;"><i class="fa-solid fa-circle-check mr-2" style="font-size: 16px;"></i> ' + response.message + '</div>').fadeIn();
                    
                    // Reset form
                    $form[0].reset();

                    // Restore button
                    $button.prop('disabled', false).html('<span>CONFIRM BOOKING REQUEST</span> <i class="fa-solid fa-arrow-right"></i>');

                    // Scroll to alert
                    $('html, body').animate({
                        scrollTop: $alertBox.offset().top - 150
                    }, 500);
                },
                error: function(xhr) {
                    $button.prop('disabled', false).html('<span>CONFIRM BOOKING REQUEST</span> <i class="fa-solid fa-arrow-right"></i>');

                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        var errorHtml = '<div class="alert alert-danger" style="border-radius: 12px; border: none; background-color: #f8d7da; color: #842029; padding: 18px; font-weight: 600;"><i class="fa-solid fa-triangle-exclamation mr-2" style="font-size: 16px;"></i> Please fill all required fields correctly.</div>';
                        $alertBox.html(errorHtml).fadeIn();

                        // Highlight specific invalid fields
                        $.each(errors, function(field, messages) {
                            var $input = $form.find('[name="' + field + '"]');
                            $input.addClass('is-invalid');
                            $input.parent().append('<div class="invalid-feedback">' + messages[0] + '</div>');
                        });
                    } else {
                        // General server error
                        $alertBox.html('<div class="alert alert-danger" style="border-radius: 12px; border: none; background-color: #f8d7da; color: #842029; padding: 18px; font-weight: 600;"><i class="fa-solid fa-circle-exclamation mr-2" style="font-size: 16px;"></i> An unexpected error occurred. Please try again later.</div>').fadeIn();
                    }

                    // Scroll to alert
                    $('html, body').animate({
                        scrollTop: $alertBox.offset().top - 150
                    }, 500);
                }
            });
        });
    });
</script>
@endpush

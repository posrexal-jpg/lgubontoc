@extends('layouts.frontend')

@section('content')

<style>
    .contact-hero {
        background: linear-gradient(135deg, #155724 0%, #28a745 100%);
        padding: 50px 0 30px;
        color: white;
        text-align: center;
    }
    .contact-hero h1 { font-family: Helvetica; font-size: 2.2rem; margin-bottom: 8px; }
    .contact-hero p { opacity: 0.9; }
    .breadcrumb-bar {
        background: #f8f9fa; padding: 10px 20px;
        border-bottom: 1px solid #dee2e6; font-size: 0.9rem;
    }
    .breadcrumb-bar a { color: #28a745; text-decoration: none; }
    .contact-section { padding: 50px 0; }
    .contact-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        padding: 35px;
        height: 100%;
    }
    .contact-card h4 {
        font-family: Helvetica;
        color: #155724;
        border-bottom: 3px solid #28a745;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }
    .contact-info-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 18px;
    }
    .contact-info-item .icon {
        width: 40px;
        height: 40px;
        background: #e8f5e9;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #28a745;
        font-size: 1rem;
        flex-shrink: 0;
        margin-right: 14px;
    }
    .contact-info-item .text strong { display: block; color: #212529; font-size: 0.9rem; }
    .contact-info-item .text span { color: #6c757d; font-size: 0.88rem; }
    .contact-form .form-control { border-radius: 8px; border: 1px solid #dee2e6; padding: 10px 14px; }
    .contact-form .form-control:focus { border-color: #28a745; box-shadow: 0 0 0 0.2rem rgba(40,167,69,.2); }
    .contact-form label { font-weight: 600; color: #495057; font-size: 0.9rem; }
    .btn-send {
        background: #28a745;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 10px 30px;
        font-size: 0.95rem;
        font-weight: 600;
    }
    .btn-send:hover { background: #218838; }
    .map-container { border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.08); margin-top: 40px; }
    .office-hours-table td { padding: 6px 10px; font-size: 0.88rem; }
    .office-hours-table .day { font-weight: 600; color: #212529; }
    .office-hours-table .hours { color: #6c757d; }
    .social-links a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: #e8f5e9;
        color: #28a745;
        font-size: 1rem;
        margin-right: 8px;
        text-decoration: none;
        transition: background 0.2s;
    }
    .social-links a:hover { background: #28a745; color: white; }
</style>

<div class="contact-hero">
    <h1><i class="fa fa-envelope mr-2"></i>Contact Us</h1>
    <p>Get in touch with the Municipality of Bontoc</p>
</div>
<div class="breadcrumb-bar">
    <div class="container">
        <a href="{{ route('home') }}">Home</a> &rsaquo; Contact Us
    </div>
</div>

<div class="container contact-section">
    <div class="row">
        {{-- Contact Info --}}
        <div class="col-lg-5 mb-4">
            <div class="contact-card">
                <h4><i class="fa fa-map-marker-alt mr-2"></i>Contact Information</h4>

                <div class="contact-info-item">
                    <div class="icon"><i class="fa fa-map-marker-alt"></i></div>
                    <div class="text">
                        <strong>Address</strong>
                        <span>Municipal Hall, Bontoc, Southern Leyte 6538</span>
                    </div>
                </div>
                <div class="contact-info-item">
                    <div class="icon"><i class="fa fa-phone"></i></div>
                    <div class="text">
                        <strong>Contact Number</strong>
                        <span>+63-9566483040</span>
                    </div>
                </div>
                <div class="contact-info-item">
                    <div class="icon"><i class="fa fa-envelope"></i></div>
                    <div class="text">
                        <strong>Email Address</strong>
                        <span>bontoclgu@gmail.com</span>
                    </div>
                </div>
                <div class="contact-info-item">
                    <div class="icon"><i class="fa fa-clock"></i></div>
                    <div class="text">
                        <strong>Office Hours</strong>
                        <span>Monday – Friday</span>
                    </div>
                </div>

                <table class="office-hours-table mt-2 mb-3">
                    <tr><td class="day">Monday – Friday</td><td class="hours">8:00 AM – 5:00 PM</td></tr>
                    <tr><td class="day">Saturday</td><td class="hours">Closed</td></tr>
                    <tr><td class="day">Sunday</td><td class="hours">Closed</td></tr>
                    <tr><td class="day">Holidays</td><td class="hours">Closed</td></tr>
                </table>

                <hr>
                <h6 class="font-weight-bold mb-3" style="color:#155724;">Follow Us</h6>
                <div class="social-links">
                    <a href="https://www.facebook.com/BontocPIO" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.youtube.com" target="_blank" title="YouTube"><i class="fab fa-youtube"></i></a>
                    <a href="https://www.instagram.com" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>

        {{-- Contact Form --}}
        <div class="col-lg-7 mb-4">
            <div class="contact-card">
                <h4><i class="fa fa-paper-plane mr-2"></i>Send Us a Message</h4>
                <form action="javascript:void(0);" class="contact-form" id="contactForm">
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label>Full Name</label>
                            <input type="text" class="form-control" placeholder="Your full name" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label>Email Address</label>
                            <input type="email" class="form-control" placeholder="your@email.com" required>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Contact Number</label>
                        <input type="text" class="form-control" placeholder="e.g. +63 912 345 6789">
                    </div>
                    <div class="form-group mb-3">
                        <label>Subject</label>
                        <input type="text" class="form-control" placeholder="What is this regarding?" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Message</label>
                        <textarea class="form-control" rows="5" placeholder="Write your message here..." required></textarea>
                    </div>
                    <button type="submit" class="btn-send btn">
                        <i class="fa fa-paper-plane mr-2"></i>Send Message
                    </button>
                    <div id="formAlert" class="mt-3" style="display:none;"></div>
                </form>
            </div>
        </div>
    </div>

    {{-- Map --}}
    <div class="map-container">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3927.748!2d125.0239!3d10.2699!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3308b7e36c8a2c7d%3A0x0!2sBontoc%2C%20Southern%20Leyte!5e0!3m2!1sen!2sph!4v1"
            width="100%" height="380" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</div>

<script>
document.getElementById('contactForm').addEventListener('submit', function() {
    var alert = document.getElementById('formAlert');
    alert.style.display = 'block';
    alert.className = 'alert alert-success';
    alert.innerHTML = '<i class="fa fa-check-circle mr-1"></i> Thank you for your message! We will get back to you soon.';
    this.reset();
});
</script>

@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <x-tittle />
    <x-css-links />

    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #f9f9f9;
            line-height: 1.6;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        h1,
        h2,
        h3,
        h4 {
            color: #2c3e50;
            /* Darker shade for headings */
        }

        h1 {
            font-size: 2.8em;
            margin-bottom: 0.5em;
        }

        h2 {
            font-size: 2.2em;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
        }

        h3 {
            font-size: 1.5em;
            margin-bottom: 10px;
            font-weight: 600;
        }

        p {
            margin-bottom: 15px;
            color: #555;
        }

        .sub-heading {
            text-align: center;
            color: #007bff;
            /* Primary blue */
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 1.1em;
        }

        .section-intro {
            text-align: center;
            max-width: 600px;
            margin: 0 auto 40px auto;
            color: #777;
        }

        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 1em;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .link-secondary {
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
            margin-left: 15px;
        }

        .link-secondary:hover {
            text-decoration: underline;
        }

        .hero-section {
            /* The background image is set inline via style attribute in HTML for Laravel asset() compatibility */
            background-size: cover;
            background-position: center center;
            padding: 100px 20px;
            /* Vertical and horizontal padding */
            min-height: 450px;
            /* Minimum height to ensure the section is visible */
            /* You can also use vh units, e.g., min-height: 60vh; */
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            /* Fallback if flex alignment doesn't work for some reason */
        }

        .hero-overlay-box {
            background-color: rgba(30, 40, 50, 0.8);
            /* Semi-transparent dark background (adjust color and opacity) */
            /* Example: Dark desaturated blue/gray. Adjust R,G,B and Alpha (0.8 for 80% opacity) */
            color: #ffffff;
            /* White text */
            padding: 40px 30px;
            /* Padding inside the overlay box */
            border-radius: 12px;
            /* Rounded corners for the overlay box */
            max-width: 750px;
            /* Maximum width of the overlay box */
            width: 90%;
            /* Responsive width, takes 90% of parent up to max-width */
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.25);
            /* Subtle shadow for depth */
        }

        .hero-overlay-box h1 {
            color: #ffffff;
            font-size: 2.6em;
            /* Adjust for your design */
            font-weight: 700;
            margin-top: 0;
            /* Remove default top margin */
            margin-bottom: 0.6em;
            /* Space below heading */
            line-height: 1.2;
        }

        .hero-overlay-box p {
            color: #e9ecef;
            /* Slightly softer white for the paragraph */
            font-size: 1.15em;
            /* Adjust for your design */
            line-height: 1.7;
            margin-bottom: 35px;
            /* Space below paragraph, before the button */
        }

        /* Assuming you have general .btn and .btn-primary styles. */
        /* These ensure the button inside the hero overlay looks good. */
        .hero-overlay-box .btn-primary {
            background-color: #007bff;
            /* Your primary blue color */
            color: white;
            padding: 14px 35px;
            /* Button padding */
            border: none;
            border-radius: 30px;
            /* Pill-shaped button */
            font-size: 1.1em;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .hero-overlay-box .btn-primary:hover {
            background-color: #0056b3;
            /* Darker shade on hover */
            transform: translateY(-2px);
            /* Slight lift effect */
        }

        .hero-content h1 {
            color: #fff;
            font-weight: 700;
        }

        .hero-content p {
            color: #f0f0f0;
            font-size: 1.2em;
            margin-bottom: 30px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Commitment Section */
        .commitment-section {
            background-color: #fff;
        }

        .commitment-cards {
            display: flex;
            justify-content: space-around;
            gap: 30px;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .commitment-card {
            flex-basis: calc(33.333% - 30px);
            text-align: center;
            padding: 25px;
            background-color: #fdfdfd;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .commitment-card img {
            margin-bottom: 15px;
            border-radius: 50%;
            /* If icons are circular like placeholders */
        }

        /* Services Section */
        .services-section {
            background-color: #f0f8ff;
            /* Light blueish background */
        }

        .service-cards {
            display: flex;
            justify-content: space-between;
            gap: 30px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }

        .service-card {
            flex-basis: calc(33.333% - 30px);
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            /* To contain image */
            text-align: left;
        }

        .service-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
        }

        .service-card h3 {
            padding: 20px 20px 5px 20px;
        }

        .service-card p {
            padding: 0 20px 20px 20px;
            font-size: 0.95em;
        }

        .services-section .actions {
            text-align: center;
            margin-top: 30px;
        }

        /* How It Works Section */
        .how-it-works-section {
            background-color: #fff;
        }

        .steps {
            display: flex;
            flex-direction: column;
            gap: 30px;
            max-width: 800px;
            margin: 40px auto 0 auto;
        }

        .step {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .step-icon-container {
            flex-shrink: 0;
            width: 50px;
            height: 50px;
            background-color: #007bff;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5em;
            font-weight: bold;
        }

        .step-content h3 {
            margin-top: 0;
        }

        /* Testimonials Section */
        .testimonials-section {
            background-color: #f0f8ff;
            /* Light blueish background */
        }

        .testimonial-cards {
            display: flex;
            justify-content: space-around;
            gap: 30px;
            flex-wrap: wrap;
        }

        .testimonial-card {
            flex-basis: calc(50% - 30px);
            /* Two testimonials per row */
            background-color: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .testimonial-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .testimonial-header img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 15px;
            object-fit: cover;
        }

        .testimonial-info h4 {
            margin: 0 0 5px 0;
            font-size: 1.2em;
        }

        .stars {
            color: #f39c12;
            /* Gold color for stars */
        }

        .testimonial-card p {
            font-style: italic;
            color: #555;
        }

        /* Team Section */
        .team-section {
            background-color: #fff;
        }

        .optional-text {
            font-weight: normal;
            font-size: 0.7em;
            color: #777;
        }

        .team-members {
            display: flex;
            justify-content: space-around;
            gap: 30px;
            text-align: center;
            flex-wrap: wrap;
        }

        .team-member {
            flex-basis: calc(33.333% - 30px);
        }

        .team-member img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .team-member h3 {
            font-size: 1.3em;
            margin-bottom: 5px;
        }

        .team-member p {
            color: #007bff;
            font-weight: 500;
        }


        /* Contact Us Section */
        .contact-us-section {
            background-color: #eef5ff;
            /* Very light blue */
        }

        .contact-us-grid {
            display: flex;
            gap: 40px;
            flex-wrap: wrap;
        }

        .contact-form {
            flex: 1;
            min-width: 300px;
            /* Ensure form is not too squished */
        }

        .contact-info {
            flex: 1;
            min-width: 300px;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #444;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="tel"],
        .form-group textarea {
            width: calc(100% - 22px);
            /* Account for padding */
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        .form-group textarea {
            resize: vertical;
        }

        .contact-info h3 {
            margin-top: 0;
            color: #007bff;
        }

        .contact-info ul {
            list-style: none;
            padding: 0;
        }

        .contact-info li {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .contact-info li .icon {
            margin-right: 10px;
            color: #007bff;
            font-size: 1.2em;
            /* Example, replace with actual icons */
        }


        /* Responsive Adjustments */
        @media (max-width: 992px) {

            .commitment-card,
            .service-card,
            .team-member {
                flex-basis: calc(50% - 20px);
                /* Two cards per row */
            }

            .testimonial-card {
                flex-basis: 100%;
                /* One testimonial per row */
            }
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2.2em;
            }

            h2 {
                font-size: 1.8em;
            }

            .commitment-card,
            .service-card,
            .team-member {
                flex-basis: 100%;
                /* One card per row */
            }

            .contact-us-grid {
                flex-direction: column;
            }

            .hero-section {
                padding: 60px 0;
            }

            .hero-content p {
                font-size: 1em;
            }

            .steps {
                padding: 0 10px;
                /* Add some padding for steps on mobile */
            }

            .step {
                flex-direction: column;
                /* Stack icon and content on mobile */
                align-items: center;
                text-align: center;
            }

            .step-icon-container {
                margin-bottom: 10px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 30px 15px;
            }

            .btn {
                padding: 10px 20px;
                font-size: 0.9em;
            }

            .hero-section .container {
                padding: 20px;
            }
        }

        /* === CSS لتنسيق غلاف الأيقونة الدائري === */
        .commitment-icon-wrapper {
            display: inline-block;
            /* للسماح بالتوسيط إذا كانت البطاقة text-align: center */
            width: 64px;
            /* عرض الدائرة */
            height: 64px;
            /* ارتفاع الدائرة */
            line-height: 64px;
            /* لتوسيط الأيقونة عموديًا داخل الدائرة */
            background-color: #007bff;
            /* لون خلفية الدائرة (الأزرق الأساسي) */
            color: #ffffff;
            /* لون الأيقونة نفسها (أبيض) */
            border-radius: 50%;
            /* لجعلها دائرية الشكل */
            text-align: center;
            /* لتوسيط الأيقونة أفقيًا */
            margin-bottom: 20px;
            /* مسافة أسفل الدائرة */
            /* يمكنك إضافة ظل خفيف إذا أردت */
            /* box-shadow: 0 2px 4px rgba(0,0,0,0.1); */
        }

        .commitment-icon-wrapper i.fa-solid {
            font-size: 1.8em;
            /* حجم الأيقونة داخل الدائرة، عدّله ليتناسب بشكل جيد */
            /* (1.8em بالنسبة لحجم خط 16px يعادل حوالي 28.8px) */
            vertical-align: middle;
            /* يساعد في محاذاة الأيقونة عموديًا بشكل أدق */
        }

        /* === تعديلات على تنسيق بطاقة "Commitment" نفسها === */
        .commitment-card {
            /* تأكد من أن هذه التنسيقات موجودة أو قم بتكييفها */
            text-align: center;
            /* لتوسيط كل المحتوى (الأيقونة، العنوان، النص) */
            padding: 25px;
            background-color: #fdfdfd;
            /* أو #fff */
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            /* إذا كانت البطاقات في صف وتريد ارتفاعًا متناسقًا: */
            /* min-height: 250px; /* اضبط القيمة حسب الحاجة */
            */
        }

        /* قم بإزالة أو تعليق أي تنسيقات CSS سابقة خاصة بـ .commitment-card img */
        /* .commitment-card img {
    margin-bottom: 15px;
    border-radius: 50%; // هذا كان للصور الدائرية سابقًا
}
*/

        .commitment-card h3 {
            font-size: 1.3em;
            color: #2c3e50;
            margin-top: 0;
            margin-bottom: 10px;
        }

        .commitment-card p {
            font-size: 0.9em;
            color: #555;
            line-height: 1.6;
        }

        /* تأكد من وجود تنسيقات لحاوية البطاقات .commitment-cards */
        .commitment-cards {
            display: flex;
            justify-content: space-around;
            gap: 30px;
            margin-top: 40px;
            flex-wrap: wrap;
        }
    </style>

</head>

<body>
    <x-nav-bar />

    <main>
        {{-- In your Blade file where the hero section should appear --}}
        <section class="hero-section" style="background-image: url('{{ asset('assets/img/1.png') }}');">
            <div class="hero-overlay-box">
                <h1>Compassionate Care, Trusted Support</h1>
                <p>Providing high-quality care solutions tailored to your needs. Our dedicated team is here to support
                    you every step of the way.</p>
                <button class="btn btn-primary">Learn More</button>
            </div>
        </section>
        <section class="commitment-section">
            <div class="container">
                <p class="sub-heading">Why Choose Us?</p>
                <h2>Our Commitment to Excellence</h2>
                <p class="section-intro">We are dedicated to providing the highest standard of care with a focus on
                    compassion, personalization, and trust.</p>
                <div class="commitment-cards">
                    <div class="commitment-card">
                        <div class="commitment-icon-wrapper">
                            <i class="fa-solid fa-hand-holding-heart"></i>
                        </div>
                        <h3>Compassionate</h3>
                        <p>Care delivered with empathy, respect, and kindness for every individual.</p>
                    </div>
                    <div class="commitment-card">
                        <div class="commitment-icon-wrapper">
                            <i class="fa-solid fa-sliders"></i>
                        </div>
                        <h3>Personalized Care</h3>
                        <p>Tailored care plans designed to meet the unique needs and preferences of each client.</p>
                    </div>
                    <div class="commitment-card">
                        <div class="commitment-icon-wrapper">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <h3>Trusted Service</h3>
                        <p>Reliable and professional caregivers you can depend on for consistent support.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="services-section">
            <div class="container">
                <p class="sub-heading">Our Services</p>
                <h2>Comprehensive Care Solutions</h2>
                <p class="section-intro">Explore our wide range of services designed to provide holistic support and
                    enhance well-being.</p>
                <div class="service-cards">
                    <div class="service-card">
                        <img src="{{ asset('assets/img/2.jpg') }}" alt="Service 1 Image">
                        <h3>In-Home Care</h3>
                        <p>Comfortable and professional care in the familiar surroundings of your own home.</p>
                    </div>
                    <div class="service-card">
                        <img src="{{ asset('assets/img/3.jpg') }}" alt="Service 2 Image">
                        <h3>Senior Assistance</h3>
                        <p>Specialized support for seniors, promoting independence and quality of life.</p>
                    </div>
                    <div class="service-card">
                        <img src="{{ asset('assets/img/4.jpg') }}" alt="Service 3 Image">
                        <h3>Specialized Support</h3>
                        <p>Targeted care for specific conditions or needs, delivered by trained professionals.</p>
                    </div>
                </div>
                <div class="actions">
                    <button class="btn btn-primary">View All Services</button>
                    <a href="#" class="link-secondary">Request a Callback</a>
                </div>
            </div>
        </section>

        <section class="how-it-works-section">
            <div class="container">
                <h2>How It Works?</h2>
                <div class="steps">
                    <div class="step">
                        <div class="step-icon-container">
                            <span class="step-number">1</span>
                        </div>
                        <div class="step-content">
                            <h3>Initial Consultation</h3>
                            <p>We start with a free consultation to understand your needs and preferences.</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-icon-container">
                            <span class="step-number">2</span>
                        </div>
                        <div class="step-content">
                            <h3>Personalized Plan</h3>
                            <p>Our team creates a customized care plan tailored specifically to you.</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-icon-container">
                            <span class="step-number">3</span>
                        </div>
                        <div class="step-content">
                            <h3>Ongoing Support</h3>
                            <p>Receive continuous care and support from our dedicated professionals.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="testimonials-section">
            <div class="container">
                <h2>Client Testimonials</h2>
                <div class="testimonial-cards">
                    <div class="testimonial-card">
                        <div class="testimonial-header">
                            <img src="{{ asset('assets/img/2.jpg') }}" alt="Sarah M.">
                            <div class="testimonial-info">
                                <h4>Sarah M.</h4>
                                <div class="stars">★★★★★</div>
                            </div>
                        </div>
                        <p>"The care provided was exceptional. The caregivers were compassionate and highly
                            professional. I highly recommend their services!"</p>
                    </div>
                    <div class="testimonial-card">
                        <div class="testimonial-header">
                            <img src="{{ asset('assets/img/4.jpg') }}" alt="John D.">
                            <div class="testimonial-info">
                                <h4>John D.</h4>
                                <div class="stars">★★★★★</div>
                            </div>
                        </div>
                        <p>"I'm very grateful for the support my family received. The team went above and beyond to
                            ensure our comfort and well-being."</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="team-section">
            <div class="container">
                <h2>Our Team <span class="optional-text">(Optional)</span></h2>
                <div class="team-members">
                    <div class="team-member">
                        <img src="{{ asset('assets/img/2.jpg') }}" alt="Dr. Emily Carter">
                        <h3>Dr. Emily Carter</h3>
                        <p>Lead Physician</p>
                    </div>
                    <div class="team-member">
                        <img src="{{ asset('assets/img/3.jpg') }}" alt="Michael Johnson">
                        <h3>Michael Johnson</h3>
                        <p>Care Coordinator</p>
                    </div>
                    <div class="team-member">
                        <img src="{{ asset('assets/img/4.jpg') }}" alt="Jessica Lee">
                        <h3>Jessica Lee</h3>
                        <p>Senior Nurse</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact-us-section">
            <div class="container">
                <h2>Contact Us</h2>
                <div class="contact-us-grid">
                    <div class="contact-form">
                        <form>
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea id="message" name="message" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>
                    <div class="contact-info">
                        <h3>Get In Touch</h3>
                        <p>Have questions or need assistance? Reach out to us!</p>
                        <ul>
                            <li><strong><i class="icon">📍</i> Address:</strong> 123 Care Street, HealthCity, HC
                                54321</li>
                            <li><strong><i class="icon">📞</i> Phone:</strong> (123) 456-7890</li>
                            <li><strong><i class="icon">📧</i> Email:</strong> info@careservices.com</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-footer />

    <x-js-link />
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VJ Security Services</title>

    <link rel="icon" href="resources/hero/vj1_icon.png" type="image/png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="animations.css">
    <!-- <link rel="stylesheet" href="style-light.css"> -->

    <!-- Base target for links -->
    <base target="_blank">
    <base target="_blank">
</head>

<body>
    <!-- Scroll to Top Button -->
    <div class="scroll-to-top" id="scrollToTop" onclick="scrollToTop()">
        <div class="scroll-text topic">Top</div>
        <div class="mouse-icon">
            <div class="mouse-wheel"></div>
        </div>
        <div class="scroll-tail"></div>
    </div>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <div class="hero-container">

            <!-- Navigation -->
            <nav class="navbar" id="navbar">
                <a href="#home" class="logo">
                    <!-- <div class="logo-icon">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L4 5v6.09c0 5.05 3.41 9.76 8 10.91 4.59-1.15 8-5.86 8-10.91V5l-8-3zm0 14.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5zm4.14-5.76c-.36.51-.96.85-1.64.85-1.1 0-2-.9-2-2s.9-2 2-2c.68 0 1.28.34 1.64.85.36-.51.96-.85 1.64-.85 1.1 0 2 .9 2 2s-.9 2-2 2c-.68 0-1.28-.34-1.64-.85z"/>
                        </svg>
                    </div>
                    <div class="logo-text">
                        <span>VJ SECURITY</span>
                        <span>SERVICES</span>
                    </div> -->
                    <img src="resources/hero/vj.png" class="navbar-logo">
                </a>

                <div class="nav-wrapper">
                    <ul class="nav-links" id="navLinks">
                        <li><a href="#home" class="active topic">Home</a></li>
                        <li><a href="#about" class="topic">About</a></li>
                        <li><a href="#services" class="topic">Services</a></li>
                        <li><a href="#approach" class="topic">Approach</a></li>
                        <li><a href="#service-areas" class="topic">Service&nbsp;Area</a></li>
                        <li><a href="#contact" class="topic">Contact</a></li>
                    </ul>
                </div>

                <div class="nav-cta">
                    <a href="tel:+1234567890" class="btn btn-outline boldTopic">
                        <svg viewBox="0 0 24 24" fill="currentColor" stroke="none" stroke-width="2">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                        </svg>
                        Call Now
                    </a>
                    <a href="#booking" class="btn btn-gold boldTopic">Request Quote</a>
                </div>

                <div class="menu-toggle" id="menuToggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </nav>

            <!-- Mobile Menu -->
            <div class="mobile-menu" id="mobileMenu">
                <div class="mobile-menu-close" id="mobileMenuClose">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 6L6 18M6 6L18 18" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>

                <a href="#home" class="topic">Home</a>
                <a href="#about" class="topic">About</a>
                <a href="#services" class="topic">Services</a>
                <a href="#approach" class="topic">Approach</a>
                <a href="#service-areas" class="topic">Service Area</a>
                <a href="#contact" class="topic">Contact</a>
                <a href="tel:+1234567890" class="btn btn-outline boldTopic">Call Now</a>
                <a href="#booking" class="btn btn-gold boldTopic">Request Quote</a>
            </div>

            <!-- Menu Overlay -->
            <div class="menu-overlay" id="menuOverlay"></div>

            <!-- Hero Section -->
            <section class="hero" id="home">
                <div class="hero-bg"></div>
                <div class="hero-overlay"></div>
                <div class="hero-grid-overlay"></div>

                <div class="hero-content">
                    <div class="hero-left">
                        <div class="tag-badge boldTopic">
                            Licensed Provider • ND7924 • Wpbr Compliant
                        </div>

                        <h1 class="hero-title boldTopic">VJ Security Services</h1>

                        <p class="hero-description para">
                            Security with control, calm and professional presence. We protect what matters most your
                            people, assets and events.
                        </p>
                    </div>
                </div>

                <div class="hero-cta-panel">
                    <div class="hero-buttons">
                        <a href="tel:+1234567890" class="btn btn-call boldTopic">
                            <svg viewBox="0 0 24 24" fill="currentColor" stroke="none" stroke-width="2">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                            </svg>
                            Call Now
                        </a>
                        <a href="#booking" class="btn btn-gold boldTopic">Request Quote</a>
                    </div>
                </div>

                <div class="trust-badge-container">
                    <div class="trust-badge boldTopic">
                        Trusted • Licensed • Professional
                    </div>
                </div>
            </section>
        </div>
    </div>


    <section id="about" class="about-section">
        <div class="about-container">

            <!-- Left: Text Content -->
            <div class="about-left">
                <div class="about-label">
                    <span class="about-label-text label">ABOUT US</span>
                    <div class="about-label-lines">
                        <span class="about-label-line"></span>
                        <span class="about-label-line"></span>
                    </div>
                </div>

                <h2 class="about-title topic">About VJ Security Services</h2>

                <p class="about-body para">
                    VJ Security Services is a licensed security company based in the Netherlands, fully compliant
                    with the Private Security Industry Act (Wpbr). With our registration number ND7924, we operate
                    with complete transparency and within the legal frameworks governing private security.
                </p>

                <p class="about-body para">
                    We specialize in professional, human-centered security. Our team consists of trained, certified
                    security officers who are selected not only for their expertise, but for their calm demeanor,
                    situational awareness and professional conduct.
                </p>

                <div class="about-license-box">
                    <span class="about-license-text para">
                        <strong>License: ND7924</strong> — We are fully registered and compliant with the Wpbr
                        (Wet particuliere beveiligingsorganisaties en recherchebureaus), the Dutch legal framework
                        governing all private security activities.
                    </span>
                </div>
            </div>

            <!-- Right: Shield + Badge -->
            <div class="about-right">
                <div class="about-trusted-badge">
                    <span class="about-trusted-percent boldTopic">100%</span>
                    <span class="about-trusted-label boldTopic">Trusted</span>
                </div>

                <!-- <div class="about-shield-wrap">
                <div class="about-shield">
                    <div class="about-shield-inner">
                        <span class="about-shield-vj">VJ</span>
                    </div>
                </div>
            </div>
 
            <div class="about-brand-text">
                <span>SECURITY</span>
                <span>SERVICES</span>
            </div> -->

                <img src="resources/vj__1__page-0001_1-removebg-w.png">
            </div>

        </div>
    </section>

    <section id="stats" class="stats-section">
        <div class="stats-grid">

            <div class="stat-item">
                <span class="stat-value boldTopic" data-target="7924" data-prefix="ND">ND0</span>
                <span class="stat-label para">Official License Number</span>
            </div>

            <div class="stat-divider"></div>

            <div class="stat-item">
                <span class="stat-value boldTopic" data-target="100" data-suffix="%">0%</span>
                <span class="stat-label para">Wpbr Compliant</span>
            </div>

            <div class="stat-divider"></div>

            <div class="stat-item">
                <span class="stat-value boldTopic" data-target="8" data-pad="2">00</span>
                <span class="stat-label para">Security Services</span>
            </div>

            <div class="stat-divider"></div>

            <div class="stat-item">
                <span class="stat-value boldTopic" data-target="5" data-pad="2">00</span>
                <span class="stat-label para">Provinces Covered</span>
            </div>

        </div>
    </section>

    <section id="services" class="services-section">
        <div class="services-container">

            <div class="services-grid">

                <!-- Text Block (spans 2×1) -->
                <div class="services-intro">
                    <div class="services-label">
                        <span class="services-label-text label">SERVICES</span>
                        <div class="services-label-lines">
                            <span class="services-label-line"></span>
                            <span class="services-label-line"></span>
                        </div>
                    </div>
                    <h2 class="services-title topic">Services We Supply</h2>
                    <p class="services-description para">
                        We offer a comprehensive range of professional security services tailored to the needs of
                        businesses, event organizers, private individuals and public institutions across the
                        Netherlands.
                    </p>
                </div>

                <!-- Item 2: Object Security -->
                <div class="service-card">
                    <div class="service-card-image">
                        <img src="resources/large event security guards services.jpeg" alt="Object Security"
                            loading="lazy">
                        <div class="service-card-overlay"></div>
                    </div>
                    <div class="service-card-content">
                        <div class="service-card-header">
                            <div class="service-card-dot"></div>
                            <h3 class="service-card-title boldTopic">Object Security</h3>
                        </div>
                        <p class="service-card-desc para">
                            Professional protection of commercial and industrial premises, including access management
                            and patrols.
                        </p>
                    </div>
                </div>

                <!-- Item 3: Event Security -->
                <div class="service-card">
                    <div class="service-card-image">
                        <img src="resources/services/event-security.jpg" alt="Event Security" loading="lazy">
                        <div class="service-card-overlay"></div>
                    </div>
                    <div class="service-card-content">
                        <div class="service-card-header">
                            <div class="service-card-dot"></div>
                            <h3 class="service-card-title boldTopic">Event Security</h3>
                        </div>
                        <p class="service-card-desc para">
                            Comprehensive security solutions for concerts, festivals, corporate events and private
                            gatherings.
                        </p>
                    </div>
                </div>

                <!-- Item 4: Personal Security -->
                <div class="service-card">
                    <div class="service-card-image">
                        <img src="resources/services/personal-security.jpg" alt="Personal Security" loading="lazy">
                        <div class="service-card-overlay"></div>
                    </div>
                    <div class="service-card-content">
                        <div class="service-card-header">
                            <div class="service-card-dot"></div>
                            <h3 class="service-card-title boldTopic">Personal Security</h3>
                        </div>
                        <p class="service-card-desc para">
                            Dedicated protection services for VIPs, executives and individuals requiring personal
                            safety.
                        </p>
                    </div>
                </div>

                <!-- Item 5: Fire Watch -->
                <div class="service-card">
                    <div class="service-card-image">
                        <img src="resources/services/fire-watch.jpg" alt="Fire Watch" loading="lazy">
                        <div class="service-card-overlay"></div>
                    </div>
                    <div class="service-card-content">
                        <div class="service-card-header">
                            <div class="service-card-dot"></div>
                            <h3 class="service-card-title boldTopic">Fire Watch</h3>
                        </div>
                        <p class="service-card-desc para">
                            Trained fire watch personnel to monitor premises and ensure rapid response to fire hazards.
                        </p>
                    </div>
                </div>

                <!-- Item 6: Retail Surveillance -->
                <div class="service-card">
                    <div class="service-card-image">
                        <img src="resources/services/retail-surveillance.jpg" alt="Retail Surveillance" loading="lazy">
                        <div class="service-card-overlay"></div>
                    </div>
                    <div class="service-card-content">
                        <div class="service-card-header">
                            <div class="service-card-dot"></div>
                            <h3 class="service-card-title boldTopic">Retail Surveillance</h3>
                        </div>
                        <p class="service-card-desc para">
                            Loss prevention and customer safety services for retail stores and shopping centers.
                        </p>
                    </div>
                </div>

                <!-- Item 7: Access Control -->
                <div class="service-card">
                    <div class="service-card-image">
                        <img src="resources/services/access-control.jpg" alt="Access Control" loading="lazy">
                        <div class="service-card-overlay"></div>
                    </div>
                    <div class="service-card-content">
                        <div class="service-card-header">
                            <div class="service-card-dot"></div>
                            <h3 class="service-card-title boldTopic">Access Control</h3>
                        </div>
                        <p class="service-card-desc para">
                            Professional management of entry points, visitor verification and secure area monitoring.
                        </p>
                    </div>
                </div>

                <!-- Item 8: Mobile Patrol -->
                <div class="service-card">
                    <div class="service-card-image">
                        <img src="resources/services/mobile-patrol.jpg" alt="Mobile Patrol" loading="lazy">
                        <div class="service-card-overlay"></div>
                    </div>
                    <div class="service-card-content">
                        <div class="service-card-header">
                            <div class="service-card-dot"></div>
                            <h3 class="service-card-title boldTopic">Mobile Patrol</h3>
                        </div>
                        <p class="service-card-desc para">
                            Regular vehicle patrols covering multiple locations with rapid incident response capability.
                        </p>
                    </div>
                </div>

                <!-- Item 9: Crowd Management -->
                <div class="service-card">
                    <div class="service-card-image">
                        <img src="resources/services/crowd-management.jpg" alt="Crowd Management" loading="lazy">
                        <div class="service-card-overlay"></div>
                    </div>
                    <div class="service-card-content">
                        <div class="service-card-header">
                            <div class="service-card-dot"></div>
                            <h3 class="service-card-title boldTopic">Crowd&nbsp;Management</h3>
                        </div>
                        <p class="service-card-desc para">
                            Expert crowd flow management and safety protocols for large public gatherings and venues.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ============================================
         APPROACH SECTION
         ============================================ -->
    <section id="approach" class="approach-section">
        <div class="approach-inner">

            <!-- TOP ROW: Card 01 left + Header right -->
            <div class="approach-top-row">

                <!-- Card 01 -->
                <div class="approach-card-wrapper" data-approach-card>
                    <div class="approach-number-box"><span class="approach-number boldTopic">01</span></div>
                    <div class="approach-content-card">
                        <div class="approach-card-title topic">Intake &amp; Risk Assessment</div>
                        <div class="approach-card-desc para">We Meet With You To Understand Your Environment, Risks, And
                            Objectives. Every Security Plan Starts With A Thorough Assessment Of Threats,
                            Vulnerabilities And Specific Requirements.</div>
                        <div class="approach-icon-btn">
                            <svg viewBox="0 0 24 24">
                                <circle cx="10.5" cy="10.5" r="7" />
                                <line x1="21" y1="21" x2="15.8" y2="15.8" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Section Header -->
                <div class="approach-header">
                    <div class="approach-label">
                        <span class="approach-label-text label">Approach</span>
                        <div class="approach-label-lines">
                            <span class="approach-label-line"></span>
                            <span class="approach-label-line"></span>
                        </div>
                    </div>
                    <h2 class="approach-section-title topic">Our Approach</h2>
                    <p class="approach-section-desc para">Every security assignment begins with understanding. We take a
                        structured, three-phase approach to every engagement — ensuring nothing is left to chance.</p>
                </div>

            </div>

            <!-- MIDDLE ROW: Card 02 right -->
            <div class="approach-mid-row">
                <div class="approach-card-wrapper" data-approach-card>
                    <div class="approach-number-box"><span class="approach-number boldTopic">02</span></div>
                    <div class="approach-content-card">
                        <div class="approach-card-title topic">Planning &amp; Briefing</div>
                        <div class="approach-card-desc para">Based On The Assessment, We Develop A Tailored Security Plan.
                            All Personnel Are Thoroughly Briefed With Clear Protocols, Communication Structures And Role
                            Assignments.</div>
                        <div class="approach-icon-btn">
                            <svg viewBox="0 0 24 24">
                                <rect x="3" y="3" width="18" height="18" rx="2" />
                                <line x1="3" y1="9" x2="21" y2="9" />
                                <line x1="9" y1="21" x2="9" y2="9" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BOTTOM ROW: Card 03 left -->
            <div class="approach-bot-row">
                <div class="approach-card-wrapper" data-approach-card>
                    <div class="approach-number-box"><span class="approach-number boldTopic">03</span></div>
                    <div class="approach-content-card">
                        <div class="approach-card-title topic">Execution &amp; Feedback</div>
                        <div class="approach-card-desc para">Our Team Executes The Plan With Precision And Calm Authority.
                            After Each Assignment, We Provide A Structured Debrief And Feedback Report For Continuous
                            Improvement.</div>
                        <div class="approach-icon-btn">
                            <svg viewBox="0 0 24 24">
                                <polyline points="20 6 9 17 4 12" />
                                <polyline points="20 12 9 23 4 18" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ============================================
         SERVICE AREAS SECTION
         ============================================ -->
    <section id="service-areas" class="areas-section">
        <div class="areas-container">

            <!-- Header -->
            <div class="areas-header">
                <div class="areas-label">
                    <span class="areas-label-text label">AREAS</span>
                    <div class="areas-label-lines">
                        <span class="areas-label-line"></span>
                        <span class="areas-label-line"></span>
                    </div>
                </div>
                <h2 class="areas-title topic">Service Areas We Available</h2>
                <p class="areas-desc para">VJ Security Services operates across multiple provinces in the Netherlands,
                    providing licensed security services to clients in both urban and rural settings.</p>
            </div>

            <!-- Accordion Cards -->
            <div class="areas-accordion" id="areasAccordion">

                <div class="area-card active" data-index="0"
                    data-map="https://www.google.com/maps/search/Groningen,+Netherlands">
                    <div class="area-card-bg" style="background-image:url('resources/Untitled.png')"></div>
                    <div class="area-card-overlay"></div>
                    <div class="area-card-collapsed-label topic">GRONINGEN</div>
                    <div class="area-card-expanded">
                        <div class="area-card-title-row">
                            <div class="area-card-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                            </div>
                            <h3 class="area-card-name boldTopic">GRONINGEN</h3>
                        </div>
                        <p class="area-card-subdesc para">Security services throughout the province of Groningen</p>
                        <a class="area-view-map-btn boldTopic" href="https://www.google.com/maps/search/Groningen,+Netherlands"
                            target="_blank">View Map</a>
                    </div>
                </div>

                <div class="area-card" data-index="1"
                    data-map="https://www.google.com/maps/search/Drenthe,+Netherlands">
                    <div class="area-card-bg" style="background-image:url('resources/Untitled\ \(1\).png')"></div>
                    <div class="area-card-overlay"></div>
                    <div class="area-card-collapsed-label topic">DRENTHE</div>
                    <div class="area-card-expanded">
                        <div class="area-card-title-row">
                            <div class="area-card-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                            </div>
                            <h3 class="area-card-name boldTopic">DRENTHE</h3>
                        </div>
                        <p class="area-card-subdesc para">Security services throughout the province of Drenthe</p>
                        <a class="area-view-map-btn boldTopic" href="https://www.google.com/maps/search/Drenthe,+Netherlands"
                            target="_blank">View Map</a>
                    </div>
                </div>

                <div class="area-card" data-index="2"
                    data-map="https://www.google.com/maps/search/Friesland,+Netherlands">
                    <div class="area-card-bg" style="background-image:url('resources/Untitled\ \(2\).png')"></div>
                    <div class="area-card-overlay"></div>
                    <div class="area-card-collapsed-label topic">FRIESLAND</div>
                    <div class="area-card-expanded">
                        <div class="area-card-title-row">
                            <div class="area-card-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                            </div>
                            <h3 class="area-card-name boldTopic">FRIESLAND</h3>
                        </div>
                        <p class="area-card-subdesc para">Security services throughout the province of Friesland</p>
                        <a class="area-view-map-btn boldTopic" href="https://www.google.com/maps/search/Friesland,+Netherlands"
                            target="_blank">View Map</a>
                    </div>
                </div>

                <div class="area-card" data-index="3"
                    data-map="https://www.google.com/maps/search/Overijssel,+Netherlands">
                    <div class="area-card-bg" style="background-image:url('resources/Untitled\ \(3\).png')"></div>
                    <div class="area-card-overlay"></div>
                    <div class="area-card-collapsed-label topic">OVERIJSSEL</div>
                    <div class="area-card-expanded">
                        <div class="area-card-title-row">
                            <div class="area-card-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                            </div>
                            <h3 class="area-card-name boldTopic">OVERIJSSEL</h3>
                        </div>
                        <p class="area-card-subdesc para">Security services throughout the province of Overijssel</p>
                        <a class="area-view-map-btn boldTopic" href="https://www.google.com/maps/search/Overijssel,+Netherlands"
                            target="_blank">View Map</a>
                    </div>
                </div>

                <div class="area-card" data-index="4"
                    data-map="https://www.google.com/maps/search/North+Holland,+Netherlands">
                    <div class="area-card-bg" style="background-image:url('resources/Untitled\ \(4\).png')"></div>
                    <div class="area-card-overlay"></div>
                    <div class="area-card-collapsed-label topic">NORTH HOLLAND</div>
                    <div class="area-card-expanded">
                        <div class="area-card-title-row">
                            <div class="area-card-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                            </div>
                            <h3 class="area-card-name boldTopic">NORTH HOLLAND</h3>
                        </div>
                        <p class="area-card-subdesc para">Security services throughout the province of North Holland</p>
                        <a class="area-view-map-btn boldTopic"
                            href="https://www.google.com/maps/search/North+Holland,+Netherlands" target="_blank">View
                            Map</a>
                    </div>
                </div>

            </div>

            <!-- Info Bar -->
            <div class="areas-info-bar">
                <div class="areas-info-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <line x1="12" y1="8" x2="12" y2="12" />
                        <line x1="12" y1="16" x2="12.01" y2="16" />
                    </svg>
                </div>
                <p class="para">Not sure if we cover your location? <a href="#contact" class="areas-info-link">Contact us
                        directly</a> — we regularly extend our operations to new areas and may be able to assist you
                    regardless of region.</p>
            </div>

        </div>
    </section>

    <!-- ============================================
         booking / QUOTE SECTION
         ============================================ -->
    <section id="booking" class="quote-section">
        <div class="quote-outer">

            <div class="quote-card">

                <!-- LEFT: Info -->
                <div class="quote-left">
                    <div class="quote-label">
                        <span class="quote-label-text label">QUOTE</span>
                        <div class="quote-label-lines">
                            <span class="quote-label-line"></span>
                            <span class="quote-label-line"></span>
                        </div>
                    </div>
                    <h2 class="quote-title topic">Request a Quote</h2>
                    <p class="quote-desc para">Fill in the form and we'll prepare a tailored security proposal for your
                        situation. No obligations – just a professional consultation.</p>

                    <ul class="quote-features">
                        <li>
                            <span class="quote-check">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12" />
                                    <polyline points="20 12 9 23 4 18" />
                                </svg>
                            </span>
                            Response within 24 hours
                        </li>
                        <li>
                            <span class="quote-check">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12" />
                                    <polyline points="20 12 9 23 4 18" />
                                </svg>
                            </span>
                            No-obligation quote
                        </li>
                        <li>
                            <span class="quote-check">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12" />
                                    <polyline points="20 12 9 23 4 18" />
                                </svg>
                            </span>
                            Tailored to your needs
                        </li>
                        <li>
                            <span class="quote-check">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12" />
                                    <polyline points="20 12 9 23 4 18" />
                                </svg>
                            </span>
                            Licensed &amp; insured service
                        </li>
                        <li>
                            <span class="quote-check">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12" />
                                    <polyline points="20 12 9 23 4 18" />
                                </svg>
                            </span>
                            Available 7 days a week
                        </li>
                    </ul>
                </div>

                <!-- RIGHT: Fields (no <form>) -->
                <div class="quote-right">

                    <div class="quote-row">
                        <div class="quote-field">
                            <div class="quote-field-label">Full Name</div>
                            <div class="quote-input-wrap">
                                <div class="quote-input" contenteditable="true"
                                    data-placeholder="Enter Your Full Name Here"></div>
                            </div>
                        </div>
                        <div class="quote-field">
                            <div class="quote-field-label">Company Name <span class="quote-optional">(Optional)</span>
                            </div>
                            <div class="quote-input-wrap">
                                <div class="quote-input" contenteditable="true"
                                    data-placeholder="Enter Your Company Name Here"></div>
                            </div>
                        </div>
                    </div>

                    <div class="quote-row">
                        <div class="quote-field">
                            <div class="quote-field-label">Phone Number</div>
                            <div class="quote-input-wrap">
                                <div class="quote-input" contenteditable="true"
                                    data-placeholder="Enter Your Phone Number Here"></div>
                            </div>
                        </div>
                        <div class="quote-field">
                            <div class="quote-field-label">Email Address <span class="quote-optional">(Optional)</span>
                            </div>
                            <div class="quote-input-wrap">
                                <div class="quote-input" contenteditable="true"
                                    data-placeholder="Enter Your Email Address Here"></div>
                            </div>
                        </div>
                    </div>

                    <div class="quote-row">
                        <div class="quote-field">
                            <div class="quote-field-label">Service Type</div>
                            <div class="quote-input-wrap quote-select-wrap">
                                <div class="quote-select" id="serviceTypeSelect">
                                    <span class="quote-select-text">Select Service Type You Need</span>
                                    <svg class="quote-select-arrow" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <polyline points="6 9 12 15 18 9" />
                                    </svg>
                                </div>
                                <div class="quote-select-dropdown" id="serviceDropdown">
                                    <div class="quote-select-option" data-value="object">Object Security</div>
                                    <div class="quote-select-option" data-value="event">Event Security</div>
                                    <div class="quote-select-option" data-value="personal">Personal Security</div>
                                    <div class="quote-select-option" data-value="fire">Fire Watch</div>
                                    <div class="quote-select-option" data-value="retail">Retail Surveillance</div>
                                    <div class="quote-select-option" data-value="access">Access Control</div>
                                    <div class="quote-select-option" data-value="patrol">Mobile Patrol</div>
                                    <div class="quote-select-option" data-value="crowd">Crowd Management</div>
                                </div>
                            </div>
                        </div>
                        <div class="quote-field">
                            <div class="quote-field-label">Location</div>
                            <div class="quote-input-wrap">
                                <div class="quote-input" contenteditable="true"
                                    data-placeholder="Enter Your Address Here"></div>
                            </div>
                        </div>
                    </div>

                    <div class="quote-row">
                        <div class="quote-field quote-field--full">
                            <div class="quote-field-label">Date / Period</div>
                            <div class="quote-input-wrap quote-date-wrap">
                                <div class="quote-date-toggle">
                                    <span class="quote-date-tab active" data-type="single">Single Date</span>
                                    <span class="quote-date-tab" data-type="range">Date Range</span>
                                </div>
                                <div class="quote-date-inputs">
                                    <div class="quote-date-single">
                                        <input type="date" class="quote-date-input" id="singleDate">
                                    </div>
                                    <div class="quote-date-range hidden">
                                        <input type="date" class="quote-date-input" id="dateFrom">
                                        <span class="quote-date-sep">→</span>
                                        <input type="date" class="quote-date-input" id="dateTo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="quote-row">
                        <div class="quote-field quote-field--full">
                            <div class="quote-field-label">Additional Notes</div>
                            <div class="quote-input-wrap">
                                <div class="quote-input quote-textarea" contenteditable="true"
                                    data-placeholder="Enter Additional Details About Your Request..."></div>
                            </div>
                        </div>
                    </div>

                    <div class="quote-submit-row">
                        <div class="quote-submit-btn" id="quoteSubmitBtn">Send Request</div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <!-- ============================================
     CONTACT SECTION
     ============================================ -->

    <section id="contact" class="contact-section">
        <div class="contact-outer">
            <div class="contact-card">

                <!-- DOT TEXTURE (matches quote-card::before) -->
                <!-- Applied via CSS ::before -->

                <!-- LEFT: Contact Info Items -->
                <div class="contact-info-left">

                    <div class="contact-info-item">
                        <div class="contact-icon-box">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                            </svg>
                        </div>
                        <div class="contact-info-text">
                            <span class="contact-info-label">PHONE NUMBER</span>
                            <span class="contact-info-value topic">0000000000000</span>
                        </div>
                    </div>

                    <div class="contact-info-divider"></div>

                    <div class="contact-info-item">
                        <div class="contact-icon-box">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                <polyline points="22,6 12,13 2,6" />
                            </svg>
                        </div>
                        <div class="contact-info-text">
                            <span class="contact-info-label">EMAIL ADDRESS</span>
                            <span class="contact-info-value topic">info@vjsecurity.nl</span>
                        </div>
                    </div>

                    <div class="contact-info-divider"></div>

                    <div class="contact-info-item">
                        <div class="contact-icon-box">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                        </div>
                        <div class="contact-info-text">
                            <span class="contact-info-label">BUSINESS ADDRESS</span>
                            <span class="contact-info-value topic">Netherlands</span>
                        </div>
                    </div>

                    <div class="contact-info-divider"></div>

                    <div class="contact-info-item">
                        <div class="contact-icon-box">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <polyline points="12 6 12 12 16 14" />
                            </svg>
                        </div>
                        <div class="contact-info-text">
                            <span class="contact-info-label">AVAILABILITY</span>
                            <span class="contact-info-value topic">7 Days A Week · 24/7 Operations</span>
                        </div>
                    </div>

                </div>

                <!-- RIGHT: Heading + Description -->
                <div class="contact-info-right">

                    <div class="contact-info-label-tag">
                        <span class="contact-info-tag-text label">CONTACT</span>
                        <div class="contact-tag-lines">
                            <span class="contact-tag-line"></span>
                            <span class="contact-tag-line"></span>
                        </div>
                    </div>

                    <h2 class="contact-info-title topic">Get in Touch<br>With Us</h2>

                    <p class="contact-info-desc para">
                        Have questions about our services or want to discuss your security needs? Our team is available
                        7 days a week.
                    </p>

                    <a href="#booking" class="contact-info-btn boldTopic">Request a Quote</a>
                </div>

                <!-- Inner bottom dark bar spanning full card width -->
                <div class="contact-inner-bar"></div>

            </div>

        </div>

    </section>

    <!-- ============================================
     FAQ SECTION
     ============================================ -->

    <section id="faq" class="faq-section">

        <div class="faq-inner">

            <!-- LEFT: Image + Text overlay -->
            <div class="faq-left">
                <div class="faq-left-bg"></div>
                <div class="faq-left-gradient"></div>
                <div class="faq-left-content">
                    <div class="faq-label">
                        <span class="faq-label-text label">FAQ</span>
                        <div class="faq-label-lines">
                            <span class="faq-label-line"></span>
                            <span class="faq-label-line"></span>
                        </div>
                    </div>
                    <h2 class="faq-title topic">Frequently Asked Questions</h2>
                    <p class="faq-desc para">Fill in the form and we'll prepare a tailored security proposal for your
                        situation. No obligations - just a professional consultation.</p>
                </div>
            </div>

            <!-- RIGHT: Accordion -->
            <div class="faq-right">

                <div class="faq-item active" data-faq>
                    <div class="faq-q">
                        <span class="faq-num boldTopic">01</span>
                        <span class="faq-q-text topic">What areas do you cover in the Netherlands?</span>
                        <span class="faq-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg></span>
                    </div>
                    <div class="faq-a">
                        <p class="para">We operate across multiple provinces including Groningen, Drenthe, Friesland, Overijssel, and
                            North Holland. Contact us if your location isn't listed — we regularly extend our operations
                            to new areas.</p>
                    </div>
                </div>

                <div class="faq-item" data-faq>
                    <div class="faq-q">
                        <span class="faq-num boldTopic">02</span>
                        <span class="faq-q-text topic">Are your security officers licensed and certified?</span>
                        <span class="faq-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg></span>
                    </div>
                    <div class="faq-a">
                        <p class="para">Yes. All our security personnel are fully trained, certified, and vetted. VJ Security
                            Services operates under license number ND7924, fully compliant with the Wpbr (Wet
                            particuliere beveiligingsorganisaties en recherchebureaus).</p>
                    </div>
                </div>

                <div class="faq-item" data-faq>
                    <div class="faq-q">
                        <span class="faq-num boldTopic">03</span>
                        <span class="faq-q-text topic">How quickly can you deploy security personnel?</span>
                        <span class="faq-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg></span>
                    </div>
                    <div class="faq-a">
                        <p class="para">We aim to respond to all quote requests within 24 hours. Deployment timelines depend on the
                            scope of the assignment, but we can accommodate both planned events and urgent security
                            needs.</p>
                    </div>
                </div>

                <div class="faq-item" data-faq>
                    <div class="faq-q">
                        <span class="faq-num boldTopic">04</span>
                        <span class="faq-q-text topic">What types of events do you provide security for?</span>
                        <span class="faq-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg></span>
                    </div>
                    <div class="faq-a">
                        <p class="para">We cover concerts, festivals, corporate events, private gatherings, and large public venues.
                            Our teams are experienced in both crowd management and VIP protection for all event scales.
                        </p>
                    </div>
                </div>

                <div class="faq-item" data-faq>
                    <div class="faq-q">
                        <span class="faq-num boldTopic">05</span>
                        <span class="faq-q-text topic">Do you offer 24/7 security services?</span>
                        <span class="faq-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg></span>
                    </div>
                    <div class="faq-a">
                        <p class="para">Yes. We operate 24 hours a day, 7 days a week, 365 days a year. Whether you need overnight
                            object security or round-the-clock mobile patrols, we have you covered.</p>
                    </div>
                </div>

                <div class="faq-item" data-faq>
                    <div class="faq-q">
                        <span class="faq-num boldTopic">06</span>
                        <span class="faq-q-text topic">How do I request a quote?</span>
                        <span class="faq-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg></span>
                    </div>
                    <div class="faq-a">
                        <p class="para">Simply fill in our quote request form on this page with your details, service type, location
                            and preferred date. We'll get back to you within 24 hours with a tailored proposal — no
                            obligations.</p>
                    </div>
                </div>

                <div class="faq-item" data-faq>
                    <div class="faq-q">
                        <span class="faq-num boldTopic">07</span>
                        <span class="faq-q-text topic">Is VJ Security Services insured?</span>
                        <span class="faq-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg></span>
                    </div>
                    <div class="faq-a">
                        <p class="para">Yes. We are fully licensed and insured, operating within the legal frameworks of the Dutch
                            private security industry. Our registration number ND7924 confirms our compliance with all
                            applicable regulations.</p>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">

            <!-- Footer CTA Box -->
            <div class="footer-cta-wrapper">
                <div class="footer-cta-box">
                    <div class="footer-cta-content boldTopic">
                        <h2>Get a free estimate today</h2>
                    </div>
                    <div class="footer-cta-content-right">
                        <p class="para">Have questions about our services or want to discuss your security needs? Our team is
                            available 7 days a week.</p>
                        <a href="#booking" class="footer-cta-btn boldTopic">Request Quote</a>
                    </div>
                </div>
            </div>

            <!-- Footer Main Content -->
            <div class="footer-main">
                <div class="footer-dotted-v"></div>
                <div class="footer-grid">

                    <!-- Column 1: Logo + Description -->
                    <div class="footer-brand">
                        <div class="footer-logo">
                            <!-- <div class="footer-logo-icon">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 2L4 5v6.09c0 5.05 3.41 9.76 8 10.91 4.59-1.15 8-5.86 8-10.91V5l-8-3zm0 14.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5zm4.14-5.76c-.36.51-.96.85-1.64.85-1.1 0-2-.9-2-2s.9-2 2-2c.68 0 1.28.34 1.64.85.36-.51.96-.85 1.64-.85 1.1 0 2 .9 2 2s-.9 2-2 2c-.68 0-1.28-.34-1.64-.85z"/>
                                </svg>
                            </div>
                            <div class="footer-logo-text">
                                <span>SECURITY</span>
                                <span>SERVICES</span>
                            </div> -->
                            <img src="resources/footer/vj.png" class="navbar-logo">
                        </div>
                        <p class="footer-description para">
                            Every security assignment begins with understanding. We take a structured, three-phase
                            approach to every engagement - ensuring nothing is left to chance.
                        </p>
                        <div class="footer-social">
                            <a href="#" class="social-icon" aria-label="Facebook">
                                <svg viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                            </a>
                            <a href="#" class="social-icon" aria-label="Twitter">
                                <svg viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                </svg>
                            </a>
                            <a href="#" class="social-icon" aria-label="Instagram">
                                <svg viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Column 2: Quick Links -->
                    <div class="footer-column">
                        <h3 class="topic">Quick Links</h3>
                        <ul class="footer-links">
                            <li><a href="#home" class="boldTopic">Home</a></li>
                            <li><a href="#services" class="boldTopic">Services</a></li>
                            <li><a href="#about" class="boldTopic">About</a></li>
                            <li><a href="#booking" class="boldTopic">Quote</a></li>
                            <li><a href="#contact" class="boldTopic">Contact</a></li>
                            <li><a href="#approach" class="boldTopic">Approach</a></li>
                            <li><a href="#faq" class="boldTopic">FaQ</a></li>
                        </ul>
                    </div>

                    <!-- Column 3: Services -->
                    <div class="footer-column">
                        <h3 class="topic">Services</h3>
                        <ul class="footer-links">
                            <li><a href="#" class="boldTopic">Object Security</a></li>
                            <li><a href="#" class="boldTopic">Fire Watch</a></li>
                            <li><a href="#" class="boldTopic">Event Security</a></li>
                            <li><a href="#" class="boldTopic">Personal Security</a></li>
                            <li><a href="#" class="boldTopic">Retail Surveillance</a></li>
                            <li><a href="#" class="boldTopic">Access Control</a></li>
                        </ul>
                    </div>

                    <!-- Column 4: Contact Info -->
                    <div class="footer-column">
                        <h3 class="topic">Contact Info</h3>
                        <div class="contact-item">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                            </svg>
                            <span class="boldTopic">0000000000000</span>
                        </div>
                        <div class="contact-item">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                <polyline points="22,6 12,13 2,6" />
                            </svg>
                            <span class="boldTopic">[email protected]</span>
                        </div>
                        <div class="contact-item">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                            <span class="boldTopic">Netherlands</span>
                        </div>
                        <div class="contact-item">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10" />
                                <polyline points="12 6 12 12 16 14" />
                            </svg>
                            <span class="boldTopic">24/7 — 365 days</span>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Footer Bottom Panel -->
            <div class="footer-bottom-wrapper">
                <div class="footer-bottom-panel">
                    <div class="footer-bottom-border-top"></div>
                    <p class="copyright topic">
                        <!-- <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z"/>
                            <circle cx="12" cy="12" r="10" fill="none" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 6v6l4 2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg> -->
                        &copy;&nbsp;<script>document.write(new Date().getFullYear())</script>. All Rights Received.
                    </p>
                    <p class="developer topic">
                        Design And Developed By <a href="#">Evon Technologies Software Solutions (PVT) Ltd.</a>
                    </p>
                </div>
            </div>

        </div>
    </footer>

    <!-- External JavaScript -->
    <script src="script.js"></script>
    <script src="animations.js"></script>

</body>

</html>
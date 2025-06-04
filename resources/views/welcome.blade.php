<!DOCTYPE html>
<html lang="en">
@extends ('layouts.app')
<body>
@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">
                    Resume Manager<br>
                    Your all in one job platform
                </h1>
                <div class="hero-buttons">
                    <button class="btn btn-primary btn-large">Primary Action</button>
                    <button class="btn btn-outline btn-large">Secondary Action</button>
                </div>

                <!-- Video Player Mockup -->
                <div class="video-mockup">
                    <div class="browser-frame">
                        <div class="browser-header">
                            <div class="browser-controls">
                                <span class="control red"></span>
                                <span class="control yellow"></span>
                                <span class="control green"></span>
                            </div>
                            <div class="browser-close">×</div>
                        </div>
                        <div class="video-content">
                            <div class="play-button">
                                <i class="fas fa-play"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Numbers Section -->
    <section class="numbers">
        <div class="container">
            <h2 class="section-title">Numbers That Matter</h2>
            <p class="section-description">
                Rhoncus morbi et augue nec, in id ullamcorper at sit. Condimentum sit nunc in eros scelerisque sed. Commodo
                in viverra nunc, ullamcorper ut. Non amet, tempor scelerisque molestie tellus. Fermentum scelerisque sit
                amet mauris commodo ac rhoncus. Eu non diam sit viverra lorem. Ut vulputate cursus sit mauris. Mollis leo
                eleifend ultricies purus iaculis.
            </p>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">
                        <div class="icon-shape"></div>
                    </div>
                    <div class="stat-number">250+</div>
                    <div class="stat-label">Happy Customers</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <div class="icon-shape"></div>
                    </div>
                    <div class="stat-number">600+</div>
                    <div class="stat-label">Completed Projects</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <div class="icon-shape"></div>
                    </div>
                    <div class="stat-number">1.8K+</div>
                    <div class="stat-label">Available Resources</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <div class="icon-shape"></div>
                    </div>
                    <div class="stat-number">11K+</div>
                    <div class="stat-label">Subscribers</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <h2 class="section-title">What Our Partners Say</h2>

            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="company-logo">Z</div>
                        <div class="company-name">Zoommer</div>
                    </div>
                    <p class="testimonial-text">
                        Maecenas facilisi libero nam eu. Quis pellentesque tortor a elementum ut blandit sed pellentesque
                        arcu. Maecenas in faucibus risus vitae diam. Non, massa sit a arcu, fermentum sit cursus ut eleifend.
                    </p>
                    <div class="author-info">
                        <div class="author-name">Author Name</div>
                        <div class="author-role">Role</div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="company-logo">A</div>
                        <div class="company-name">ArtVenue</div>
                    </div>
                    <p class="testimonial-text">
                        Nisl risus viverra dignissim eget. Nulla imperdiet integer vitae consequat adipiscing pellentesque.
                        Sed amet tincidunt morbi non sed donec mollis placerat neque.
                    </p>
                    <div class="author-info">
                        <div class="author-name">Author Name</div>
                        <div class="author-role">Role</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team">
        <div class="container">
            <h2 class="section-title">Our Lovely Team</h2>

            <div class="team-grid">
                @php
                    $teamMembers = [
                        ['name' => 'Darrell Steward', 'role' => 'UI Designer & Co-Founder'],
                        ['name' => 'Savannah Nguyen', 'role' => 'UX Designer & Co-Founder'],
                        ['name' => 'Dianne Russell', 'role' => 'Developer'],
                        ['name' => 'Kristin Watson', 'role' => 'Product Designer']
                    ];
                @endphp

                @foreach($teamMembers as $member)
                <div class="team-member">
                    <div class="member-photo"></div>
                    <h3 class="member-name">{{ $member['name'] }}</h3>
                    <p class="member-role">{{ $member['role'] }}</p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
                    </div>
                    <button class="btn btn-outline btn-small">Contact {{ explode(' ', $member['name'])[0] }}</button>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- App Download Section -->
    <section class="app-download">
        <div class="container">
            <div class="app-content">
                <div class="phone-mockup">
                    <div class="phone-frame">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                </div>
                <div class="app-info">
                    <h2 class="section-title">Download The App</h2>
                    <p class="section-description">
                        Nam rhoncus viverra eget faucibus pellentesque. Feugiat adipiscing massa vitae auctor eu massa. Sodales
                        libero orci cursus sed lorem nulla. In malesuada sagittis, egestas viverra ac nam. Massa volutpat.
                    </p>
                    <div class="app-buttons">
                        <button class="btn btn-dark">
                            <i class="fab fa-apple"></i>
                            <span>App Store</span>
                        </button>
                        <button class="btn btn-dark">
                            <i class="fab fa-google-play"></i>
                            <span>Google Play</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

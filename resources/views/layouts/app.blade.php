<!-- The place where head file, header and footer -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Manager</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
    <body>
        <!-- Header -->
        <header class="header">
            <div class="container">
                <div class="header-content">
                    <div class="header-left">
                        <div class="logo">
                            <div class="logo-icon"></div>
                            <span class="logo-text">Resume Manager</span>
                        </div>
                        <nav class="nav">
                            <a href="{{ route('welcome') }}" class="nav-link">Home</a>
                            <a href="{{ route(name:'talent_search') }}" class="nav-link">Talent Search</a>
                            <a href="{{ route(name:'FAQ') }}" class="nav-link">FAQ</a>
                            <div class="nav-dropdown">
                                <a href="#" class="nav-link">Sixteen <i class="fas fa-chevron-down"></i></a>
                            </div>
                        </nav>
                    </div>
                    <div class="header-right">
                        @if (Route::has('login'))
                            <nav class="flex items-center justify-end gap-4">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                    >
                                        <button class="btn btn-ghost">Log In</button>
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            <button class="btn btn-primary">Register</button>
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </div>
                </div>
            </div>
        </header>

        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="footer-content">
                    <div class="footer-column">
                        <div class="footer-logo">
                            <div class="logo-icon white"></div>
                            <span class="logo-text">WebbyFrames</span>
                        </div>
                        <div class="newsletter">
                            <input type="email" placeholder="Enter your email to get the latest news..." class="newsletter-input">
                            <button class="btn btn-primary">Subscribe</button>
                        </div>
                    </div>

                    <div class="footer-column">
                        <h4 class="footer-title">Column One</h4>
                        <ul class="footer-links">
                            <li><a href="#">Twenty One</a></li>
                            <li><a href="#">Thirty Two</a></li>
                            <li><a href="#">Forty Three</a></li>
                            <li><a href="#">Fifty Four</a></li>
                        </ul>
                    </div>

                    <div class="footer-column">
                        <h4 class="footer-title">Column Two</h4>
                        <ul class="footer-links">
                            <li><a href="#">Sixty Five</a></li>
                            <li><a href="#">Seventy Six</a></li>
                            <li><a href="#">Eighty Seven</a></li>
                            <li><a href="#">Ninety Eight</a></li>
                        </ul>
                    </div>

                    <div class="footer-column">
                        <h4 class="footer-title">Column Three</h4>
                        <ul class="footer-links">
                            <li><a href="#">One Ten</a></li>
                            <li><a href="#">Three Four</a></li>
                            <li><a href="#">Five Six</a></li>
                            <li><a href="#">Seven Eight</a></li>
                        </ul>
                    </div>

                    <div class="footer-column">
                        <h4 class="footer-title">Column Four</h4>
                        <div class="app-badges">
                            <div class="app-badge">
                                <i class="fab fa-apple"></i>
                            </div>
                            <div class="app-badge">
                                <i class="fab fa-google-play"></i>
                            </div>
                        </div>
                        <div class="social-section">
                            <h5 class="social-title">Join Us</h5>
                            <div class="social-links">
                                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-bottom">
                    <p class="copyright">Copyright © Misty 2024. All rights reserved.</p>
                    <div class="footer-nav">
                        <a href="#">Eleven</a>
                        <a href="#">Twelve</a>
                        <a href="#">Thirteen</a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
<!DOCTYPE html>
<html lang="en" data-theme="light" data-sidebar-behaviour="fixed" data-navigation-color="inverted" data-is-fluid="true">
<!-- Mirrored from dashly-theme.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Jan 2024 20:34:04 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta content="Webinning" name="author" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ url('/assets/css/theme.bundle.css') }}" id="stylesheetLTR" />
    <link rel="stylesheet" href="{{ url('/assets/css/theme.rtl.bundle.css') }}" id="stylesheetRTL" />

    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link rel="preload" as="style"
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&amp;display=swap" />
    <link rel="stylesheet" media="print" onload="this.onload=null;this.removeAttribute('media');"
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&amp;display=swap" />

    <!-- no-JS fallback -->
    <noscript>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&amp;display=swap" />
    </noscript>

    <script>
        // Theme switcher

        let themeSwitcher = document.getElementById("themeSwitcher");

        const getPreferredTheme = () => {
            if (localStorage.getItem("theme") != null) {
                return localStorage.getItem("theme");
            }

            return document.documentElement.dataset.theme;
        };

        const setTheme = function(theme) {
            if (
                theme === "auto" &&
                window.matchMedia("(prefers-color-scheme: dark)").matches
            ) {
                document.documentElement.dataset.theme = window.matchMedia(
                        "(prefers-color-scheme: dark)"
                    ).matches ?
                    "dark" :
                    "light";
            } else {
                document.documentElement.dataset.theme = theme;
            }

            localStorage.setItem("theme", theme);
        };

        const showActiveTheme = (theme) => {
            const activeBtn = document.querySelector(
                `[data-theme-value="${theme}"]`
            );

            document.querySelectorAll("[data-theme-value]").forEach((element) => {
                element.classList.remove("active");
            });

            activeBtn && activeBtn.classList.add("active");

            // Set button if demo mode is enabled
            document
                .querySelectorAll('[data-theme-control="theme"]')
                .forEach((element) => {
                    if (element.value == theme) {
                        element.checked = true;
                    }
                });
        };

        function reloadPage() {
            window.location = window.location.pathname;
        }

        setTheme(getPreferredTheme());

        if (typeof themeSwitcher != "undefined") {
            window
                .matchMedia("(prefers-color-scheme: dark)")
                .addEventListener("change", (e) => {
                    if (localStorage.getItem("theme") != null) {
                        if (localStorage.getItem("theme") == "auto") {
                            reloadPage();
                        }
                    }
                });

            window.addEventListener("load", () => {
                showActiveTheme(getPreferredTheme());

                document.querySelectorAll("[data-theme-value]").forEach((element) => {
                    element.addEventListener("click", () => {
                        const theme = element.getAttribute("data-theme-value");

                        localStorage.setItem("theme", theme);
                        reloadPage();
                    });
                });
            });
        }
    </script>
    <!-- Favicon -->
    <link rel="icon" href="assets/favicon/favicon.ico" sizes="any" />

    <!-- Demo script -->
    <script>
        var themeConfig = {
            theme: JSON.parse('"light"'),
            isRTL: JSON.parse("false"),
            isFluid: JSON.parse("true"),
            sidebarBehaviour: JSON.parse('"fixed"'),
            navigationColor: JSON.parse('"inverted"'),
        };

        var isRTL = localStorage.getItem("isRTL") === "true",
            isFluid = localStorage.getItem("isFluid") === "true",
            theme = localStorage.getItem("theme"),
            sidebarSizing = localStorage.getItem("sidebarSizing"),
            linkLTR = document.getElementById("stylesheetLTR"),
            linkRTL = document.getElementById("stylesheetRTL"),
            html = document.documentElement;

        if (isRTL) {
            linkLTR.setAttribute("disabled", "");
            linkRTL.removeAttribute("disabled");
            html.setAttribute("dir", "rtl");
        } else {
            linkRTL.setAttribute("disabled", "");
            linkLTR.removeAttribute("disabled");
            html.removeAttribute("dir");
        }
    </script>

    <!-- Page Title -->
    <title>Dashboard | @yield('title')</title>
</head>
<!-- MAIN CONTENT -->
<main class="container">
    <div class="row align-items-center justify-content-center vh-100">
        <div class="col-md-7 col-lg-6 d-flex flex-column py-6">
            <!-- Title -->
            <h1 class="mb-2">Sign In</h1>

            <!-- Subtitle -->
            <p class="text-secondary">
                Enter your email address and password to access admin panel
            </p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <!-- Label -->
                            <label class="form-label"> Email Address </label>

                            <!-- Input -->

                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="Your email address">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <!-- Password -->
                        <div class="mb-4">
                            <div class="row">
                                <div class="col">
                                    <!-- Label -->
                                    <label class="form-label"> Password </label>
                                </div>

                                <div class="col-auto">
                                    <!-- Help text -->
                                    <a href="reset-password-illustration.html"
                                        class="form-text small text-muted link-primary">Forgot password</a>
                                </div>
                            </div>
                            <!-- / .row -->

                            <!-- Input -->
                            <div class="input-group input-group-merge">

                                <input id="password" type="password" data-toggle-password-input
                                    placeholder="Your password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <button type="button" class="input-group-text px-4 text-secondary link-primary"
                                    data-toggle-password></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / .row -->

                <div class="form-check">
                    <!-- Input -->
                    <input type="checkbox" class="form-check-input" id="remember" />

                    <!-- Label -->
                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div>

                <div class="d-flex align-items-center justify-content-between mt-3">
                    <!-- Button -->
                    <button type="submit" class="btn btn-primary">Sign in</button>

                    <!-- Link -->
                    <small class="mb-0 text-muted">
                        Don't have an account yet?
                        <a href="{{ route('register') }}" class="fw-semibold">Sign up</a>
                    </small>
                </div>
            </form>
        </div>

        <div class="col-md-5 col-lg-6 px-lg-4 px-xl-6 d-none d-lg-block">

            <!-- Image -->
            <div class="text-center">
                <img src="https://d33wubrfki0l68.cloudfront.net/3ec9ba4912f9c709dc372e44996e05e983962a26/54f2f/assets/images/illustrations/sign-in-illustration.svg"
                    alt="..." class="img-fluid">
            </div>
        </div>
    </div> <!-- / .row -->
</main> <!-- / main -->

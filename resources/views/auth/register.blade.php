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
    @section('title', 'Page Title')
</head>
<!-- MAIN CONTENT -->

<main class="container">
    <div class="row align-items-center justify-content-center vh-100">
        <div class="col-md-7 col-lg-6 d-flex flex-column py-6">
            <div class="my-auto">
                <!-- Title -->
                <h1 class="mb-2">
                    Free Sign Up
                </h1>

                <!-- Subtitle -->
                <p class="text-secondary">
                    Don't have an account? Create your account, it takes less than a minute
                </p>

                <!-- Form -->
                <form>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-4">

                                <!-- Label -->
                                <label class="form-label">
                                    Full name
                                </label>

                                <!-- Input -->
                                <input type="text" class="form-control" placeholder="Your full name">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-4">

                                <!-- Label -->
                                <label class="form-label">
                                    Email Address
                                </label>

                                <!-- Input -->
                                <input type="email" class="form-control" placeholder="Your email address">
                            </div>
                        </div>
                    </div> <!-- / .row -->

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-4">

                                <!-- Label -->
                                <label class="form-label">
                                    Password
                                </label>

                                <!-- Input -->
                                <div class="input-group input-group-merge">
                                    <input type="password" class="form-control" autocomplete="off"
                                        data-toggle-password-input placeholder="Your password">

                                    <button type="button" class="input-group-text px-4 text-secondary link-primary"
                                        data-toggle-password></button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-4">

                                <!-- Label -->
                                <label class="form-label">
                                    Confirm password
                                </label>

                                <!-- Input -->
                                <div class="input-group input-group-merge">
                                    <input type="password" class="form-control" autocomplete="off"
                                        data-toggle-password-input placeholder="Your password again">

                                    <button type="button" class="input-group-text px-4 text-secondary link-primary"
                                        data-toggle-password></button>
                                </div>
                            </div>
                        </div>
                    </div> <!-- / .row -->

                    <div class="form-check">

                        <!-- Input -->
                        <input type="checkbox" class="form-check-input" id="agree">

                        <!-- Label -->
                        <label class="form-check-label" for="agree">
                            I agree with <a href="javascript: void(0);">Terms & Conditions</a> and have understood <a
                                href="javascript: void(0);">Privacy Policy</a>
                        </label>
                    </div>


                    <div class="d-flex align-items-center justify-content-between mt-3">

                        <!-- Button -->
                        <button type="button" class="btn btn-primary">
                            Get started
                        </button>

                        <!-- Link -->
                        <small class="mb-0 text-muted">
                            Already registered? <a href="{{ route('login') }}">Login</a>
                        </small>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-5 col-lg-6 px-lg-4 px-xl-6 d-none d-lg-block">

            <!-- Image -->
            <div class="text-center">
                <img src="https://d33wubrfki0l68.cloudfront.net/d7b3128e115346d419e411ffe3ac9a97c6c1bbd5/70041/assets/images/illustrations/sign-up-illustration.svg"
                    alt="..." class="img-fluid">
            </div>
        </div>
    </div> <!-- / .row -->
</main> <!-- / main -->

<!-- Mirrored from dashly-theme.com/sign-up-illustration.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Jan 2024 20:42:26 GMT -->

</html>

"use strict";

export const NavManager = function () {
    var navbar = document.getElementById("nav");
    var navToggle = document.getElementById("btn-menu-responsive");
    var navMobile = document.getElementById("nav-mobile");
    var stickyOffset = navbar ? navbar.offsetTop : 0;
    var scrollTicking = false;

    // ---- Debounced scroll handler ----
    function onScroll() {
        if (!scrollTicking) {
            window.requestAnimationFrame(function () {
                handleSticky();
                handleActiveSection();
                scrollTicking = false;
            });
            scrollTicking = true;
        }
    }

    // ---- Sticky nav on scroll ----
    function handleSticky() {
        if (window.pageYOffset >= stickyOffset) {
            navbar.classList.add("sticky");
        } else {
            navbar.classList.remove("sticky");
        }
    }

    // ---- Highlight active section link ----
    function handleActiveSection() {
        var scrollPos = window.pageYOffset + 160;
        var allDesktopLinks = navbar.querySelectorAll(".nav-link.main");
        var allMobileLinks = navMobile ? navMobile.querySelectorAll(".nav-mobile__link.main") : [];
        var sections = document.querySelectorAll("section[id]");
        var found = false;

        // Remove active from all
        allDesktopLinks.forEach(function (link) { link.classList.remove("active"); });
        allMobileLinks.forEach(function (link) { link.classList.remove("active"); });

        // Find current section (iterate backwards so deeper sections win)
        for (var i = sections.length - 1; i >= 0; i--) {
            var section = sections[i];
            var top = section.offsetTop;
            var bottom = top + section.offsetHeight;

            if (scrollPos >= top && scrollPos < bottom) {
                var sectionId = section.getAttribute("id");

                // Activate matching desktop link
                allDesktopLinks.forEach(function (link) {
                    if (link.getAttribute("href") === "#" + sectionId) {
                        link.classList.add("active");
                        found = true;
                    }
                });

                // Activate matching mobile link
                allMobileLinks.forEach(function (link) {
                    if (link.getAttribute("href") === "#" + sectionId) {
                        link.classList.add("active");
                    }
                });

                if (found) break;
            }
        }
    }

    // ---- Mobile menu toggle ----
    function initMobileMenu() {
        if (!navToggle || !navMobile) return;

        navToggle.addEventListener("click", function () {
            var isOpen = navMobile.classList.contains("is-open");

            if (isOpen) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        });

        // Close on link click
        var mobileLinks = navMobile.querySelectorAll(".nav-mobile__link");
        mobileLinks.forEach(function (link) {
            link.addEventListener("click", function () {
                closeMobileMenu();
            });
        });

        // Close on Escape key
        document.addEventListener("keydown", function (e) {
            if (e.key === "Escape" && navMobile.classList.contains("is-open")) {
                closeMobileMenu();
            }
        });
    }

    function openMobileMenu() {
        navMobile.classList.add("is-open");
        navMobile.setAttribute("aria-hidden", "false");
        navToggle.classList.add("is-active");
        navToggle.setAttribute("aria-expanded", "true");
        document.body.style.overflow = "hidden";
    }

    function closeMobileMenu() {
        navMobile.classList.remove("is-open");
        navMobile.setAttribute("aria-hidden", "true");
        navToggle.classList.remove("is-active");
        navToggle.setAttribute("aria-expanded", "false");
        document.body.style.overflow = "";
    }

    return {
        init: function () {
            if (!navbar) return;

            window.addEventListener("scroll", onScroll, { passive: true });
            initMobileMenu();
        }
    };
};

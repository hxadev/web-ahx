/**
 * PortfolioGallery — Paginated grid gallery
 * Replaces Owl Carousel with a vanilla JS solution.
 * Shows ITEMS_PER_PAGE cards per page, hides the rest,
 * and renders pagination controls.
 */
export const Carousel = function () {

    var ITEMS_PER_PAGE = 6;
    var grid = null;
    var paginationNav = null;
    var cards = [];
    var currentPage = 1;
    var totalPages = 1;

    function getItemsPerPage() {
        var width = window.innerWidth;
        if (width <= 480) return 4;
        if (width <= 768) return 4;
        return 6;
    }

    function showPage(page) {
        ITEMS_PER_PAGE = getItemsPerPage();
        totalPages = Math.ceil(cards.length / ITEMS_PER_PAGE);
        if (page < 1) page = 1;
        if (page > totalPages) page = totalPages;
        currentPage = page;

        var start = (page - 1) * ITEMS_PER_PAGE;
        var end = start + ITEMS_PER_PAGE;

        for (var i = 0; i < cards.length; i++) {
            if (i >= start && i < end) {
                cards[i].removeAttribute('data-hidden');
                cards[i].style.display = '';
            } else {
                cards[i].setAttribute('data-hidden', 'true');
                cards[i].style.display = 'none';
            }
        }

        renderPagination();
        scrollToGrid();
    }

    function scrollToGrid() {
        if (currentPage === 1) return;
        if (!grid) return;
        var rect = grid.getBoundingClientRect();
        var offset = window.pageYOffset + rect.top - 120;
        window.scrollTo({ top: offset, behavior: 'smooth' });
    }

    function renderPagination() {
        if (!paginationNav) return;
        paginationNav.innerHTML = '';

        if (totalPages <= 1) return;

        // Prev arrow
        var prev = document.createElement('button');
        prev.className = 'portfolio__pagination-arrow';
        prev.innerHTML = '<i class="fas fa-chevron-left"></i>';
        prev.setAttribute('aria-label', 'Previous page');
        prev.disabled = currentPage === 1;
        prev.addEventListener('click', function () {
            showPage(currentPage - 1);
        });
        paginationNav.appendChild(prev);

        // Page buttons
        for (var i = 1; i <= totalPages; i++) {
            var btn = document.createElement('button');
            btn.className = 'portfolio__pagination-btn';
            if (i === currentPage) {
                btn.className += ' portfolio__pagination-btn--active';
            }
            btn.textContent = i;
            btn.setAttribute('aria-label', 'Page ' + i);
            btn.setAttribute('aria-current', i === currentPage ? 'page' : 'false');
            (function (page) {
                btn.addEventListener('click', function () {
                    showPage(page);
                });
            })(i);
            paginationNav.appendChild(btn);
        }

        // Next arrow
        var next = document.createElement('button');
        next.className = 'portfolio__pagination-arrow';
        next.innerHTML = '<i class="fas fa-chevron-right"></i>';
        next.setAttribute('aria-label', 'Next page');
        next.disabled = currentPage === totalPages;
        next.addEventListener('click', function () {
            showPage(currentPage + 1);
        });
        paginationNav.appendChild(next);
    }

    var resizeTimer = null;
    function onResize() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function () {
            var newPerPage = getItemsPerPage();
            if (newPerPage !== ITEMS_PER_PAGE) {
                showPage(1);
            }
        }, 250);
    }

    return {
        init: function () {
            grid = document.getElementById('portfolio-grid');
            paginationNav = document.getElementById('portfolio-pagination');
            if (!grid) return;

            cards = Array.prototype.slice.call(
                grid.querySelectorAll('.project-card')
            );

            if (cards.length === 0) return;

            showPage(1);
            window.addEventListener('resize', onResize);
        }
    };
};

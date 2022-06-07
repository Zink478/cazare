$(document).ready(function () {
    const owl = $("#home-carousel").owlCarousel({
        dots: true,
        nav: false,
        dotsEach: true,
        dotsData: true,
        margin: 40,
        items: 1
    });
    $('.owl-dot').click(function () {
        owl.trigger('to.owl.carousel', [$(this).index(), 300]);
    });
    $('.home-carousel-next').click(function () {
        owl.trigger('next.owl.carousel');
    });

    $('.home-carousel-prev').click(function () {
        owl.trigger('prev.owl.carousel', [300]);
    });
    const owl1 = $("#testimonials").owlCarousel({
        dots: true,
        nav: false,
        margin: 30,

        responsive: {
            0: {
                items: 1,
                autoWidth: true,
            },
            500: {
                items: 2
            },
            801: {
                item: 3
            }
        }
    });
    $('.owl-dot').click(function () {
        owl1.trigger('to.owl.carousel', [$(this).index(), 300]);
    });
    const acc = document.getElementsByClassName("accordion");
    let i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
    const owl2 = $("#blog-carousel").owlCarousel({
        dots: true,
        nav: false,
        dotsEach: true,

        dotsContainer: '#owl-dots',
        responsive: {
            0: {
                items: 1,
                margin: 40,
                autoWidth: true,
            },
            1131: {
                items: 2,
                margin: 60,
            }
        }
    });
    $('.owl-dot').click(function () {
        owl2.trigger('to.owl.carousel', [$(this).index(), 300]);
    });
    $('.blog-carousel-next').click(function () {
        owl2.trigger('next.owl.carousel');
    });

    $('.blog-carousel-prev').click(function () {
        owl2.trigger('prev.owl.carousel', [300]);
    });
    var c = 1;
    $('#owl-dots .owl-dot').each(function () {
        $(this).find('span').html(c);
        c++;
    });
    $('.dropbox1').click(() => {
        $('.dropbox__menu1').toggleClass('display-block');
        $('.dropbox1').toggleClass('open');
    });
    $('.dropbox2').click(() => {
        $('.dropbox__menu2').toggleClass('display-block');
        $('.dropbox2').toggleClass('open');
    });
});
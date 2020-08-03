

$(document).ready(function() {

    if($(window).width() < 767) {
        var content = '';
        var c = 0;
        $(".ClientsBlock > div").each(function(index, p){
            // console.log($(this));
            if(index%8 == 0) {
                content += '<div>'+$(this)[0].outerHTML;
            }

            if(index%8 != 0 &&  (index+1)%8 != 0) {
                content += $(this)[0].outerHTML;
            }

            if(index%8 != 0 &&  (index+1)%8 == 0 || index + 1 == $(".ClientsBlock > div").length) {
                content += $(this)[0].outerHTML+'</div>';
            }

        });
        // console.log(content);

        $(".ClientsBlock").html(content);
    }


    $(".ClientsBlock").slick({
        dots: true,
        slidesToShow: 9,

        infinite: true,
        arrows: false,
        slidesToScroll: 9,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 5
                }
            }
        ]
    });


});
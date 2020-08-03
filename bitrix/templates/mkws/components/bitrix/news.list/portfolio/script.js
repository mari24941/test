$(document).ready(function() {
    $.ajax({
        url: '/proekty/',
        data: {"AJAX_REQUEST": "Y"},
        success: function(html){
            var htmlPagination = $(html).find('.Pagination').html();
            $('.Pagination').html(htmlPagination);
        }
    });


    $('.PortfolioShowMore').click(function(){
        var url =  $('.Pagination a').attr('href');
        if(url && !$(this).find('a').attr('href')){
            $.ajax({
                url: url,
                data: {"AJAX_REQUEST": "Y"},
                success: function(html){
                    var htmlContent = $(html).find('.PortfolioList').html();
                    $('.PortfolioList').append(htmlContent);
                    $('.PortfolioShowMore').html('<a href="/proekty/"><svg class="inline-svg-icon arrow arrow-bottom"><use xlink:href="#arrow"></use></svg> Посмотреть всё</a>');

                }
            });
        }
    });

});
$(document).ready(function() {
    $('.Portfolio__section').click(function(){
        var code = $(this).attr('data-id');
        $('.Portfolio__section').removeClass('Portfolio__section_active_true');
        $(this).addClass('Portfolio__section_active_true');
        $('.PortfolioItem').removeClass('PortfolioItem_visible_hidden');
        if(code != 'all') {
            $('.PortfolioItem:not([data-'+code+'="true"])').addClass('PortfolioItem_visible_hidden');
        }
    });

    $('.PortfolioShowMore').click(function(){
        var url =  $('.Pagination a').attr('href');

        if(url){
            $.ajax({
                url: url,
                data: {"AJAX_REQUEST": "Y"},
                success: function(html){

                    var htmlContent = $(html).find('.PortfolioList').html();
                    var htmlPagination = $(html).find('.Pagination').html();

                    $('.PortfolioList').append(htmlContent);
                    $('.Pagination').html(htmlPagination);
                }
            });
        }


    });

});
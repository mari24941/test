$(document).ready(function() {

    $('.ArticlesShowMore').click(function(){
        var url =  $('.Pagination a').attr('href');
        if(url){
            $.ajax({
                url: url,
                data: {"AJAX_REQUEST": "Y"},
                success: function(html){

                    var htmlContent = $(html).find('.ArticlesList').html();
                    var htmlPagination = $(html).find('.Pagination').html();
                    $('.ArticlesList').append(htmlContent);
                    $('.Pagination').html(htmlPagination);
                }
            });
        }
    });

});
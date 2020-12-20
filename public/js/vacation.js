
$(function(){
    $('.vacation').on('submit', function(e){
        e.preventDefault();
        var title = $('#title').val();
        var start = $('#start_date').val();
        var end = $('#end_date').val();

        $.ajax({
            type: 'GET',
            url: 'vacation',
            data: {
                title :title,
                start_date : start,
                end_date : end
            },
            dataType:"JSON"
        }).done(function (){
            console.log('성공')
            location.reload()
        }).fail(function(){
            console.log('실패')
        })
    })
})

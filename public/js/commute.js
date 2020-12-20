$(function() {

    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    var time = h + ':' + m + ':' + s

    var y = today.getFullYear()
    var m = today.getMonth() + 1
    var d = today.getDate()
    var date = y + '-' + m + '-' + d

    $('.goWork').click(function(){



        $.ajax({
            type: 'GET',
            url: 'gowork',
            data: {
                title : time,
                start_date: date,
                end_date: date,
            },
            dataType:"JSON"
        }).done(function(){
            location.reload()
            console.log('성공')
        }).fail(function(){
            console.log('실패')
        })
    })

    $('.goHome').click(function(){

        $.ajax({
            type: 'GET',
            url: 'gohome',
            data: {
                title : time,
                start_date: date,
                end_date: date,
            },
            dataType:"JSON"
        }).done(function(){
            location.reload()
            console.log('성공')
        }).fail(function(){
            console.log('실패')
        })
    })
})

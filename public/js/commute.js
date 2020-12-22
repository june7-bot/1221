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
        }).done(function(status){
            if((status.status)==404 ) {
                alert('이미 출근 눌렀습니다')
            }else{
            location.reload()
            }
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
        }).done(function(status){
            if((status.status)==404 ){
                alert('이미 퇴근 눌렀습니다')
            }
        }).fail(function(){
            location.reload()
        })
    })
})

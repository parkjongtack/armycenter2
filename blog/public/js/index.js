$(document).ready(function(){
    var text_length;
    $('#form_text').on('keydown', function(e){
        var text = $(this).val();
        if(e.keyCode != 8){
            if(text.length>=1000){
                alert("1000자 이내만 입력가능합니다.");
                e.preventDefault();
            }
        }
        $('.lim_text span').text(text.length);
    });
});
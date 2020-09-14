$(document).ready(function(){
    var text_length;
    var sec5_height;
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

    function get_sec5_height(){
        var w_width = $(window).width();
        var pad_form_height = $('.sec5 .contact_outer').innerHeight();
        if(w_width > 1900){

        }else if(w_width>768){

        }else if(w_width<769){
            $('.sec5 .sec_bg').css({paddingBottom:(pad_form_height-1070)+"px"});
        }
    }
    
    get_sec5_height()
    
});
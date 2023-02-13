(($)=>{

    //가입 유효성 체크
    $('#inputId').on({
        focus:function(){
            console.log('포커스됨');
            $(this).next().show();
        },
        keyup:function(){
            if($(this).val())
            $(this).next().children().eq(0).addClass('on');
            //$("#notice a").attr('class','ab');
            //{field.isClassId===''?'':(field.isClassId?'success':'error')}
        }
    })
    //가입 정보 전송
    $('.gaib-btn').on({
        click:function(e){
            e.preventDefault();

            console.log('찍힘');

            inputId = $('#inputId').val();
            inputPassword = $('#inputPassword').val();
            inputName = $('#inputName').val();

            $.ajax({
                url:'../content/gaib_form.php',
                method:'POST',
                data: { 
                    inputId: inputId,
                    inputPassword: inputPassword,
                    inputName: inputName
                 },
                success: function(res){
                    console.log( '성공' );
                    location.replace('/gab/index.php');
                },
                error: function(error){
                    //실패 메서드
                    console.log('AJAX 실패', error);
                }
            });
        }
    });

    //로그인 시 변경되는 사항
    function loginEvent(){
        if( localStorage.length <= 0 ) return;
        const localData = JSON.parse(localStorage.getItem('userId'));

        
        $('.gaib-page-btn').html(`<span><i>${localData.nam}</i>님 반갑습니다!</span>`);
        $('.login-page-btn').html(`<a href="/gab/index.php" class='logout-btn'>로그아웃</a>`);
        $('.writing #nickname').val(`${localData.nam}`);
        $('.writing #nickname').text(`${localData.nam}`);
        $('.replyName').val(`${localData.nam}`);
        $('.replyName').text(`${localData.nam}`);

        console.log(localData);
    }
    loginEvent();

    //로그인 버튼 클릭 이벤트
    $('.login-btn').on({
        click:function(e){
            e.preventDefault();

            //입력할 폼데이터 생성
            var formData = new FormData();
            formData.append("userId", $('#id').val());
            formData.append("userPw", $('#pw').val());

            //데이터 보내기
            $.ajax({
                url:'../content/login_form.php',
                method:'POST',  
                data: formData,
                dataType: 'JSON',
                contentType: false,
                processData: false,
                async:false,
                success: function(res){
                    console.log( res );
                    localStorage.setItem('userId', `{"ses": "${res.ses}", "ids": "${res.ids}", "nam": "${res.nam}"}`);
                    location.replace('/gab/index.php');
                },
                error: function(error){
                    //실패 메서드
                    console.log('AJAX 실패', error);
                }
            });
        }
    });

    //로그아웃 버튼 클릭 이벤트
    $('.logout-btn').on({
        click:function(){
            console.log('로그아웃');
            let value = getCookie('PHPSESSID');
            let newDate = new Date();

            newDate.setDate(newDate.getDate()-1);
            document.cookie = `${'PHPSESSID'}=${value}; path=/; expires=${newDate.toUTCString()};`;
            localStorage.removeItem('userId');
        }
    });

    //겟쿠키
    const getCookie=(name)=>{
        let temp = []
        let obj = [];
        let found = '';

        if(document.cookie===''){return;}
        temp = document.cookie.split(';');
        temp.map((item, idx)=>{
            obj[idx] = {
                name: item.split('=')[0].trim(),
                value: item.split('=')[1].trim()
            }
        });

        //쿠키 이름을 비교 판단
        obj.map((item)=>{
            if( item.name === name ){
                found = item.value;
            }    
        })

        return found;
    }


    
    //댓글 수정
    $('.comment-modify-btn').each(function(idx){
        $(this).on({
            click: function(e){
                e.preventDefault();
                i = idx
                console.log($('.reply-modify-wrap'));
                $('.reply-modify-wrap').eq(i).fadeIn(200);
                $('.comment-real-contents').eq(i).hide();
            }
        });
    });


    //게시판 일기장 전환
    $('#select .board').on({
        click: function(){
            $(this).addClass('on');
            $('#select .diary').removeClass('on');
            location.replace('/gab/index.php');            
        }
    })

    $('#select .diary').on({
        click: function(){
            $(this).addClass('on');
            $('#select .board').removeClass('on');
            location.replace('/gab/diary');
        }
    })


})(jQuery);
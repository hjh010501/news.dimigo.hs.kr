<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>DIMINEWS</title>
</head>

<body>
<div class="logo">LOGO</div>

<div class="news">


<form method="post" name="newsform" id="newsform" action="upload/savepost.php">
    <select name="job">
        <option value="1">학교·라이프</option>
        <option value="2">행사</option>
        <option value="3">교육·진로</option>
        <option value="4">정치·사회</option>
        <option value="5">IT</option>
        <option value="6">기획</option>
    </select>
    <input type="text" id="newstitle" name="newstitle" placeholder="제목"/>
    <textarea id="newscontent" name="newscontent"></textarea>
    <input type="button" id="newsupload" name="newsupload" value="올리기">
</form>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script>
    var welEditable = $("#newscontent");

    $(document).ready(function() {
        $('#newscontent').summernote({
            focus: true,
            disableResizeEditor: true,
            height: "650px",
            lang: 'ko-KR',
            callback: {
                onImageUpload: function (files, editor, welEditable) {
                    sendFile(files[0], editor, welEditable);
                }
            }
        });
        $('.note-statusbar').hide();
    });

    function sendFile(file,editor,welEditable) {
        data = new FormData();
        data.append("file", file);
        $.ajax({
            url: "files/saveimage.php", // image 저장 소스
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            success: function(data){
            alert(data);
                var image = $('<img>').attr('src', '' + data); // 에디터에 img 태그로 저장을 하기 위함
                $('.summernote').summernote("insertNode", image[0]); // summernote 에디터에 img 태그를 보여줌
//       editor.insertImage(welEditable, data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus+" "+errorThrown);
            }
        });
    }

    $("#newsupload").click(function() {
       var title = $("#newstitle").val();
       var content = $("#newscontent").val();

       if(title == "" || content == "") {
           alert("똑바로 입력하고 내장 ㅎㅎ");
       } else {
           $("#newsform").submit();
       }
    });
</script>

</body>
</html>

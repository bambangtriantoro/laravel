// This for handle ajax search article
$('#search').on('click', function(){
    $.ajax({
        url : '/articles',
        type : 'GET',
        dataType : 'json',
        data : {
            'keywords' : $('#keywords').val(),
        },
        success : function(data) {
            $('#article-list').html(data['view']);
            $('#keywords').val(data['keywords']);
        },
        error : function(xhr, status) {
            console.log(xhr.error + " ERROR STATUS : " + status);
        },
        complete : function() {
            alreadyloading = false;
        }
    })
});

// This for handle ajax search book
$('#search').on('click', function(){
    $.ajax({
        url : '/books',
        type : 'GET',
        dataType : 'json',
        data : {
            'keywords' : $('#keywords').val(),
        },
        success : function(data) {
            $('#book-list').html(data['view']);
            $('#keywords').val(data['keywords']);
        },
        error : function(xhr, status) {
            console.log(xhr.error + " ERROR STATUS : " + status);
        },
        complete : function() {
            alreadyloading = false;
        }
    })
});

// this js for handle ajax sorting article
$('.sort').on('click', function() {
    $.ajax({
        url : '/articles',
        typs : 'GET',
        dataType : 'json',
        data : {
            sort : $(this).data('sort'),
        },
        success : function(data) {
            $('#article-list').html(data['view']);
        },
        error : function(xhr, status, error) {
        console.log(xhr.error + "\n ERROR STATUS : " + status +
        "\n" + error);
        },
        complete : function() {
            alreadyloading = false;
        }
    })
});

// This for handle ajax article commment
$('#savecomment').on('click', function(){
    $.ajax({
        url : '/comments',
        type : 'POST',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType : 'json',
        data : $('#articlecomment').serialize(),

        success : function(data) {
        // console.log(data);
        $('#commentlist').prepend(
            "<div style=\"outline: 1px solid #74AD1B;\"><p style=\"word-wrap: break-word;\">comment:" +data['comments']['content']+ "</p><i>By:" +data['comments']['user']+ "</i></div>"
        );        
        },
        error : function(xhr, status) {
            console.log(xhr.error + " ERROR STATUS : " + status);
        },
        complete : function() {
            alreadyloading = false;
        }
    })
});

// This for handle ajax book commment
$('#savecomment').on('click', function(){
    $.ajax({
        url : '/commentsbooks',
        type : 'POST',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('description')},
        dataType : 'json',
        data : $('#bookcomment').serialize(),

        success : function(data) {
        // console.log(data);
        $('#commentlist').prepend(
            "<div style=\"outline: 1px solid #74AD1B;\"><p style=\"word-wrap: break-word;\">comment:" +data['comments']['content']+ "</p><i>By:" +data['comments']['user']+ "</i></div>"
        );        
        },
        error : function(xhr, status) {
            console.log(xhr.error + " ERROR STATUS : " + status);
        },
        complete : function() {
            alreadyloading = false;
        }
    })
});

// this js for handle ajax sorting book
$('.sort').on('click', function() {
    $.ajax({
        url : '/books',
        typs : 'GET',
        dataType : 'json',
        data : {
            sort : $(this).data('sort'),
        },
        success : function(data) {
            $('#book-list').html(data['view']);
        },
        error : function(xhr, status, error) {
        console.log(xhr.error + "\n ERROR STATUS : " + status +
        "\n" + error);
        },
        complete : function() {
            alreadyloading = false;
        }
    })
});
const base_url = $(`meta[name="base_url"]`).attr("content");
const basic_info_url = base_url + '/instructor/courses/create';
const update_url = base_url + '/instructor/courses/update';
const csrf_token = $('meta[name="csrf-token"]').attr("content");




var notyf = new Notyf({
    duration: 5000,
    dismissible: true
});


//laravel filemanger init 
$('#lfm').filemanager('image');






// navigation steps

$('.course-tab').on('click', function (e) {
    e.preventDefault();
    let step = $(this).data('step');
    
    $('.course-form').find('input[name=next_step]').val(step);
    $('.course-form').trigger('submit');
    
});





$(".basic_info_form").on("submit", function (e) {    
    e.preventDefault();
   
    let formDaata = new FormData(this);
    $.ajax({
        url: basic_info_url,
        method: "POST",
        data: formDaata,
        processData: false,
        contentType: false,

        beforeSend: function () {
            
        },
        success: function (data) {   
            window.location.href = data.redirect;
        },
        error: function (xhr, status, error) {
           $.each(xhr.responseJSON.errors, function (key, value) {
               notyf.error(value[0]);
           })
          
        },
        complete: function () {},
    });
});

$(".more_info_form").on("submit", function (e) {    
    e.preventDefault();
    let formDaata = new FormData(this);
    $.ajax({
        url: update_url,
        method: "POST",
        data: formDaata,
        processData: false,
        contentType: false,

        beforeSend: function () {},
        success: function (data) {
            window.location.href = data.redirect;
        },
        error: function (xhr, status, error) {
            $.each(xhr.responseJSON.errors, function (key, value) {
                notyf.error(value[0]);
            })
        },
        complete: function () {},
    });
});




    // show hide path input depending on source
    $(document).on('change', '.storage', function () {
        let value = $(this).val();
        $('.source_input').val('');
        if (value == 'upload') {
            $('.upload_source').removeClass('d-none');
            $('.external_source').addClass('d-none');
        } else {
            $('.upload_source').addClass('d-none');
            $('.external_source').removeClass('d-none');
        }
    });

    $('.dynamic-modal-btn').on('click', function (e) {
        e.preventDefault();
        $('#dynamic-modal').modal("show");
        let course_id = $(this).data('id');


        $.ajax({
            method: "GET",
            url: base_url + '/instructor/course-content/:id/create-chapter'.replace(':id', course_id),
            data: {},
            beforeSend: function () {},
            success: function (data) {    
                $('#dynamic-modal-content').html(data);
            },
            error: function (xhr, status, error) {},
            complete: function () {},
        });
    });

    $('.edit_chapter').on('click', function (e) {
        e.preventDefault();
        $('#dynamic-modal').modal("show");
    
        let chapter_id = $(this).data('chapter-id');
    
        $.ajax({
            method: 'GET',
            url: base_url + '/instructor/course-content/:id/edit-chapter'.replace(':id', chapter_id),
            data: {},
            beforeSend: function () {
            },
            success: function (data) {
                $('#dynamic-modal-content').html(data);
            },
            error: function (xhr, status, error) {
    
            }
        })
    });
    




    $('.add_lesson').on('click', function(e) {
        e.preventDefault();
        $('#dynamic-modal').modal("show");
    
        let courseId = $(this).data('course-id');
        let chapterId = $(this).data('chapter-id');
        $.ajax({
            method: 'GET',
            url: base_url + '/instructor/course-content/create-lesson',
            data: {
                'course_id': courseId,
                'chapter_id': chapterId
            },
            beforeSend: function () {
                // $('.dynamic-modal-content').html(loader);
            },
            success: function (data) {
                
                $('#dynamic-modal-content').html(data);
            },
            error: function (xhr, status, error) {
    
            }
        })
    });

    $('.edit_lesson').on('click', function() {

        $('#dynamic-modal').modal("show");
    
        let courseId = $(this).data('course-id');
        let chapterId = $(this).data('chapter-id');
        let lessonId = $(this).data('lesson-id');
    
        $.ajax({
            method: 'GET',
            url: base_url + '/instructor/course-content/edit-lesson',
            data: {
                'course_id': courseId,
                'chapter_id': chapterId,
                'lesson_id': lessonId
            },
            beforeSend: function () {
            },
            success: function (data) {
                $('#dynamic-modal-content').html(data);
            },
            error: function (xhr, status, error) {
    
            }
        })
    });




    if($('.sortable_list li').length) {
        $('.sortable_list').sortable({
            items: "li",
            containment: "parent",
            cursor: "move",
            handle: ".dragger",
            update: function(event, ui) {
                let orderIds = $(this).sortable("toArray", {
                    attribute: "data-lesson-id",
                });
    
                let chapterId = ui.item.data("chapter-id");
    
                $.ajax({
                    method: 'POST',
                    url: base_url + `/instructor/course-chapter/${chapterId}/sort-lesson`,
                    data: {
                        _token: csrf_token,
                        order_ids: orderIds
                    },
                    success: function(data) {
                        notyf.success(data.message);
                    },
                    error: function(xhr, status, error) {
                        notyf.error(data.error);
                    }
                })
    
            }
        });
    }



$('.sort_chapter_btn').on('click', function() {
    $('#dynamic-modal').modal("show");
    let courseId = $(this).data('id');
    $.ajax({
        method: 'GET',
        url: base_url + `/instructor/course-content/${courseId}/sort-chapter`,
        data: {
        },
        beforeSend: function () {

        },
        success: function (data) {
            $('#dynamic-modal-content').html(data);
        },
        error: function (xhr, status, error) {
            notyf.error(error);
        }
    })
});
    